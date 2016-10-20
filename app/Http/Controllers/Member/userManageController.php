<?php

namespace App\Http\Controllers\Member;

use App\Model\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class userManageController extends Controller
{
    public function index()
    {
        $users = Users::orderBy('id','desc')->get();
        $count = Users::count();
        return view('member.masterUserList',compact('users','count'));
    }

    public function destroy($user_id)
    {
        if(is_numeric($user_id)){
            $user = Users::where('id',$user_id)->first();
            if($user->admin){
                return '超级管理员不允许删除！';
            }else{
                $result = Users::where('id',$user_id)->delete();
                if($result){
                    return 'success';
                }else{
                    return 'error';
                }
            }
        }else{
            $result = Users::where('admin',0)->destroy(explode(',',$user_id));
            if($result){
                return 'success';
            }else{
                return 'error';
            }
        }
    }

    public function edit($user_id)
    {
        $user = User::where('id',$user_id)->first();
        return view('member/masterUserEdit',compact('user'));
    }

    public function saveNickname()
    {
        if($input = Input::except('_token')){
            if(User::where('id',$input['id'])->update($input)){
                return back()->with('msg','修改成功！');
            }else{
                return back()->with('msg','修改失败！');
            }
        }else{
            return back()->with('msg','Error');
        }
    }

    public function savePhonePassword()
    {
        if($input = Input::except('_token')){
            $rules = [
                'id'=>'required',
                'phone' => 'required|unique:users,phone',
                'password' => 'required|between:6,16'
            ];
            $messages = [
                'id.required' => '非法请求',
                'phone.required' => '电话号码为空',
                'phone.unique' => '电话号码已存在',
                'password.required' => '密码不能为空',
                'password.between' => '密码长度在6~16位'
            ];

            $validator = Validator::make($input,$rules,$messages);
            if($validator->passes()) {
                if (User::where('id', $input['id'])->update($input)) {
                    return back()->with('msg', '修改成功！');
                } else {
                    return back()->with('errors', '修改失败！');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','Error');
        }
    }
    public function saveAuth()
    {
        if($input = Input::except('_token')) {
            if (User::where('id', $input['id'])->update($input)) {
                return back()->with('msg2', '修改成功！');
            } else {
                return back()->with('msg2', '修改失败！');
            }
        }else{
            return back()->with('msg2','Error');
        }
    }
}
