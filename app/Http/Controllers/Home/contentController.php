<?php

namespace App\Http\Controllers\Home;

use App\Model\Category;
use App\Models\Archive\Archive;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class contentController extends Controller
{
    public function contentLists(Request $request)
    {
        $cate = Category::where('cate_id',27)->first();
        $archives = Archive::ofPattern('review')
            ->orderBy('weight', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('pc_home.newsList')
            ->with('archives', $archives)
            ->with('cate',$cate)
        ;
    }

    public function detail(Archive $archive)
    {
        if (!$archive->hasPattern('review')) return response('没有通过审核', 404);

        return view('pc_home.newsDetail')
            ->with('archive', $archive)
        ;
    }
}
