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


class qygController extends Controller
{
    public function index($cate)
    {
        switch ($cate) {
            case 'news':
                $category = Category::where('cate_name','新闻')->first();
                if($category){
                    $list = Archive::where('news',1)
                        ->where('category_id',$category->cate_id)
                        ->where('mode',8)
                        ->paginate(30);
                }else{
                    $list = null;
                }
                break;
            case 'notice':
                $category = Category::where('cate_name','公告')->first();
                if($category){
                    $list = Archive::where('news',1)
                        ->where('category_id',$category->cate_id)
                        ->where('mode',8)
                        ->paginate(30);
                }else{
                    $list = null;
                }

                break;
            case 'active':
                $category = Category::where('cate_name','活动')->first();
                if($category){
                    $list = Archive::where('news',1)
                        ->where('category_id',$category->cate_id)
                        ->where('mode',8)
                        ->paginate(30);
                }else{
                    $list = null;
                }

                break;
            default:
                $cate = '';
                $list = Archive::with('category')->where('news',1)
                    ->where('mode',8)
                    ->paginate(30);
                break;
        }
        return view('pc_home.qyg-news')->with('cate',$cate)->with('list',$list);
    }

    public function detail($id)
    {
        $islogin = !empty(session('user'))?1:-1;
        $arc = Archive::with('detail')->where('id',$id)->first();
        return view('pc_home.qyg-news-detail',compact('arc','islogin'));
    }
}
