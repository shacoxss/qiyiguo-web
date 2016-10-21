<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class contentController extends Controller
{
    public function lists()
    {
        return view('pc_home.newsList');
    }

    public function detail($id)
    {
        return view('pc_home.newsDetail');
    }
}
