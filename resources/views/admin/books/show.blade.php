@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                            @include('succes_message')
                            @include('errors')
                            @include('books.info_book')
                            @include('admin.books.add_rem_button')
                            @if(Auth::user()->marks->where('user_id', Auth::user()->id)->where('book_id',(int)$book->id)->first())
                                {{ "Mark:" }}
                            @endif
                            <div class="row">
                                @foreach(Auth::user()->marks->where('user_id', Auth::user()->id)->where('book_id',(int)$book->id) as $mark)
                                    <p>
                                        <div class="col-md-9">
                                            @include('admin.books.mark')
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn btn-primary" href="{{ route('admin.marks.edit', $mark->id) }}" role="button">Edit</a>
                                        </div>
                                    </p>
                                @endforeach
                            </div>
                            @if(Auth::user()->marks->where('user_id', Auth::user()->id)->where('book_id',(int)$book->id)->first())
                                {{ "Comment:" }}
                            @endif
                            <div class="row">
                                @foreach((Auth::user()->reviews->where('book_id',$book->id)) as $review)
                                <p>
                                    <div class="col-md-9">
                                        @include('admin.books.comment')
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-primary" href="{{ route('admin.reviews.edit', $review->id) }}" role="button">Edit</a>
                                    </div>
                                </p>
                                @endforeach
                            </div>
                    </div>
                    <div class="col-md-7">
                        @if($book->urlImage)
                            <img src={{ $book->urlImage }} height="600" alt="Logo" style="padding:20px;float:right;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
