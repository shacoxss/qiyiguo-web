@if(isset($body_only))
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

    <link href="{{asset('home/css/amazeui.min.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/js/skin/layer.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/css/all.css')}}" type="text/css" rel="stylesheet" />
    <link href="{{asset('home/css/details.css')}}" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="{{asset('home/js/jquery-3.1.0.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('pulgin/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/amazeui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/base.js')}}"></script>
    <script src="http://static.geetest.com/static/tools/gt.js"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('vendor/lightgallery/css/lightgallery.css')}}" />
    <script type="text/javascript" src="{{asset('vendor/lightgallery/js/lightgallery.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/lightgallery/js/lg-thumbnail.js')}}"></script>
    <style>
        .news-d-title {
            margin-top: 0;
        }
    </style>
</head>
<body>
@extends('pc_home.'.(isset($body_only) ? 'empty' : 'commonIn'))
@else
    @section('content')
@endif
    @include('inc.archive-header', ['tags' => $archive->tags()->get()])
    <div class="am-g news-detail-content">
        <div class="am-g width ">
            <div class="am-u-sm-8 news-detail-content-left" style="width: 796px;margin-top: 10px;">
                <div id="lightgallery">
                    @foreach($archive->detail->images()->get() as $image)
                        <a href="{{$image->url.'/raw.jpeg'}}" data-sub-html="<h3>{{$image->title}}</h3><p>{{$image->description}}</p>">
                            <img src="{{route('image', [$image->url, '180x120'])}}" />
                        </a>
                    @endforeach
                </div>
                @include('inc.archive-content', ['archive' => $archive])
                @include('inc.comment')
            </div>

            <div class="am-u-sm-4 news-d-right-block" style="width: 404px;">
                @include('inc.about-author', ['user' => $archive->user,'followed' => $followed])
                @include('inc.archive-recommend')
            </div>
        </div>
    </div>
    <!--底部-->
@if(!isset($body_only))
    @section('scripts')
        <link type="text/css" rel="stylesheet" href="{{asset('vendor/lightgallery/css/lightgallery.css')}}" />
        <script type="text/javascript" src="{{asset('vendor/lightgallery/js/lightgallery.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendor/lightgallery/js/lg-thumbnail.js')}}"></script>
@endif
    <style>
        #lightgallery a img {
            margin-top: 6px;
            width: 180px;
            height: 120px;
            border: 1px solid #ccc;
        }
    </style>
    @include('inc.archive-scripts')
    <script>
        lightGallery(document.getElementById('lightgallery'), {
            thumbnail:true
        });
    </script>
@if(!isset($body_only))
    @endsection
@endif

@if(isset($body_only))
</body>
</html>
@else
    @endsection
@endif