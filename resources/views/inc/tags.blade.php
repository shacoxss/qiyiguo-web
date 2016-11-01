<dl class="tab-block-r-ul">
    @foreach($tags as $tag)
        <dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
    @endforeach
</dl>