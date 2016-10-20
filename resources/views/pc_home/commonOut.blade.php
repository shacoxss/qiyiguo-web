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

            <!--<div class="am-topbar-right am-topbar-right-regist">
            <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm header-btn ">注册</button>
        </div>

        <div class="am-topbar-right">
            <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm header-btn u-login">登录</button>
        </div>-->

            <div class="am-topbar-right already-l">
                <div class="am-dropdown" data-am-dropdown="{boundary: '.am-topbar'}">
                    <a href="/member"><span class="l-pic"><img src="http://qzapp.qlogo.cn/qzapp/101317981/3CD76D25A9FB48DEEDFC30A7FE5F43DB/50"></span>
                        <span class="l-txt">璐祎yi</span><span class="am-icon-caret-down"></span></a>

                    <!--<button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm am-dropdown-toggle">其他 <span class="am-icon-caret-down"></span></button>-->
                    <ul class="am-dropdown-content already-l-ul">
                        <li>

                            <a href="" class="user_icon1" target="_blank"><span class="menu-span menu-span1"></span>会员中心</a>

                        </li>
                        <li>

                            <a href="" class="user_icon1" target="_blank"><span class="menu-span menu-span2"></span>我的稿件</a>

                        </li>
                        <li>
                            <a href="" class="user_icon1" target="_blank"><span class="menu-span menu-span3"></span>我的收藏</a>

                        </li>
                        <li>

                            <a href="" class="user_icon1" target="_blank"><span class="menu-span menu-span4"></span>修改资料</a>

                        </li>
                        <li>

                            <a href="" class="user_icon1" target="_blank"><span class="menu-span menu-span5"></span>退出 </a>

                        </li>

                    </ul>
                </div>
            </div>
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