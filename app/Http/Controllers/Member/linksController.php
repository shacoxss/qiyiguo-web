<?php

namespace App\Http\Controllers\Member;

use App\Model\Globals;
use App\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class linksController extends Controller
{
    //
    public function index()
    {
        $links = Links::all();
        return view('links.index',compact('links'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function store()
    {
        if($input = Input::except('_token')){
            $rules = [
                'name'=>'required|unique:links,name',
                'link_url'=>'required|url'
            ];
            $message = [
                'name.required'=>'链接名不能为空',
                'name.unique'=>'链接已存在',
                'link_url.required'=>'链接不能为空',
                'link_url.url'=>'请填写正确的URL'
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                if(Links::create($input)){
                    return back()->with('msg','链接添加成功！');
                }else{
                    return back()->with('errors','链接添加失败！');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','非法请求！');
        }
    }

    public function edit($id)
    {
        $link = Links::where('id',$id)->first();
        return view('links.edit')->with('link',$link);
    }

    public function update($id)
    {
        if($input = Input::except('_token','_method')){
            $rules = [
                'name'=>'required',
                'link_url'=>'required|url'
            ];
            $message = [
                'name.required'=>'链接名不能为空',
                'link_url.required'=>'链接不能为空',
                'link_url.url'=>'请填写正确的URL'
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                if(Links::where('id',$id)->update($input)){
                    return back()->with('msg','链接修改成功！');
                }else{
                    return back()->with('errors','链接修改失败！');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','非法请求！');
        }
    }

    public function destroy($id)
    {
        $result = Links::where('id',$id)->delete();
        if($result){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }

    public function status()
    {
        if($input = Input::except('_token')){
            if($input['is_on']){
                $input['is_on'] = 0;
            }else{
                $input['is_on'] = 1;
            }
            if(Links::where('id',$input['id'])->update($input)){
                return 'success';
            }else{
                return 'error';
            }
        }else{
            return 'error';
        }
    }
}
