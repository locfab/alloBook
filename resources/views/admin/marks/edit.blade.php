@extends('layouts.app')
@section('title')
    {{ "Edit Mark - ".ucwords($book->title)." - " }}
@endsection
@section('content')
    <div class="col-lg-4">
        <h1>Change my rate</h1>
        <h2 class="text-capitalize">{{ $book->title }}</h2>
        @if($book->author)
            <p class="text-capitalize"> {{$book->author->name}}</p>
        @endif

        {!! Form::open(['method' => 'put', 'url' => action('Admin\MarksController@update', $mark)]) !!}

        @include('errors')

        <div class="form-group">
            {!! Form::label('mark', 'Mark') !!}
            {!! Form::select('mark', $options, $mark->mark, ['class'=>'form-control']) !!}
        </div>

            <div class="form-group"> 
            <div class="col-md-6 col-md-offset-4"> 
                <button type="submit" class="btn btn-default">Save</button>
            </div> 
        </div>  
    </div>  

    {!! Form::close() !!}

      @endsection