<?php

namespace App\Http\Controllers\Tag;

use App\Helpers\UploadFile;
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
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('tag.index')
            ->with('tags', $tags);
    }

    public function create()
    {
        return view('tag.create');
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

    public function store(Request $request)
    {
        $new = $request->only(['name', 'current_url', 'template']);
        $new['type'] = 'normal';

        if ($request->hasFile('logo')) {
            $new['logo'] = UploadFile::save($request->file('logo'));
        }

        if ($request->hasFile('background_image')) {
            $new['background_image'] = UploadFile::save($request->file('logo'));
        }

        foreach ($new as $key => $_) {
            $new[$key] = $new[$key] ? $new[$key] : null;
        }

        if (Tag::create($new)) {
            return response()->json(['新增成功！', '继续新增']);
        }
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

        $same = ['background_color', 'template', 'name', 'keywords', 'description', 'content', 'current_url'];

        foreach ($same as $key) {
            $new[$key] = $input[$key] ? $input[$key] : null;
        }

        if ($request->hasFile('logo')) {
            $new['logo'] = UploadFile::save($request->file('logo'));
        }

        if ($request->hasFile('background_image')) {
            $new['background_image'] = UploadFile::save($request->file('logo'));
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

        if (isset($input['similars']) && is_array($input['similars'])) {
            $tag->updateSimilars($input['similars'], true);
        }

        return response()->json(['msg' => '修改成功！']);
    }

    public function status(Tag $tag, $code)
    {
        Tag::where('id', $tag->id)->update(['status' => $code]);
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
