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
        //if ($tag->status != 2) abort(404);
        dd($tag->archives()->get());
    }
}
