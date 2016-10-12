<?php

namespace App\Http\Controllers;

use App\Models\Tag\Tag;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {
        //Tag::find(1)->attachRelatedTags([6,8,10]);
        //(Tag::find(3)->attachAliases([6,8,9], 'dd', false, true));
        //Tag::relationTransfer([10,3], 2);
        Tag::test();
        echo 'ok';
//        dd(Tag::create([
//            'name' => $request->name
//        ]));
    }

    public function tag(Request $request,Tag $tag)
    {
        dd($tag);
    }
}
