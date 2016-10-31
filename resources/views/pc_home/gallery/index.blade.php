@extends('pc_home.commonIn')
@section('title')
@endsection

@section('content')<div class="am-g" style="margin-top:81px">
    <div class="slider">
        <div class="bd">
            <ul>
                <li>
                    <a target="_blank" href="">
                        <img src="{{asset('home/images/banner-1.jpg')}}">
                        <div class="title"><span>2016.6.12</span>
                            <P>是的撒的服务的发</P>
                        </div>
                    </a>
                    <a target="_blank" href=""><img src="{{asset('home/images/banner-2.jpg')}}">
                        <div class="title"><span>2016.6.12</span>
                            <P>是的撒的服务的发</P>
                        </div>
                    </a>
                </li>
                <li>
                    <a target="_blank" href=""><img src="{{asset('home/images/banner-2.jpg')}}">
                        <div class="title"><span>2016.6.12</span>
                            <P>是的撒的服务的发</P>
                        </div>
                    </a>
                    <a target="_blank" href=""><img src="{{asset('home/images/banner-1.jpg')}}">
                        <div class="title"><span>2016.6.12</span>
                            <P>是的撒的服务的发</P>
                        </div>
                    </a>
                </li>
                <li>
                    <a target="_blank" href=""><img src="{{asset('home/images/banner-1.jpg')}}">
                        <div class="title"><span>2016.6.12</span>
                            <P>是的撒的服务的发</P>
                        </div>
                    </a>
                    <a target="_blank" href=""><img src="{{asset('home/images/banner-2.jpg')}}">
                        <div class="title"><span>2016.6.12</span>
                            <P>是的撒的服务的发</P>
                        </div>
                    </a>
                </li>
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
    <div class="item_list infinite_scroll item-list-parent "></div>
    <div id="page-info" data-page="0">没有更多了</div>
@endsection

@section('scripts')
    <script>
        //init ulr
        var BASE_URL = '{{route('galleries.index')}}';
        var DETAIL_URL = '{{url('gallery/')}}';
    </script>
    <link rel="stylesheet" href="{{asset('css/album/list_moment.css')}}">
    <script type="text/javascript" src="{{asset('js/album/jquery.masonry.js')}}"></script>
    <script type="text/javascript" src={{asset('js/album/openmodal.js')}}></script>
@endsection