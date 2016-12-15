@extends('layouts.app')

@section('content')
    <div class="col-lg-4">
        <h1>Change my rate</h1>
        <h2>{{ ucwords($book->title) }}</h2>
        @if($book->author)
            <p><em> {{ucwords($book->author->name)}} </em></p>
        @endif

    {!! Form::open(['method' => 'put', 'url' => action('Admin\ReviewsController@update', $review)]) !!}

    @include('errors')
          <div class="form-group"> 
            <label for="comment">Comment</label> 
            <textarea class="form-control" id='comment' name='comment' placeholder="comment">{{ $review->comment }}</textarea>
        </div>

            <div class="form-group"> 
            <div> 
                <button type="submit" class="btn btn-primary">Save</button>
            </div> 
        </div>  
    </div>  
{!! Form::close() !!}

  @endsection