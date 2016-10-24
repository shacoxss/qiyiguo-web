<?php

namespace App\Http\Controllers;

use App\Models\Tag\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class TagHeadController extends Controller
{
    //
    public function index(Tag $tag)
    {
        if ($tag->status != 2) abort(404);
        $archives = $tag->archives()->ofPattern('review')->paginate(8);

        //dd($archives);

        return view('pc_home.tagLists')
            ->with('archives', $archives)
            ->with('tag', $tag)
        ;
    }
}