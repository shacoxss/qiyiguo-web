<?php

namespace App\Http\Controllers\Home;

use App\Model\Users;
use App\Models\Archive\Archive;
use App\Models\Tag\Tag;
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
        return view('pc_home.author', ['user' => $user, 'archives' => $archives]);
    }

    public function topSlide($view)
    {
        return $view->with('slides', Archive::orderBy('updated_at', 'desc')->take(6)->get());
    }
}