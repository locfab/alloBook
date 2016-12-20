@extends('layouts.app')
@section('title')
    {{ ucwords($book->title)." - " }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                            @include('succes_message')
                            @include('books.info_book')
                    </div>
                    <div class="col-md-7">
                        @if($book->urlImage)
                            <img src={{ $book->urlImage }} height="650" alt="Logo" style="padding:20px;float:right;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
