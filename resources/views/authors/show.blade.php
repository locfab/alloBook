@extends('layouts.app')
@section('title')
    {{ ucwords($author->name)." - " }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        @include('succes_message')
                        @include('authors.info_author')
                        @foreach($books as $book)
                            <a href="{{route('books.show', $book->id)}}">
                                <h3 class="text-capitalize" style="font-size:18px;">
                                {{ $book->title }}
                            </a>
                            <small>
                                @if($book->moyBookMark($book->id) != 0)
                                    @for($i=0; $i<round((float)$book->moyBookMark($book->id)); $i++)
                                        {{'*'}}
                                    @endfor
                                    {{'('.$book->moyBookMark($book->id).')'}}
                                @else
                                    {{ '(No mark)' }}
                                @endif
                            </small>
                            </h3>
                            @if($book->urlImage)
                                <img src={{ $book->urlImage }} height="100" width="70" alt="Logo">
                            @endif

                            @if($book->author)
                                <a href="{{route('authors.show', $book->author->id)}}"><p class="text-capitalize" style="font-size:14px;"> {{$book->author->name}} </p></a>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-7">
                        @if($author->urlImage)
                            <img src={{ $author->urlImage }} height="650" alt="Logo" style="padding:20px;float:right;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection