@extends('layouts.app')

@section('content')
    <div class="col-md-2">
        @foreach($booksMoys as $booksMoy)
            @if(\Illuminate\Support\Facades\Auth::check())
                <a href="{{route('admin.books.show', $booksMoy->id)}}">
            @else
                <a href="{{route('books.show', $booksMoy->id)}}">
            @endif
                    <div class="col-md-10">
                        <h2> {{ ucwords($booksMoy->title) }} </h2>
                        <p>
                            @if($booksMoy->moyBookMark($booksMoy->id) != 0)
                                @for($i=0; $i<round((float)$booksMoy->moyBookMark($booksMoy->id)); $i++)
                                {{'*'}}
                                @endfor
                                {{'('.$booksMoy->moyBookMark($booksMoy->id).')'}}
                            @else
                                {{ '(No mark)' }}
                            @endif
                        </p>
                        @if($booksMoy->urlImage)
                            <img src={{ $booksMoy->urlImage }} height="100" alt="Logo">
                        @endif
                        @if($booksMoy->author)
                            <p> {{ucwords($booksMoy->author->name)}} </p>
                        @endif
                    </div>
                </a>
        @endforeach
    </div>
    <div class="col-md-2">
        @foreach($booksdates as $booksDate)
            @if(\Illuminate\Support\Facades\Auth::check())
                <a href="{{route('admin.books.show', $booksDate->id)}}">
            @else
                <a href="{{route('books.show', $booksDate->id)}}">
            @endif
                    <div class="col-md-10">
                        <h2> {{ ucwords($booksDate->title) }} </h2>
                        <p>
                            @if($booksDate->moyBookMark($booksDate->id) != 0)
                                @for($i=0; $i<round((float)$booksDate->moyBookMark($booksDate->id)); $i++)
                                    {{'*'}}
                                @endfor
                                {{'('.$booksDate->moyBookMark($booksDate->id).')'}}
                            @else
                                {{ '(No mark)' }}
                            @endif
                        </p>
                        @if($booksDate->urlImage)
                            <img src={{ $booksDate->urlImage }} height="100" alt="Logo">
                        @endif
                        @if($booksDate->author)
                            <p> {{ucwords($booksDate->author->name)}} </p>
                        @endif
                    </div>
                </a>
        @endforeach
    </div>

@endsection
