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


class videoController extends Controller
{
    public function index()
    {
        $videoList = Archive::where('archive_type_id',3)->ofPattern('review')->paginate(9);

        return view('pc_home.video-list',compact('videoList'));
    }


}
