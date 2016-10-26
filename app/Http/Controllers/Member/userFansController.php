<?php

namespace App\Http\Controllers\Member;

use App\Model\FollowUser;
use App\Model\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class userFansController extends Controller
{
    public function index()
    {
        $user = session('user');
        $fans = FollowUser::where('followed_id',$user->id)->get();
        foreach($fans as $v){
            $user = Users::where('id',$v->user_id)->first();
            $user['follows_count'] = FollowUser::where('user_id',$v->user_id)->count();
            $user['fans_count'] = FollowUser::where('followed_id',$v->user_id)->count();
            $v->user = $user;
        }

        return view('member.userFansList',compact('fans'));
    }
}
