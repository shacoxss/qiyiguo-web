<?php

namespace App\Http\Controllers\Archive;

use App\Models\Archive\Archive;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ArchiveController extends Controller
{
    //
    public function create()
    {
        $user = new \stdClass;
        $user->master = 1;
        session(['user' => $user]);

        $patterns = \DB::table('patterns')
        ->where('type', 1)->get();
        $archive = Archive::find(1);
        return view($archive->template_edit)
            ->with('patterns', $patterns)
        ;
    }
    public function edit(Request $request, Archive $archive)
    {
        $user = new \stdClass;
        $user->master = 1;
        session(['user' => $user]);

        $patterns = \DB::table('patterns')
        ->where('type', 1)->get();
        
        return view($archive->template_edit)
            ->with('archive', $archive)
            ->with('patterns', $patterns)
        ;
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, Archive $archive)
    {
        $input = $request->all();
        $patterns = \DB::table('patterns')
            ->where('type', 1)->get();

        $archive->mode = 0;
        foreach ($input as $key => $i) {
            if ($i == 'on') {
                $p = $patterns->first(function ($p) use($key) {
                    return $p->name == $key;
                });
                $archive->mode |= $p ? $p->pattern : 0;
            }
        }

        $input = $request->only(['title']);

        foreach ($input as $key => $i) {
            $archive->{$key} = $i;
        }
        $archive->detail->content = $request->content;
        $archive->save();
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
}
