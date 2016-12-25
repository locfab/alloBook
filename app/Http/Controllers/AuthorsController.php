<?php

namespace App\Http\Controllers;

use App\author;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthorsController extends Controller
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
        return view('authors.create');
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
            'name'      => 'required',
            'resume'    => 'required|min:6',
            'date'      => 'required|date|date_format:Y-m-d',
        ]);
        if($validation->fails())
        {
            return redirect()->route('authors.create')->withInput($request->all())->withErrors($validation->errors());
        }
        else
        {
            $author = new author;
            $author->name = mb_strtolower($request->get('name'));
            $author->resume = $request->get('resume');
            $author->birth = $request->get('date');
            $author->save();
            if(Auth::check())
                return redirect()->route('books.create')->with('message', 'New Author!!!');
            else
                return redirect()->route('books.create')->with('message', 'New Author!!!');
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
        //
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
}
