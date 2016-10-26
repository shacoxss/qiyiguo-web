@extends('member.userCommon')
@section('content')

    <div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">内容管理</h1>
        <p class="page-subtitle">请选择您要发布的文档类型</p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<ol class="breadcrumb">
    <li><a href="javascript:void(0)">奇异果聚合</a></li>
    <li class="active">内容管理</li>
</ol>

<!-- /.row -->

<div class="row">
    <div class="col-lg-2 col-sm-6">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"> <i class="fa fa-file-word-o fa-3x"></i> </div>
                </div>
            </div>
            <a href="{{route('archives.create', ['article'])}}">
                <div class="panel-footer"> <span class="pull-left"><i class="fa fa-plus"></i> 发布文章</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-2 col-sm-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"> <i class="fa fa-file-image-o fa-3x"></i> </div>
                </div>
            </div>
            <a href="{{ route('archives.create', ['gallery']) }}">
                <div class="panel-footer"> <span class="pull-left"><i class="fa fa-plus"></i> 发布图集</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-2 col-sm-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"> <i class="fa fa-file-video-o fa-3x"></i> </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer"> <span class="pull-left"><i class="fa fa-plus"></i> 发布视频</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection