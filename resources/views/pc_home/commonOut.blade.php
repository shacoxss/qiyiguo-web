<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <link href="{{asset('home/css/amazeui.min.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/css/all.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/css/list.css')}}" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="{{asset('home/js/jquery-3.1.0.min.js')}}"></script>
    <script src="{{asset('home/js/amazeui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/base.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/list.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/layer.js')}}"></script>
    <script src="http://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="http://static.geetest.com/static/tools/gt.js"></script>


    <title></title>
</head>

<body>
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed goto-container">
    <a href=" " title="">
        <img class="am-gotop-icon-custom goto-img" src="{{asset('home/images/gotop.jpg')}}" />
    </a>
</div>
<!--头部	-->
<div class="am-g topic-content">

    <div class="content ">
        <div class="dd-ewm"></div>
        <div class="am-u-lg-9 topic-left">
            <span class="topic-title">奇异果聚合-看点有意思的&nbsp;|&nbsp;</span>
            <a href="#"><span class="am-icon-weibo"></span></a>
            <a href="#" class="dd-weixin"><span class="am-icon-weixin"></span></a>
            <a href="#" class="dd-weixin-d"><span class="am-icon-angle-down"></span></a>
            <span class="topic-title">|&nbsp;</span>
        </div>
        <div class="am-u-lg-3 topic-right">

            <form class="am-topbar-form  am-form-inline topic-form" role="search">
                <div class="am-form-group ">
                    <input type="text" class="am-form-field topic-search" placeholder="关键词">
							<span class="am-input-group-btn span-inline ">
        						<button class="am-btn am-btn-default topic-button" type="button"><span class="am-icon-search"></span> </button>
							</span>
                </div>
            </form>

        </div>

    </div>

</div>

<header class="am-topbar header">
    <div class="content">
        <h1 class="am-topbar-brand header-logo-brand">
            <a href="#" class="logo"></a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse header-ul" id="doc-topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li>
                    <a href=""><em>/</em>首页</a>
                </li>
                <li>
                    <a href=""><em>/</em>优播</a>
                </li>
                <!--<li><em>/</em>
                    <a href="">游戏</a>
                </li>-->
                <li>
                    <a href=""><em>/</em>视频</a>
                </li>
                <li>
                    <a href=""><em>/</em>图库</a>
                </li>
                <li>
                    <a href=""><em>/</em>天梯<em>/</em></a>
                </li>
            </ul>
@if(!session('user'))
            <div class="am-topbar-right am-topbar-right-regist">
            <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm header-btn ">注册</button>
        </div>

        <div class="am-topbar-right">
            <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm header-btn u-login">登录</button>
        </div>
@else
            <div class="am-topbar-right already-l">
                <div class="am-dropdown" data-am-dropdown="{boundary: '.am-topbar'}">
                    <a href="{{url('member/index')}}"><span class="l-pic"><img src="{{session('user')->head_img}}"></span>
                        <span class="l-txt">{{session('user')->name}}</span><span class="am-icon-caret-down"></span></a>

                    <!--<button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm am-dropdown-toggle">其他 <span class="am-icon-caret-down"></span></button>-->
                    <ul class="am-dropdown-content already-l-ul">
                        <li>

                            <a href="{{url('member/index')}}" class="user_icon1" target="_blank"><span class="menu-span menu-span1"></span>会员中心</a>

                        </li>
                        <li>

                            <a href="{{url('member/userArchivesList')}}" class="user_icon1" target="_blank"><span class="menu-span menu-span2"></span>我的稿件</a>

                        </li>
                        <li>
                            <a href="{{url('member/userCollect')}}" class="user_icon1" target="_blank"><span class="menu-span menu-span3"></span>我的收藏</a>

                        </li>
                        <li>

                            <a href="{{url('member/userProfile')}}" class="user_icon1" target="_blank"><span class="menu-span menu-span4"></span>修改资料</a>

                        </li>
                        <li>

                            <a href="{{url('auth/logout')}}" class="user_icon1" target="_blank"><span class="menu-span menu-span5"></span>退出 </a>

                        </li>

                    </ul>
                </div>
            </div>
    @endif
        </div>
    </div>

</header>
<!--头部	-->
<!--banner-->

@section('content')
@show

        <!--banner-->
<!--底部-->
<div class="am-g footer">
    <div class="am-g footer-box">
        <div class="am-g block-1">
            <div class="am-u-sm-2 foot-width">
                <img src="{{asset('home/images/logo-footer.png')}}" />
            </div>
            <div class="am-u-sm-2 foot-width">
                <p class="block-title">奇异果资讯</p>
                <ul class="block-item-ul">
                    <li>
                        <a href="">行业新闻</a>
                    </li>
                    <li>
                        <a href="">奇异果公告</a>
                    </li>
                    <li>
                        <a href="">热门活动</a>
                    </li>
                </ul>
            </div>
            <div class="am-u-sm-2 foot-width">
                <p class="block-title">微信公众号</p>
                <img src="{{asset('home/images/gzh.jpg')}}" />
            </div>
            <div class="am-u-sm-2 foot-width">
                <p class="block-title">微博二维码</p>
                <img src="{{asset('home/images/wxerweima.jpg')}}" />
            </div>
            <div class="am-u-sm-2 foot-width">
                <p class="block-title">QQ群二维码</p>
                <img src="{{asset('home/images/qq.jpg')}}" />
            </div>
        </div>

        <div class="am-g interlink">
            <ul>
                <li>
                    <a href="">快科技</a>
                </li>
                <li>
                    <a href="">快科技</a>
                </li>
                <li>
                    <a href="">快科技</a>
                </li>
                <li>
                    <a href="">快科技</a>
                </li>
                <li>
                    <a href="">快科技</a>
                </li>

            </ul>
        </div>
        <div class="am-g">
            <div class="am-u-sm-6 copy-l">
						<span>© 2016 qiyiguo.tv. All rights reserved 昆明尚合科技有限公司</br>
                            滇ICP备滇ICP备12006567号-20</span>
            </div>
            <div class="am-u-sm-6 copy-r">
                <a href="">意见反馈</a>
                <a href="">招聘信息</a>
                <a href="">联系我们</a>
                <a href="">关于我们</a>
            </div>
        </div>
    </div>
</div>
<!--底部-->

</body>

</html>
<script>
    $(function(){
        var url = "{{url('auth/startCaptcha')}}";
        var reg_url = "{{url('register')}}";
        var forget_url = "{{url('forget')}}";
        var qq_login = "{{url('auth/qq')}}";
        var wx_login = "{{url('auth/weixin')}}";
        var login = {
            init: function() {

                $('.u-login').click(function() {

                    layer.open({
                        type: 1,
                        title: false,
                        closeBtn: 0,
                        shadeClose: true,
                        zIndex:899990,
                        content: '<div class="login-pop"data-point="dlk"><div class="login-pop-close"></div><div class="login-pop-tab"><ul><li><a href="#" class="t-login current">登录</a></li><li><a href="'+reg_url+'" target="_blank">注册</a></li></ul></div><div class="login-pop-cont clearfix"><div class="c-item clearfix popLogin"><form method="post" action=""><input type="hidden" name="name" value="login"><input type="hidden" name="dopost" value="login"><input type="hidden" name="gourl" value=""><p><input class="ipt" type="text" name="userid" id="phone" placeholder="电话号码"></p><p><input class="ipt" type="password" name="pwd" id="password" placeholder="密码"></p><div class="toreg clearfix"><input class="btn-sub"type="button"value="登录" id="popup-submit"><p>没有账号？<a href="'+reg_url+'" title="马上注册" target="_blank">马上注册</a></p></div></form></div><div class="c-oth"><p>用第三方账号直接登录</p><div><a href="'+qq_login+'" class="btn-qq"target="_blank"title="QQ账号登录"data-point-2="qq"><span class="dy-icon dy-sina"></span><span>QQ账号登录</span></a></div><div><a href="'+wx_login+'" class="btn-wx"target="_blank"title="微信登录"data-point-2="qq"><span class="dy-icon dy-wx"></span><span>微信登录</span></a></div><p class="forget-pass"><a href="'+forget_url+'" target="_blank">忘记密码？</a></p></div></div></div>'
                    })
                    $(".t-login").on("click", function() {
                        $(".t-login").addClass("current");
                        $(".t-reg").removeClass("current");
                        $(".popLogin").removeClass("hide");
                        $(".popReg").addClass("hide");
                    })
                    $(".t-reg").on("click", function() {
                        $(".t-reg").addClass("current");
                        $(".t-login").removeClass("current");
                        $(".popLogin").addClass("hide");
                        $(".popReg").removeClass("hide");
                    })
                    $(".login-pop-close").on("click", function() {
                        layer.closeAll();
                    })

                    // 代码详细说明
                    var handlerPopup = function (captchaObj) {
                        // 注册提交按钮事件，比如在登陆页面的登陆按钮
                        $("#popup-submit").click(function () {
                            // 此处省略在登陆界面中，获取登陆数据的一些步骤
                            // 先校验是否点击了验证码

                            var validate = captchaObj.getValidate();
                            var phone = $("#phone").val();
                            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                            if(!myreg.test(phone))
                            {
                                layer.msg('请输入有效的手机号码！');
                                return;
                            }
                            var password = $("#password").val();
                            if(password.length == 0){
                                layer.msg('密码不能为空！');
                                return;
                            }
                            if (!validate) {
                                layer.msg('请先完成验证！');
                                return;
                            }
                            // 提交验证码信息，比如登陆页面，你需要提交登陆信息，用户名和密码等登陆数据
                            $.ajax({
                                url: "{{url('auth/verifyLogin')}}",
                                type: "post",
                                // dataType: "json",
                                data: {
                                    // 用户名和密码等其他数据，自己获取，不做演示
                                    phone:phone,
                                    password:password,
                                    remember:0,
                                    _token:"{{csrf_token()}}",
                                    geetest_challenge: validate.geetest_challenge,
                                    geetest_validate: validate.geetest_validate,
                                    geetest_seccode: validate.geetest_seccode
                                },
                                // 这里是正确返回处理结果的处理函数
                                // 假设你就返回了1，2，3
                                // 当然，正常情况是返回JSON数据
                                success: function (result) {
                                    if(result=='success'){
                                        location.reload();
                                    }else{
                                        layer.msg(result);
                                    }
                                },error:function(data){
                                    console.log(data)
                                }
                            });
                        });
                        captchaObj.bindOn("#popup-submit");
                        captchaObj.appendTo(".login-pop");
                    };

                    $.ajax({
                        // 获取id，challenge，success（是否启用failback）
                        url:  url+ "/"+(new Date()).getTime(), // 加随机数防止缓存
                        type: "get",
                        dataType: "json",
                        success: function (data) {
                            // 使用initGeetest接口
                            // 参数1：配置参数
                            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
                            initGeetest({
                                gt: data.gt,
                                challenge: data.challenge,
                                product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                                offline: !data.success // 表示用户后台检测极验服务器是否宕机，与SDK配合，用户一般不需要关注
                            }, handlerPopup);
                        }
                    });


                });
            }
        }
        login.init();

    })
</script>