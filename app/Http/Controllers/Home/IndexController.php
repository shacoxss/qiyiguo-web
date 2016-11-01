<?php

namespace App\Http\Controllers\Home;

use App\Models\Archive\Archive;
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

        $view->with('index_video', Archive::where('archive_type_id', 3)->take(8)->orderBy('updated_at', 'desc')->get());
        $view->with('index_gallery', Archive::where('archive_type_id', 2)->take(9)->orderBy('updated_at', 'desc')->get());
        return $view;
    }

    private function getArchive($pattern, $take = 4)
    {
        return Archive::whereRaw("(`mode` & $pattern) = $pattern")
            ->take($take)
            ->orderBy('updated_at', 'desc')
        ;
    }
}