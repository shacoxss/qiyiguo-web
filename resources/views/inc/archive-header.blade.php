
<!--banner-->
<div class="am-g news-d-title">
    <div class="am-g width">
        <div class="news-d-word">
            <p>{{ $archive->title }}</p>
        </div>
        <div class="news-author-view">
            <span class="news-author-view-name">作者：{{$archive->user->nickname or $archive->user->phone}}</span>
            <span>发布于：{{worldTime(strtotime($archive->updated_at))}}</span>
            {{--<span>来源：乐视网</span>--}}
            <div style="display: inline-block;float: left;">
                @include('inc.tags', ['tags' => $tags])
            </div>
        </div>
    </div>
</div>