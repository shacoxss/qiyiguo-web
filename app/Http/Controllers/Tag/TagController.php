<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    //
    public function index(Request $request,Tag $tag)
    {
        $data = $tag->toArray();
        $data['aliases'] = $tag->getAliases();
        $data['similars'] = $tag->getSimilars();
        $data['anchor'] = false;
        $data['platform'] = false;
        //echo json_encode(Tag::get(['id','name',\DB::raw("REPLACE(pinyin,'-','') as `pinyin`")]));
        return view('tag.edit')
            ->with('tag', $tag)
            ->with('data', json_encode($data))
        ;
    }

    public function update(Request $request, $tag)
    {
        dd($request->all());
    }
}
