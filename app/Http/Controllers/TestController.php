<?php

namespace App\Http\Controllers;

use App\Models\Archive\Archive;
use App\Models\Tag\Tag;
use App\Models\Tag\TagFinder;
use App\Models\Tag\Relation;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {
        //dd(1);

        //Tag::refreshBaiduIndex([3,4,5,6,7,8,9,10]);
//        Tag::find(10)->attachAliases([1,2,3]);
//        Tag::find(4)->attachSimilars([4,5,6,7]);
        //(Tag::find(8)->attachAliases([6]));
        //Relation::relationTransfer([4], 3, true);
        //Tag::test();
        //(Tag::find(9)->getRelatedTags(1, true));
        dd(Tag::find($request->id)->url);
    //    (Tag::create([
    //        'name' => $request->name
    //    ]));
    }

    public function tag(Request $request,Tag $tag)
    {
        dd($tag);
    }
}
