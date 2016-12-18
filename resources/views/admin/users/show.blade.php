@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ ucwords($user->name) }} books <small><span class="label label-info btn-md">{{ Auth::user()->getNameFriendship($user) }}</span></small></h1>
                @include('admin.users.status_bar')
                <div class="container">
                    <div class="row">
                        @forelse($books as $book)
                            @include('books.label')
                        @empty
                            <p>No Book</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection