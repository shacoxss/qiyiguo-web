@extends('member.'.($is_master ? 'master' : 'user').'Common')
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
        <li>内容管理</li>
        <li><a href="{{url('member/archives')}}">全部文档</a></li>
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
                <a href="{{route('archives.index', [$left, 'type' => 'article'])}}">
                    <div class="panel-footer"> <span class="pull-left"><i class="fa fa-search"></i> 仅显示文章</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-file-image-o fa-2x"></i> </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$counter['gallery']}}</div>
                            <div>图集</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('archives.index', [$left, 'type' => 'gallery'])}}">
                    <div class="panel-footer"> <span class="pull-left"><i class="fa fa-search"></i> 仅显示图集</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-file-video-o fa-2x"></i> </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$counter['video']}}</div>
                            <div>视频</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('archives.index', [$left, 'type' => 'video'])}}">
                    <div class="panel-footer"> <span class="pull-left"><i class="fa fa-search"></i> 仅显示视频</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <p>
                    <button type="button" class="btn btn-success btn-xs checked_all"><i class="fa fa-arrows"></i> 全选</button>
                    @if($is_master)
                    <button type="button" class="btn btn-warning btn-xs set_review"><i class="fa fa-pencil"></i> 审核</button>
                    @endif
                    <button type="button" class="btn btn-danger btn-xs delete_archives"><i class="fa fa-times"></i> 删除</button>
                </p>
            </div>
            <table class="table table-bordered table-hover" id="dataTables-userlist">
                <thead>
                <tr>
                    <th><input type="checkbox" class="checked_all"/> </th>
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
                        <td><input type="checkbox" name="check" data-id="{{ $a->id }}" /></td>
                        <td>{{$a->id}}</td>
                        <td>
                            @if($a->cover)
                                <img src="{{route('image', [$a->cover, '30x30'])}}" onerror="$(this).remove()" alt="" class="gridpic">
                            @endif
                            {{$a->title}}<br>
                                @if($a->news)
                                    <i class="btn btn-default btn-xss">奇异果资讯</i>
                                @endif
                            @foreach($a->patterns(1) as $p)
                                <i class="btn {{$p->description}} btn-xss">{{$p->display_name}}</i>
                            @endforeach
                        </td>
                        <td>{{$a->created_at}}</td>
                        <td>
                            @if ($is_master)
                                <a href="{{route('archives.index', ['master', 'user' => $a->user_id])}}">
                                    {{ !empty($a->user->nickname) ? $a->user->nickname : $a->user->phone}}
                                </a>
                            @else
                                {{ !empty($a->user->nickname) ? $a->user->nickname : $a->user->phone}}
                            @endif
                        </td>
                        <td class="center">{{$a->type->display_name}}</td>
                        <td class="center">
                            @foreach($a->tags()->get() as $tag)
                            <a href="{{ $tag->url }}" target="_blank" class="btn btn-primary btn-xss">{{$tag->name}}</a>
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
                            <a href="{{route('archives.edit', [$a->id, $is_master ? 'master' : 'user'])}}" class="btn btn-circle btn-primary ">编辑</a>
                            <a href="{{route('archive.show', [$a->id])}}" class="btn btn-circle btn-success " target="_blank">预览</a>
                            <a href="javascript:void(0)" class="btn btn-circle btn-danger delete-archives" data-id="{{$a->id}}">删除</a>
                            @if(session('user')->master && $is_master)
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
                data:{_token:token},
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
    @if($is_master)
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

        $('.set_review').on('click', function () {
            var url = '{{ url('member/archives') }}/'

            url += $('input[type=checkbox]:checked')
                .filter('input[name]')
                .filter(function () {
                    return $(this).parents('tr').find('.inactive').length
                })
                .each(function () {
                    $(this).parents('tr').find('.ajax-request').click()
                })
//                .map(function (index, item) {
//                    return $(item).data('id')
//                })
//                .toArray().join() + '/set/review'
//            console.log(url)
        })
    @endif

    $(document).ready(function() {
        $('#dataTables-userlist').DataTable({
            columnDefs: [
                {orderable : false, targets: [0,9]}
            ],
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

    $(document).ready(function () {
        $('input[type=checkbox]').on('click', function (event) {
            if ($(event.target).hasClass('checked_all')) return ;
            $('.checked_all').prop('checked', false)}
        )
        $('.checked_all').on('click', function (event) {

            if (event.target.tagName != 'INPUT') {
                $(this).prop('checked', !$(this).prop('checked'))
            }

            $('input[type=checkbox]').prop('checked', $(this).prop('checked'))
        })

        $('.delete_archives').on('click', function () {
            var id = $('input[type=checkbox]:checked')
            .filter('input[name]')
            .map(function (index, item) {
                return $(item).data('id')
            })
            .toArray().join()

            var token = "{{csrf_token()}}";
            layer.confirm('确认删除文章?', {
                title: '删除确认',
                btn: ['确认','取消'] //按钮
            }, function(){
                $.ajax({
                    url:$destory_url + '/' + id,
                    data:{_token:token},
                    type:'get',
                    success:function(data){
                        if(data=='success'){
                            layer.msg('删除成功!', {icon: 1});
                            $('input[type=checkbox]:checked')
                            .filter('input[name]')
                            .map(function (index, item) {
                                return $(item).parents('tr').remove()
                            })
                        }else{
                            layer.msg('删除失败!', {icon: 2});
                        }
                    }
                });

            });
        })
    })

</script>
@endsection