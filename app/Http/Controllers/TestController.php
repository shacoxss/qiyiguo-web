<?php

namespace App\Http\Controllers;

use App\Models\Tag\Tag;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {
        dd(Tag::find(7)->getPrimaryName());
//        dd(Tag::create([
//            'name' => $request->name
//        ]));
    }

    public function tag(Request $request,Tag $tag)
    {
        dd($tag);
    }
}
