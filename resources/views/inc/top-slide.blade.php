<div class="am-g" style="margin-top:60px">
    <div class="slider">
        <div class="bd">
            <ul>
                @foreach($slides as $item)
                    @if(($loop->index|1) != $loop->index) <li> @endif
                            <a target="_blank" href="{{ route('archive.show', [$item->id]) }}">
                                <img src="{{ route('image', [$item->cover, '580x332']) }}">
                                <div class="title"><span>2016.6.12</span>
                                    <P>{{ $item->title }}</P>
                                </div>
                            </a>
                        @if(($loop->index|1) == $loop->index) </li> @endif
                @endforeach
            </ul>
        </div>
        <div class="hd">
            <ul>
                <li class="on">1</li>
                <li class="">2</li>
                <li class="">3</li>
            </ul>
        </div>
        <div class="pnBtn prev"> <span class="blackBg-l"></span>
            <a class="arrow" href="javascript:void(0)" style="display: none;"></a>
        </div>
        <div class="pnBtn next"> <span class="blackBg-r"></span>
            <a class="arrow" href="javascript:void(0)" style="display: none;"></a>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('home/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    <script type="text/javascript">
        jQuery(".slider .bd li").first().before(jQuery(".slider .bd li").last());
        jQuery(".slider").hover(function() {
            jQuery(this).find(".arrow").stop(true, true).fadeIn(300)
        }, function() {
            jQuery(this).find(".arrow").fadeOut(300)
        });
        jQuery(".slider").slide({
            titCell: ".hd ul",
            mainCell: ".bd ul",
            effect: "leftLoop",
            autoPlay: true,
            vis: 1,
            autoPage: true,
            trigger: "click",
            scroll: "1",
            delayTime: "600"
            //mouseOverStop: "false"
        });
    </script>
</div>