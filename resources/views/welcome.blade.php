@extends('layouts.app')

@section('content')
    <div class="col-md-6">
        @foreach($booksMoys as $booksMoy)
            <div class="col-md-12">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a href="{{route('admin.books.show', $booksMoy->id)}}">
                @else
                    <a href="{{route('books.show', $booksMoy->id)}}">
                @endif
                        <h2 class="text-capitalize"> {{ $booksMoy->title }} </h2>
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
                            <img src={{ $booksMoy->urlImage }} height="150" alt="Logo">
                        @endif
                        @if($booksMoy->author)
                            <p class="text-capitalize"> {{$booksMoy->author->name}} </p>
                        @endif
                    </div>
                </a>
        @endforeach
    </div>
    <div class="col-md-6">
        @foreach($booksdates as $booksDate)
            <div class="col-md-12">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a href="{{route('admin.books.show', $booksDate->id)}}">
                @else
                    <a href="{{route('books.show', $booksDate->id)}}">
                @endif
                        <h2 class="text-capitalize"> {{ $booksDate->title }} </h2>
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
                            <img src={{ $booksDate->urlImage }} height="150" alt="Logo">
                        @endif
                        @if($booksDate->author)
                            <p class="text-capitalize"> {{$booksDate->author->name}} </p>
                        @endif
                    </div>
                </a>
        @endforeach
    </div>

@endsection
