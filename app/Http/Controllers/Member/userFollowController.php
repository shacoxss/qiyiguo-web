<?php

namespace App\Http\Controllers\Member;

use App\Model\FollowUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class userFollowController extends Controller
{
    public function index()
    {
        return view('member.userFollowList');
    }

    public function users()
    {
        $user = session('user');
        $followed = FollowUser::with('users')->where('user_id',$user->id)->get();
        return view('member.userFollowList_users',compact('followed'));
    }

    public function cancelFollowUser()
    {
        if($input = Input::except('_token')){
            if(FollowUser::where('user_id',$input['user_id'])->where('followed_id',$input['followed_id'])->delete()){
                return 'success';
            }else{
                return 'error1';
            }
        }else{
            return 'error';
        }
    }
}
