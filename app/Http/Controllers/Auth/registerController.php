<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Users;
use Illuminate\Support\Facades\Input;
require('../vendor/gee-team/gt-php-sdk/lib/class.geetestlib.php');
require('../vendor/sms/ccpRestSmsSDK.php');
class RegisterController extends Controller
{
    public function reg()
    {
        if($input = Input::except('_token')){
            if($input['code'] == session('code')){
                session(['code'=>null]);
                $data['password'] = md5($input['password']);
                $data['phone'] = $input['phone'];
                $data['lastlogin_at'] = date('Y-m-d H:i:s',time());
                if(strlen($input['password'])<6||strlen($input['password'])>16){
                    return response()->json('密码长度在6~16位！');
                }else{
                    if($user = Users::create($data)){
                        session(['user'=>$user]);
                        return response()->json('success');
                    }else{
                        return response()->json('error');
                    }
                }
            }else{
                return response()->json('验证码错误！');
            }

        }else{
            return view('auth.register');
        }
    }

    public function binding()
    {
        if($input = Input::except('_token')){
            if(1||$input['code'] == session('code')){
                $user = session('user');
                $data['phone'] = $input['phone'];
                $data['lastlogin_at'] = date('Y-m-d H:i:s',time());
                //如果手机号存在，合并
                $phone = Users::where('phone',$data['phone'])->first();
                if($phone){
                    Users::where('id',$user->id)->delete();
                    if($user->binding_qq){
                        $data['binding_qq'] = 1;
                        $data['qq_open_id'] = $user->qq_open_id;
                    }elseif($user->binding_weixin){
                        $data['binding_weixin'] = 1;
                        $data['wx_open_id'] = $user->wx_open_id;
                    }elseif($user->binding_weibo){
                        $data['binding_weibo'] = 1;
                        $data['wb_open_id'] = $user->wb_open_id;
                    }else{
                        return response()->json('error');
                    }
                    if(Users::where('phone',$data['phone'])->update($data)){
                        $user = Users::where('phone',$data['phone'])->first();
                        session(['user'=>$user]);
                        return response()->json('success');
                    }else{
                        return response()->json('error');
                    }
                }else{
                    if(Users::where('id',$user->id)->update($data)){
                        $user = Users::where('id',$user->id)->first();
                        session(['user'=>$user]);
                        return response()->json('success');
                    }else{
                        return response()->json('error');
                    }
                }
            }else{
                return response()->json('验证码错误0！');
            }
        }else{
            if(!session('user')){
                return view('auth.register');
            }else {
                return view('auth.bindingPhone');
            }
        }
    }
    //验证码
    public function startCaptcha()
    {
        $GtSdk = new \GeetestLib();

        $return = $GtSdk->register();
        if ($return) {
            $_SESSION['gtserver'] = 1;
            $result = array(
                'success' => 1,
                'gt' => CAPTCHA_ID,
                'challenge' => $GtSdk->challenge
            );
            echo json_encode($result);
        }else{
            $_SESSION['gtserver'] = 0;
            $rnd1 = md5(rand(0,100));
            $rnd2 = md5(rand(0,100));
            $challenge = $rnd1 . substr($rnd2,0,2);
            $result = array(
                'success' => 0,
                'gt' => CAPTCHA_ID,
                'challenge' => $challenge
            );
            $_SESSION['challenge'] = $result['challenge'];
            echo json_encode($result);
        }
    }
    //手机号登陆验证
    public function verifyLogin()
    {
        $GtSdk = new \GeetestLib();

        if ($_SESSION['gtserver'] == 1) {
            $result = $GtSdk->validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode']);
            if ($result == TRUE) {
                //发送验证码
                $input = Input::except('_token');
                $number = substr(str_shuffle("0123456789"),0,4);
                $coder = "QYG-".$number;
                //存入session
                session(['code'=>$number]);
                //发送短信验证码
                //主帐号,对应开官网发者主账号下的 ACCOUNT SID
                $accountSid= '8a48b55152114d540152115b2936003c';
                //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
                $accountToken= '4340948ee7754e2da647904ddd5bf010';
                //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
                $appId='8aaf070857a243ad0157a81e238b0557';
                //请求地址
                //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
                //生产环境（用户应用上线使用）：app.cloopen.com
                $serverIP='app.cloopen.com';
                //请求端口，生产环境和沙盒环境一致
                $serverPort='8883';
                //REST版本号，在官网文档REST介绍中获得。
                $softVersion='2013-12-26';
                $rest = new \REST($serverIP,$serverPort,$softVersion);
                $rest->setAccount($accountSid,$accountToken);
                $rest->setAppId($appId);
                $result = $rest->sendTemplateSMS($input['phone'],array($coder,'2'),122216);

                if($result == NULL ) {
                    return response()->json(['no'=>1,'msg'=>'result error!']);
                }
                if($result->statusCode!=0) {
                    $errorCode =   "error code :" . $result->statusCode . "<br>";
                    $errorMsg =   "error msg :" . $result->statusMsg . "<br>";
                    //TODO 添加错误处理逻辑
                    return response()->json(['no'=>$errorCode,'msg'=>$errorMsg]);
                }else{
                    return response()->json('sendsuccess');
                }
            } else if ($result == FALSE) {
                return response()->json('验证失败！');
            } else {
                return response()->json('FORBIDDEN！');
            }
        }else{
            if ($GtSdk->get_answer($_POST['geetest_validate'])) {
                echo "yes";
            }else{
                echo "no";
            }
        }
    }
    //检查电话号码是否存在
    public function checkPhone()
    {
        if($input = Input::except('_token')){
            $user = Users::where('phone',trim($input['phone']))->first();
            if($user){
                return response()->json('手机号已存在！');
            }else{
                return response()->json('success');
            }
        }else{
            return false;
        }
    }
    public function regSuccess()
    {
        return view('auth.regSuccess');
    }
}
