@extends('layouts.app')

@section('content')
    <h1> Welcome on Allo Book</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <h2> Top 5 rated </h2>
                    @foreach($booksMoys as $booksMoy)
                        <div class="col-md-12">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <a href="{{route('admin.books.show', $booksMoy->id)}}">
                            @else
                                <a href="{{route('books.show', $booksMoy->id)}}">
                            @endif
                                    <h3 class="text-capitalize" style="font-size:18px;">
                                        {{ $booksMoy->title }}
                                </a>
                                        <small>
                                            @if($booksMoy->moyBookMark($booksMoy->id) != 0)
                                                @for($i=0; $i<round((float)$booksMoy->moyBookMark($booksMoy->id)); $i++)
                                                    {{'*'}}
                                                @endfor
                                                {{'('.$booksMoy->moyBookMark($booksMoy->id).')'}}
                                            @else
                                                {{ '(No mark)' }}
                                            @endif
                                        </small>
                                    </h3>
                                    @if($booksMoy->urlImage)
                                        <img src={{ $booksMoy->urlImage }} height="100" width="70" alt="Logo">
                                    @endif

                                    @if($booksMoy->author)
                                            <p class="text-capitalize" style="font-size:14px;"> {{$booksMoy->author->name}} </p>
                                    @endif
                        </div>
                    @endforeach
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h2> 5 More recent </h2>
                    @foreach($booksdates as $booksDate)
                        <div class="col-md-12">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <a href="{{route('admin.books.show', $booksDate->id)}}">
                            @else
                                <a href="{{route('books.show', $booksDate->id)}}">
                            @endif
                                    <h3 class="text-capitalize" style="font-size:18px;">
                                        {{ $booksDate->title }}
                                </a>
                                        <small>
                                            @if($booksDate->moyBookMark($booksDate->id) != 0)
                                                @for($i=0; $i<round((float)$booksDate->moyBookMark($booksDate->id)); $i++)
                                                    {{'*'}}
                                                @endfor
                                                {{'('.$booksDate->moyBookMark($booksDate->id).')'}}
                                            @else
                                                {{ '(No mark)' }}
                                            @endif
                                        </small>
                                    </h3>
                                    @if($booksDate->urlImage)
                                        <img src={{ $booksDate->urlImage }} height="100" width="70" alt="Logo">
                                    @endif

                                    @if($booksDate->author)
                                        <p class="text-capitalize" style="font-size:14px;"> {{$booksDate->author->name}} </p>
                                    @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
