@extends('member.'.$left.'Common')
@section('content')
    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">新增视频</h1>
            <p class="page-subtitle">添加一个视频作品</p>
        </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
        <li><a href="addIndex.php">内容管理</a></li>
        <li class="active">新增视频</li>
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
                                    <form role="form" id="archive" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field(isset($archive) ? 'PUT' : 'POST') }}
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="form-group ">
                                                    <label>文章标题：</label>
                                                    <input class="form-control " placeholder="文章标题：" name="title" value="{{$archive->title or ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>标签(数量不可超过三个，选择好标签有助提升阅读量，<a href="#">点此学习如何写好标签</a>)</label>
                                                    <input class="form-control" placeholder="标签" name="tags" value="{{$tags or ''}}">
                                                    <br>
                                                    <p style="display: none;">
                                                        推荐标签：
                                                        <span id="extract">
                                                    </span>
                                                    </p>
                                                </div>
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
                                                {{--<div class="form-group">--}}
                                                    {{--<label>视频上传</label> <br><br>--}}
                                                    {{--<a href="#" class="btn btn-primary btn-xss input-file-a-style">--}}
                                                        {{--<i class="fa fa-plus"></i> 点击上传视频--}}
                                                        {{--<input type="file" class="input-file-style">--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#" class="btn btn-primary btn-xss input-file-a-style">--}}
                                                        {{--<i class="fa fa-file-movie-o"></i> 22064.fla--}}
                                                        {{--<input type="file" class="input-file-style">--}}
                                                    {{--</a>--}}
                                                    {{--<div class="progress">--}}
                                                        {{--<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 41%">--}}
                                                            {{--<span class="sr-only">上传进度 40%</span>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<!-- 视频预览 -->--}}
                                                    {{--<div class="panel panel-success">--}}
                                                        {{--<div class="panel-heading"> 视频预览 </div>--}}
                                                        {{--<a href="javascript:;" class="delete-vedio availablity btn btn-circle btn-danger" title="删除">--}}
                                                            {{--<i class="fa fa-times"></i>--}}
                                                        {{--</a>--}}
                                                        {{--<div class="panel-body">--}}
                                                            {{--<!-- ckplayer -->--}}
                                                            {{--<div id="a1"></div>--}}
                                                            {{--<script type="text/javascript" src="pulgin/ckplayer6.8/ckplayer/ckplayer.js" charset="utf-8"></script>--}}
                                                            {{--<script type="text/javascript">--}}
                                                                {{--var flashvars={--}}
                                                                    {{--f:'http://movie.ks.js.cn/flv/other/1_0.flv',--}}
                                                                    {{--c:0,--}}
                                                                    {{--i:'img/vedio_bg.png',--}}
                                                                    {{--wh:'16:9',--}}
                                                                    {{--h:4--}}
                                                                {{--};--}}
                                                                {{--var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};--}}
                                                                {{--var video=['http://movie.ks.js.cn/flv/other/1_0.flv'];--}}
                                                                {{--CKobject.embed('pulgin/ckplayer6.8/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','500',false,flashvars,video,params);--}}
                                                            {{--</script>--}}
                                                            {{--<!-- ckplayer -->--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<!-- 视频预览 -->--}}
                                                {{--</div>--}}
                                                <div class="form-group">
                                                    <label>视频地址(第三方视频网站调用)</label>
                                                    <input class="form-control " placeholder="视频地址：" name="link" value="{{ $archive->detail->link or '' }}" >
                                                </div>
                                                <div class="form-group">
                                                    <label>视频简介</label>
                                                    <textarea class="form-control" rows="5" name="content">{!! $archive->detail->content or '' !!}</textarea>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-3">
                                                <h3>缩略图上传</h3>
                                                @if(isset($archive) && $archive->cover)
                                                    <img style="max-width:250px;" src="{{route('image', [$archive->cover, '250'])}}" />
                                                @endif
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

        $('#archive').on('submit', function () {
            var data =  new FormData($('#archive')[0]);
            $.ajax({
                url: '{{isset($archive) ? route('archives.update', [$archive->id]) : route('archives.store', ['video'])}}',
                type: 'POST',
                cache: false,
                data: data,
                processData: false,
                contentType: false
            })
                    .done(function (response) {
                        console.log(response);
                        layer.confirm(response[0], {
                            title: '信息',
                            btn: ['确定', response[1]] //按钮
                        }, function () {
                            window.location.href = '{{$left == 'master' ? route('archives.index', ['master']) : route('archives.index')}}'
                        }, function () {
                            window.location.reload()
                        })
                    })
                    .fail(function (response) {
                        layer.msg("失败", {icon: 2})
                    })
            return false;
        })

        $extract_tags_url = '{{route('tag.extract')}}';
        $content = $('textarea[name=content]');
        $content_length = $content.val().length;

        var gen_add_tag = function () {
            $('#extract a.btn-xss').on('click', function () {
                var input = $(this).parents('div.form-group').find('input')
                input.val(input.val() + (input.val() ? ',' : '') + $(this).text())
                if ($('#extract a.btn-xss').length == 1) $(this).parents('p').css('display', 'none')
                $(this).remove()
            })
        }

        $editor_change = function (text) {
            var lock_count, lock_time, lock_response
            lock_count = lock_time = lock_response = false
            return function () {
                text = $(this).val().replace(/\s\s/g, '');
//                lock_count = Math.abs(text.length - $content_length) < 20
//                        ? true : false


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
                        if(i>7) break;
                    }
                    gen_add_tag()
                    $extract.parents('p').css('display', 'block')
                    lock_response = false
                }).fail(function () {
                    lock_response = false;
                })
            }

        }
        $content.on('change', $editor_change($content.val()))

    </script>
@endsection