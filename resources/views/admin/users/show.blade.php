@extends('layouts.app')

@section('content')
    <h1>{{ ucwords($user->name) }} books</h1>
    @include('admin.users.status_bar')
    @forelse($books as $book)
        @include('books.label')
    @empty
        <p>No Book</p>
    @endforelse
@endsection