@extends('layouts.app')

@section('content')
    <h1>Change my rate</h1>
    <h2>{{ ucwords($book->title) }}</h2>
    @if($book->author)
        <p><em> {{ucwords($book->author->name)}} </em></p>
    @endif

{!! Form::open(['method' => 'put', 'url' => action('Admin\ReviewsController@update', $review)]) !!}

@include('errors')

<div class="form-group">
    {!! Form::label('mark', 'Mark') !!}
    {!! Form::select('mark', $options, $review->mark, ['class'=>'form-control']) !!}
</div>

  <div class="form-group"> 
    <label for="comment">Comment</label> 
    <textarea class="form-control" id='comment' name='comment' placeholder="comment">{{ $review->comment }}</textarea>
</div>

    <div class="form-group"> 
    <div class="col-md-6 col-md-offset-4"> 
        <button type="submit" class="btn btn-default">Save</button>
    </div> 
</div>  

{!! Form::close() !!}

  @endsection