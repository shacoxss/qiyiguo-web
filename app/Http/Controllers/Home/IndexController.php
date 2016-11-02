<?php

namespace App\Http\Controllers\Home;

use App\Model\Users;
use App\Models\Archive\Archive;
use App\Models\Tag\Tag;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        $view = view('pc_home.index');
        $takes = [
            'hot' => 4,
            'top' => 5,
            'index' => 9,
            'recommend' => 8
        ];

        app('db')->table('patterns')
            ->where('type', 1)
            ->get()
            ->each(function ($p) use($view, $takes) {
                $view->with(
                    $p->name,
                    $this->getArchive($p->pattern, $takes[$p->name])->get()
                );
            })
        ;

        $view->with('index_video', Archive::where('archive_type_id', 3)->take(8)->orderBy('updated_at', 'desc')->get())
            ->with('index_gallery', Archive::where('archive_type_id', 2)->take(9)->orderBy('updated_at', 'desc')->get())
            ->with('hot_tags', Tag::orderBy('weight', 'desc')->orderBy('updated_at', 'desc')->take(8)->get())
        ;
        return $view;
    }

    private function getArchive($pattern, $take = 4)
    {
        return Archive::whereRaw("(`mode` & $pattern) = $pattern")
            ->take($take)
            ->orderBy('updated_at', 'desc')
        ;
    }

    public function author(Users $user)
    {

        //精彩推荐
        //精彩推荐
        $cate1 = Category::where('cate_name','精彩推荐')->first();
        if($cate1){
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

        $archives = Archive
            ::select([
                '*',
                app('db')->raw('DATE_FORMAT(`created_at`,"%Y") as year'),
                app('db')->raw('DATE_FORMAT(`created_at`,"%m") as month'),
                app('db')->raw('DATE_FORMAT(`created_at`,"%d") as day')
            ])
            ->where('user_id', $user->id)
            ->paginate(5)
        ;
        return view('pc_home.author', ['user' => $user, 'archives' => $archives])-with('article_archives',$article_archives);
    }

    public function topSlide($view)
    {
        return $view->with('slides', Archive::orderBy('updated_at', 'desc')->take(6)->get());
    }
}