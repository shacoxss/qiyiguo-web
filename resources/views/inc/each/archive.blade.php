<div class="am-g list-c">
    <div class="am-u-sm-12 am-u-sm-centered list-box">
        <div class="am-u-sm-4" style="padding: 0;margin-right: 30px;">
            <a href="{{route('archive.show', [$archive->id])}}">
                @if($archive->cover)
                    <img class="am-thumbnail list-pic" src="{{route('image', [trim($archive->cover, '/'), '264x160'])}}" alt=""/>
                @else
                    <img class="am-thumbnail list-pic" src="{{asset('img/200200.png')}}" alt=""/>
                @endif
            </a>
        </div>
        <div class="am-thumbnail-caption content-list">
            <a href="{{route('archive.show', [$archive->id])}}"> <h3>{{$archive->title}}</h3></a>
            <span>
                <a href="{{ route('author.index', [$archive->user->id]) }}">{{ $archive->user->nickname }}</a>
                &nbsp;{{worldTime(strtotime($archive->updated_at))}}
            </span>
            <p>
                {{ mb_substr($archive->abstract, 0, 66) }}...
            </p>
            @include('inc.tags', ['tags' => $archive->tags()->get()])
            <p style="text-align: right;">
                <span><img src="{{asset('home/images/pinglun.png')}}">300</span>
                <span><img src="{{asset('home/images/shoucang.png')}}">{{$archive->liked_count}}</span>
            </p>
        </div>
    </div>
</div>