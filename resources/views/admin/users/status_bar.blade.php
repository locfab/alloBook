<div>
        @if(Auth::user()->isFriendWith($user))
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            {{ Form::open(['route' => ['admin.friends.destroy', Auth::user()->getFriendShip($user)->id], 'method' => 'delete']) }}
                                {{ Form::submit('Unfriend', ['class' => 'btn btn-warning btn-xs']) }}
                            {{ Form::close() }}
                        </div>
                        <div class="col-md-2">
                            {{ Form::open(['route' => ['admin.friends.update', Auth::user()->getFriendShip($user), \Hootlex\Friendships\Status::BLOCKED], 'method' => 'put']) }}
                                {{ Form::submit('Block Friend', ['class' => 'btn btn-danger btn-xs']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->hasFriendRequestFrom($user))
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">
                        {{ Form::open(['route' => ['admin.friends.update', Auth::user()->getFriendShip($user), \Hootlex\Friendships\Status::ACCEPTED], 'method' => 'put']) }}
                            {{ Form::submit('Accept Friend Request', ['class' => 'btn btn-primary btn-xs']) }}
                        {{ Form::close() }}
                    </div>
                    <div class="col-md-2">
                        {{ Form::open(['route' => ['admin.friends.update', Auth::user()->getFriendShip($user), \Hootlex\Friendships\Status::DENIED], 'method' => 'put']) }}
                            {{ Form::submit('Deny Friend', ['class' => 'btn btn-danger btn-xs']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        @elseif($user->hasFriendRequestFrom(Auth::user()))
            {{ Form::open(['route' => ['admin.friends.destroy', Auth::user()->getFriendShip($user)->id], 'method' => 'delete']) }}
                {{ Form::submit('Unfriend', ['class' => 'btn btn-warning btn-xs']) }}
            {{ Form::close() }}
        @elseif($user->hasBlocked(Auth::user()))
        @elseif(Auth::user()->hasBlocked($user))
            {{ Form::open(['route' => ['admin.friends.destroy', Auth::user()->getFriendShip($user)->id], 'method' => 'delete']) }}
                {{ Form::submit('Unblock', ['class' => 'btn btn-warning btn-xs']) }}
            {{ Form::close() }}
        @else
            {{ Form::open(['route' => ['admin.friends.create', $user->id], 'method' => 'get']) }}
                {{ Form::submit('Friend Demand', ['class' => 'btn btn-primary btn-xs']) }}
            {{ Form::close() }}
        @endif
</div>

