<?php
/**
 * User: shx
 * Date: 2016/10/26
 * Time: 15:21
 */

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class UploadFile
{
    const RAW = 'raw';
    const EXT = 'jpeg';

    public static function save(UploadedFile $file, $url = '/upload/archive')
    {
        $path = $file->getRealPath();

        $img = Image::make($path);

        $url .= '/'.md5_file($path);

        $path = public_path($url);

        if (!file_exists($path) && mkdir($path)) {
            $img->save("$path/".self::RAW.'.'.self::EXT);
        }

        return $url;
    }

    public function read($uri, $size)
    {
        $size = explode('x', $size);
        if (!isset($size[1])) $size[1] = $size[0];

        $path = public_path($uri);
        if (!file_exists($path)) abort(404);

        $path .= "/$size[0]x$size[1].".self::EXT;

        if (!file_exists($path)) {
            $img = Image::make("$uri/".self::RAW.'.'.self::EXT);
            $img->fit($size[0], $size[1]);
            $img->save($path);
        }

        return redirect(asset("$uri/$size[0]x$size[1].".self::EXT));
    }
}