<?php

namespace App\Http\Controllers\Member;

use App\Model\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class userProfileController extends Controller
{
    public function index()
    {
        $user = session('user');
        return view('member.userProfile',compact('user'));
    }

    public function saveHeadImg()
    {
        if($input = Input::all()){
            $data['head_img'] = trim($input['avatar_src']);
            if(empty($data['head_img'])){
                return back()->with('error','请选择要上传的图片！');
            }else{
                $result = Users::where('id',session('user')->id)->update($data);
                if($result){
                    $user = Users::where('id',session('user')->id)->first();
                    session(['user'=>$user]);
                    return back()->with('msg','头像修改成功！');
                }else{
                    return back()->with('error','头像修改失败！');
                }
            }
        }else{
            return back()->with('error','头像修改失败！');
        }
    }

    public function resetPassword()
    {
        if($input = Input::except('_token')){

            $rules = [
                'password'=>'required|between:6,16|confirmed',
            ];
            $message = [
                'password.required' => '新密码不能为空！',
                'password.between' => '密码长度在6到16位之间！',
                'password.confirmed' => '两次密码输入不一致！',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                if(session('user')->password==''){
                    $data['password'] =md5($input['password']);
                    $result = Users::where('phone',session('user')->phone)->update($data);
                    if($result){
                        $user = Users::where('phone',session('user')->phone)->first();
                        session(['user'=>$user]);
                        return back()->with('msg','密码修改成功！');
                    }else{
                        return back()->with('errors','密码修改失败！');
                    }
                }else if(md5($input['old_password'])!=  session('user')->password){
                    return back()->with('errors','原密码错误！');
                }else{
                    $data['password'] =md5($input['password']);
                    $result = Users::where('phone',session('user')->phone)->update($data);
                    if($result){
                        $user = Users::where('phone',session('user')->phone)->first();
                        session(['user'=>$user]);
                        return back()->with('msg','密码修改成功！');
                    }else{
                        return back()->with('errors','密码修改失败！');
                    }
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','错误！');
        }
    }

    public function resetNickname()
    {
        if($input = Input::except('_token')){

            $rules = [
                'nickname'=>'required|between:0,16',
            ];
            $message = [
                'nickname.required' => '昵称不能为空！',
                'nickname.between' => '昵称长度在不能超过16个字符',

            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $user = session('user');
                $data['nickname'] = $input['nickname'];
                    $result = Users::where('id',$user->id)->update($data);
                    if($result){
                        $user = Users::where('id',$user->id)->first();
                        session(['user'=>$user]);
                        return back()->with('msg','昵称修改成功！');
                    }else{
                        return back()->with('errors','昵称修改失败！');
                    }

            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','错误！');
        }
    }

    public function resetPhone()
    {
        $user = session('user');
        $code = session('code');
        if($input = Input::except('_token')){

            $rules = [
                'phone'=>'required|numeric|unique:users,phone,'.$user->phone.'|confirmed',
                'code'=>'required',
            ];
            $message = [
                'code.required'=>'请填写验证码！',
                'phone.required' => '新手机号不能为空！',
                'phone.numeric' => '请填写正确的手机号！',
                'phone.unique' => '电话号码已存在！',
                'phone.confirmed' => '两次输入不一致！',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                if($code != $input['code']){
                    return back()->with('errors','验证码错误！');
                }else{
                    $data['phone'] = $input['phone'];
                    $result = Users::where('id',$user->id)->update($data);
                    if($result){
                        $user = Users::where('id',$user->id)->first();
                        session(['user'=>$user]);
                        return back()->with('msg','电话号码修改成功！');
                    }else{
                        return back()->with('errors','电话号码修改失败！');
                    }
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','错误！');
        }
    }
    public function bindingPhone()
    {
        $user = session('user');
        $code = session('code');
        if($input = Input::except('_token')){

            $rules = [
                'phone'=>'required|numeric|unique:users,phone',
                'code'=>'required',
            ];
            $message = [
                'code.required'=>'请填写验证码！',
                'phone.required' => '新手机号不能为空！',
                'phone.numeric' => '请填写正确的手机号！',
                'phone.unique'=>'电话号码已存在！'
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                if($code != $input['code']){
                    return back()->with('errors','验证码错误！');
                }else{
                    $data['phone'] = $input['phone'];
                        $result = Users::where('id',$user->id)->update($data);
                        if($result){
                            $user = Users::where('id',$user->id)->first();
                            session(['user'=>$user]);
                            return back()->with('msg','电话号码绑定成功！');
                        }else{
                            return back()->with('errors','电话号码绑定失败！');
                        }

                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','错误！');
        }
    }

    public function resetIntro()
    {
        $user = session('user');
        if($input = Input::except('_token')){

            $rules = [
                'intro'=>'required|between:6,255',
            ];
            $message = [
                'phone.required' => '简介不能为空！',
                'phone.between' => '简介长度在6到255个字！',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                    $data['intro'] = $input['intro'];
                    $result = Users::where('id',$user->id)->update($data);
                    if($result){
                        $user = Users::where('id',$user->id)->first();
                        session(['user'=>$user]);
                        return back()->with('msg','信息修改成功！');
                    }else{
                        return back()->with('errors','信息修改失败！');
                    }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','错误！');
        }
    }
}
