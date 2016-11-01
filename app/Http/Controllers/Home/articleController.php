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


class articleController extends Controller
{
    public function index()
    {
        $archives = Archive::where('archive_type_id',1)->ofPattern('review')->paginate(9);

        return view('pc_home.article-list',compact('archives'));
    }


}
