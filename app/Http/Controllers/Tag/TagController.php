<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag\Tag;
use App\Models\Tag\TagAttribute;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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
        $data['attributes'] = $tag->attributes()->get();
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

    public function attrUpdate(Request $request, Tag $tag)
    {
        $attr = $request->only(['name', 'link', 'sort']);
        $attr['tag_id'] = $tag->id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $attr['icon'] = '/upload/'.$file->hashName();
            $file_name = public_path($attr['icon']);
            $img = Image::make($file->getRealPath());
            $img->fit(100, 100);
            $img->save($file_name);
        }

        if ($request->id == 'null') {
            $attr['id'] = TagAttribute::create($attr)->id;
            $attr['msg'] = '添加成功';
        } else {
            TagAttribute::where('id', $request->id)->update($attr);
            $attr['msg'] = '修改成功';
        }

        return response()->json($attr);

    }

    public  function attrDelete(TagAttribute $attr)
    {
        return $attr->delete()
            ? response()->json(['msg' => '删除成功'])
            : response(json_encode(['msg' => '删除失败']), 400)
                ->header('Content-Type', 'application/json');
    }
}
