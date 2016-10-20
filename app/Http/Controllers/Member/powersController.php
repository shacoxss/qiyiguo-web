<?php

namespace App\Http\Controllers\Member;

use App\Model\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class powersController extends Controller
{
    public function index()
    {
        $users = Users::where('master',1)->orderBy('id','desc')->get();
        $count = Users::where('master',1)->count();
        return view('member.masterPowers',compact('users','count'));
    }

    public function addMaster()
    {
        if($input = Input::except('_token')){
            if($input['id']){
                $data['master'] = 1;
                if(Users::where('id',$input['id'])->first()){
                    if(Users::where('id',$input['id'])->update($data)){
                        return back()->with('msg','管理员添加成功！');
                    }else{
                        return back()->with('msg','管理员添加失败');
                    }
                }else{
                    return back()->with('msg','用户不存在');
                }

            }else{
                return back()->with('msg','错误');
            }
        }else{
            return back()->with('msg','错误2');
        }
    }

    public function masterPowerEdit()
    {
        if($input = Input::except('_token')){
            if($input['id']){
                $data['master'] = 1;
                $data['user_manage'] = isset($input['user_manage'])?1:0;
                $data['content_manage'] = isset($input['content_manage'])?1:0;
                $data['tag_manage'] = isset($input['tag_manage'])?1:0;
                $data['cat_manage'] = isset($input['cat_manage'])?1:0;
                $data['user_manage'] = isset($input['user_manage'])?1:0;
                $data['root_manage'] = isset($input['root_manage'])?1:0;
                $data['global_manage'] = isset($input['global_manage'])?1:0;
                if($data['user_manage']&&$data['content_manage']&&$data['tag_manage']&&$data['cat_manage']&&$data['user_manage']&&$data['root_manage']&&$data['global_manage']){
                    $data['admin'] = 1;
                }
            if(Users::where('id',$input['id'])->first()){
                if(Users::where('id',$input['id'])->update($data)){
                    return back()->with('edit_msg','权限修改成功！');
                }else{
                    return back()->with('edit_msg','权限修改失败');
                }
            }else{
                return back()->with('edit_msg','用户不存在');
            }

        }else{
            return back()->with('edit_msg','错误');
        }
    }else{
        return back()->with('edit_msg','错误2');
    }

    }

    public function delMaster()
    {
        if($input = Input::except('_token')){

            if($input['id']){
                $data['master'] = 0;
                if(Users::where('id',$input['id'])->first()){
                    if(Users::where('id',$input['id'])->update($data)){
                        return response()->json('success');
                    }else{
                        return response()->json('error1');
                    }
                }else{
                    return response()->json('error2');
                }

            }else{
                return response()->json('error3');
            }
        }else{
            return response()->json('error4');
        }
    }
}
