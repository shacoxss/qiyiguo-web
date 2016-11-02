<?php

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class anchorController extends Controller
{
    public function index()
    {

        return view('pc_home.anchor-index');
    }


}
