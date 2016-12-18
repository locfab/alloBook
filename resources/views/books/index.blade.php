@extends('layouts.app')

@section('content')
    <h1>My book's list</h1>
    <div class="container">
        <div class="row">
            @foreach($books as $book)
                @include('books.label')
            @endforeach
        </div>
    </div>
@endsection
