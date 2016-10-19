<?php

namespace App\Http\Controllers\Archive;

use App\Models\Archive\Archive;
use App\Models\Archive\ArchiveType;
use App\Models\Archive\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ArchiveController extends Controller
{
    //
    public function index()
    {
        $user = session('user');
        if ($user->master) {
            $archives = Archive::all();
        } else {
            $archives = Archive::where('user_id', $user->id)->get();
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
        $patterns = \DB::table('patterns')
        ->where('type', 1)->get();

        return view($type->t_edit)
            ->with('patterns', $patterns)
        ;
    }
    public function edit(Request $request, Archive $archive)
    {
        $patterns = \DB::table('patterns')
        ->where('type', 1)->get();
        
        return view($archive->type->t_edit)
            ->with('archive', $archive)
            ->with('patterns', $patterns)
        ;
    }

    public function store(Request $request,ArchiveType $type)
    {
        $new = $request->only(['title', 'cover', 'abstract']);
        $new['archive_type_id'] = $type->id;
        $new['mode'] = $this->calcMode($request);
        $new['user_id'] = ($user = session('user')) ? 1 : 0;
        $archive = Archive::create($new);

        $detail = $request->only(explode(',', $type->fields));
        $detail['archive_id'] = $archive->id;
        ((string)$type->model)::create($detail);
        return response()->json(['msg' => '保存成功！']);
    }

    public function update(Request $request, Archive $archive)
    {
        $archive->detachPattern(7);
        $archive->mode = $this->calcMode($request, $archive->mode);

        $input = $request->only(['title', 'cover', 'abstract']);
        $input['user_id'] = ($user = session('user')) ? 1 : 0;
        foreach ($input as $key => $i) {
            $archive->{$key} = $i;
        }
        $archive->save();

        $detail = $request->only(explode(',', $archive->type->fields));
        foreach ($detail as $key => $i) {
            $archive->detail->{$key} = $i;
        }
        $archive->detail->save();

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
}
