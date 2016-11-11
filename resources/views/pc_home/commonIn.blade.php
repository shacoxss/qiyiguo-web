<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

    <link href="{{asset('home/css/amazeui.min.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/js/skin/layer.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/css/all.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/css/details.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/css/list.css')}}" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="{{asset('home/js/jquery-3.1.0.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('pulgin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/amazeui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/base.js')}}"></script>
    <script src="http://static.geetest.com/static/tools/gt.js"></script>
    @section('title')
    @show
    <style>
        .am-icon-search:hover{
            cursor:pointer;
        }
    </style>
</head>

<body>
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed goto-container">
    <a href="#top" title="">
        <img class="am-gotop-icon-custom goto-img" src="{{asset('home/images/gotop.jpg')}}" />
    </a>
</div>

<header class="am-topbar header tab-header">
    <div class="content">
        <h1 class="am-topbar-brand header-logo-brand">
            <a href="{{route('index')}}" class="logo tab-logo"></a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse header-ul tab-header-ul" id="doc-topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav tab-ul-nav">
                <li>
                    <a href="{{url('article')}}">文章</a>
                </li>
                <li>
                    <a href="{{url('video')}}">视频</a>
                </li>

                <li class="tab-divider">
                    <a href="{{route('galleries.index')}}">图库</a>
                </li>
            </ul>
            <ul class="am-nav am-nav-pills am-topbar-nav tab-ul-nav tab-ul-nav-right">
                @foreach($hot_tags as $tag)
                <li>
                    <a href="{{$tag->url}}">{{ $tag->name }}</a>
                </li>
                @endforeach
                    <li class="am-dropdown tab-am-dropdown on" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;" style="color: #FFFFFF;">
                        全部标签 <span class="am-icon-caret-down"></span>
                    </a>
                </li>
            </ul>
            <form class="am-topbar-form am-topbar-left am-form-inline tab-search" role="search">
                <div class="am-form-group">
                    <input type="text" class="am-form-field am-input-sm tab-header-input" style="width: 104px;background: #333;border: 0px;border-radius: 5px;" placeholder="搜索" id="key">
                    <i class="am-icon-search"></i>
                </div>
            </form>
@if(empty(session('user')))
            <div class="am-topbar-right am-topbar-right-regist tab-regist">
                <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm header-btn tab-btn ">注册</button>
            </div>

            <div class="am-topbar-right  tab-login">
                <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm header-btn u-login tab-btn">登录</button>
            </div>
@else
            <div class="am-topbar-right already-l" style="margin-top:14px">
                <div class="am-dropdown" data-am-dropdown="{boundary: '.am-topbar'}">
                    <a href=""><span class="l-pic"><img src="{{session('user')->head_img}}" onerror="this.src='{{asset('img/100100.png')}}'"></span>

                        @if(session('user')->nickname)

                            <span class="l-txt" title="{{session('user')->nickname}}">{{mb_substr(session('user')->nickname,0,4)}}
                                @if(strlen(session('user')->nickname)>15)
                                    ...
                                @endif
                        </span><span class="am-icon-caret-down"></span></a>
                    @else
                        <span class="l-txt" title="{{session('user')->phone}}">{{mb_substr(session('user')->phone,0,5)}}...</span><span class="am-icon-caret-down"></span></a>
                    @endif

            <ul class="am-dropdown-content already-l-ul">
                        <li>

                            <a href="{{url('member/index')}}" target="_blank"><span class="menu-span menu-span1"></span>会员中心</a>

                        </li>
                        <li>

                            <a href="{{url('member/archives')}}" target="_blank"><span class="menu-span menu-span2"></span>我的稿件</a>

                        </li>
                        <li>
                            <a href="{{url('member/userCollect')}}" target="_blank"><span class="menu-span menu-span3"></span>我的收藏</a>

                        </li>
                        <li>

                            <a href="{{url('member/userProfile')}}" target="_blank"><span class="menu-span menu-span4"></span>修改资料</a>

                        </li>
                        <li>

                            <a href="{{url('auth/logout')}}" target="_blank"><span class="menu-span menu-span5"></span>退出 </a>

                        </li>

                    </ul>
                </div>
            </div>
@endif
        </div>
    </div>
    <div class="all-tabs" style=" border-top: 1px solid #666666;" data-hide="1">
        <div class="all-tabs-inside">
            <ul id="all_tag">
                @foreach($allTags as $v)
                <li>
                    <a href="{{$v->url}}">{{$v->name}}</a>
                </li>
                @endforeach
            </ul>
            <div class="am-g tab-inside-icon">
                <a href="javascript:;"><i class="am-icon-angle-double-down" data-row="1"></i></a>
            </div>
        </div>
    </div>
</header>
@section('content')
    @show

<div class="am-g footer ">
    <div class="am-g footer-box ">
        <div class="am-g block-1 ">
            <div class="am-u-sm-2 foot-width ">
                <img src="{{asset('images/logo-footer.png')}} " />
            </div>
            <div class="am-u-sm-2 foot-width ">
                <p class="block-title ">奇异果资讯</p>
                <ul class="block-item-ul ">
                    <li>
                        <a href="{{url('qyg/news')}}">行业新闻</a>
                    </li>
                    <li>
                        <a href="{{url('qyg/notice')}}">奇异果公告</a>
                    </li>
                    <li>
                        <a href="{{url('qyg/active')}}">热门活动</a>
                    </li>
                </ul>
            </div>
            <div class="am-u-sm-2 foot-width ">
                <p class="block-title ">微信公众号</p>
                <img src="{{asset('home/images/gzh.jpg')}} " />
            </div>
            <div class="am-u-sm-2 foot-width ">
                <p class="block-title ">微博二维码</p>
                <img src="{{asset('home/images/wxerweima.jpg ')}}" />
            </div>
            <div class="am-u-sm-2 foot-width ">
                <p class="block-title ">QQ群二维码</p>
                <img src="{{asset('home/images/qq.jpg ')}}" />
            </div>
        </div>

        <div class="am-g interlink ">
            <ul>
                @foreach($links as $v)
                    <li>
                        <a href="{{$v->link_url}}">{{$v->name}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="am-g ">
            <div class="am-u-sm-6 copy-l ">
						<span>© 2016 qiyiguo.tv. All rights reserved 昆明尚合科技有限公司</br>
                            滇ICP备滇ICP备12006567号-20</span>
            </div>
            <div class="am-u-sm-6 copy-r ">
                <a href=" ">意见反馈</a>
                <a href=" ">招聘信息</a>
                <a href=" ">联系我们</a>
                <a href=" ">关于我们</a>
            </div>
        </div>
    </div>
</div>

<!--底部-->
@yield('scripts')
</body>

</html>
<script>
    $(function(){
        $(".all-tabs").hide();
        var url = "{{url('auth/startCaptcha')}}";
        var reg_url = "{{url('register')}}";
        var forget_url = "{{url('forget')}}";
        var qq_login = "{{url('auth/qq')}}";
        var wx_login = "{{url('auth/weixinWeb')}}";
        var wb_login = "{{url('auth/weibo')}}";
        var login = {
            init: function() {

                $('.u-login').click(function() {

                        layer.open({
                        type: 1,
                        title: false,
                        area: ['auto', 'auto'],
                        shift: 'left', //从左动画弹出
                        closeBtn: 0,
                        shadeClose: true,
                        zIndex:899990,
                            content: '<div class="login-pop"data-point="dlk"><div class="login-pop-close"></div><div class="login-pop-tab"><ul><li><a href="#" class="t-login current">登录</a></li><li><a href="'+reg_url+'" target="_blank">注册</a></li></ul></div><div class="login-pop-cont clearfix"><div class="c-item clearfix popLogin"><form method="post" action=""><input type="hidden" name="name" value="login"><input type="hidden" name="dopost" value="login"><input type="hidden" name="gourl" value=""><p><input class="ipt" type="text" name="userid" id="phone" placeholder="电话号码"></p><p><input class="ipt" type="password" name="pwd" id="password" placeholder="密码"></p><div class="toreg clearfix"><input class="btn-sub"type="button"value="登录" id="popup-submit"><p>没有账号？<a href="'+reg_url+'" title="马上注册" target="_blank">马上注册</a></p></div></form></div><div class="c-oth"><p>用第三方账号直接登录</p><div><a href="'+qq_login+'" class="btn-qq" title="QQ账号登录"data-point-2="qq"><span class="dy-icon dy-sina"></span><span>QQ账号登录</span></a></div><div><a href="'+wx_login+'" class="btn-wx" title="微信登录"data-point-2="qq"><span class="dy-icon dy-wx"></span><span>微信登录</span></a></div><div><a href="'+wb_login+'" class="btn-sina" title="微博登录"data-point-2="sina"><span class="dy-icon dy-qq"></span><span>微博登录</span></a></div><p class="forget-pass"><a href="'+forget_url+'" target="_blank">忘记密码？</a></p></div></div></div>'
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

        //全部标签
        $(".am-dropdown-toggle").click(function(event){
            if($(".all-tabs").data('hide')){
                $(".all-tabs").show();
                $(".all-tabs").data('hide',0);
            }else{
                $(".all-tabs").hide();
                $(".all-tabs").data('hide',1);
            }
            event.stopPropagation();
        })
        $('.all-tabs').click(function (event) {
            event.stopPropagation();
        })
        //加载更多标签
        $('.am-icon-angle-double-down').click(function(){
            var _token = "{{csrf_token()}}";
            var row =$(this).data('row');
            $.ajax({
                url:"{{url('more')}}",
                type:"post",
                data:{_token:_token,row:row},
                success:function(data){
                    if(data=='null'){
                        layer.msg('没有更多了');
                    }else{
                        row +=1;
                        $('.am-icon-angle-double-down').data('row',row);
                        for(var i= 0;i<data.length;i++){
                            $('#all_tag').append('<li>'+
                                    '<a href="'+data[i].url+'">'+data[i].name+'</a>'+
                                    '</li>');
                        }
                    }
                }
            });
        });
        $('body').click(function(event){
                $(".all-tabs").hide();
            $(".all-tabs").data('hide',1);
        })
    })
    $(function(){
        $('.tab-regist').click(function(){
            location.href = "{{url('register')}}";
        });
    })
    //搜索
    $(function(){

        $('.am-icon-search').click(function(){
           var key = $('#key').val();
            if(key.length==0){
                layer.msg('请输入要搜索的内容！');
            }else{
                var token = "{{csrf_token()}}";
                $.ajax({
                    type:'post',
                    url:"{{url('search')}}",
                    data:{_token:token,key:key},
                    success:function(data){
                        if(data=='error'){
                            layer.msg('错误！');
                        }else if(data=='none'){
                            layer.msg('对不起，没有找到相关内容！');
                        }else{
                            location.href = "{{url('search/result')}}"+'/'+data.key;
                        }
                    }
                })
            }
        });
    });
</script>