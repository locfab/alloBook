@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>My book's list</h1>
            @foreach($books as $book)
                @include('books.label')
            @endforeach
        </div>
    </div>
@endsection
