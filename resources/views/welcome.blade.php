@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::check())
        <MARQUEE scrollamount="8">
            @foreach($books as $book)
                <a href="{{route('admin.books.show', $book->id)}}">
                    <IMG src="{{ $book->urlImage }}" height="600vh" behavior="alternate">
                </a>
            @endforeach
        </MARQUEE>
    @else
        <MARQUEE scrollamount="8">
            @foreach($books as $book)
                <a href="{{route('books.show', $book->id)}}">
                    <IMG src="{{ $book->urlImage }}" height="600vh" behavior="alternate">
                </a>
            @endforeach
        </MARQUEE>
    @endif
@endsection
