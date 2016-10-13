<?php

namespace App\Http\Controllers;

use App\Models\Tag\Tag;
use App\Models\Tag\TagFinder;
use App\Models\Tag\TagRelation;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {
        Tag::refreshBaiduIndex([3,4,5,6,7,8,9,10]);
        //Tag::find(11)->refreshBaiduIndex();
        //dd(Tag::wrapToPrimaryId(collect([2,9,4,5,6,7])));
        //Tag::find(2)->attachAliases([1,3,4,5,10]);
        //(Tag::find(8)->attachAliases([6]));
        //TagRelation::relationTransfer([3,4,5], 2, true);
        //Tag::test();
        //(Tag::find(9)->getRelatedTags(1, true));
        echo 'ok';
//        (Tag::create([
//            'name' => $request->name
//        ]));
    }

    public function tag(Request $request,Tag $tag)
    {
        dd($tag);
    }
}
