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
    public function contentLists(Request $request, $cate_id)
    {
        $cate = Category::where('cate_id',$cate_id)->first();
        $archives = Archive::ofPattern('review')
            ->where('category_id', $cate_id)
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

        if (!$user) redirect('/auth');

        if ($archive->isLiked($user)) {
            return response()->json(['msg' => '您已经喜欢过该文章了！', 'code' => 1]);
        } else {
            $archive->like($user);
            return response()->json(['msg' => '感谢您的支持！', 'code' => 0]);
        }
    }
}
