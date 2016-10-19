<?php

namespace App\Http\Controllers;

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
            $dir = base_path().'/public/upload/head_img/'.date('Ymd',time());
            if(!is_dir($dir)){
                mkdir($dir);
            }

            $string = 'ABCDEFGHIJKLMNPQRST1234567890';
            $fileNewName = substr(str_shuffle($string),0,6).'.'.$extension;
            $file->move($dir,$fileNewName);
            $filepath = '/upload/head_img/'.date('Ymd',time()).'/'.$fileNewName;
            $file_middle_path ='/upload/head_img/'.date('Ymd',time()).'/'.'middle_'.$fileNewName;
            $file_small_path = '/upload/head_img/'.date('Ymd',time()).'/'.'small_'.$fileNewName;

            //生成中小头像
            $this->thumb($filepath,98,98,0,$file_middle_path,100);
            $this->thumb($filepath,48,48,0,$file_small_path,100);
            return response()->json(['result'=>$filepath]);
        }
    }
    //生成缩略图
    public function thumb($oldImg,$width,$height,$cut=0,$thumbPath,$quality=100)
    {
        require_once ('../vendor/thumb/thumb.class.php');
        $resize = new \ResizeImage($oldImg, $width, $height, $cut,$thumbPath,$quality);
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

}
