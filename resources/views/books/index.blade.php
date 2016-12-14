@extends('layouts.app')

@section('content')
    <h1>My book's list</h1>
    @foreach($books as $book)
        @include('books.label')
    @endforeach
@endsection
