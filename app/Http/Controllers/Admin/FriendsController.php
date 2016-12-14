<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Hootlex\Friendships\Models\Friendship;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friendships = Auth::user()->getAllFriendships();
        $users = array();
        foreach($friendships as $friendship)
        {
            if(Auth::user()->id == $friendship->sender_id)
                $users[] = User::findOrFail($friendship->recipient_id);
            else
                $users[] = User::findOrFail($friendship->sender_id);
        }
        return view('admin.friends.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::findOrFail((int)$id);
        Auth::user()->befriend($user);
        return redirect()->route('admin.friends.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $status)
    {
        $friendship = Friendship::findOrFail($id);
        if($friendship->id == $friendship->recipient_id)
            $user = User::findOrFail($friendship->recipient_id);
        else
            $user = User::findOrFail($friendship->sender_id);

        if($status == \Hootlex\Friendships\Status::DENIED)
        {
            Auth::user()->blockFriend($user);
        }
        elseif($status == \Hootlex\Friendships\Status::ACCEPTED)
        {
            Auth::user()->acceptFriendRequest($user);
        }
        elseif($status == \Hootlex\Friendships\Status::DENIED)
        {
            Auth::user()->denyFriendRequest($user);
        }
        return redirect()->route('admin.friends.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friend = Friendship::findOrFail($id);
        $friend->delete();
        return redirect()->route('admin.friends.index');
    }
}
