@extends('layouts.app')
@section('content')
    <h1>My book's list</h1>
    <div class="container">
        <div class="row">
            @forelse($books as $book)
                @include('books.label')
            @empty
                <p>No Book</p>
            @endforelse
        </div>
    </div>
@endsection