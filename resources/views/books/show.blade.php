@extends('layouts.app')
@section('content')
    <div class="col-lg-5">
            @include('succes_message')
            @include('books.info_book')
    </div>
    <div class="col-lg-5">
        @if($book->urlImage)
            <img src={{ $book->urlImage }} height="650" alt="Logo" style="padding:20px;float:right;">
        @endif
    </div>
@endsection
