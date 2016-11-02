<div class="am-g author-guess">
    <div class="author-guess-title news-d-other">其他文章</div>
    <ul class="v-list-recommend author-guess-ul news-d-other-ul">
@if($others)
    @foreach($others as $v)
        <li>
            <a href="{{route('archive.show', $v->id)}}">
                <div class="am-u-sm-6 v-r-a-left author-guess-ul-left news-d-other-l">
                    <img src="{{route('image', [$v->cover, '155x87'])}}" onerror="this.src='{{asset('home/images/video/v-recommend1.jpg')}}'" />
                </div>
                <div class="am-u-sm-6 v-r-a-right author-guess-ul-r news-d-other-r">
                    <p>{{$v->title}}</p>
                    <div style="line-height: 19px;">
                        <span>{{$v->updated_at}}</span>

                    </div>

                    <div style="margin-top: 5px;">
                        <dl class="tab-block-r-ul">
                            @foreach($v->tags()->get() as $tag)
                                <dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
                            @endforeach
                        </dl>
                    </div>
                </div>
            </a>
        </li>
            @endforeach
@endif
    </ul>
</div>
<div class="am-g author-guess author-hot-tabs-block author-recommand news-d-recommand">
    <div class="author-guess-title news-d-other">精彩推荐</div>
    @if($article_archives)
        @foreach($article_archives as $v)
    <div class="am-u-sm-6 author-recommand-block">
        <div class="author-recommand-img">
            <a href="{{route('archive.show', $v->id)}}">
                <img src="{{route('image', [$v->cover, '161x90'])}}" onerror="this.src='{{asset('home/images/banner-3.jpg')}}'" />

                @if($v->archive_type_id==1)
                    <div class="author-recommand-article-shade "></div>
                @elseif($v->archive_type_id==2)
                    <div class="author-recommand-video-shade "></div>
                @elseif($v->archive_type_id==3)
                    <div class="author-recommand-img-shade "></div>
                @endif
            </a>
            <div class="author-recommand-img-tab-shade img-tab-shade-on">
                <span class="author-recommand-people"></span>
                <span>{{$v->user->nickname}}</span>
                <dl class="tab-block-r-ul" style="float: right;margin-right: 10px;">
                    @foreach($v->tags()->get() as $tag)
                        <dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
                        @break
                    @endforeach
                </dl>
            </div>

        </div>
        <p>{{$v->title}}</p>
    </div>
    @endforeach
@endif
</div>