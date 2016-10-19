<?php

namespace App\Http\Controllers\Member;

use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $cate_list = Category::sort($category);
        foreach($cate_list as $v){
            if(Category::where('cate_pid',$v->cate_id)->count()){
                $v->isLast = 0;
            }else{
                $v->isLast = 1;
            }
        }
        return view('member.masterCategoryList',compact('cate_list'));
    }

    public function create()
    {
        $category = Category::get();
        $cate_list = Category::sort($category);
        return view('member.masterCategoryAdd',compact('cate_list'));
    }

    public function store()
    {
        if($input = Input::except('_token','cate_background')){
            if(Input::file('cate_background')){
                $input['cate_background'] = $this->uploadBackground(Input::file('cate_background'));
            }else{
                return back()->with('errors','请上传背景！');
            }

            $input['updated_at'] = date('Y-m-d H:i:s',time());
            $rules = [
                'cate_name'=>'required|unique:category,cate_name',
                'cate_pid'=>'required',
                'cate_logo'=>'required',
            ];
            $message = [
                'cate_name.required'=>'栏目名不能为空！',
                'cate_name.unique'=>'栏目名重复！',
                'cate_pid.required'=>'父栏目不能为空！',
                'cate_logo.required'=>'请上传logo！',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $rs = Category::create($input);
                if($rs){
                    return back()->with('msg','栏目添加成功！');
                }else{
                    return back()->with('msg','栏目添加失败！');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','错误！');
        }

    }

    public function uploadBackground($file)
    {
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
            return $filepath;
        }

    }

    public function delete($id)
    {
        if(is_numeric($id)){
            if(Category::where('cate_id',$id)->first()){
                if(Category::where('cate_pid',$id)->count()){
                    return back()->with('msg','请先删除此栏目的子栏目！');
                }else{
                    if(Category::where('cate_id',$id)->delete()){
                        return back()->with('msg','删除成功！');
                    }else{
                        return back()->with('msg','删除失败！');
                    }
                }
            }else{
                return back()->with('msg','栏目不存在！');
            }
        }else{
            return back()->with('msg','非法请求！');
        }
    }

    public function edit($id)
    {
        if(is_numeric($id)){
            $cate_info = Category::where('cate_id',$id)->first();
            if($cate_info){
                $category = Category::get();
                $cate_list = Category::sort($category);
                return view('member.masterCategoryEdit',compact('cate_list','cate_info'));
            }else{
                return back()->with('msg','栏目不存在！');
            }
        }else{
            return back()->with('msg','非法请求！');
        }
    }
    public function update($id)
    {
        if($input = Input::except('_token','cate_background')){
            if(Input::file('cate_background')){
                $input['cate_background'] = $this->uploadBackground(Input::file('cate_background'));
            }else if($input['cate_background'] = Input::only('cate_background')){
                $input['cate_background'] = Input::only('cate_background');
            }else{
                return back()->with('errors','请上传背景！');
            }

            $input['updated_at'] = date('Y-m-d H:i:s',time());
            $rules = [
                'cate_name'=>'required|unique:category,cate_name',
                'cate_pid'=>'required',
                'cate_logo'=>'required',
            ];
            $message = [
                'cate_name.required'=>'栏目名不能为空！',
                'cate_name.unique'=>'栏目名重复！',
                'cate_pid.required'=>'父栏目不能为空！',
                'cate_logo.required'=>'请上传logo！',
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $rs = Category::where('cate_id',$id)->update($input);
                if($rs){
                    return back()->with('msg','栏目修改成功！');
                }else{
                    return back()->with('msg','栏目修改失败！');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return back()->with('errors','错误！');
        }

    }
}
