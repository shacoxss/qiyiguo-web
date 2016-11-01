@extends('pc_home.commonOut')
@section('title')
    <script type="text/javascript" src="{{asset('home/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    <title>奇异果聚合-看点有意思的</title>
    <meta name="Keywords" content="">
    <meta name="description" content="" />
    <style>
        .hot-item>.hot-card{
            height: 330px;
            overflow: hidden;
        }
        .qyg-toutiao-little-items {
            padding-right: 0;
        }
        .qyg-toutiao-content-r .qyg-toutiao-little-items img {
            width: 273px;
        }
        .liulan,.zbsp-content-items .bt {
            height: auto;
        }
    </style>
@endsection

@section('content')
    <div class="am-g">
        <div class="banner">
            <div class="banner-left">
                <img src="images/banner-1.jpg" />
                <a href="" class="play-button"></a>
                <div class="wenzi"></div>
                <p>皇室战争龙珠主播黄金联赛</p>
            </div>
            <div class="banner-right">
                <div class="banner-little">
                    <img src="images/banner-2.jpg" />
                    <a href="" class="play-l-button">
                        <span class="index-zb-name">熊猫直播</span>
                        <span class="index-zb-jianjie">HELLO女神 直播互动2.0时代</span>
                    </a>
                </div>
                <div class="banner-little">
                    <img src="images/banner-3.jpg" />
                    <a href="" class="play-l-button">
                        <span class="index-zb-name">熊猫直播</span>
                        <span class="index-zb-jianjie">HELLO女神 直播互动2.0时代</span>
                    </a>
                </div>
                <div class="banner-little">
                    <img src="images/banner-3.jpg" />
                    <a href="" class="play-l-button">
                        <span class="index-zb-name">熊猫直播</span>
                        <span class="index-zb-jianjie">HELLO女神 直播互动2.0时代</span>
                    </a>
                </div>
                <div class="banner-little">
                    <img src="images/banner-2.jpg" />
                    <a href="" class="play-l-button">
                        <span class="index-zb-name">熊猫直播</span>
                        <span class="index-zb-jianjie">HELLO女神 直播互动2.0时代</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="am-g hot-block">
        <div class="content">
            <div class="hot-block-title"></div>
            @foreach($hot as $item)
                <div class="am-u-lg-3 hot-item">
                    <a href="{{ route('archive.show', [$item->id]) }}" class="hot-card">
                        <img src="{{ route('image', [$item->cover, '270x152']) }}" />
                        <div class="h1">
                            <h2>{{ $item->title }}</h2>

                        </div>
                        <p>{{ $item->abstract }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="am-g qyg-toutiao">
        <div class="content">
            <ul class="qyg-toutiao-title">
                <li class="line"></li>
                <li class="qyg-toutiao-word">
                    <a href="">奇异果头条</a>
                </li>
                <li class="qyg-toutiao-right" style="margin-right: 13px;">
                    <a href="">劲爆</a>
                </li>
                <li class="qyg-toutiao-right">
                    <a href="">专栏&nbsp;·&nbsp;</a>
                </li>
                <li class="qyg-toutiao-right">
                    <a href="">优播&nbsp;·&nbsp;</a>
                </li>
            </ul>
                <div class="qyg-toutiao-content-l am-u-lg-6 qyg-toutiao-content">
                    <a href="{{ route('archive.show', [$top[0]->id]) }}">
                        <img src="{{ route('image', [$top[0]->cover, '582x321'])}}">

                        <div class="blur"></div>
                        <label>{{ $top[0]->title }}</label>
                    </a>
                </div>
            <div class="qyg-toutiao-content-r am-u-lg-6 qyg-toutiao-content">
                @foreach($top as $item)
                    @if(!$loop->index) @continue @endif
                    <div class="am-g qyg-toutiao-little-items am-u-sm-6">
                        <a href="{{ route('archive.show', [$item->id]) }}">
                            <img src="{{ route('image', [$item->cover, '273x151'])}}">
                            <div class="blur"></div>
                            <label>{{ $item->title }}</label>
                        </a>
                    </div>
                @endforeach
             </div>
        </div>
    </div>

    <div class="hot-holder">
        <div class="content">
            <div class="hot-holder-title">
                <p>热门主播 Hot </p>
            </div>
        </div>
        <div class="friend">
            <div class="mr_frbox">
                <div class="mr_frUl">
                    <ul id="mr_fu">
                        <li>
                            <a href="">
                                <img src="images/lunbo1.jpg" />
                            </a>
                            <div class="mr_zhe">
                                <div class="mr_zhe_hover">
                                    <span class="mr-zhe-l">韩梅梅</span>
                                    <span class="mr-zhe-r-r">2000</span>
                                    <span class="mr-zhe-r"></span>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="">
                                <img src="images/lunbo1.jpg" />
                            </a>
                            <div class="mr_zhe">
                                <div class="mr_zhe_hover">
                                    <span class="mr-zhe-l">韩梅梅</span>
                                    <span class="mr-zhe-r-r">2000</span>
                                    <span class="mr-zhe-r"></span>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="">
                                <img src="images/lunbo1.jpg" />
                            </a>
                            <div class="mr_zhe">
                                <div class="mr_zhe_hover">
                                    <span class="mr-zhe-l">韩梅梅</span>
                                    <span class="mr-zhe-r-r">2000</span>
                                    <span class="mr-zhe-r"></span>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="">
                                <img src="images/lunbo1.jpg" />
                            </a>
                            <div class="mr_zhe">
                                <div class="mr_zhe_hover">
                                    <span class="mr-zhe-l">韩梅梅</span>
                                    <span class="mr-zhe-r-r">2000</span>
                                    <span class="mr-zhe-r"></span>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a href="">
                                <img src="images/lunbo1.jpg" />
                            </a>
                            <div class="mr_zhe">
                                <div class="mr_zhe_hover">
                                    <span class="mr-zhe-l">韩梅梅</span>
                                    <span class="mr-zhe-r-r">2000</span>
                                    <span class="mr-zhe-r"></span>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <div class="zhe-content"></div>
                    <div class="zhe-shade shade-l">
                        <a class="prev" href="javascript:void(0)"></a>
                    </div>
                    <div class="zhe-shade shade-r">
                        <a class="next" href="javascript:void(0)"></a>
                    </div>

                </div>

            </div>

        </div>

        <div class="am-g hot-holder-content">
            <div class="content">
                <div class="am-u-lg-8 hot-holder-l">
                    <div class="am-u-lg-6">
                        <a href="">
                            <img src="images/hot-holder-1.jpg" />
                            <div class="hot-holder-content-title">
                                <div class="hot-holder-content-title-top">
                                    新的一周，新的套牌
                                </div>
                                <div class="hot-holder-content-title-bottom">
                                    <div style="float: left;width: 50%;">8月29日</div>
                                    <ul style="float: right;width: 50%;">
                                        <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                        <li><span>10</span></li>
                                        <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                        <li><span>4000</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="am-u-lg-6">
                        <a href="">
                            <img src="images/hot-holder-1.jpg" />
                            <div class="hot-holder-content-title">
                                <div class="hot-holder-content-title-top">
                                    新的一周，新的套牌
                                </div>
                                <div class="hot-holder-content-title-bottom">
                                    <div style="float: left;width: 50%;">8月29日</div>
                                    <ul style="float: right;width: 50%;">
                                        <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                        <li><span>10</span></li>
                                        <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                        <li><span>4000</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="am-u-lg-6">
                        <a href="">
                            <img src="images/hot-holder-1.jpg" />
                            <div class="hot-holder-content-title">
                                <div class="hot-holder-content-title-top">
                                    新的一周，新的套牌
                                </div>
                                <div class="hot-holder-content-title-bottom">
                                    <div style="float: left;width: 50%;">8月29日</div>
                                    <ul style="float: right;width: 50%;">
                                        <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                        <li><span>10</span></li>
                                        <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                        <li><span>4000</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="am-u-lg-6">
                        <a href="">
                            <img src="images/hot-holder-1.jpg" />
                            <div class="hot-holder-content-title">
                                <div class="hot-holder-content-title-top">
                                    新的一周，新的套牌
                                </div>
                                <div class="hot-holder-content-title-bottom">
                                    <div style="float: left;width: 50%;">8月29日</div>
                                    <ul style="float: right;width: 50%;">
                                        <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                        <li><span>10</span></li>
                                        <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                        <li><span>4000</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="am-u-lg-4 hot-holder-r">
                    <ul class="paihang-title">
                        <li class="line"></li>
                        <li class="paihang-title-title">主播排行</li>
                        <li class="date-tabs">
                            <ul>
                                <li>日<em>&nbsp;/</em></li>
                                <li>周<em>&nbsp;/</em></li>
                                <li>月</li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="paihang">
                        <li>
                            <ul class="paihang-child-ul">
                                <li class="num">01</li>
                                <li>
                                    <div class="img"><img src="images/tx1.jpg" /></div>
                                </li>
                                <li>主播A</li>
                                <li class="du">30000℃</li>
                            </ul>
                        </li>
                        <li>
                            <ul class="paihang-child-ul">
                                <li class="num">01</li>
                                <li>
                                    <div class="img"><img src="images/tx1.jpg" /></div>
                                </li>
                                <li>主播A</li>
                                <li class="du">30000℃</li>
                            </ul>
                        </li>
                        <li>
                            <ul class="paihang-child-ul">
                                <li class="num">01</li>
                                <li>
                                    <div class="img"><img src="images/tx1.jpg" /></div>
                                </li>
                                <li>主播A</li>
                                <li class="du">30000℃</li>
                            </ul>
                        </li>
                        <li>
                            <ul class="paihang-child-ul">
                                <li class="num">01</li>
                                <li>
                                    <div class="img"><img src="images/tx1.jpg" /></div>
                                </li>
                                <li>主播A</li>
                                <li class="du">30000℃</li>
                            </ul>
                        </li>
                        <li>
                            <ul class="paihang-child-ul">
                                <li class="num">01</li>
                                <li>
                                    <div class="img"><img src="images/tx1.jpg" /></div>
                                </li>
                                <li>主播A</li>
                                <li class="du">30000℃</li>
                            </ul>
                        </li>
                    </ul>
                    <a href="" class="paihang-more">查看更多</a>
                </div>

            </div>
        </div>
    </div>

    <div class="am-g pingtaizhibo">
        <div class="content">
            <div class="am-u-lg-8 hot-holder-l ptzb">
                <ul class="ptzb-l-title">
                    <li class="line"></li>
                    <li class="ptzb-l-t-word">平台直播</li>
                    <li class="ptzb-l-a">
                        <a href="">更多</a>
                    </li>
                    <li class="ptzb-has-child">
                        <ul>
                            <li>
                                <a href="">斗鱼直播<em>&nbsp;/&nbsp;&nbsp;</em></a>
                            </li>
                            <li>
                                <a href=""> 熊猫TV<em>&nbsp;/&nbsp;&nbsp;</em></a>
                            </li>
                            <li>
                                <a href=""> YY直播<em>&nbsp;/&nbsp;&nbsp;</em></a>
                            </li>
                            <li>
                                <a href=""> 旗舰直播<em>&nbsp;/&nbsp;&nbsp;</em></a>
                            </li>
                            <li>
                                <a href=""> 虎牙直播<em>&nbsp;/&nbsp;&nbsp;</em></a>
                            </li>

                            <li>
                                <a href="">花椒</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="am-u-lg-4 ptzb-items">
                    <a href="">
                        <div class="ptzb-img">
                            <img src="images/ptzb1.jpg" />
                            <div class="ptzb-img-bt">
                                斗鱼
                            </div>

                        </div>

                        <div class="ptzb-l-content">
                            <div class="passage">
                                <p>欧美流行歌曲中那些洗脑的“呜 唔呜唔”，竟然有个专门的名字
                                </p>
                            </div>
                            <div class="hot-holder-content-title-bottom ptzb-view">
                                <div style="float: left;width: 50%;">8月29日</div>
                                <ul style="float: right;width: 50%;">
                                    <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                    <li><span>10</span></li>
                                    <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                    <li><span>10</span></li>
                                </ul>
                            </div>
                        </div>

                    </a>
                </div>

                <div class="am-u-lg-4 ptzb-items">
                    <a href="">
                        <div class="ptzb-img">
                            <img src="images/ptzb1.jpg" />
                            <div class="ptzb-img-bt">
                                斗鱼
                            </div>

                        </div>

                        <div class="ptzb-l-content">
                            <div class="passage">
                                <p>欧美流行歌曲中那些洗脑的“呜 唔呜唔”，竟然有个专门的名字
                                </p>
                            </div>
                            <div class="hot-holder-content-title-bottom ptzb-view">
                                <div style="float: left;width: 50%;">8月29日</div>
                                <ul style="float: right;width: 50%;">
                                    <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                    <li><span>10</span></li>
                                    <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                    <li><span>10</span></li>
                                </ul>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="am-u-lg-4 ptzb-items">
                    <a href="">
                        <div class="ptzb-img">
                            <img src="images/ptzb1.jpg" />
                            <div class="ptzb-img-bt">
                                斗鱼
                            </div>

                        </div>

                        <div class="ptzb-l-content">
                            <div class="passage">
                                <p>欧美流行歌曲中那些洗脑的“呜 唔呜唔”，竟然有个专门的名字
                                </p>
                            </div>
                            <div class="hot-holder-content-title-bottom ptzb-view">
                                <div style="float: left;width: 50%;">8月29日</div>
                                <ul style="float: right;width: 50%;">
                                    <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                    <li><span>10</span></li>
                                    <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                    <li><span>10</span></li>
                                </ul>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="am-u-lg-4 ptzb-items">
                    <a href="">
                        <div class="ptzb-img">
                            <img src="images/ptzb1.jpg" />
                            <div class="ptzb-img-bt">
                                斗鱼
                            </div>

                        </div>

                        <div class="ptzb-l-content">
                            <div class="passage">
                                <p>欧美流行歌曲中那些洗脑的“呜 唔呜唔”，竟然有个专门的名字
                                </p>
                            </div>
                            <div class="hot-holder-content-title-bottom ptzb-view">
                                <div style="float: left;width: 50%;">8月29日</div>
                                <ul style="float: right;width: 50%;">
                                    <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                    <li><span>10</span></li>
                                    <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                    <li><span>10</span></li>
                                </ul>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="am-u-lg-4 ptzb-items">
                    <a href="">
                        <div class="ptzb-img">
                            <img src="images/ptzb1.jpg" />
                            <div class="ptzb-img-bt">
                                斗鱼
                            </div>

                        </div>

                        <div class="ptzb-l-content">
                            <div class="passage">
                                <p>欧美流行歌曲中那些洗脑的“呜 唔呜唔”，竟然有个专门的名字
                                </p>
                            </div>
                            <div class="hot-holder-content-title-bottom ptzb-view">
                                <div style="float: left;width: 50%;">8月29日</div>
                                <ul style="float: right;width: 50%;">
                                    <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                    <li><span>10</span></li>
                                    <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                    <li><span>10</span></li>
                                </ul>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="am-u-lg-4 ptzb-items">
                    <a href="">
                        <div class="ptzb-img">
                            <img src="images/ptzb1.jpg" />
                            <div class="ptzb-img-bt">
                                斗鱼
                            </div>

                        </div>

                        <div class="ptzb-l-content">
                            <div class="passage">
                                <p>欧美流行歌曲中那些洗脑的“呜 唔呜唔”，竟然有个专门的名字
                                </p>
                            </div>
                            <div class="hot-holder-content-title-bottom ptzb-view">
                                <div style="float: left;width: 50%;">8月29日</div>
                                <ul style="float: right;width: 50%;">
                                    <li style="margin-top: 5px;width: 12px;height: 12px;"><img style="width: 12px;height: 12px;display: block;" src="images/pinglun.png" /></li>
                                    <li><span>10</span></li>
                                    <li style="margin-top: 5px;width: 14px;height: 11px;"><img style="width: 14px;height: 11px;display: block;" src="images/shoucang.png" /></li>
                                    <li><span>10</span></li>
                                </ul>
                            </div>
                        </div>

                    </a>
                </div>

            </div>
            <div class="am-u-lg-4 hot-holder-r ptzb ptzb-r">
                <ul class="paihang-title ptzb-paihang-title">
                    <li class="line"></li>
                    <li class="paihang-title-title">平台排行</li>
                    <li class="ptzb-more">
                        <a href="">更多</a>
                    </li>
                </ul>
                <ul class="paihang ptzb-paihang">
                    <li>
                        <ul class="paihang-child-ul">
                            <li class="num">01</li>
                            <li>
                                <div class="img"><img src="images/tx1.jpg" /></div>
                            </li>
                            <li>主播A</li>
                            <li class="du on">
                                <div class="img"></div>
                                <span>30000</span></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="paihang-child-ul">
                            <li class="num">01</li>
                            <li>
                                <div class="img"><img src="images/tx1.jpg" /></div>
                            </li>
                            <li>主播A</li>
                            <li class="du on">
                                <div class="img"></div>
                                <span>30000</span></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="paihang-child-ul">
                            <li class="num">01</li>
                            <li>
                                <div class="img"><img src="images/tx1.jpg" /></div>
                            </li>
                            <li>主播A</li>
                            <li class="du on">
                                <div class="img"></div>
                                <span>30000</span></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="paihang-child-ul">
                            <li class="num">01</li>
                            <li>
                                <div class="img"><img src="images/tx1.jpg" /></div>
                            </li>
                            <li>主播A</li>
                            <li class="du">
                                <div class="img"></div>
                                <span>30000</span></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="paihang-child-ul">
                            <li class="num">01</li>
                            <li>
                                <div class="img"><img src="images/tx1.jpg" /></div>
                            </li>
                            <li>主播A</li>
                            <li class="du">
                                <div class="img"></div>
                                <span>30000</span></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="paihang-child-ul">
                            <li class="num">01</li>
                            <li>
                                <div class="img"><img src="images/tx1.jpg" /></div>
                            </li>
                            <li>主播A</li>
                            <li class="du">
                                <div class="img"></div>
                                <span>30000</span></li>
                        </ul>
                    </li>
                    <li>
                        <ul class="paihang-child-ul">
                            <li class="num">01</li>
                            <li>
                                <div class="img"><img src="images/tx1.jpg" /></div>
                            </li>
                            <li>主播A</li>
                            <li class="du">30000℃</li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-g index-tab-content">
            <span>热门标签</span>
            <div style="margin-top: 3px;display: inline-block;float: left;">
                <dl class="tab-block-r-ul">
                    <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                    <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                    <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                    <dt style="background: #006633;"><a href="">守望先锋</a></dt>

                </dl>
            </div>
        </div>
    </div>

    <div class="am-g zhiboshipin">
        <div class="content">
            <ul class="ptzb-l-title">
                <li class="line"></li>
                <li class="ptzb-l-t-word">视频直播</li>
                <li class="ptzb-l-a">
                    <a href="{{ url('video') }}">更多</a>
                </li>
                <!--<li class="ptzb-has-child">
                    <ul>
                        <li>
                            <a href="">斗鱼直播</a>
                        </li>
                        <li>
                            <a href=""> 熊猫TV</a>
                        </li>
                        <li>
                            <a href=""> YY直播</a>
                        </li>
                        <li>
                            <a href=""> 旗舰直播</a>
                        </li>
                        <li>
                            <a href=""> 虎牙直播</a>
                        </li>

                        <li>
                            <a href="">花椒</a>
                        </li>
                    </ul>
                </li>-->
            </ul>
            @foreach($index_video as $video)
            <div class="am-u-sm-3 zbsp-content-items">
                <a href="{{ route('archive.show', [$video->id]) }}">
                    <img src="{{ route('image', [$video->cover, '280x158']) }}" />
                    <div class="word">
                        <div class="bt">
                            <span>{{ $video->title }}</span>
                        </div>
                        <div class="liulan">
                            <div class="liulan-l">
                                <span class="img"></span><span>{{ $video->user->nickname or  $video->user->phone}}</span>
                            </div>
                            <div class="liulan-r">
                                <span>{{ $video->visit_count }}</span><span class="img"></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="am-g tuku">
        <div class="content">
            <div class="tuku-title">
                <div class="tuku-title-t">图库</div>
            </div>
            <div class=" tuku-list tuku-list-1">
                <div class="am-u-sm-6 tuku-item-big">
                    <a href="{{ route('archive.show', [$index_gallery[0]->id]) }}">
                        <img src="{{ route('image', [$index_gallery[0]->cover, '590x330']) }}" />
                        <div class="zhezhao">

                        </div>
                        <div class="tuku-word">
                            <div class="zhezhao-title">{{$index_gallery[0]->title}}</div>
                            {{--<span class="zhezhao-pic-size">1200*1400</span>--}}
                            {{--<span class="down-load"></span>--}}
                        </div>
                    </a>

                </div>
                @for($i = 1; $i < 5&& $i<count($index_gallery); $i++)
                    <div class="am-u-sm-3 tuku-item-little">
                        <a href="{{ route('archive.show', [$index_gallery[$i]->id]) }}">
                            <img src="{{ route('image', [$index_gallery[$i]->cover, '590x330']) }}" />
                            <div class="zhezhao"></div>
                            <div class="tuku-word">
                                <div class="zhezhao-title">{{$index_gallery[$i]->title}}</div>
                                {{--<span class="zhezhao-pic-size">1200*1400</span>--}}
                                {{--<span class="down-load"></span>--}}
                            </div>

                        </a>
                    </div>
                @endfor
            </div>
            <div class="am-g tuku-list tuku-list-2">
                @for($i = 5; $i<count($index_gallery); $i++)
                    <div class="am-u-sm-3">
                        <a href="{{ route('archive.show', [$index_gallery[$i]->id]) }}">
                            <img src="{{ route('image', [$index_gallery[$i]->cover, '590x330']) }}" />
                            <div class="zhezhao"></div>
                            <div class="tuku-word">
                                <div class="zhezhao-title">{{$index_gallery[$i]->title}}</div>
                                {{--<span class="zhezhao-pic-size">1200*1400</span>--}}
                                {{--<span class="down-load"></span>--}}
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(".mr_frbox").slide({

            titCell: "",

            mainCell: ".mr_frUl ul",

            autoPage: true,

            effect: "leftLoop",

            autoPlay: true,

            vis: 4,
            scroll: 4

        });
        $(".tempWrap").css("width", "3600px");
        $(".tempWrap").css("height", "166px");

        /* 鼠标悬停图片效果 */

        $("li").hover(
                function(e) {
                    $(this).find('.mr_zhe').show();
                    $(this).find('img').css("opacity", "0.8");
                },
                function() {
                    $(this).find('.mr_zhe').hide();
                    $(this).find('img').css("opacity", "1");
                }
        );
    </script>
@endsection