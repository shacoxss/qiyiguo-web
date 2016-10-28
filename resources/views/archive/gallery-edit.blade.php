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
                                <li class="active"><a href="#normal" data-toggle="tab"> <span class="fa fa-file-text-o icon"></span>常规信息</a> </li>
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
                                                <div class="form-group">
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
                                                <div class="form-group">
                                                    <label>图集简介 </label>
                                                    <textarea class="form-control" rows="5" name="content">{!! $archive->detail->content or '' !!}</textarea>
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
                text = text.replace(/\s\s/g, '');

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