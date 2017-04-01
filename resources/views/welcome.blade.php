@extends('layouts.app')
@section('title')
    {{ "Welcome - " }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11 col_md_offset_1">
                <h1> Welcome on Allo Book</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @include('succes_message')
                            <div class="col-md-5 col-md-offset-2">
                                <h2> Top 5 rated </h2>
                                @foreach($booksMoys as $book)
                                    @include('label_welcome')
                                @endforeach
                            </div>
                            <div class="col-md-5">
                                <h2> 5 More recent </h2>
                                @foreach($booksdates as $book)
                                    @include('label_welcome')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection