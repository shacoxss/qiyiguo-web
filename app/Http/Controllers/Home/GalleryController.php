<?php

namespace App\Http\Controllers\Home;

use App\Model\Category;
use App\Model\FollowUser;
use App\Models\Archive\Archive;
use App\Models\Archive\ArchiveType;
use App\Models\Archive\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    //
    const PAGE_COUNT = 10;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $galleries = Archive
                ::select(['archives.id', 'title', 'cover', \DB::raw('count(archive_id) as visit_count')])
                ->ofPattern('review')
                ->where('archive_type_id', $this->getType())
                ->leftJoin('archive_visits', 'archives.id', 'archive_id')
                ->groupBy(['archives.id', 'title', 'cover'])
                ->paginate(self::PAGE_COUNT)
                ->map(function ($item) {
                    $item['tags'] = $item
                        ->tags()
                        ->where('status', 2)
                        ->get()
                        ->map(function ($tag) {
                            $tag->url = $tag->url;
                            return $tag;
                        })
                    ;
                    return $item;
                })
                ->toArray()
            ;
            return response()->json($galleries);
        } else {
            return view('pc_home.gallery.index');
        }
    }

    public function show(Request $request, Archive $archive)
    {
        if (!$archive->hasPattern('review')) return response('没有通过审核', 404);
        $archive->visit($request);
        $user = session('user');
        if($user){
            $author_id = $archive->user->id;
            $follow = FollowUser::where('user_id',$user->id)->first();
            if($author_id == $follow['followed_id']){
                $followed = 1;
            }else{
                $followed = 0;
            }
        }else{
            $followed = -1;
        }

        return view('pc_home.gallery.show')
            ->with('archive', $archive)
            ->with('followed',$followed)
            ->with('user',$user)
            ->with('body_only', '')
        ;
    }

    private function getType()
    {
        return ArchiveType::where('name', 'gallery')->value('id');
    }
}
