@extends('layouts.app')

@section('content')
    <h1>{{ ucwords($user->name) }} books <span class="label label-info btn-md">{{ Auth::user()->getNameFriendship($user) }}</span></h1>

    @include('admin.users.status_bar')
    @forelse($books as $book)
        @include('books.label')
    @empty
        <p>No Book</p>
    @endforelse
@endsection