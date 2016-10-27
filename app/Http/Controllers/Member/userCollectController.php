<?php

namespace App\Http\Controllers\Member;

use App\Model\Collect;
use App\Models\Archive\Archive;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class userCollectController extends Controller
{
    public function index()
    {
        $user = session('user');
        $mark = Collect::with('archive')->where('user_id',$user->id)->get();
        return view('member.userCollectList',compact('mark'));
    }

    public function cancelCollect()
    {
        if($input = Input::except('_token')){
            $user = session('user');
            if(!$user){
                return 'error';
            }else{
                if(Collect::where('user_id',$user->id)->where('archive_id',$input['id'])->delete()){
                    return 'success';
                }else{
                    return 'error';
                }
            }
        }else{
            return 'error';
        }
    }
}
