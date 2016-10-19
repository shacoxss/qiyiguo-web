@extends('member.userCommon')
@section('content')
<style>
    a.btn-xss {
        margin-bottom: 6px;
    }
</style>
    <div class="row">
    <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">编辑文档</h1>
        <p class="page-subtitle">您可以修改、增加文档的内容</p>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<ol class="breadcrumb">
    <li><a href="masterArchivesList.php">内容管理</a></li>
    <li class="active">编辑文档</li>
</ol>

<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#normal" data-toggle="tab"> <span class="fa fa-file-text-o icon"></span>常规信息</a> </li>
                            <!-- <li><a href="#content" data-toggle="tab"> <span class="fa fa-save icon"></span>正文内容</a> </li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade padding in active" id="normal">
                                <!--Tab start-->
                                <form id="archive" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field(isset($archive) ? 'PUT' : 'POST') }}
                                    <input name="id" type="hidden" />
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <label>文章标题：</label>
                                                <input class="form-control" name="title" placeholder="文章标题：" value="{{$archive->title or ''}}">
                                            </div>
                                            <div class="form-group">
                                                <label>标签(数量不可超过三个，选择好标签有助提升阅读量，<a href="#">点此学习如何写好标签</a>)</label>
                                                <input class="form-control" placeholder="标签" name="tags" value="{{$tags or ''}}">
                                                <br>
                                                <p>
                                                    推荐标签：
                                                    <span id="extract">
                                                    </span>
                                                </p>
                                            </div>
                                            @if(session('user')->master)
                                            <!-- 管理员属性编辑开始 -->
                                            <div class="row">
                                                <!-- 单属性控制 -->
                                                @foreach($patterns as $p)
                                                <div class="form-group col-md-3">
                                                    <div class="list-group-item withswitch">
                                                        <h5 class="list-group-item-heading">{{$p->display_name}}</h5>
                                                        <p class="list-group-item-text">{{'{'.$p->name.'}'}}</p>
                                                        <div class="switch">
                                                            <input id="cmn-toggle-{{$p->name}}" class="cmn-toggle 
                                                                cmn-toggle-round" type="checkbox" name="{{$p->name}}"
                                                                @if(isset($archive) && ($archive->mode & $p->pattern) == $p->pattern)
                                                                    checked="checked"
                                                                @endif
                                                            >
                                                            <label for="cmn-toggle-{{$p->name}}" style="border:none;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <!-- 单属性控制 -->
                                                <div class="form-group col-md-12">
                                                    <label>关联系统栏目</label>
                                                    <select class="form-control" name="category_id">
                                                        @foreach($cate as $c)
                                                            <option @if(isset($archive) && $archive->category_id == $c->cate_id)
                                                                    selected
                                                                    @endif
                                                                value="{{$c->cate_id}}">
                                                                {{str_repeat('--', $c->lev)}} {{$c->cate_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- 管理员属性编辑开始 -->
                                            @endif
                                            <!--编辑器开始-->
                                            <div class="form-group">
                                                <label style="margin-top:15px; margin-bottom:15px;">正文</label>
                                                <link rel="stylesheet" type="text/css" href="{{asset('pulgin/wangEditor/dist/css/wangEditor.min.css')}}">
                                                <style type="text/css">
                                                    #editor-trigger {
                                                        height: 600px;
                                                        /*max-height: 600px;*/
                                                    }
                                                    .container {
                                                        width: 100%;
                                                        margin: 0 auto;
                                                        position: relative;
                                                        padding: 0;
                                                    }
                                                </style>
                                                <input type="hidden" name="content">
                                                <div id="editor-container" class="container">
                                                    <div id="editor-trigger">
                                                        {!! $archive->detail->content or '' !!}
                                                    </div>
                                                    <!-- <textarea id="editor-trigger" style="display:none;">
                                                        <p>请输入内容...</p>
                                                    </textarea> -->
                                                </div>
                                            </div>
                                            <!--编辑器结束-->
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <div class="col-lg-3">
                                            @if(isset($archive) && $archive->cover)
                                                <img style="max-width:250px;" src="{{$archive->cover}}" />
                                            @endif
                                            <h3>封面上传</h3>
                                            <input type="file" name="cover">
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">提 交</button>
                                        <button type="reset" class="btn btn-default">重 置</button>
                                    </div>
                                </form>
                                <!--Tab End-->
                            </div>
                            <!-- <div class="tab-pane fade padding" id="content">
                            </div> -->
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection


@section('scripts')
    <script>
        $archive_update_url = '{{isset($archive) ? route('archives.update', [$archive->id]) : route('archives.store', ['article'])}}';
        $_token = '{{ csrf_token() }}';
        $uploadImgUrl = '{{route('archives.upload')}}';
        $extract_tags_url = '{{route('tag.extract')}}';
        $archive_list_url = '{{route('userArchivesList')}}'

        var gen_add_tag = function () {
            $('#extract a.btn-xss').on('click', function () {
                var input = $(this).parents('div.form-group').find('input')
                input.val(input.val() + (input.val() ? ',' : '') + $(this).text())
                $(this).remove()
            })
        }

        $('#archive').on('submit', function () {
            var data =  new FormData($('#archive')[0]);
            data.append('_token', $_token);
            var html = editor.$txt.html().replace(/\s\s/g, '');
            var text = editor.$txt.text().replace(/\s\s/g, '').substr(0, 120);
            data.append('content', html);
            data.append('abstract', text);
            $.ajax({
                url: $archive_update_url,
                type: 'POST',
                cache: false,
                data: data,
                processData: false,
                contentType: false
            })
            .done(function (response) {
                layer.msg(response.msg, {icon: 1})
                window.location.href = $archive_list_url
            })
            .fail(function (response) {
                layer.msg("失败", {icon: 2})
            })
            return false;
        })

        $editor_change = function () {
            var lock_count, lock_time, lock_response
            lock_count = lock_time = lock_response = false
            return function () {
                var text = editor.$txt.text().replace(/\s\s/g, '');
                
                lock_count = Math.abs(text.length - $content_length) < 20
                    ? true : false

                

                if (lock_count || lock_time || lock_response) return ;

                lock_time = lock_response = true
                setTimeout(function () {lock_time = false}, 5000)
                $content_length = text.length
                $.ajax({
                    url : $extract_tags_url,
                    type : 'POST',
                    data : {
                        'text' : text,
                        '_token' : $_token
                    }
                }).done(function (response) {
                    var sort = [];
                    for (var tag in response) {
                        sort.push({tag:tag, weight: response[tag]})
                    }
                    sort = sort.sort(function down(x, y) {
                        return (x.weight < y.weight) ? 1 : -1

                    });
                    var $extract = $('#extract');
                    $extract.html('')
                    for (var i = 0; i < sort.length; i++) {
                        $extract.append('<a href="#" class="btn btn-primary btn-xss"><i class="fa fa-plus"></i> '+sort[i].tag+'</a>')
                        gen_add_tag()
                        if(i>7) break;
                    }
                    lock_response = false
                })
            }

        }
    </script>
    <!--wangEditor js-->
    <script type="text/javascript" src={{asset("pulgin/wangEditor/dist/js/wangEditor.js")}}></script>
    <!--<script type="text/javascript" src="pulgin/wangEditor/dist/js/wangEditor.min.js"></script>-->
    <script type="text/javascript" src={{asset("js/wangEditor_emoji.js")}}></script>
@endsection