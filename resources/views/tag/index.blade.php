@extends('member.masterCommon')
@section('content')


    <div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">标签管理</h1>
        <p class="page-subtitle">网站文章、视频、图集的标签都在这里</p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<ol class="breadcrumb">
    <li><a href="javascript:void(0)">标签管理</a></li>
    <li class="active">标签列表</li>
</ol>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <p>
                <button type="button" class="btn btn-primary btn-xs" onclick="window.open('{{ route('tag.create') }}','_self')"><i class="fa fa-plus"></i> 新增</button>
                <button type="button" class="btn btn-success btn-xs"><i class="fa fa-arrows"></i> 全选</button>
                <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> 审核</button>
                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> 停用</button>
            </p>
        </div>
        <table class="table table-bordered table-hover" id="dataTables-userlist">
            <thead>
            <tr>
                <th width="100"><input type="checkbox" /> </th>
                <th width="100">ID</th>
                <th>标签名</th>
                <th>文档数</th>
                <th>权重</th>
                <th>点击量</th>
                <th>权限</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->archives()->count()}}</td>
                    <td>{{(int)$tag->weight}}</td>
                    <td>{{$tag->visit_count}}</td>
                    <td class="center tag-status">
                    @if($tag->status == 1)
                        <span class="status inactive">待审核标签</span>
                    @elseif($tag->status == 2)
                        <span class="status active">开放浏览</span>
                    @elseif($tag->status == 4)
                        <span class="status inactive">已停用</span>
                    @endif
                    </td>
                    <td class="center">
                        <a href="{{route('tag.edit', [$tag->name])}}" class="btn btn-circle btn-primary ">编辑</a>
                        <a href="{{ $tag->url }}" class="btn btn-circle btn-success ">预览</a>
                        @if($tag->status == 2)
                            <a data-href="{{route('tag.status', [$tag->pinyin, 4])}}" data-pinyin="{{$tag->pinyin}}" class="ajax-request btn btn-circle btn-danger ">停用</a>
                        @else
                            <a data-href="{{route('tag.status', [$tag->pinyin, 2])}}" data-pinyin="{{$tag->pinyin}}" class="ajax-request btn btn-circle btn-success">启用</a>
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
    <script src="{{asset('js/vue.js')}}"></script>
    <!-- DataTables JavaScript -->
    <script src={{asset("vendor/datatables/js/jquery.dataTables.min.js")}}></script>
    <script src={{asset("vendor/datatables-plugins/dataTables.bootstrap.min.js")}}></script>
    <script src={{asset("vendor/datatables-responsive/dataTables.responsive.js")}}></script>

    <!-- Custom Theme JavaScript -->
    <script>
        var $status_4 = [
            'btn-danger', 'btn-success', '停用',  4,
            '<span class="status active">开放浏览</span>'
        ];
        var $status_2 = [
            'btn-success', 'btn-danger', '启用', 2,
            '<span class="status inactive">已停用</span>'
        ];
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
            function gen_status () {
                $('.ajax-request').on('click', function () {
                    var $this = $(this)
                    $.getJSON($this.data('href'), function (response) {
                        var node = $this.hasClass('btn-success') ? $status_4 : $status_2
                        $this[0].dataset.href = "/member/tag/"+$this[0].dataset.pinyin+"/status/" + node[3]
                        $this
                                .addClass(node[0])
                                .removeClass(node[1])
                                .text(node[2]).parents('tr')
                                .find('.tag-status')
                                .html(node[4])
                        layer.msg(response.msg, {icon: 1})
                    })
                })
            }

            gen_status()

            $('.paginate_button').on('click' , gen_status)
        });
    </script>
@endsection