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
                                <li ><a href="{{url('member/archives/create/article')}}" > <span class="fa fa-file-word-o icon"></span>发布文章</a> </li>
                                <li ><a href="{{url('member/archives/create/gallery')}}" > <span class="fa fa-file-image-o icon"></span>发布图集</a> </li>
                                <li class="active"><a href="{{url('member/archives/create/video')}}" > <span class="fa fa-file-video-o icon"></span>发布视频</a> </li>
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
                                                @include('archive.common-input')
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
                                                    <label>视频简介</label>                                            <!--编辑器开始-->
                                                    <div class="form-group">
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
            var html = editor.$txt.html().replace(/\s\s/g, '');
            var text = editor.$txt.text().replace(/\s\s/g, '').substr(0, 120);
            data.append('content', html);
            data.append('abstract', text);
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
                        if(response.error){
                            if(typeof(response.msg.title)!='undefined'){
                                layer.msg(response.msg.title[0]);
                                return false;
                            }else if(typeof(response.msg.content)!='undefined'){
                                layer.msg(response.msg.content[0]);
                                return false;
                            }else if(typeof(response.msg.tags)!='undefined'){
                                layer.msg(response.msg.tags[0]);
                                return false;
                            }else if(typeof(response.msg.link)!='undefined'){
                                layer.msg(response.msg.link[0]);
                                return false;
                            }
                        }else {
                            layer.confirm(response[0], {
                                title: '信息',
                                btn: ['确定', response[1]] //按钮
                            }, function () {
                                window.location.href = '{{$left == 'master' ? route('archives.index', ['master']) : route('archives.index')}}'
                            }, function () {
                                window.location.reload()
                            })
                        }
                    })
                    .fail(function (response) {
                        layer.msg("失败", {icon: 2})
                    })
            return false;
        })

        $extract_tags_url = '{{route('tag.extract')}}';

        var gen_add_tag = function () {
            $('#extract a.btn-xss').on('click', function () {
                var input = $(this).parents('div.form-group').find('input')
                input.val(input.val() + (input.val() ? ',' : '') + $(this).text())
                if ($('#extract a.btn-xss').length == 1) $(this).parents('p').css('display', 'none')
                $(this).remove()
            })
        }

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
    </script>
    <script type="text/javascript" src={{asset("pulgin/wangEditor/dist/js/wangEditor.js")}}></script>
    <!--<script type="text/javascript" src="pulgin/wangEditor/dist/js/wangEditor.min.js"></script>-->
    <script type="text/javascript" src={{asset("js/wangEditor_emoji.js")}}></script>
@endsection