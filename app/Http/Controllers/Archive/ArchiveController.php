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
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ArchiveController extends Controller
{

    private $fields = ['title', 'abstract', 'category_id'];

    //
    public function index(Request $request, $left = null)
    {
        $user = session('user');
        $query = Archive::orderBy('created_at', 'desc');

        if ($request->has('type')) {
            $query->where('archive_type_id', ArchiveType::where('name', $request->input('type'))->value('id'));
        }

        if ($left == 'master' && $this->checkMaster()) {
            $archives = $query->get();
            if($request->has('mode')) {
                $archives = $archives->filter(function ($a) use($request) {
                    return !$a->hasPattern($request->mode);
                });
            }
            $is_master = true;
        }else{
            $archives = $query->where('user_id', $user->id)->get();
            $is_master = false;
        }
        $counter = [
            'article' => Archive::where('archive_type_id', 1)->count(),
            'gallery' => Archive::where('archive_type_id', 2)->count(),
            'video' => Archive::where('archive_type_id', 3)->count()
        ];
        return view('archive.archive-index')
            ->with('archives', $archives)
            ->with('counter', $counter)
            ->with('is_master', $is_master)
            ->with('left', $left)
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
            ->with('type', $type)
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
            ->with('type', $archive->type)
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


        $input = $request->except('_token');
        $rules = [
            'title'=>'required|between:3,30|unique:archives,title',
            'tags'=>'required',
            //'category_id'=>'required',
            'content'=>'required',
        ];
        $message = [
            'title.required' => '标题不能为空',
            'title.between' => '标题长度4~30个字',
            'title.unique' => '标题已存在',
            'tags.required' => '标签不能为空',
            'category_id.required' => '请选择栏目',
            'content.required' => '内容或简介不能为空',
        ];

        if($new['archive_type_id']==2){
            $rules['images'] = 'required';
            $message['images.required'] = '请上传图片！';
        }elseif($new['archive_type_id']==3){
            $rules['link'] = 'required';
            $message['link.required'] = '请填写url！';
        }



        if ($request->hasFile('cover')) {
            $new['cover'] = UploadFile::save($request->file('cover'));
        }

        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $archive = Archive::create($new);
        }else{
            return response()->json(['error'=>1,'msg'=>$validator->errors()]);
        }


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

        $input = $request->except('_token');
        $rules = [
            'title'=>'required|between:3,30|unique:archives,title',
            'tags'=>'required',
            'category_id'=>'required',
            'content'=>'required',
        ];
        $message = [
            'title.required' => '标题不能为空',
            'title.between' => '标题长度4~30个字',
            'title.unique' => '标题已存在',
            'tags.required' => '标签不能为空',
            'category_id.required' => '请选择栏目',
            'content.required' => '内容或简介不能为空',
        ];

        if($archive->type->id==2){
            $rules['images'] = 'required';
            $message['images.required'] = '请上传图片！';
        }elseif($archive->type->id==3){
            $rules['link'] = 'required';
            $message['link.required'] = '请填写url！';
        }

        if ($request->hasFile('cover')) {
            $archive->cover = UploadFile::save($request->file('cover'));
        }

        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $archive->detachPattern(7);
            $archive->mode = $this->calcMode($request, $archive->mode);
            $input = $request->only($this->fields);
            $archive->fill($input);
            $archive->save();
        }else{
            return response()->json(['error'=>1,'msg'=>$validator->errors()]);
        }

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
