@extends('layouts.app')

@section('content')
    <h1>Change my rate</h1>
    <h2>{{ ucwords($book->title) }}</h2>
    @if($book->author)
        <p><em> {{ucwords($book->author->name)}} </em></p>
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

    {!! Form::close() !!}

      @endsection