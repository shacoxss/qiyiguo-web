<?php

namespace App\Http\Controllers\Archive;

use App\Helpers\HTML;
use App\Helpers\UploadFile;
use App\Model\Category;
use App\Model\Message;
use App\Models\Archive\Archive;
use App\Models\Archive\ArchiveType;
use App\Models\Archive\Article;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
            if ($request->has('user')) {
                $query->where('user_id', $request->input('user'));
            }
            $archives = $query->get();
            if($request->has('mode')) {
                $archives = $archives->filter(function ($a) use($request) {
                    return !$a->hasPattern($request->mode);
                });
            }
            $is_master = true;
            $counter = [
                'article' => Archive::where('archive_type_id', 1)->count(),
                'gallery' => Archive::where('archive_type_id', 2)->count(),
                'video' => Archive::where('archive_type_id', 3)->count()
            ];
        }else{
            $archives = $query->where('user_id', $user->id)->get();
            $is_master = false;
            $counter = [
                'article' => Archive::where('archive_type_id', 1)->where('user_id', $user->id)->count(),
                'gallery' => Archive::where('archive_type_id', 2)->where('user_id', $user->id)->count(),
                'video' => Archive::where('archive_type_id', 3)->where('user_id', $user->id)->count()
            ];
        }
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
        //基本信息
        DB::beginTransaction();
        $new = $request->only($this->fields);
        $new['archive_type_id'] = $type->id;
        $new['mode'] = $this->calcMode($request);
        $new['user_id'] = session('user')->id;


        $input = $request->except('_token');
        if(isset($input['news']) && $input['news']=='on'){
            $new['news'] = 1;
        }else{
            $new['news'] = 0;
        }
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
            if($archive = Archive::create($new)){

                $tags = explode(',', $request->tags);
                $tags = array_slice($tags, 0, 3);
                if (!empty($tags[0])) {
                    $tags = Tag::wrapToIds($tags, true, true);
                    $tags = Tag::convertToPrimaries($tags);
                    $archive->tags()->attach($tags->all());
                }
                //详情信息
                $detail = $request->only(explode(',', $type->fields));
                if(isset($detail['link'])){
                    //优酷
                    if(preg_match('/<embed(.*)<\/embed>/',$detail['link'])||preg_match('/<object(.*)<\/object>/',$detail['link'])){

                    }else{
                        if(preg_match('/v.youku.com/',$detail['link'])){
                            $content = file_get_contents("compress.zlib://".$detail['link']);
                            if(preg_match('/<embed(.*)<\/embed>/',$content,$link)){
                                $detail['link'] = $link[0];
                            }else{
                                return response()->json(['error'=>2,'msg'=>'视频链接错误!']);
                            }
                        }elseif(preg_match('/v.qq.com/',$detail['link'])){
                            //腾讯
                            $content = file_get_contents("compress.zlib://".$detail['link']);
                            if(!$content){
                                DB::rollback();
                                return response()->json(['error'=>2,'msg'=>'视频链接错误!']);
                            }
                            preg_match('/vid:(\s*)"(.*)",/', $content, $match);
                            $link = $match[2];
                            $detail['link'] = '<embed src="http://static.video.qq.com/TPout.swf?vid='.$link.'&auto=0" allowFullScreen="true" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>';
                        }elseif(preg_match('/sohu.com/',$detail['link'])){
                            //搜狐
                            $content = file_get_contents("compress.zlib://".$detail['link']);
                            if(!$content){
                                DB::rollback();
                                return response()->json(['error'=>2,'msg'=>'视频链接错误!']);
                            }
                            preg_match('/(var)(\s*)vid(\s*)=(\s*)"(.*)";/', $content, $match);
                            $vid = $match[5];
                            preg_match('/(var)(\s*)playlistId(\s*)=(\s*)"(.*)";/', $content, $matches);
                            $pid = $matches[5];
                            $detail['link'] = '<object width=1460 height=639><param name="movie" value="http://share.vrs.sohu.com/'.$vid.'/v.swf&topBar=1&autoplay=false&plid='.$pid.'&pub_catecode=0&from=page"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param name="wmode" value="Transparent"></param><embed width=1460 height=639 wmode="Transparent" allowfullscreen="true" allowscriptaccess="always" quality="high" src="http://share.vrs.sohu.com/'.$vid.'/v.swf&topBar=1&autoplay=false&plid='.$pid.'&pub_catecode=0&from=page" type="application/x-shockwave-flash"/></embed></object>';
                        }else{
                            DB::rollback();
                            return response()->json(['error'=>2,'msg'=>'视频链接错误，仅支持腾讯，优酷，搜狐视频或html视频代码！']);
                        }
                    }
                }
                $detail['content'] = $this->genContent($detail['content']);
                $model = $type->model;
                if(!$model::saveDetail($archive, $detail)){
                    DB::rollback();
                }
                if(!$archive->generateTagUrl()){
                    DB::rollback();
                }
                DB::commit();
            }
        }else{
            return response()->json(['error'=>1,'msg'=>$validator->errors()]);
        }

        return response()->json(['发布成功！', '继续发布']);
    }

    public function update(Request $request, Archive $archive)
    {
        DB::beginTransaction();
        $user = session('user');
        ($archive->user_id == $user->id) || $this->checkMaster();

        $input = $request->except('_token');
        $rules = [
            //'title'=>'required|between:3,30|unique:archives,title',
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
            $result = $archive->save();
        }else{
            return response()->json(['error'=>1,'msg'=>$validator->errors()]);
        }
        if($result){
            $detail = $request->only(explode(',', $archive->type->fields));
            if(isset($detail['link'])){
                //优酷
                if(preg_match('/<embed(.*)<\/embed>/',$detail['link'])||preg_match('/<object(.*)<\/object>/',$detail['link'])){

                }else{
                    if(preg_match('/v.youku.com/',$detail['link'])){
                        $content = file_get_contents("compress.zlib://".$detail['link']);
                        if(preg_match('/<embed(.*)<\/embed>/',$content,$link)){
                            $detail['link'] = $link[0];
                        }else{
                            return response()->json(['error'=>2,'msg'=>'视频链接错误!']);
                        }
                    }elseif(preg_match('/v.qq.com/',$detail['link'])){
                        //腾讯
                        $content = file_get_contents("compress.zlib://".$detail['link']);
                        if(!$content){
                            DB::rollback();
                            return response()->json(['error'=>2,'msg'=>'视频链接错误!']);
                        }
                        preg_match('/vid:(\s*)"(.*)",/', $content, $match);
                        $link = $match[2];
                        $detail['link'] = '<embed src="http://static.video.qq.com/TPout.swf?vid='.$link.'&auto=0" allowFullScreen="true" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>';
                    }elseif(preg_match('/sohu.com/',$detail['link'])){
                        //搜狐
                        $content = file_get_contents("compress.zlib://".$detail['link']);
                        if(!$content){
                            DB::rollback();
                            return response()->json(['error'=>2,'msg'=>'视频链接错误!']);
                        }
                        preg_match('/(var)(\s*)vid(\s*)=(\s*)"(.*)";/', $content, $match);
                        $vid = $match[5];
                        preg_match('/(var)(\s*)playlistId(\s*)=(\s*)"(.*)";/', $content, $matches);
                        $pid = $matches[5];
                        $detail['link'] = '<object width=1460 height=639><param name="movie" value="http://share.vrs.sohu.com/'.$vid.'/v.swf&topBar=1&autoplay=false&plid='.$pid.'&pub_catecode=0&from=page"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param name="wmode" value="Transparent"></param><embed width=1460 height=639 wmode="Transparent" allowfullscreen="true" allowscriptaccess="always" quality="high" src="http://share.vrs.sohu.com/'.$vid.'/v.swf&topBar=1&autoplay=false&plid='.$pid.'&pub_catecode=0&from=page" type="application/x-shockwave-flash"/></embed></object>';
                    }else{
                        DB::rollback();
                        return response()->json(['error'=>2,'msg'=>'视频链接错误，仅支持腾讯，优酷，搜狐视频或html视频代码！']);
                    }
                }
            }
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

            $detail['content'] = $this->genContent($detail['content']);
            $model = $archive->type->model;
            if(!$model::saveDetail($archive, $detail)){
                DB::rollback();
            }
            if(!$archive->generateTagUrl()){
                DB::rollback();
            }
            DB::commit();
        }else{
            DB::rollback();
            return response()->json(['error'=>2,'msg'=>'发布失败！']);
        }
        //删除message
        Message::where('archive_id',$archive->id)->delete();


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
        if ($name == 'review') {
            $archive->tags()->update(['status' => 2]);
        }
        //$archive->togglePattern($name);
        //dd($name);
        if($name=='success'){
            $result = $archive->passReview();
        }else{
            $result = $archive->noPassReview();
        }
        if($result){
            return response()->json(['msg' => '操作成功！']);
        }else{
            return response()->json(['msg' => '操作失败！']);
        }
    }

    public function toggles($archives, $name)
    {
        $this->checkMaster();

        $pattern = \DB::table('patterns')->where('name' ,$name)->value('pattern');

        foreach(explode(',', $archives) as $archive) {
            $archive = Archive::find($archive);

            if (!$archive) continue;

            $archive->mode = $archive->mode | $pattern;

            $archive->save();
        }

        return response()->json(['msg' => '操作成功']);
    }

    public function destroy($archives)
    {
        $user = session('user');
        $archives = (explode(',', $archives));
        $archives = Archive::whereIn('id', $archives)->get();

        foreach ($archives as $archive) {
            if($archive->user_id == $user->id || $this->checkMaster()) {
                if ($archive->detail) {
                    $archive->detail->delete();
                }
                $archive->delete();
            }
        }
        echo 'success';
    }

    private function checkMaster()
    {
        if (!session('user')->master) {
            abort(403, '禁止访问');
        }
        return true;
    }

    //过滤掉标签首的空白
    private function genContent($content)
    {
        $content = preg_replace('#(<(?:[a-z]|h[1-6])[^>]*>)(?:&nbsp;|\s)+#is', '$1', $content);
        return HTML::filter($content);
    }

    public function noPassReason()
    {
        
    }
}
