<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class userCollectController extends Controller
{
    public function index()
    {
        return view('member.userCollectList');
    }
}
