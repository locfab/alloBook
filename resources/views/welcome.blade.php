@extends('layouts.app')

@section('content')

    @foreach($books as $book)
        <div class="col-md-10">
            <h2>{{ ucwords($book->title) }}</h2>
                @if($book->urlImage)
                    <img src={{ $book->urlImage }} height="100" alt="Logo">
                @endif
                @if($book->author)
                    <p> {{ucwords($book->author->name)}} </p>
                @endif
        </div>
    @endforeach

@endsection
