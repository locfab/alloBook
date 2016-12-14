@extends('layouts.app')

@section('content')
    <h1>Livre de {{ ucwords($user->name) }}</h1>
    @forelse($books as $book)
        @include('books.label')
    @empty
        <p>No Book</p>
    @endforelse
@endsection