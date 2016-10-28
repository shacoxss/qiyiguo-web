<?php

namespace App\Http\Controllers\Archive;

use App\Helpers\UploadFile;
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

    private $fields = ['title', 'abstract', 'category_id'];

    //
    public function index(Request $request, $left = null)
    {
        $user = session('user');
        $query = Archive::orderBy('created_at', 'desc');

        if ($left == 'master' && $this->checkMaster()) {
            $archives = $query->get();
            if($request->has('mode')) {
                $archives = $archives->filter(function ($a) use($request) {
                    return !$a->hasPattern($request->mode);
                });
            }
            $is_master = true;
        } else {
            $archives = $query->where('user_id', $user->id)->get();
            $is_master = false;
        }
        $counter = [
            'article' => Archive::where('archive_type_id', 1)->count()
        ];
        return view('archive.archive-index')
            ->with('archives', $archives)
            ->with('counter', $counter)
            ->with('is_master', $is_master)
        ;
    }

    public function create(ArchiveType $type)
    {
        $cate = Category::sort(Category::all());
        $patterns = \DB::table('patterns')
        ->where('type', 1)->get();

        return view($type->t_edit)
            ->with('patterns', $patterns)
            ->with('cate', $cate)
            ->with('left', 'user')
        ;
    }
    public function edit(Request $request, Archive $archive, $user_type)
    {
        $user = session('user');
        if ($user_type == 'master' && $this->checkMaster()) {
            $left = 'master';
        } elseif ($archive->user_id == $user->id) {
            $left = 'user';
        } else {
            return abort(403, '禁止访问');
        }

        $cate = Category::sort(Category::all());
        $patterns = \DB::table('patterns')
        ->where('type', 1)->get();
        return view($archive->type->t_edit)
            ->with('archive', $archive)
            ->with('patterns', $patterns)
            ->with('cate', $cate)
            ->with('tags', implode(',', $archive->tags()->get()->pluck('name')->all()))
            ->with('left', $left)
        ;
    }

    /**
     * @param Request $request
     * @param ArchiveType $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, ArchiveType $type)
    {
        $new = $request->only($this->fields);
        $new['archive_type_id'] = $type->id;
        $new['mode'] = $this->calcMode($request);
        $new['user_id'] = session('user')->id;


        if ($request->hasFile('cover')) {
            $new['cover'] = UploadFile::save($request->file('cover'));
        }

        $archive = Archive::create($new);

        $tags = explode(',', $request->tags);
        $tags = array_slice($tags, 0, 3);
        if (!empty($tags[0])) {
            $tags = Tag::wrapToIds($tags, true, true);
            $tags = Tag::convertToPrimaries($tags);
            $archive->tags()->attach($tags->all());
        }

        $detail = $request->only(explode(',', $type->fields));
        $model = $type->model;
        $model::saveDetail($archive, $detail);

        $archive->generateTagUrl();

        return response()->json(['发布成功！', '继续发布']);
    }

    public function update(Request $request, Archive $archive)
    {
        $user = session('user');
        ($archive->user_id == $user->id) || $this->checkMaster();

        $archive->detachPattern(7);
        $archive->mode = $this->calcMode($request, $archive->mode);

        $input = $request->only($this->fields);
        $archive->fill($input);

        if ($request->hasFile('cover')) {
            $archive->cover = UploadFile::save($request->file('cover'));
        }

        $archive->save();
        $detail = $request->only(explode(',', $archive->type->fields));
        $model = $archive->type->model;
        $model::saveDetail($archive, $detail);


        $tags = $archive->tags()->get()->pluck('id')->all();
        if (!empty($tags)) {
            $archive->tags()->detach($tags);
        }

        $tags = explode(',', $request->tags);
        if (!empty($tags[0])) {
            $tags = array_slice($tags, 0, 3);
            $tags = Tag::wrapToIds($tags, true, true);
            $tags = Tag::convertToPrimaries($tags);
            $archive->tags()->attach($tags->all());
        }

        $archive->generateTagUrl();

        return response()->json(['修改成功！', '继续修改']);
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
        $this->checkMaster();
        $archive->togglePattern($name);
        return response()->json(['msg' => '操作成功！']);
    }

    public function destroy(Archive $archive)
    {
        $user = session('user');
        if($archive->user_id == $user->id || $this->checkMaster()) {
            $archive->detail->delete();
            $archive->delete();
            echo 'success';
        }
    }

    private function checkMaster()
    {
        if (!session('user')->master) {
            abort(403, '禁止访问');
        }
        return true;
    }

}
