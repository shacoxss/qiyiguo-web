<?php

namespace App\Http\Controllers;

use App\Model\Users;
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

}
