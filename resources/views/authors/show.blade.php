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
                            @include('label_welcome')
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