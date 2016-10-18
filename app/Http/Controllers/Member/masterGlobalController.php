<?php

namespace App\Http\Controllers\Member;

use App\Model\Globals;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class masterGlobalController extends Controller
{
    //
    public function index()
    {
        if($input = Input::except('_token')){
            if(!empty($input['id'])){
                if(Globals::where('id',$input['id'])->update($input)){
                    return back()->with('msg','设置修改成功！');
                }else{
                    return back()->with('msg','设置修改失败！');
                }
            }else{
                return back()->with('msg','非法操作！');
            }
        }else{
            $global = Globals::first();
            return view('member.masterGlobal',compact('global'));
        }
    }
}
