@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1>Add book</h1>
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['method' => 'posts', 'url' => action('BooksController@store')]) !!}
                            @include('errors')
                              <div class="form-group"> 
                                <label for="title">Title</label> 
                                <input type="text" class="form-control" id='title' name='title' placeholder="Title">
                            </div>

                            <div class="form-group">
                                {!! Form::label('author_id', 'Author') !!}
                                {!! Form::select('author_id', $authors, null, ['class'=>'form-control', 'data-live-search' => 'true' ]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('category_id', 'Category') !!}
                                {!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'data-live-search' => 'true' ]) !!}
                            </div>
                              <div class="form-group"> 
                                <label for="synopsis">Synopsis</label> 
                                <textarea class="form-control" id='synopsis' name='synopsis' placeholder="synopsis"></textarea>
                            </div>

                            <div class="form-group"> 
                                <label for="urlImage">Url Picture</label> 
                                <input class="form-control" id='urlImage' name='urlImage' placeholder="http://..."></input>
                            </div>

                                <div class="form-group"> 
                                <div class="col-md-6"> 
                                    <button type="submit" class="btn btn-primary">Add Book</button>
                                </div> 
                            </div>  
                        {!! Form::close() !!}
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
  @endsection