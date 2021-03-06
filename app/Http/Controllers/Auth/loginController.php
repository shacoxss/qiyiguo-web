<?php

namespace App\Http\Controllers\Auth;

use App\Model\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
require('../vendor/gee-team/gt-php-sdk/lib/class.geetestlib.php');

class loginController extends Controller
{
    //用户登录
    public function login()
    {
        if(session('user')){
            return redirect('/');
        }
        return view('auth.login');
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
                $input = Input::except('_token');
                $user = Users::where('phone',$input['phone'])->first();
                if( empty($user) || md5($input['password']) !=$user->password){
                    return response()->json('用户名或密码错误！');
                }else{
                    //更新最后登录时间，存入session
                    $data['lastlogin_at'] = date('Y-m-d H:i:s',time());
                    Users::where('id',$user->id)->update($data);
                    session(['user'=>$user]);
                    //记住密码
                    if($input['remember']){
                        Cookie::queue('phone', $input['phone'], 3600);
                        Cookie::queue('password', $input['password'], 3600);
                    }
                    return response()->json('success');
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
    //注销退出登录
    public function logout()
    {   //销毁session
        session(['user'=>null]);
        //销毁cookie
        if(!empty($_COOKIE['phone']) || !empty($_COOKIE['password'])) {
            Cookie::queue('phone', null , -1);
            Cookie::queue('password', null , -1);
        }
        return redirect('/');
    }
    //手机号直接登录
    public function loginMobile()
    {
        if($input = Input::except('_token')){
            if($input['code'] = session('code')){
                $user = Users::where('phone',$input['phone'])->first();
                if($user){
                    session(['user'=>$user]);
                    return response()->json('success');
                }else{
                    return response()->json('手机号码不存在！');
                }
            }else{
                return response()->json('验证码错误！');
            }
        }else{
            return view('auth.loginMobile');
        }
    }
    //微信登陆
    public function weixinWeb()
    {
        return \Socialite::with('weixinweb')->redirect();
    }

    public function weixinWebCallback()
    {
        $oauthUser = \Socialite::with('weixinweb')->user();
        //登陆成功处理
        $data['binding_weixin'] = 1;
        $data['wx_open_id'] = $oauthUser->getId();
        if(!isset(session('user')->nickname)){
            $data['nickname'] = $oauthUser->getNickname();
        }
        if(!isset(session('user')->head_img)){
            $data['head_img'] = $oauthUser->getAvatar();
        }
        $user = User::where('wx_open_id',$oauthUser->getId())->first();


        if(isset(session('user')->phone)){
            if($user){
                $url = url('member/userProfile');
                echo "<script>window.parent.location.href = '".$url."';</script>";
            }else{
                //未绑定
                $user = session('user');
                if(Users::where('id',$user->id)->update($data)){
                    $user = Users::where('id',$user->id)->first();
                    session(['user'=>$user]);
                    $url = url('member/userProfile');
                    echo "<script>window.parent.location.href = '".$url."';</script>";
                }
            }
        }else{
            if($user){
                $input['lastlogin_at'] = date('Y-m-d H:i:s',time());
                Users::where('id',$user->id)->update($input);
                session(['user'=>$user]);
                $url = url('/');
                echo "<script>window.parent.location.href = '".$url."';</script>";
            }else{
                $data['lastlogin_at'] = date('Y-m-d H:i:s',time());
                if($user = Users::create($data)){
                    session(['user'=>$user]);
                    $url = url('/');
                    echo "<script>window.parent.location.href = '".$url."';</script>";
                }
            }
        }

    }
    //QQ登陆
    public function qq()
    {
        return \Socialite::with('qq')->redirect();

    }

    public function qqCallback()
    {
        $oauthUser = \Socialite::with('qq')->user();
        //登陆成功处理
        $data['binding_qq'] = 1;
        $data['qq_open_id'] = $oauthUser->getId();
        if(!isset(session('user')->nickname)){
            $data['nickname'] = $oauthUser->getNickname();
        }
        if(!isset(session('user')->head_img)){
            $data['head_img'] = $oauthUser->getAvatar();
        }
        $user = User::where('qq_open_id',$oauthUser->getId())->first();

        //绑定
        if(isset(session('user')->phone)){
            if($user){
                $url = url('member/userProfile');
                echo "<script>window.parent.location.href = '".$url."';</script>";
            }else{
                //未绑定
                $user = session('user');
                if(Users::where('id',$user->id)->update($data)){
                    $user = Users::where('id',$user->id)->first();
                    session(['user'=>$user]);
                    $url = url('member/userProfile');
                    echo "<script>window.parent.location.href = '".$url."';</script>";
                }
            }
        }else{
        //登陆
            if($user){
                $input['lastlogin_at'] = date('Y-m-d H:i:s',time());
                Users::where('id',$user->id)->update($input);
                session(['user'=>$user]);
                $url = url('/');
                echo "<script>window.parent.location.href = '".$url."';</script>";
            }else{
                $data['lastlogin_at'] = date('Y-m-d H:i:s',time());
                if($user = Users::create($data)){
                    session(['user'=>$user]);
                    $url = url('/');
                    echo "<script>window.parent.location.href = '".$url."';</script>";
                }
            }
        }
    }
    //微博登陆
    public function weibo()
    {
        return \Socialite::with('weibo')->redirect();
    }

    public function weiboCallback()
    {
        $oauthUser = \Socialite::with('weibo')->user();
        //登陆成功处理
        $data['binding_weibo'] = 1;
        $data['wb_open_id'] = $oauthUser->getId();
        if(!isset(session('user')->nickname)){
            $data['nickname'] = $oauthUser->getNickname();
        }
        if(!isset(session('user')->head_img)){
            $data['head_img'] = $oauthUser->getAvatar();
        }
        $user = User::where('wb_open_id',$oauthUser->getId())->first();


        if(isset(session('user')->phone)){
            if($user){
                $url = url('member/userProfile');
                echo "<script>window.parent.location.href = '".$url."';</script>";
            }else{
                //未绑定
                $user = session('user');
                if(Users::where('id',$user->id)->update($data)){
                    $user = Users::where('id',$user->id)->first();
                    session(['user'=>$user]);
                    $url = url('member/userProfile');
                    echo "<script>window.parent.location.href = '".$url."';</script>";
                }
            }
        }else{
            if($user){
                $input['lastlogin_at'] = date('Y-m-d H:i:s',time());
                Users::where('id',$user->id)->update($input);
                session(['user'=>$user]);
                $url = url('/');
                echo "<script>window.parent.location.href = '".$url."';</script>";
            }else{
                $data['lastlogin_at'] = date('Y-m-d H:i:s',time());
                if($user = Users::create($data)){
                    session(['user'=>$user]);
                    $url = url('/');
                    echo "<script>window.parent.location.href = '".$url."';</script>";
                }
            }
        }

    }
    public function loginSuccess()
    {
        return view('auth.loginSuccess');
    }
}
