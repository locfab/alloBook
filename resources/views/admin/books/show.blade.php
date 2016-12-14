@extends('layouts.app')

@section('content')
    @include('succes_message')
    @include('books.info_book')
    @include('admin.books.add_rem_button')
    @foreach((Auth::user()->reviews->where('book_id',$book->id)) as $review)
        @include('admin.books.mark')
        @include('admin.books.comment')
        <a class="btn btn-primary" href="{{ route('admin.reviews.edit', $book->id) }}" role="button">Edit</a>
    @endforeach
@endsection
