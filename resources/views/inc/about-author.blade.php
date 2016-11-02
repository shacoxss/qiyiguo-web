<div class="am-g news-d-about-author">
    <div class="news-d-author-title">关于作者 <span>About the author</span> </div>
    <div class="am-u-sm-6 ">
        <div class="news-d-about-author-l">
            @if($user->head_img)
                <img src="{{$user->head_img}}" alt="" onerror="this.src='{{asset('img/200200.png')}}'"/>
            @else
                <img src="{{asset('img/200200.png')}}" alt=""/>
            @endif
        </div>

    </div>
    <div class="am-u-sm-6">
        <div class="news-d-about-author-r">
            <a href="{{ route('author.index', [$user->id]) }}">
                @if($user->nickname)
                    <h3 title="{{$user->nickname}}">{{mb_substr($user->nickname,0,4)}}
                        @if(strlen($user->nickname)>5)
                            ...
                        @endif
                    </h3>
                @else
                    <h3>{{mb_substr($user->phone, 0, 6)}}...</h3>
                @endif
            </a>
            @if($followed==1)
                <button class="news-d-about-author-r-add" data-follow="{{$followed}}" style="background:url('{{asset('home/images/tab/del.png')}}')center no-repeat;background-size: 24px 24px;"></button>
            @elseif($followed==-1)
                <button class="news-d-about-author-r-add" data-follow="{{$followed}}" style="background:url('{{asset('home/images/tab/add.png')}}')center no-repeat;background-size: 24px 24px;"></button>
            @else
                <button class="news-d-about-author-r-add" data-follow="{{$followed}}" style="background:url('{{asset('home/images/tab/add.png')}}')center no-repeat;background-size: 24px 24px;"></button>
            @endif
            @if($user->intro)
                <p>个人简介：{{$user->intro}}</p>
            @else
                <p>作者很懒，什么也没有留下~</p>
            @endif
        </div>

    </div>
</div>