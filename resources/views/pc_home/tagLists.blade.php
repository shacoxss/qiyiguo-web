@extends('pc_home.commonIn')
@section('title')
    <title>奇异果聚合-{{$tag->name}}</title>
    <meta name="Keywords" content="">
    <meta name="description" content="" />
    @show
@section('content')

    <!--banner-->
    <div class="am-g tab-banner" style="margin-top: 60px; @if($tag->background_image) background-image:url({{route('image', [$tag->background_image, '1920x780'])}}) @endif">
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
                                @foreach($tag->attributes()->get() as $attribute))
                                    <div class="tab-view-avatar">
                                        <a href="{{ $attribute->link }}" target="_blank" rel="nofollow">
                                            <img src="{{ asset($attribute->icon) }}" alt="{{ $attribute->name }}" />
                                        </a>
                                    </div>
                                @endforeach
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

            <div class="am-u-sm-8" style=" width: 793px;">
                @each('inc.each.archive', $archives, 'archive')
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
                @if($article_archives)
                    @foreach($article_archives as $v)
                <div class="am-u-sm-11 am-u-sm-centered r-news tab-block-recommand">
                    <div class="tab-block-recommand">
                        <a href="{{route('archive.show', $v->id)}}" class="tab-block-a">
                            <img class="am-radius" alt="140*140" src="{{route('image', [trim($v->cover, '/'), '285x160'])}}" onerror="this.src='{{asset('home/images/banner-1.jpg')}}'" />
                            @if($v->archive_type_id==1)
                                <div class="tab-block-a-shade tab-block-article-shade"></div>
                            @elseif($v->archive_type_id==2)
                                <div class="tab-block-a-shade tab-block-video-shade"></div>
                            @elseif($v->archive_type_id==3)
                                <div class="tab-block-a-shade tab-block-img-shade"></div>
                            @endif
                        </a>
                    </div>
                    <p>
                        <a href="{{route('archive.show', $v->id)}}">{{$v->title}}</a>
                    </p>
                    <dl class="tab-block-r-ul">
                        @foreach($v->tags()->get() as $tag)
                            <dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
                        @endforeach
                    </dl>
                </div>
                @endforeach
                @endif
                <div class="am-u-sm-6 am-u-sm-centered more">
                    <a href="{{url('contentLists/'.$category_id)}}">更多内容</a>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection