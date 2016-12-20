@extends('layouts.app')
@section('title')
    {{ "My Books"." - " }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1>My book's list</h1>
            @forelse($books as $book)
                @include('books.label')
            @empty
                <p>No Book</p>
            @endforelse
        </div>
    </div>
@endsection