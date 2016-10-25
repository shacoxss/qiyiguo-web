<?php

namespace App\Http\Controllers;

use App\Models\Archive\Archive;
use App\Models\Tag\Tag;
use App\Models\Tag\TagFinder;
use App\Models\Tag\Relation;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TestController extends Controller
{
    //

    public function index(Request $request)
    {
        return view('vendor.datatables.print');
    }

    public function anyData(Request $request)
    {
        return Datatables::of(Tag::query())->make(true);
    }
}
