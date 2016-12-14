@extends('layouts.app')

@section('content')
    <h1>User</h1>
    @foreach($users as $user)
        @if(Auth::user() != $user)
            <p>
                <strong><a href="{{ route('admin.users.show', $user->id) }}">{{ ucwords($user->name) }}</a></strong>
                <span class="label label-info btn-md">{{ Auth::user()->getNameFriendship($user) }}</span>
            </p>
            @include('admin.users.status_bar')
        @endif
    @endforeach

@endsection