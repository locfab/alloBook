@extends('layouts.app')

@section('content')
    <div class="col-lg-5">
        @include('succes_message')
        @include('books.info_book')
        @include('admin.books.add_rem_button')
        <p>
            @foreach(Auth::user()->marks->where('user_id', Auth::user()->id)->where('book_id',(int)$book->id) as $mark)
                @include('admin.books.mark')
                <a class="btn btn-primary" href="{{ route('admin.marks.edit', $mark->id) }}" role="button">Edit</a>
            @endforeach
        </p>
        <p>
            @foreach((Auth::user()->reviews->where('book_id',$book->id)) as $review)
                @include('admin.books.comment')
                <a class="btn btn-primary" href="{{ route('admin.reviews.edit', $review->id) }}" role="button">Edit</a>
            @endforeach
        </p>
    </div>

    <div class="col-lg-5">
        @if($book->urlImage)
            <img src={{ $book->urlImage }} height="650" alt="Logo" style="padding:20px;float:right;">
        @endif
    </div>

@endsection
