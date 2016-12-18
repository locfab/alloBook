@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>User</h1>
                <div class="col-md-12">
                    @foreach($users as $user)
                        <p>
                            <h2>
                                <a href="{{ route('users.show', $user->id) }}">{{ ucwords($user->name) }}</a>
                            </h2>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection