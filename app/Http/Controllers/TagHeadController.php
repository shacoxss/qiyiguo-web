<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagHeadController extends Controller
{
    //
    public function index(Tag $tag)
    {
        //精彩推荐
        //精彩推荐
        $cate1 = Category::where('cate_name','精彩推荐')->first();
        if($cate1){
            $category_id = $cate1->cate_id;
            $son = Category::where('cate_pid',$cate1->cate_id)->count();
            if($son){
                $cate_son = Category::where('cate_pid',$cate1->cate_id)->get();
                $cate_arr1 = [];
                foreach($cate_son as $v){
                    $cate_arr1[] = $v->cate_id;
                }
                array_push($cate_arr1,$cate1->cate_id);
                $cate_ids = implode(',',$cate_arr1);
                $article_archives =   Archive::where('archive_type_id',1)
                    ->whereIn('category_id',$cate_ids)
                    ->orderBy('updated_at','desc')
                    ->take(6)
                    ->get()
                ;
            }else{
                $article_archives =   Archive::where('archive_type_id',1)
                    ->where('category_id',$cate1->cate_id)
                    ->orderBy('updated_at','desc')
                    ->take(6)
                    ->get();
            }
        }else{
            $article_archives = false;
        }

        if ($tag->status != 2) return response('该标签未通过审核', 403);
        $archives = $tag->archives()->ofPattern('review')->paginate(8);

        return view('pc_home.tagLists')
            ->with('archives', $archives)
            ->with('tag', $tag)
            ->with('article_archives', $article_archives)
            ->with('category_id', $category_id)
        ;
    }
}
