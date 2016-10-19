<?php

namespace App\Http\Controllers\Member;

use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;

class indexController extends Controller
{
    //普通用户会员中心
    public function userIndex()
    {
        //签到
        $user = Users::where('id',session('user')->id)->first();
        $now = $user->sign_in;
        $today = date('Y-m-d',time());
        if($now == $today){
            $is_sign = 1;
        }else{
            $is_sign = 0;
        }
        return view('member.userIndex',compact('is_sign','user'));
    }
    //管理员后台
    public function masterIndex()
    {
        return view('member.masterIndex');
    }

    public function sign()
    {
        $data = Input::except('_token');
        if($data['id']!=session('user')->id){
            return '请求错误';
        }else{
            $user = Users::where('id',session('user')->id)->first();
            $arr['points'] = $user->points;
            $points = mt_rand(1,100);
            $arr['points'] += $points;
            $arr['sign_in'] = date('Y-m-d',time());
            if(Users::where('id',$data['id'])->update($arr)){
                return '签到成功，随机获取到' . $points . '积分！';
            }else{
                return '签到失败！';
            }
        }
    }
}
