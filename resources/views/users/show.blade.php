@extends('layouts.app')
@section('title')
    {{ ucwords($user->name)." - " }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ ucwords($user->name) }} books</h1>
                <div class="col-md-12">
                    @forelse($books as $book)
                        @include('books.label')
                    @empty
                        <p>No Book</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection