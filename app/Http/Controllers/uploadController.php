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

            $file_data = json_decode(Input::get('avatar_data'),true) ;
            $x = $file_data['x'];
            $y = $file_data['y'];

            $width = $file_data['width'];
            $height = $file_data['height'];
            switch ($extension) {
                case 'jpg':
                    $s = imagecreatefromjpeg(base_path().'/public/'.$filepath);
                    break;
                case 'jpeg':
                    $s = imagecreatefromjpeg(base_path().'/public/'.$filepath);
                    break;
                case 'png':
                    $s = imagecreatefrompng(base_path().'/public/'.$filepath);
                    break;
                case 'gif':
                    $s = imagecreatefromgif(base_path().'/public/'.$filepath);
                    break;
                default:
                    $s = imagecreatefromjpeg(base_path().'/public/'.$filepath);
                    break;
            }


            $bg = imagecreatetruecolor($width,$height);        //创建$w*$h的空白图像
            if(imagecopy($bg,$s,0,0,$x,$y,$width,$height)){
                switch ($extension) {
                    case 'jpg':
                        $rs = imagejpeg($bg,base_path().'/public/'."/upload/userProfile/".session('user')->id.'/'.$fileNewName);
                        break;
                    case 'jpeg':
                        $rs = imagejpeg($bg,base_path().'/public/'."/upload/userProfile/".session('user')->id.'/'.$fileNewName);
                        break;
                    case 'png':
                        $rs = imagepng($bg,base_path().'/public/'."/upload/userProfile/".session('user')->id.'/'.$fileNewName);
                        break;
                    case 'gif':
                        $rs = imagegif($bg,base_path().'/public/'."/upload/userProfile/".session('user')->id.'/'.$fileNewName);
                        break;
                    default:
                        $rs = false;
                        break;
                }
                if($rs){            //将生成的图片保存到img/new_img.jpg
                    $msg =  "success";
                }else{
                    $msg = "false";
                }
            }else{
                $msg = "false";
            }
            imagedestroy($s);                //关闭图片
            imagedestroy($bg);

            return response()->json(['result'=>$filepath,'msg'=>$msg]);
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
