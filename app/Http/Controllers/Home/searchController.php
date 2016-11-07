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

    public function result($key,$way='all')
    {
        $key = trim($key);
        if(empty($key)){
            return back();
        }
        //标签
        $tags = Tag::where('status',2)
            ->where('name','like',"%".$key."%")
            ->orderBy('updated_at','desc')
            ->take(10)
            ->get()
        ;

        //内容
        if($way=='video'){
            $archives = Archive::ofPattern('review')
                ->where('archive_type_id',2)
                ->where('title','like',"%".$key."%")
                ->orderBy('visit_count','desc')
                ->orderBy('updated_at','desc')
                ->paginate(10);
        }else if($way=='news'){
            $archives = Archive::ofPattern('review')
                ->where('archive_type_id',1)
                ->where('title','like',"%".$key."%")
                ->orderBy('visit_count','desc')
                ->orderBy('updated_at','desc')
                ->paginate(10);
        }else if($way=='gallery'){
            $archives = Archive::ofPattern('review')
                ->where('archive_type_id',3)
                ->where('title','like',"%".$key."%")
                ->orderBy('visit_count','desc')
                ->orderBy('updated_at','desc')
                ->paginate(10);
        }else{
            $archives = Archive::ofPattern('review')
                ->where('title','like',"%".$key."%")
                ->orderBy('visit_count','desc')
                ->orderBy('updated_at','desc')
                ->paginate(10);
        }






        return view('pc_home.search',compact('tags','archives','key','way'));
    }

}
