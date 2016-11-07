@extends('member.'.$left.'Common')
@section('content')
    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">新增图集</h1>
            <p class="page-subtitle">添加一个图集作品</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
        <li><a href="addIndex.php">内容管理</a></li>
        <li class="active">新增图集</li>
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
                                <li class="active"><a href="{{url('member/archives/create/gallery')}}" > <span class="fa fa-file-image-o icon"></span>发布图集</a> </li>
                                <li ><a href="{{url('member/archives/create/video')}}" > <span class="fa fa-file-video-o icon"></span>发布视频</a> </li>
                                <!-- <li><a href="#content" data-toggle="tab"> <span class="fa fa-save icon"></span>正文内容</a> </li> -->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade padding in active" id="normal">
                                    <!--Tab start-->
                                    <form role="form" method="POST" id="submit">
                                        {{ csrf_field() }}
                                        {{ method_field(isset($archive) ? 'PUT' : 'POST') }}
                                        <div class="row">
                                            <div class="col-lg-9">
                                                @include('archive.common-input')
                                                <div class="form-group">
                                                    <label>图集简介 </label>
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
                                                <input type="file" multiple id="gallery" style="display: none;"/>
                                                <div class="form-group">
                                                    <a href="javascript:;" class="uploadImgGroup btn btn-primary btn-xl"><i class="fa fa-plus"></i> 点击上传图片</a><br><br>
                                                    <p class="info">拖动可排序</p>
                                                    <!--图片列表模式-->
                                                    <div class="row sortable">
                                                        <!--图片单张模式-->
                                                        @if (isset($archive))
                                                            @foreach ($archive->detail->images()->get() as $img)
                                                                <div class="col-lg-3 col-md-4 col-sm-6">
                                                                    <div class="panel panel-success userlist">
                                                                        <div class="panel-heading">
                                                                            <h3 class="page-header small" style="font-size:14px;">{{$img->title}}.</h3>
                                                                            <a href="javascript:;" class="delete-pic availablity btn btn-circle btn-danger" title="删除"><i class="fa fa-times"></i></a> </div>
                                                                        <div class="panel-body text-center">
                                                                            <div class="image-box">
                                                                                <div> <img src="{{ route('image', [$img->url, '300x300']) }}" width="100%"> </div>
                                                                            </div>
                                                                            <input class="form-control " placeholder="图片标题" value="{{$img->title}}">
                                                                            <textarea class="form-control" rows="5">{!! $img->description !!}</textarea>
                                                                            <input type="hidden" value="{{$img->url}}" class="img_url" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <!--图片单张模式结束-->
                                                    </div>
                                                    <!--图片列表模式结束-->
                                                </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-3">
                                                @if(isset($archive) && $archive->cover)
                                                    <img style="max-width:250px;" src="{{route('image', [$archive->cover, '250'])}}" />
                                                @endif
                                                <a href="javascript:;" class="uploadImgGroup btn btn-primary btn-xl"><i class="fa fa-plus"></i> 点击上传封面
                                                    <input type="file" name="cover" style="display: none;">
                                                </a>
                                                <label>默认使用图集第一张图片作为封面</label>
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
    <style>
        .image-box {
            height: 300px;
            overflow: hidden;
        }
    </style>
    <script src="{{ asset('js/Sortable.js') }}"></script>
    <script src="{{ asset('js/jquery.binding.js') }}"></script>
    <script>
        var $files = [];
        function generateItem(file, index) {
            return $(
                '<div data-index="'+index+'" class="col-lg-3 col-md-4 col-sm-6">\
                    <div class="panel panel-success userlist">\
                        <div class="panel-heading">\
                            <h3 class="page-header small" style="font-size:14px;">'+file.name+'</h3>\
                            <a href="javascript:;" class="delete-pic availablity btn btn-circle btn-danger" title="删除"><i class="fa fa-times"></i></a>\
                        </div>\
                        <div class="panel-body text-center">\
                            <div class="image-box">\
                                <div> <img src="'+URL.createObjectURL(file)+'" style="width: 100%"> </div>\
                            </div>\
                            <input class="form-control " placeholder="图片标题">\
                            <textarea class="form-control" rows="5" ></textarea>\
                        </div>\
                    </div>\
                </div>'
            )
        }

        function generate_del_click() {
            $('.delete-pic').click(function(){
                var ctx = $(this)
                layer.confirm('确认删除此图片', {
                    title: '删除确认',
                    btn: ['确认','取消'] //按钮
                }, function(){
                    ctx.parents('div.col-lg-3').remove()
                    layer.msg('删除成功', {icon: 1});
                });
            });
        }

        generate_del_click()

        $('.sortable').sortable();
        $('.uploadImgGroup').click(function(){
            $('#gallery').click();
        });


        $('#gallery').on('change', function (event) {
            var box = $('.sortable')//.html('')
            out:
            for (var i = 0; i < this.files.length; i++) {
                for (var j = 0; j < $files.length; j++) {
                    if ($files[j] == this.files.item(i)) continue out;
                }
                $files.push(this.files.item(i))
                box.append(generateItem(this.files.item(i), $files.length - 1))
            }
            generate_del_click();
        })

        $('#submit').on('submit', function () {
            var data =  new FormData($('#submit')[0]);
            var html = editor.$txt.html().replace(/\s\s/g, '');
            var text = editor.$txt.text().replace(/\s\s/g, '').substr(0, 120);
            data.append('content', html);
            data.append('abstract', text);
            var files = $('#gallery')[0].files;
            $('.sortable>div').each(function (i, item) {
                var old = $(item).find('input.img_url')
                var file = old.length === 1 ? old.val() : $(item).data('index')
                data.append('images[]', JSON.stringify({
                    title : $(item).find('input.form-control').val(),
                    description : $(item).find('textarea.form-control').val(),
                    url : file
                }))
//                data.append('img_title[]', $(item).find('input.form-control').val())
//                data.append('img_description[]', $(item).find('textarea.form-control').val())
            })
            $files.forEach(function(file) {
                data.append('files[]', file)
            })

            $.ajax({
                url: '{{isset($archive) ? route('archives.update', [$archive->id]) : route('archives.store', ['gallery'])}}',
                type: 'POST',
                cache: false,
                data: data,
                processData: false,
                contentType: false
            })
            .done(function (response) {
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
                    }else if(typeof(response.msg.images)!='undefined'){
                        layer.msg(response.msg.images[0]);
                        return false;
                    }
                }else{
                    layer.confirm(response[0], {
                        title: '信息',
                        btn: ['确定', response[1]] //按钮
                    }, function () {
                        window.location.href = '{{$left == 'master' ? route('archives.index', ['master']) : route('archives.index')}}'
                    }, function () {
                        window.location.reload()
                    })
                }
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