<?php

namespace App\Http\Controllers\Home;

use App\Model\Category;
use App\Model\FollowUser;
use App\Models\Archive\Archive;
use App\Models\Archive\ArchiveVisit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class searchController extends Controller
{
    public function index()
    {
        if($input = Input::except('_token')){

        }else{
            return back();
        }
    }


}
