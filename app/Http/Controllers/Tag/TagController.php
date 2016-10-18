<?php

namespace App\Http\Controllers\Tag;

use App\Models\Tag\Tag;
use App\Models\Tag\TagAttribute;
use App\Models\Tag\TagFinder;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TagController extends Controller
{
    //

    public function index(Request $request)
    {
        $tags = Tag::all()->take(100);
        return view('tag.index')
            ->with('tags', $tags);
    }
    public function edit(Request $request,Tag $tag)
    {
        
        $data = $tag->toArray();
        $data['aliases'] = $tag->getAliases();
        $data['similars'] = $tag->getSimilars();

        $data['anchor'] = $data['type'] == 'anchor' ? true :false;
        $data['platform'] = $data['type'] == 'platform' ? true :false;
        $data['attributes'] = $tag->attributes()->get();

        return view('tag.edit')
            ->with('tag', $tag)
            ->with('data', json_encode($data))
        ;
    }

    public function update(Request $request, $tag)
    {
        $new = ['type' => 'normal'];
        $input = $request->all();

        if (isset($input['anchor']) && $input['anchor'] == 'on') {
            $new['type'] = 'anchor';
            $new['anchor_name'] = $input['anchor_name'];
            $new['link'] = $input['anchor_link'];
            $new['notice'] = $input['anchor_notice'];
        } else if (isset($input['platform']) && $input['platform'] == 'on') {
            $new['type'] = 'platform';
//            $new['platform_name'] = $input['platform_name'];
            $new['link'] = $input['platform_link'];
            $new['notice'] = $input['platform_notice'];
        }

        $same = ['background_color', 'template', 'url', 'name', 'keywords', 'description'];

        foreach ($same as $key) {
            $new[$key] = $input[$key];
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $new['logo'] = '/upload/tag_logo/'.$file->hashName();
            $file_name = public_path($new['logo']);
            $img = Image::make($file->getRealPath());
            $img->fit(250, 250);
            $img->save($file_name);
        }

        if ($request->hasFile('background_image')) {
            $file = $request->file('background_image');
            $new['background_image'] = '/upload/background_image/'.$file->hashName();
            $file_name = public_path($new['background_image']);
            $img = Image::make($file->getRealPath());
            $img->save($file_name);
        }

        if (Tag::find($input['id'])) {
            Tag::where('id', $input['id'])->update($new);
            $tag = Tag::find($input['id']);
        } else {
            $tag = Tag::create($new);
        }

        if (isset($input['aliases']) && is_array($input['aliases'])) {
            $tag->updateAliases($input['aliases'], true);
        }

        $tag->detachSimilars($tag->getSimilars()->pluck('id'));
        if (isset($input['similars']) && is_array($input['similars'])) {
            $tag->updateSimilars($input['similars'], true);
        }

        return response()->json(['msg' => '修改成功！']);
    }

    public function status(Tag $tag, $code)
    {
        $tag->status = $code;
        $tag->save();
        return response()->json(['msg' => '操作成功！']);
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

    public function extractTags(Request $request)
    {
        if (!$request->has('text')) abort(400);

        $text = $request->text;

        return response()
            ->json(TagFinder::extractTags($text));
    }
}
