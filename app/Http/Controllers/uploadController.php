<?php

namespace App\Http\Controllers;

use App\Model\Users;
use App\Models\Tag\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class uploadController extends Controller
{
    public function uploadHeadImg()
    {

        $file = Input::file('avatar_file');
        if($file->isValid()){
            $extension = $file->getClientOriginalExtension();
            $dir = base_path().'/public/upload/userProfile/'.session('user')->id;
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $fileNewName = 'head_img'.'.'.$extension;
            $file->move($dir,$fileNewName);
            $filepath = '/upload/userProfile/'.session('user')->id.'/'.$fileNewName;


            $src = $src = imagecreatefromstring(file_get_contents($filepath));
            $file_data = json_decode(Input::get('avatar_data'),true) ;
            $x = $file_data['x'];
            $y = $file_data['y'];
//裁剪区域的宽和高
            $width = $file_data['width'];
            $height = $file_data['height'];
//最终保存成图片的宽和高，和源要等比例，否则会变形
            $final_width = 100;
            $final_height = round($final_width * $height / $width);
//将裁剪区域复制到新图片上，并根据源和目标的宽高进行缩放或者拉升
            $new_image = imagecreatetruecolor($final_width, $final_height);
            imagecopyresampled($new_image, $src, 0, 0, $x, $y, $final_width, $final_height, $width, $height);
//输出图片
            header('Content-Type: image/jpeg');
            imagejpeg($new_image);
            imagedestroy($src);
            imagedestroy($new_image);

            return response()->json(['result'=>$filepath]);
        }
    }
    public function uploadWebLogo()
    {
        $file = Input::file('avatar_file');
        if($file->isValid()){
            $extension = $file->getClientOriginalExtension();
            $dir = base_path().'/public/upload/logo/'.date('Ymd',time());
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $string = 'ABCDEFGHIJKLMNPQRST1234567890';
            $fileNewName = substr(str_shuffle($string),0,6).'.'.$extension;
            $file->move($dir,$fileNewName);
            $filepath = '/upload/logo/'.date('Ymd',time()).'/'.$fileNewName;
            return response()->json(['result'=>$filepath]);
        }

    }

    public function more()
    {

        $input = Input::except('_token');
        $row = $input['row'] * 48;
        $tags = Tag::where('status',2)->orderBy('weight','desc')->orderBy('created_at','desc')->skip($row)->take(48)->get();
        if(count($tags)){
            return response()->json($tags);
        }else{
            return 'null';
        }
    }
}
