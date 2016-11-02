@extends('pc_home.commonIn')

@section('title')
    <title></title>
    <meta name="Keywords" content="">
    <meta name="description" content="" />
@endsection
@section('content')
    <div class="am-g" style="margin-top:79px">
        <div class="am-g width">
            <div class="am-u-sm-8" style="width: 790px;margin-top: 10px;">
                @foreach($archives as $archive)
                    <div class="am-g author-article-block">
                        <div class="am-u-lg-2">
                            <div class="canlader">
                                {{ $archive->year }}
                            </div>
                            <div class="author-ariticle-date">
                                <div class="a-a-date-day">{{ $archive->day }}</div>
                                <div class="a-a-date-month">{{ $archive->month }}月</div>
                            </div>
                            <div class="a-a-like"></div>
                            <div class="a-a-like-number">{{ $archive->liked_count }}</div>
                            <div class="a-a-comment"></div>
                            <div class="a-a-comment-number">235</div>
                        </div>
                        <div class="am-u-lg-10 author-article-content">
                            <div class="author-block-img">
                                <img src="{{ route('image', [$archive->cover, '658x370']) }}" />
                            </div>
                            <a href="{{ route('archive.show', [$archive->id]) }}">
                                <h3>{{ $archive->title }}</h3>
                            </a>
                            <p>{{ $archive->abstract }}...
                                <a href="{{ route('archive.show', [$archive->id]) }}">了解详情>></a>
                            </p>
                        </div>
                        <div style="float: right;margin-bottom: 20px;margin-right: 10px;">
                            @include('inc.tags', ['tags' => $archive->tags()->get()])
                        </div>
                    </div>
                @endforeach
                {{ $archives->links() }}

            </div>

            <div class="am-u-sm-4 author-block-right">
                <div class="am-g author-detail">
                    <div class="author-detail-bg">
                        <div class="author-name">{{ $user->nickname or $user->phone }}</div>
                        @if(session('user') && session('user')->isFollowed($user))
                            <button class="news-d-about-author-r-add" data-follow="1" style="background-image: url({{asset('home/images/tab/del.png')}})"></button>
                        @else
                            <button class="news-d-about-author-r-add"></button>
                        @endif
                        <div class="author-image">
                            @if($user->head_img)
                                <img src="{{$user->head_img}}" alt="" onerror="this.src='{{asset('img/200200.png')}}'"/>
                            @else
                                <img src="{{asset('img/200200.png')}}" alt=""/>
                            @endif
                        </div>
                        @if($user->intro)
                            <p>个人简介：{{$user->intro}}</p>
                        @else
                            <p>作者很懒，什么也没有留下~</p>
                        @endif
                        <div class="am-u-sm-4 author-d-bar">
                            <div class="author-d-bar-top">粉丝</div>
                            <div class="author-d-bar-bott">{{ $user->followUser()->count() }}</div>
                        </div>
                        <div class="am-u-sm-4 author-d-bar">
                            <div class="author-d-bar-top">关注</div>
                            <div class="author-d-bar-bott">{{ $user->followUser()->count() }}</div>
                        </div>
                        <div class="am-u-sm-4 author-d-bar">
                            <div class="author-d-bar-top">帖子</div>
                            <div class="author-d-bar-bott">{{ $user->archives()->count() }}</div>
                        </div>
                    </div>
                </div>

                <div class="am-g author-guess" style="margin-top: 20px;">
                    <div class="author-guess-title" style="margin-top: 0;">猜你喜欢</div>
                    <ul class="v-list-recommend author-guess-ul">
                        <li>
                            <a href="">
                                <div class="am-g v-r-a-left author-guess-ul-left">
                                    <img src="images/video/v-recommend1.jpg" />
                                </div>
                                <div class="am-g v-r-a-right author-guess-ul-r">
                                    <p>万物皆可手游 光荣特库摩《讨鬼传：武士》宣传视频首曝传</p>
                                    <div style="line-height: 19px;">
                                        <span>2016-10-11 09:00</span>
                                        <span class="hot-degree"></span>
                                        <span>1000</span>
                                    </div>

                                    <div style="">
                                        <dl class="tab-block-r-ul">
                                            <dt style="background: #006633;">守望先锋</dt>
                                            <dt style="background: #006633;">守望先锋</dt>
                                            <dt style="background: #006633;">守望先锋</dt>
                                        </dl>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="am-g v-r-a-left author-guess-ul-left">
                                    <img src="images/video/v-recommend1.jpg" />
                                </div>
                                <div class="am-g v-r-a-right author-guess-ul-r">
                                    <p>万物皆可手游 光荣特库摩《讨鬼传：武士》宣传视频首曝传</p>
                                    <div style="line-height: 19px;">
                                        <span>2016-10-11 09:00</span>
                                        <span class="hot-degree"></span>
                                        <span>1000</span>
                                    </div>

                                    <div style="">
                                        <dl class="tab-block-r-ul">
                                            <dt style="background: #006633;">守望先锋</dt>
                                            <dt style="background: #006633;">守望先锋</dt>
                                            <dt style="background: #006633;">守望先锋</dt>
                                        </dl>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="am-g v-r-a-left author-guess-ul-left">
                                    <img src="images/video/v-recommend1.jpg" />
                                </div>
                                <div class="am-g v-r-a-right author-guess-ul-r">
                                    <p>万物皆可手游 光荣特库摩《讨鬼传：武士》宣传视频首曝传</p>
                                    <div style="line-height: 19px;">
                                        <span>2016-10-11 09:00</span>
                                        <span class="hot-degree"></span>
                                        <span>1000</span>
                                    </div>

                                    <div style="">
                                        <dl class="tab-block-r-ul">
                                            <dt style="background: #006633;">守望先锋</dt>
                                            <dt style="background: #006633;">守望先锋</dt>
                                            <dt style="background: #006633;">守望先锋</dt>
                                        </dl>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="am-g author-guess author-hot-tabs-block">
                    <div class="author-guess-title">热门标签</div>
                    <div class="author-hot-tabs">
                        <dl class="tab-block-r-ul">
                            <dt style="background: #006633;">守望先锋</dt>
                            <dt style="background: #006633;">守望先锋</dt>
                            <dt style="background: #006633;">守望先锋</dt>
                        </dl>
                    </div>
                </div>

                <div class="am-g author-guess author-hot-tabs-block author-recommand">
                    <div class="author-guess-title">精彩推荐</div>
                    <div class="am-u-sm-6 author-recommand-block">
                        <div class="author-recommand-img">
                            <a href="">
                                <img src="images/banner-3.jpg" />
                                <div class="author-recommand-img-shade "></div>
                            </a>
                            <div class="author-recommand-img-tab-shade img-tab-shade-on">
                                <span class="author-recommand-people"></span>
                                <span>李雷</span>
                                <dl class="tab-block-r-ul" style="float: right;margin-right: 10px;">
                                    <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                </dl>
                            </div>

                        </div>
                        <p>再也不能随心所欲抓小精灵啦！《精灵宝可梦GO》</p>
                    </div>
                    <div class="am-u-sm-6 author-recommand-block">
                        <div class="author-recommand-img">
                            <a href="">
                                <img src="images/banner-3.jpg" />
                                <div class="author-recommand-video-shade "></div>
                            </a>
                            <div class="author-recommand-img-tab-shade img-tab-shade-on">
                                <span class="author-recommand-people"></span>
                                <span>李雷</span>
                                <dl class="tab-block-r-ul" style="float: right;margin-right: 10px;">
                                    <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                </dl>
                            </div>

                        </div>
                        <p>再也不能随心所欲抓小精灵啦！《精灵宝可梦GO》</p>
                    </div>
                    <div class="am-u-sm-6 author-recommand-block">
                        <div class="author-recommand-img">
                            <a href="">
                                <img src="images/banner-3.jpg" />
                                <div class="author-recommand-article-shade "></div>
                            </a>
                            <div class="author-recommand-img-tab-shade img-tab-shade-on">
                                <span class="author-recommand-people"></span>
                                <span>李雷</span>
                                <dl class="tab-block-r-ul" style="float: right;margin-right: 10px;">
                                    <dt style="background: #006633;"><a href="">守望先锋</a></dt>
                                </dl>
                            </div>

                        </div>
                        <p>再也不能随心所欲抓小精灵啦！《精灵宝可梦GO》</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <style>
        .news-d-about-author-r-add {
            left: 225px;
            top: 26px;
        }
    </style>
    @include('inc.archive-scripts')
@endsection