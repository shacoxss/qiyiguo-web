@extends('member.masterCommon')
@section('content')

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
        .input-file {
            margin-top: 12px;
            text-align: center;
        }
        .input-file input {
            position: relative;
        }
        .btn-xss {
            margin-bottom: 6px;
        }
    </style>
    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">新增标签</h1>
            <p class="page-subtitle">手动新增一个标签</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
        <li><a href="masterTagsList.php">标签管理</a></li>
        <li class="active">新增标签</li>
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
                                <li class="active"><a href="#normal" data-toggle="tab"> <span class="fa fa-file-text-o icon"></span>常规设置</a> </li>
                            </ul>

                            <!-- Tab panes -->
                            <form action="{{ route('tag.store') }}" method="POST" id="create-tag">
                                {{ csrf_field() }}
                                <div class="tab-content">
                                    <div class="tab-pane fade padding in active" id="normal">
                                        <!--Tab start-->
                                        <style>
                                            p.cur {background: #eee; padding: 3px; font-style: inherit;}
                                            .col-md-12,.col-md-4{padding-left: 0;}
                                        </style>
                                        <div class="col-lg-9">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-4">
                                                    <label>标签名称：</label>
                                                    <input class="form-control " placeholder="标签名称：" name="name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>URL自定义</label>
                                                    <input class="form-control " placeholder="URL自定义" name="current_url">
                                                    <p class="cur">默认全拼或英文，指定需检测是否重复</p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>自定义模版文件</label>
                                                    <input class="form-control " placeholder="自定义模版文件" name="template">
                                                    <p class="cur">未指定用默认模版</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <div class="col-lg-3">
                                            <h3>LOGO上传</h3>
                                            <input type="file" name="logo">
                                            <h3>背景上传</h3>
                                            <input type="file" name="background_image">
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <!--Tab End-->
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">提 交</button>
                                    <button type="reset" class="btn btn-default">重 置</button>
                                </div>
                            </form>
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
        $('#create-tag').on('submit', function () {
            var data =  new FormData($('#create-tag')[0]);
            $.ajax({
                url: '{{ route('tag.store') }}',
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
                    window.location.href = '{{route('tag.index')}}'
                }, function () {
                    window.location.reload()
                })
            })
            .fail(function (response) {
                layer.msg("失败", {icon: 2})
            })
            return false;
        })
    </script>
@endsection