<?php

namespace App\Http\Controllers\Member;

use App\Model\Message;
use App\Model\Users;
use App\Models\Archive\Archive;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;

class messageController extends Controller
{
    public function index()
    {
        $user = session('user');
        $messages = Message::where('user_id',$user->id)->where('is_del',0)->orderBy('updated_at','desc')->get();
        foreach($messages as $v){
            $v->user = Users::where('id',$v->user_id)->first();
        }
        return view('message.index',compact('messages'));
    }

    public function nopass()
    {
        if($input = Input::except('_token')){
                $archive = Archive::where('id',$input['id'])->first();
                $data['archive_id'] = $archive->id;
                $data['user_id'] = $archive->user_id;
                $data['reviewed_id'] = session('user')->id;
                if(!empty($input['other'])){
                    $data['message'] = trim($input['other']);
                }else{
                    $data['message_no'] = $input['message_no'];
                    $data['message_info'] = "您发布的文章《".$archive->title."》没有通过审核，请修改后提交！";
                    switch ($data['message_no']) {
                        case '2':
                            $data['message'] = "请不要发布涉及军事·政治·宗教·信仰等信息奇异果聚合旨在提供原创的直播相关内容，请不要发布无关内容。";
                            break;
                        case '3':
                            $data['message'] = "内容质量度太差，我们检测到您发布的文章在搜索引擎(百度、360等)存在大量相似文章。奇异果聚合旨在提供原创的直播相关内容，请发布原创信息。";
                            break;
                        default:
                            $data['message'] = "您所发布的内容不符合奇异果要求，请检查后重新发布！";
                            break;
                    }
                }
            Message::where('archive_id',$archive->id)->delete();
            if(Message::create($data)){
                return 'success';
            }else{
                return 'error';
            }
        }else{
            return 'error';
        }
    }

    public function change()
    {
        if($input = Input::except('_token')){
            $data['view'] = 1;
            Message::where('id',$input['id'])->update($data);
            $message['sum'] = Message::where('user_id',session('user')->id)->where('view',0)->count();
            if($message['sum'] > 9){
                $message['sum'] = '9+';
            }
            $info = Message::where('user_id',session('user')->id)->where('view',0)->orderBy('updated_at','desc')->take(3)->get();
            session(['message_sum'=>$message['sum']]);
            session(['message'=>$info]);
            return 'success';
        }else{
            return 'error';
        }
    }

    public function destroy()
    {
        if($input = Input::except('_token')){
            $ids = explode(',',$input['ids']);
            $data['is_del'] = 1;
            foreach($ids as $v){
                Message::where('id',$v)->update($data);
            }
            $message['sum'] = Message::where('user_id',session('user')->id)->where('view',0)->count();
            if($message['sum'] > 9){
                $message['sum'] = '9+';
            }
            $info = Message::where('user_id',session('user')->id)->where('view',0)->orderBy('updated_at','desc')->take(3)->get();
            session(['message_sum'=>$message['sum']]);
            session(['message'=>$info]);
            return 'success';
        }else{
            return 'error';
        }
    }
}
