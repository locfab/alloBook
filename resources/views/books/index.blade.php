@extends('layouts.app')
@section('title')
    {{ "Books"." - " }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1>All books</h1>
            @foreach($books as $book)
                @include('books.label')
            @endforeach
        </div>
    </div>
@endsection
