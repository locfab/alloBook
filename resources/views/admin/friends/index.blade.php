@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>My Relations</h1>
                <div class="col-md-12">
                    @forelse($users as $user)
                        @if(Auth::user() != $user)
                            <p>
                                <h2>
                                    <a href="{{ route('admin.users.show', $user->id) }}">{{ ucwords($user->name) }}</a>
                                    <small><span class="label label-info btn-md">{{ Auth::user()->getNameFriendship($user) }}</span></small>
                                </h2>
                            </p>
                            @include('admin.users.status_bar')
                            <br>
                        @endif
                    @empty
                        <p>No relations </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
