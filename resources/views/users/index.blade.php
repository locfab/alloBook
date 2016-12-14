@extends('layouts.app')

@section('content')
    @foreach($users as $user)
        <p>
            <a href="{{ route('users.show', $user->id) }}">{{ ucwords($user->name) }}</a>
        </p>

    @endforeach
@endsection