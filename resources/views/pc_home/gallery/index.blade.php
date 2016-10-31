@extends('pc_home.commonIn')
@section('title')
@endsection

@section('content')
    <div style="margin-top:81px;" class="item_list infinite_scroll item-list-parent "></div>
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