@extends('member.masterCommon')
@section('content')

    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">文档列表</h1>
            <p class="page-subtitle">用户发布的所有文档都在这里啦</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
        <li><a href="masterArchivesList.php">内容管理</a></li>
        <li class="active">文档列表</li>
    </ol>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-file-word-o fa-2x"></i> </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$counter['article']}}</div>
                            <div>文章</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer"> <span class="pull-left"><i class="fa fa-search"></i> 仅显示文章</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        {{--<div class="col-lg-4 col-sm-6">--}}
            {{--<div class="panel panel-green">--}}
                {{--<div class="panel-heading">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-3"> <i class="fa fa-file-image-o fa-2x"></i> </div>--}}
                        {{--<div class="col-xs-9 text-right">--}}
                            {{--<div class="huge">1562</div>--}}
                            {{--<div>图集</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a href="galleryAdd.php">--}}
                    {{--<div class="panel-footer"> <span class="pull-left"><i class="fa fa-search"></i> 仅显示图集</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-4 col-sm-6">--}}
            {{--<div class="panel panel-yellow">--}}
                {{--<div class="panel-heading">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-xs-3"> <i class="fa fa-file-video-o fa-2x"></i> </div>--}}
                        {{--<div class="col-xs-9 text-right">--}}
                            {{--<div class="huge">1562</div>--}}
                            {{--<div>视频</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a href="vedioAdd.php">--}}
                    {{--<div class="panel-footer"> <span class="pull-left"><i class="fa fa-search"></i> 仅显示视频</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="dataTables-userlist">
                <thead>
                <div class="row">
                    <p>
                        <button type="button" class="btn btn-success btn-xs"><i class="fa fa-arrows"></i> 全选</button>
                        <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> 审核</button>
                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> 删除</button>
                    </p>
                </div>
                <tr>
                    <th><input type="checkbox" /> </th>
                    <th>ID </th>
                    <th>标题 </th>
                    <th>时间</th>
                    <th>发布者</th>
                    <th width="100">类型</th>
                    <th>标签</th>
                    <th width="100">点击</th>
                    <th width="150">权限</th>
                    <th width="150">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($archives as $a)
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>{{$a->id}}</td>
                        <td>
                            @if($a->cover)
                                <img src="{{route('image', [$a->cover, '30x30'])}}" onerror="$(this).remove()" alt="" class="gridpic">
                            @endif
                            {{$a->title}}<br>
                            @foreach($a->patterns(1) as $p)
                                <i class="btn {{$p->description}} btn-xss">{{$p->display_name}}</i>
                            @endforeach
                        </td>
                        <td>{{$a->created_at}}</td>
                        <td>{{$a->user->nickname}}</td>
                        <td class="center">{{$a->type->display_name}}</td>
                        <td class="center">
                            @foreach($a->tags() as $tag)
                            <a href="#" class="btn btn-primary btn-xss">{{$tag->name}}</a>
                            @endforeach
                        </td>
                        <td class="center">{{$a->visit_count}}</td>
                        <td class="center tag-status">
                            @if($a->hasPattern('review'))
                                <span class="status active">开放浏览</span>
                            @else
                                <span class="status inactive">待审核</span>
                            @endif
                        </td>
                        <td class="center">
                            <a href="{{route('archives.edit', [$a->id, 'master'])}}" class="btn btn-circle btn-primary ">编辑</a>
                            {{--<a href="{{route('archives.edit', [$a->id])}}" class="btn btn-circle btn-success ">预览</a>--}}
                            <a href="javascript:void(0)" class="btn btn-circle btn-danger delete-archives" data-id="{{$a->id}}">删除</a>
                            @if(session('user')->master)
                                @if($a->hasPattern('review'))
                                    <a data-href="{{route('archives.toggle', [$a->id, 'review'])}}" data-id="{{$a->id}}" class="ajax-request btn btn-circle btn-danger ajax-request">不准看</a>
                                @else
                                    <a data-href="{{route('archives.toggle', [$a->id, 'review'])}}" data-id="{{$a->id}}" class="ajax-request btn btn-circle btn-success ajax-request">审核</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
<!-- DataTables JavaScript -->
<script src={{asset("vendor/datatables/js/jquery.dataTables.min.js")}}></script>
<script src={{asset("vendor/datatables-plugins/dataTables.bootstrap.min.js")}}></script>
<script src={{asset("vendor/datatables-responsive/dataTables.responsive.js")}}></script>

<!-- Custom Theme JavaScript -->
<script src={{asset("js/adminnine.js")}}></script>
<script>
    $destory_url = '{{url('member/archives/destroy')}}'
    $('.delete-archives').click(function(){
        var $this = $(this);
        var id = $(this).data('id');
        var token = "{{csrf_token()}}";
        layer.confirm('确认删除文章?', {
            title: '删除确认',
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url:$destory_url + '/' + id,
                data:{id:id,_token:token},
                type:'get',
                success:function(data){
                    if(data=='success'){
                        layer.msg('删除成功!', {icon: 1});
                        $this.parents('tr').remove();
                    }else{
                        layer.msg('删除失败!', {icon: 2});
                    }
                }
            });

        });
    });
    @if(session('user')->master)
        var $status_4 = [
            'btn-danger', 'btn-success', '不准看', '',
            '<span class="status active">开放浏览</span>'
        ];
        var $status_2 = [
            'btn-success', 'btn-danger', '审核', '',
            '<span class="status inactive">待审核</span>'
        ];

        $('.ajax-request').on('click', function () {
            var $this = $(this)
            $.getJSON($this.data('href'), function (response) {
                var node = $this.hasClass('btn-success') ? $status_4 : $status_2
                $this
                        .addClass(node[0])
                        .removeClass(node[1])
                        .text(node[2]).parents('tr')
                        .find('.tag-status')
                        .html(node[4])
                layer.msg(response.msg, {icon: 1})
            })
        })
    @endif

    $(document).ready(function() {
        $('#dataTables-userlist').DataTable({
            responsive: true,
            pageLength:10,
            sPaginationType: "full_numbers",
            oLanguage: {
                oPaginate: {
                    sFirst: "<<",
                    sPrevious: "<",
                    sNext: ">",
                    sLast: ">>"
                }
            }
        });
    });

</script>
@endsection