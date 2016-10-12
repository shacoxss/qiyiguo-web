<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;

class indexController extends Controller
{
    //普通用户会员中心
    public function userIndex()
    {
        return view('member.userIndex',compact('master'));
    }
    //管理员后台
    public function masterIndex()
    {
        return view('member.masterIndex');
    }
}
