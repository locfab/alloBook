<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;
use App\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class BooksController extends Controller
{
    public function __construct()
    {
        //$this->middleware('noGuestRed', ['only' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author')->get();
        $books = $books->sortBy('title');
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::lists('name', 'id');
        foreach($authors as $key => $author){
            $authors[$key] = ucwords($authors[$key]);
        }
        $categories = Category::lists('category', 'id');

        foreach($categories as $key => $categorie){
            $categories[$key] = ucwords($categories[$key]);
        }

        return view('books.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'synopsis'  => 'required|min:6',
            'date'      => 'required|date|date_format:Y-m-d',
            'urlImage' => 'required|URL'

        ]);
        if($validation->fails())
        {
            return redirect()->route('books.create')->withInput($request->all())->withErrors($validation->errors())->with('message', 'New Book!!!');
        }
        else
        {
            $book = new Book;
            $book->title = mb_strtolower($request->get('title'));
            $book->synopsis = $request->get('synopsis');
            $book->author_id = $request->get('author_id');
            $book->category_id = $request->get('category_id');
            $book->publish = $request->get('date');
            $book->urlImage = $request->get('urlImage');
            $book->save();
            if(Auth::check())
                return redirect()->route('admin.books.show', $book->id)->with('message', 'New Book!!!');

            else
                return redirect()->route('books.show', $book->id)->with('message', 'New Book!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        //return view('books.create', compact('book', 'author'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public static function listMoyBook(){
        $books = Book::get();
        $moyennes = array();
        foreach($books as $book){
            $moyenne = $book->moyBookMark($book->id);
            if($moyenne > 0 && $moyenne<=5)
                $moyennes[] = (object)['note' => $moyenne, 'book_id' => $book->id];
        }
        arsort($moyennes);
        return $moyennes;
    }
    public static function listDateBook(){
        $books = Book::get();
        $dates = array();
        foreach($books as $book){
            $publish = $book->publish;
            if($publish)
                $dates[] = (object)['publish' => $publish, 'book_id' => $book->id];
        }
        arsort($dates);
        return $dates;
    }
}
