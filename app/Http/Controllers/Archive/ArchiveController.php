<?php

namespace App\Http\Controllers\Archive;

use App\Model\Category;
use App\Models\Archive\Archive;
use App\Models\Archive\ArchiveType;
use App\Models\Archive\Article;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ArchiveController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = session('user');
        if (!$user->master) abort(403);
        $archives = Archive::all();
        if($request->has('mode')) {
            $archives = $archives->filter(function ($a) use($request) {
                return !$a->hasPattern($request->mode);
            });
        }
        $counter = [
            'article' => Archive::where('archive_type_id', 1)->count()
        ];
        return view('archive.archive-index')
            ->with('archives', $archives)
            ->with('counter', $counter);
    }

    public function create(ArchiveType $type)
    {
        $cate = Category::sort(Category::all());
        $patterns = \DB::table('patterns')
        ->where('type', 1)->get();

        return view($type->t_edit)
            ->with('patterns', $patterns)
            ->with('cate', $cate)
        ;
    }
    public function edit(Request $request, Archive $archive)
    {
        $cate = Category::sort(Category::all());
        $patterns = \DB::table('patterns')
        ->where('type', 1)->get();
        
        return view($archive->type->t_edit)
            ->with('archive', $archive)
            ->with('patterns', $patterns)
            ->with('cate', $cate)
            ->with('tags', implode(',', $archive->tags()->get()->pluck('name')->all()));
        ;
    }

    public function store(Request $request,ArchiveType $type)
    {
        $new = $request->only(['title', 'abstract', 'category_id']);
        $new['archive_type_id'] = $type->id;
        $new['mode'] = $this->calcMode($request);
        $new['user_id'] = session('user')->id;


        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $url = '/upload/archive/'.$file->hashName();
            $file_name = public_path($url);
            $img = Image::make($file->getRealPath());
            $img->save($file_name);
            $new['cover'] = $url;
        }

        $archive = Archive::create($new);

        $tags = explode(',', $request->tags);
        $tags = array_slice($tags, 0, 3);
        if (!empty($tags[0])) {
            $tags = Tag::wrapToIds($tags, true);
            $tags = Tag::convertToPrimaries($tags);
            $archive->tags()->attach($tags->all());
        }

        $detail = $request->only(explode(',', $type->fields));
        $detail['archive_id'] = $archive->id;
//        ((string)$type->model)::create($detail);
        (new $type->model($detail))->save();
        return response()->json(['msg' => '保存成功！']);
    }

    public function update(Request $request, Archive $archive)
    {
        $archive->detachPattern(7);
        $archive->mode = $this->calcMode($request, $archive->mode);

        $input = $request->only(['title', 'abstract', 'category_id']);
        $input['user_id'] = session('user')->id;
        foreach ($input as $key => $i) {
            $archive->$key = $i;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $url = '/upload/archive/'.$file->hashName();
            $file_name = public_path($url);
            $img = Image::make($file->getRealPath());
            $img->save($file_name);
            $archive->cover = $url;
        }

        $archive->save();
        $detail = $request->only(explode(',', $archive->type->fields));
        foreach ($detail as $key => $i) {
            $archive->detail->$key = $i;
        }
        $archive->detail->save();
        $tags = $archive->tags()->get()->pluck('id')->all();
        if (!empty($tags)) {
            $archive->tags()->detach($tags);
        }

        $tags = explode(',', $request->tags);
        if (!empty($tags[0])) {
            $tags = array_slice($tags, 0, 3);
            $tags = Tag::wrapToIds($tags, true);
            $tags = Tag::convertToPrimaries($tags);
            $archive->tags()->attach($tags->all());
        }

        return response()->json(['msg' => '修改成功！']);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('files')) {
            $file = $request->file('files');
            $url = '/upload/archive/'.$file->hashName();
            $file_name = public_path($url);
            $img = Image::make($file->getRealPath());
            $img->save($file_name);
            echo $url;
        } else {
            abort(400);
        }
    }

    private function calcMode(Request $request, $mode = 0, $flag = 'on')
    {
        $patterns = \DB::table('patterns')
            ->where('type', 1)->get();

        foreach ($request->all() as $key => $i) {
            if ($i == $flag) {
                $p = $patterns->first(function ($p) use($key) {
                    return $p->name == $key;
                });
                $mode |= $p ? $p->pattern : 0;
            }
        }

        return $mode;
    }

    public function toggle(Archive $archive, $name)
    {
        $archive->togglePattern($name);
        return response()->json(['msg' => '操作成功！']);
    }

    public function userArchivesList()
    {
        $user = session('user');
        $archives = Archive::where('user_id', $user->id)->get();
        $counter = [
            'article' => Archive::where('archive_type_id', 1)->where('user_id', $user->id)->count()
        ];
        return view('archive.archive-user-index')
            ->with('archives', $archives)
            ->with('counter', $counter);
    }

    public function destroy($id)
    {
        if(session('user')->master) {
            Archive::destroy($id);
            echo 'success';
        }
    }
}
