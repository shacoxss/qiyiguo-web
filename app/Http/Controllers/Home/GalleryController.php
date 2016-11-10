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

        $res = $archive->toArray();
        $res['images'] = $archive->detail->images()->get()->toArray();
        $res['detail'] = $archive->detail->toArray();
        $res['author'] = $archive->user->nickname;
        $res['updated_at'] = worldTime(strtotime($archive->updated_at));
        $res['prev'] = Archive::where('archive_type_id', 2)->ofPattern('review')->where('id', '<', $archive->id)->value('id');
        $res['next'] = Archive::where('archive_type_id', 2)->ofPattern('review')->where('id', '>', $archive->id)->value('id');

        return response()->json($res);
    }

    private function getType()
    {
        return ArchiveType::where('name', 'gallery')->value('id');
    }
}
