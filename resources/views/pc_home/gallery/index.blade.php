@extends('pc_home.commonOut')
@section('title')
    <title>奇异果聚合-图库</title>
    <meta name="Keywords" content="">
    <meta name="description" content="" />
@show
@section('title')
    <link type="text/css" rel="stylesheet" href="{{asset('vendor/lightgallery/css/lightgallery.css')}}" />
    <script type="text/javascript" src="{{asset('vendor/lightgallery/js/lightgallery.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/lightgallery/js/lg-thumbnail.js')}}"></script>
    <style>
        #lightgallery{
            text-align: left;
        }
        #lightgallery a img {
            margin-top: 6px;
            width: 180px;
            height: 120px;
            border: 1px solid #ccc;
        }
        #lightgallery a {
            display: inline-block;
        }
        .lg-outer {
            z-index : 1500;
        }
    </style>
@endsection

@section('content')
    <div class="album-search">
        <div class="a-search-box am-g">
            <div class="am-u-sm-8">
                <ul class="a-s-ul ">
                    <li class="a-s-li-on"><a href="">全部</a></li>
                    <li>·</li>
                    <li><a href="">守望先锋</a></li>
                    <li>·</li>
                    <li><a href="">LOL</a></li>
                    <li>·</li>
                    <li><a href="">LOL</a></li>
                    <li>·</li>
                    <li><a href="">LOL</a></li>
                </ul>
            </div>
            <div class="am-u-sm-4">
                <form class="a-s-form" action="">
                    <input class="a-s-input" type="text">
                    <img src="images/xiugai-1110/a-s-icon.png" alt="">
                </form>
            </div>

        </div>
    </div>
{{--    @include('inc.top-slide')--}}
    <div class="item_list infinite_scroll item-list-parent "></div>
    <div id="page-info" data-page="0" style="text-align: center;">没有更多了</div>
@endsection

@section('scripts')
    <script>
        //init ulr
        var BASE_URL = '{{route('galleries.index')}}';
        var DETAIL_URL = '{{url('gallery/')}}';
    </script>
    <link rel="stylesheet" href="{{asset('home/css/album/list_moment.css')}}">
    <script type="text/javascript" src="{{asset('js/album/jquery.masonry.js')}}"></script>
    <script type="text/javascript" src={{asset('js/album/openmodal.js')}}></script>
@endsection

<!-- 弹出层 -->
<div class="am-modal am-modal-no-btn am-album-modal" tabindex="-1" id="detail-modal">
    <div class="am-album-modal-btn am-album-modal-prev">
        <a href="javascript:void(0);"><i class="am-icon-angle-left"></i></a>
    </div>
    <div class="am-album-modal-btn am-album-modal-next">
        <a href="javascript:void(0);"><i class="am-icon-angle-right"></i></a>
    </div>
    <div class="am-album-close">
        <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-dialog am-modal-album-dialog">
        <div class="am-modal-hd">
            <!--<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>-->
        </div>
        <div class="am-modal-bd ">
            <div class="am-g v-pinglun">
                <div class="content">
                    <div class="am-u-sm-9 v-pl-l" style="padding-right: 24px;">
                        <div class="tk-pics">
                            <div class="tk-p-top">
                                <div class="v-a-like">
                                    <button><div>喜欢</div></button>
                                </div>
                                {{--<div class="bdsharebuttonbox v-d-content-share">--}}
                                    {{--<a href=" " class="bds_more" data-cmd="more"></ a>--}}
                                    {{--<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>--}}
                                    {{--<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>--}}
                                    {{--<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>--}}
                                    {{--<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>--}}
                                    {{--<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>--}}
                                {{--</div>--}}
                                {{--<script>--}}
                                    {{--window._bd_share_config = {--}}
                                        {{--"common": {--}}
                                            {{--"bdSnsKey": {},--}}
                                            {{--"bdText": "",--}}
                                            {{--"bdMini": "2",--}}
                                            {{--"bdMiniList": false,--}}
                                            {{--"bdPic": "",--}}
                                            {{--"bdStyle": "0",--}}
                                            {{--"bdSize": "24"--}}
                                        {{--},--}}
                                        {{--"share": {}--}}
                                    {{--};--}}
                                    {{--with(document) 0[(getElementsByTagName("head")[0] || body).appendChild(createElement("script")).src = "http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=" + ~(-new Date() / 36e5)];--}}
                                {{--</script>--}}
                            </div>

                            <div class="tk-p-pic" id="lightgallery">
                                <img src="/images/banner-1.jpg" />
                            </div>

                            <div class="tk-p-liulan">
                                <span class="tk-p-icon icon-pl"></span>
                                <span>20</span>
                                <span class="tk-p-icon icon-xh"></span>
                                <span>20</span>
                            </div>
                        </div>
                        <div class="v-article album-article">
                            <h2>科技相对论  最全面的极客养成指南</h2>
                            <div class="v-a-source">
                                <span style="font-weight: bold;" id="author">青桑君</span> <span id="updated_at">4天前 </span>
                            </div>
                            <div class="v-a-content">
                                <p> 这一期王自如来和大家谈谈心，说一说他身上最耀眼的标签——极客。 王自如自己这些年折腾手机、平板、智能家居、无人机...从一个爱折腾的学生到极客公司的老板，期间趣事无数、也沉淀了许多对于极客精神的思考。极客精神究竟是什么？怎样的人才够格自称「极客」？</p>
                            </div>
                            <!--<div class="v-a-like tu-pic-like">
                    <button><div>喜欢</div></button>
                </div>-->
                        </div>
                        {{--<div class="v-changyanpl album-pl">--}}
                            {{--<!--通用评论{-->--}}

                            {{--<div id="comment_frame" class="comment-frame">--}}
                                {{--<a name="comment_top"></a>--}}
                                {{--<div class="dw-comment-ctn dw-comment-skin_white">--}}
                                    {{--<div class="dw-comment-box dw-comment-comments-ctn">--}}
                                        {{--<div id="pin_view_add_comment">--}}
                                            {{--<a name="comment"></a>--}}
                                            {{--<!--高速版-->--}}
                                            {{--<div id="SOHUCS" sid="11029"></div>--}}
                                            {{--<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js"></script>--}}
                                            {{--<script type="text/javascript">--}}
                                                {{--window.changyan.api.config({--}}
                                                    {{--appid: 'cyrlo1kOL',--}}
                                                    {{--conf: 'prod_4fe8ec20e3b7ae54f762116055738844'--}}
                                                {{--});--}}
                                            {{--</script>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- }通用评论 -->--}}
                            {{--<!-- 畅言插件js -->--}}
                            {{--<script type="text/javascript" charset="utf-8" src="http://changyan.itc.cn/js/lib/jquery.js"></script>--}}
                            {{--<script type="text/javascript" charset="utf-8" src="https://changyan.sohu.com/js/changyan.labs.https.js?appid=cyrlo1kOL"></script>--}}
                        {{--</div>--}}

                        <div class="in-item-list">

                        </div>

                    </div>
                    <div class="am-u-sm-3 v-pl-r r-width">
                        {{--<div class="album-auther-pics">--}}
                            {{--<div class="a-author">--}}
                                {{--<div class="a-a-icon">--}}
                                    {{--<img src="images/zhubo/tx-icon.jpg" />--}}
                                {{--</div>--}}
                                {{--<span>oiiio</span>--}}
                            {{--</div>--}}
                            {{--<div class="album-author-prev-imgs">--}}
                                {{--<div class="item-list-author-pics">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="am-g">
                            <div class="am-u-sm-11 am-u-sm-centered am-album-child-recommand" style="background-color: #FFFFFF;width: 280px;">
                                <div class="am-u-sm-6 am-u-sm-centered r-title">精彩推荐</div>
                                <div class="am-u-sm-6 am-u-sm-centered bg-url">
                                    <h2>有点意思</h2>
                                </div>
                                <div class="am-u-sm-11 am-u-sm-centered r-news">
                                    <P>
                                        <a href=""><img class="am-radius" alt="140*140" src="images/banner-1.jpg" /></a>
                                    </P>
                                    <p>
                                        <a href="">再也不能随心所欲抓小精灵啦！《精 灵宝可梦GO》永久封号规定公布</a>
                                    </p>
                                    <dl class="tab-block-r-ul">
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                    </dl>

                                </div>
                                <div class="am-u-sm-11 am-u-sm-centered r-news">
                                    <P>
                                        <a href=""><img class="am-radius" alt="140*140" src="images/banner-1.jpg" /></a>
                                    </P>
                                    <p>
                                        <a href="">再也不能随心所欲抓小精灵啦！《精 灵宝可梦GO》永久封号规定公布</a>
                                    </p>
                                    <dl class="tab-block-r-ul">
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                    </dl>
                                </div>
                                <div class="am-u-sm-6 am-u-sm-centered more">
                                    <a href="">更多内容</a>
                                </div>
                            </div>
                        </div>

                        <div class="am-g">
                            <div class="am-u-sm-11 am-u-sm-centered am-album-child-recommand" style="background-color: #FFFFFF;width: 280px;margin-top: 10px;">
                                <div class="am-u-sm-6 am-u-sm-centered r-title">游戏攻略</div>
                                <div class="am-u-sm-6 am-u-sm-centered bg-url">
                                    <h2>技术宅</h2>
                                </div>
                                <div class="am-u-sm-11 am-u-sm-centered r-news">
                                    <P>
                                        <a href=""><img class="am-radius" alt="140*140" src="images/banner-1.jpg" /></a>
                                    </P>
                                    <p>
                                        <a href="">再也不能随心所欲抓小精灵啦！《精 灵宝可梦GO》永久封号规定公布</a>
                                    </p>
                                    <dl class="tab-block-r-ul">
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                    </dl>
                                </div>
                                <div class="am-u-sm-11 am-u-sm-centered r-news">
                                    <P>
                                        <a href=""><img class="am-radius" alt="140*140" src="images/banner-1.jpg" /></a>
                                    </P>
                                    <p>
                                        <a href="">再也不能随心所欲抓小精灵啦！《精 灵宝可梦GO》永久封号规定公布</a>
                                    </p>
                                    <dl class="tab-block-r-ul">
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                    </dl>
                                </div>
                                <div class="am-u-sm-6 am-u-sm-centered more">
                                    <a href="">更多内容</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>