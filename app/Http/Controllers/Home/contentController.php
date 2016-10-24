<?php

namespace App\Http\Controllers\Home;

use App\Model\Category;
use App\Models\Archive\Archive;
use App\Models\Archive\ArchiveVisit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class contentController extends Controller
{
    public function contentLists(Request $request)
    {
        $cate = Category::where('cate_id',29)->first();
        $archives = Archive::ofPattern('review')
            ->orderBy('weight', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('pc_home.newsList')
            ->with('archives', $archives)
            ->with('cate',$cate)
        ;
    }

    public function detail(Request $request, Archive $archive)
    {
        if (!$archive->hasPattern('review')) return response('没有通过审核', 404);

        $archive->visit($request);

        return view('pc_home.newsDetail')
            ->with('archive', $archive)
        ;
    }

    public function like(Request $request, Archive $archive)
    {
        $user = session('user');

        if ($user) {
            $archive->like($user);
        } else {
            redirect('/auth');
        }
    }
}
