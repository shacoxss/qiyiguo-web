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
    public function edit(Request $request, Archive $archive)
    {
        return view($archive->template_edit)
            ->with('archive', $archive)
        ;
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, Archive $archive)
    {
        dd($request->all());
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
