<button type="button"
        class="am-btn am-btn-success btn like" @if($archive->isLiked(session('user'))) disabled @endif>
    喜欢&nbsp;<span>{{$archive->liked_count}}</span>
</button>