@extends('pc_home.commonIn')
@section('title')
    <title>{{$cate->cate_name}}</title>
    <meta name="Keywords" content="{{$cate->seo_key}}">
    <meta name="description" content="{{$cate->seo_intro}}" />
@endsection

@section('content')
    <div class="item_list infinite_scroll item-list-parent "></div>
    <div id="page-info" data-page="1">没有更多了</div>
@endsection

@section('scripts')
    <script>
        //init ulr
        var list = {!! json_encode($list) !!};
        var BASE_URL = '{{(url('gallery/lists'))}}';
        var DETAIL_URL = '{{url('gallery/')}}';
    </script>
    <script type="text/javascript" src="{{asset('js/album/jquery.masonry.js')}}"></script>
    <script type="text/javascript" src={{asset('js/album/openmodal.js')}}></script>
@endsection