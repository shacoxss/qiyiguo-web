<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {

        dd(Tag::search($request->input('query')));
    }

    public function tag(Request $request,Tag $tag)
    {
        dd($tag);
    }
}
