<?php

namespace App\Http\Controllers\Home;

use App\Model\Category;
use App\Model\FollowUser;
use App\Models\Archive\Archive;
use App\Models\Archive\ArchiveVisit;
use App\Models\Tag\Tag;
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
            $key = trim($input['key']);
            //标签
            $tag = Tag::where('status',2)
                ->where('name','like',"%".$key."%")
                ->count();
            //内容
            $archives = Archive::where('mode',8)
                ->where('title','like',"%".$key."%")
                ->count();
            if(empty($tag)&&empty($archives)){
                return response()->json('none');
            }else{
                return response()->json(['key'=>$key]);
            }
        }else{
            return response()->json('error');
        }
    }

    public function result($key)
    {
        $key = trim($key);
        //标签
        $tags = Tag::where('status',2)
            ->where('name','like',"%".$key."%")
            ->orderBy('updated_at','desc')
            ->paginate(10)
        ;
        //内容

        $archives = Archive::where('mode',8)
            ->where('title','like',"%".$key."%")
            ->orderBy('visit_count','desc')
            ->orderBy('updated_at','desc')
            ->paginate(10);
        return view('pc_home.search',compact('tags','archives'));
    }

}
