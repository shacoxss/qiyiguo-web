<?php

namespace App\Http\Controllers;

use App\Models\Tag\Tag;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {
        //Tag::find(4)->setToRelationKey();
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
