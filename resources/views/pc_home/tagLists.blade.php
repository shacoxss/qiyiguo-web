@extends('pc_home.commonIn')
@section('content')

    <!--banner-->
    <div class="am-g tab-banner" style="margin-top:79px; @if($tag->background_image) background-image:url({{route('image', [$tag->background_image, '1920x780'])}}) @endif">
        <div class="am-g width">
            <div class="hotest-tab">
                <div class="hotest-tab-left">
                    @if($tag->logo)
                        <img src="{{route('image', [$tag->logo, '460x260'])}}" />
                    @else
                        <img src="{{asset('img/200200.png')}}" alt=""/>
                    @endif
                </div>
                <div class="hotest-tab-right">
                    <div class="hotest-tab-intro">
                        <h2>{{$tag->name}}</h2>
                        <p>{{ $tag->description }}</p>
                    </div>
                    <div class="hotest-tab-detail">
                        <div class="h-t-d-left">
                            <div class="h-t-d-top">
                                <ul>
                                    <li>类型：射击 </li>
                                    <li>类型：射击 </li>
                                    <li>类型：射击 </li>
                                    <li>类型：射击 </li>
                                    <li> 测试时间：2016年05月24日 </li>
                                </ul>
                            </div>
                            <div class="h-t-d-bottom">
                                <div class="tab-view-avatar">
                                    <a href="">
                                        <img src="{{asset('home/images/tx1.jpg')}}" />
                                    </a>
                                </div>
                                <div class="tab-view-avatar">
                                    <a href="">
                                        <img src="{{asset('home/images/tx1.jpg')}}" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="h-t-d-right">
                            <div class="hot-tab-number">7100W</div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="tab-recommand">
                <div class="tab-r-title">
                    <span class="line"></span>推荐标签
                </div>
                <div class="am-g tab-recommand-content">
                    @foreach($tag->getSimilars() as $tag)
                        <div class="am-u-sm-3">
                            <div class="tab-r-block">
                                <div class="t-r-block-top">
                                    @if($tag->logo)
                                        <img src="{{route('image', [$tag->logo, '104x60'])}}" />
                                    @else
                                        <img src="{{asset('img/200200.png')}}" alt=""/>
                                    @endif
                                    <span>{{$tag->name}}</span>
                                </div>
                                <p>{{$tag->description}}</p>
                                <div class="t-r-block-bottom"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--banner-->

    <div class="am-g">
        <div class="am-g width am-width">
            <div class="am-u-sm-8 tab-block-r-title">
                <ul>
                    <li class="on">新闻</li>
                    <li><em>/</em></li>
                    <li>视频</li>
                    <li><em>/</em></li>
                    <li>图集</li>
                </ul>
            </div>

            <!--描述：新闻-->

            <div class="am-u-sm-8" style=" width: 793px;padding-left: 0;padding-right: 0;">
                @foreach($archives as $archive)
                <div class="am-u-sm-12 list-c">
                    <div class="am-u-sm-4" style="padding: 0;margin-right: 30px;">
                        <a href="{{route('archive.show', [$archive->id])}}">
                            @if($archive->cover)
                                <img class="am-thumbnail list-pic" src="{{route('image', [$archive->cover, '258x160'])}}" alt=""/>
                            @else
                                <img class="am-thumbnail list-pic" src="{{asset('img/200200.png')}}" alt=""/>
                            @endif
                        </a>
                    </div>
                    <div class="am-thumbnail-caption content-list">
                        <a href="{{route('archive.show', [$archive->id])}}"> <h3>{{$archive->title}}</h3></a>
                        <span>
									<a href="#">{{ $archive->user->nickname }}</a>
									&nbsp;{{date('n-d G:i', strtotime($archive->updated_at))}}
								</span>
                        <p>
                            {{ mb_substr($archive->abstract, 0, 66) }}...
                        </p>
                        <dl class="tab-block-r-ul">
                            @foreach($archive->tags()->get() as $tag)
                                <dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
                            @endforeach
                        </dl>
                        <p style="text-align: right;">
                            <span><img src="{{asset('home/images/pinglun.png')}}">300</span>
                            <span><img src="{{asset('home/images/shoucang.png')}}">{{$archive->like}}</span>
                        </p>
                    </div>
                </div>
                @endforeach
                {{ $archives->links() }}

            </div>
            <!---新闻-->
    <div class="am-u-sm-4" style="margin-top: -75px;">
        <div class="am-g">
            <div class="am-u-sm-11 am-u-sm-centered" style="background-color: #FFFFFF;width: 360px;margin-top: 10px;margin-right: 0;">
                <div class="am-u-sm-6 am-u-sm-centered r-title">精彩推荐</div>
                <div class="am-u-sm-6 am-u-sm-centered bg-url">
                    <h2>有点意思</h2>
                </div>
                <div class="am-u-sm-11 am-u-sm-centered r-news tab-block-recommand">
                    <div class="tab-block-recommand">
                        <a href="" class="tab-block-a">
                            <img class="am-radius" alt="140*140" src="{{asset('home/images/banner-1.jpg')}}" />
                            <div class="tab-block-a-shade "></div>
                        </a>
                    </div>
                    <p>
                        <a href="">再也不能随心所欲抓小精灵啦！《精 灵宝可梦GO》永久封号规定公布</a>
                    </p>
                    <dl class="tab-block-r-ul">
                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                        <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                    </dl>

                </div>
                <div class="am-u-sm-11 am-u-sm-centered r-news tab-block-recommand">
                    <div class="tab-block-recommand">
                        <a href="" class="tab-block-a">
                            <img class="am-radius" alt="140*140" src="{{asset('home/images/banner-1.jpg')}}" />
                            <div class="tab-block-a-shade tab-block-video-shade"></div>
                        </a>
                    </div>
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
@endsection