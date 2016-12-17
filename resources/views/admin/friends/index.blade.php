@extends('layouts.app')

@section('content')
    <h1>My Relations</h1>
    @forelse($users as $user)
        @if(Auth::user() != $user)
            <p>
                <h2>
                    <a href="{{ route('admin.users.show', $user->id) }}">{{ ucwords($user->name) }}</a>
                    <small><span class="label label-info btn-md">{{ Auth::user()->getNameFriendship($user) }}</span></small>
                </h2>
            </p>
            @include('admin.users.status_bar')
        @endif
    @empty
        <p>No relations </p>
    @endforelse
@endsection
