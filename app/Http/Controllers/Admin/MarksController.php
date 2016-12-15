<?php

namespace App\Http\Controllers\Admin;

use App\Mark;
use App\Book;
use App\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = Mark::findOrFail($id);
        $book = Book::findOrFail($mark->book_id);
        $options = [0 => 'default', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'];
        return view('admin.marks.edit', compact('mark', 'options', 'book'));
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
        $validator = Validator::make($request->all(),[
            'mark' => 'required'
        ]);
        $mark = Mark::findOrFail($id);
        $book = Book::findOrFail($mark->book_id);
        if($validator->fails())
        {
            return redirect(route('admin.marks.edit', $book->id))->withErrors($validator->errors());
        }
        else
        {
            $mark->mark = (int)$request->get('mark');
            $mark->save();
            return redirect(route('admin.books.show', $book->id))->with('message', 'Note Modifiée');
        }
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
}
