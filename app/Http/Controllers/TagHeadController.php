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
        dd($tag->archives()->get());
    }
}
