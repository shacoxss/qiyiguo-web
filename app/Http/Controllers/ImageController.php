<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    //
    public function index($uri, $size)
    {
        $img = Image::make(asset($uri));
        $img->fit($size[0], $size[1]);

    }
}
