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
        //游戏视频
        //获取栏目及其子栏目
        $cate2 = Category::where('cate_name','视频游戏')->first();
        if($cate2){
            $son = Category::where('cate_pid',$cate2->cate_id)->count();
            if($son){
                $cate_son = Category::where('cate_pid',$cate2->cate_id)->get();
                $cate_arr2 = [];
                foreach($cate_son as $v){
                    $cate_arr2[] = $v->cate_id;
                }
                array_push($cate_arr2,$cate2->cate_id);
                $cate_ids2 = implode(',',$cate_arr2);
                $video_archives =   Archive::where('archive_type_id',1)
                    ->whereIn('category_id',$cate_ids2)
                    ->orderBy('updated_at','desc')
                    ->take(6)
                    ->get()
                ;
            }else{
                $video_archives =   Archive::where('archive_type_id',1)
                    ->where('category_id',$cate2->cate_id)
                    ->orderBy('updated_at','desc')
                    ->take(6)
                    ->get();
            }
        }else{
            $video_archives = false;
        }

        //游戏攻略
        $cate3 = Category::where('cate_name','游戏攻略')->first();
        if($cate3){
            $son = Category::where('cate_pid',$cate3->cate_id)->count();
            if($son){
                $cate_son = Category::where('cate_pid',$cate3->cate_id)->get();
                $cate_arr3 = [];
                foreach($cate_son as $v){
                    $cate_arr3[] = $v->cate_id;
                }
                array_push($cate_arr3,$cate3->cate_id);
                $cate_ids3 = implode(',',$cate_arr3);
                $game_archives =   Archive::whereIn('category_id',$cate_ids3)
                    ->orderBy('updated_at','desc')
                    ->take(3)
                    ->get()
                ;
            }else{
                $game_archives =   Archive::where('category_id',$cate3->cate_id)
                    ->orderBy('updated_at','desc')
                    ->take(3)
                    ->get()
                ;
            }

        }else{
            $game_archives = false;
        }



        $archives = Archive::where('archive_type_id',1)->where('news',0)->ofPattern('review')->paginate(9);
        return view('pc_home.article-list',compact('archives','video_archives','game_archives'));
    }


}
