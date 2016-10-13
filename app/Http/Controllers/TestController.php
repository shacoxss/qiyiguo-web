<?php

namespace App\Http\Controllers;

use App\Models\Tag\Tag;
use App\Models\Tag\TagFinder;
use App\Models\Tag\Relation;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {
        //Tag::refreshBaiduIndex([3,4,5,6,7,8,9,10]);
        // Tag::find(2)->attachAliases([1,3]);
        // Tag::find(4)->attachSimilars([5,3]);
        //(Tag::find(8)->attachAliases([6]));
        Relation::relationTransfer([4], 3, true);
        //Tag::test();
        //(Tag::find(9)->getRelatedTags(1, true));
        echo 'ok';
    //    (Tag::create([
    //        'name' => $request->name
    //    ]));
    }

    public function tag(Request $request,Tag $tag)
    {
        dd($tag);
    }
}
