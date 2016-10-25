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
                                    <form role="form">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="form-group ">
                                                    <label>文章标题：</label>
                                                    <input class="form-control " placeholder="文章标题：" >
                                                </div>
                                                <div class="form-group">
                                                    <label>标签(数量不可超过三个，选择好标签有助提升阅读量，<a href="#">点此学习如何写好标签</a>)</label>
                                                    <input class="form-control " placeholder="标签">
                                                    <br>
                                                    <p>
                                                        推荐标签：
                                                        <a href="#" class="btn btn-primary btn-xss"><i class="fa fa-plus"></i> FPS</a>
                                                        <a href="#" class="btn btn-primary btn-xss"><i class="fa fa-plus"></i> 射击游戏</a>
                                                        <a href="#" class="btn btn-primary btn-xss"><i class="fa fa-plus"></i> NGA战队</a>
                                                    </p>
                                                    <!--from通用提示-->
                                                </div>
                                                <div class="form-group">
                                                    <label>图集简介 </label>
                                                    <textarea class="form-control" rows="5"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>上传图集 &nbsp;&nbsp;&nbsp;<input type="checkbox" style="vertical-align:sub; "> 使用第一张图片作为封面</label><br><br>
                                                    <a href="javascript:;" class="uploadImgGroup btn btn-primary btn-xl"><i class="fa fa-plus"></i> 点击上传图片</a><br><br>
                                                    <!--图片列表模式-->
                                                    <div class="row">
                                                        <!--图片单张模式-->
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="panel panel-success userlist">
                                                                <div class="panel-heading">
                                                                    <h3 class="page-header small" style="font-size:14px;">20161009170601</h3>
                                                                    <a href="javascript:;" class="delete-pic availablity btn btn-circle btn-danger" title="删除"><i class="fa fa-times"></i></a> </div>
                                                                <div class="panel-body text-center">
                                                                    <div class="userprofile">
                                                                        <div> <img src="img/500.png" width="100%" height=""> </div>
                                                                    </div>
                                                                    <input class="form-control " placeholder="图片标题">
                                                                    <textarea class="form-control" rows="5">这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--图片单张模式结束-->
                                                        <!--图片单张模式-->
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="panel panel-success userlist">
                                                                <div class="panel-heading">
                                                                    <h3 class="page-header small" style="font-size:14px;">20161009170601</h3>
                                                                    <a href="javascript:;" class="delete-pic availablity btn btn-circle btn-danger" title="删除"><i class="fa fa-times"></i></a> </div>
                                                                <div class="panel-body text-center">
                                                                    <div class="userprofile">
                                                                        <div> <img src="img/500.png" width="100%"> </div>
                                                                    </div>
                                                                    <input class="form-control " placeholder="图片标题">
                                                                    <textarea class="form-control" rows="5">这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--图片单张模式结束-->
                                                        <!--图片单张模式-->
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="panel panel-success userlist">
                                                                <div class="panel-heading">
                                                                    <h3 class="page-header small" style="font-size:14px;">20161009170601</h3>
                                                                    <a href="javascript:;" class="delete-pic availablity btn btn-circle btn-danger" title="删除"><i class="fa fa-times"></i></a> </div>
                                                                <div class="panel-body text-center">
                                                                    <div class="userprofile">
                                                                        <div> <img src="img/500.png" width="100%"> </div>
                                                                    </div>
                                                                    <input class="form-control " placeholder="图片标题">
                                                                    <textarea class="form-control" rows="5">这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--图片单张模式结束-->
                                                        <!--图片单张模式-->
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="panel panel-success userlist">
                                                                <div class="panel-heading">
                                                                    <h3 class="page-header small" style="font-size:14px;">20161009170601</h3>
                                                                    <a href="javascript:;" class="delete-pic availablity btn btn-circle btn-danger" title="删除"><i class="fa fa-times"></i></a> </div>
                                                                <div class="panel-body text-center">
                                                                    <div class="userprofile">
                                                                        <div> <img src="img/500.png" width="100%"> </div>
                                                                    </div>
                                                                    <input class="form-control " placeholder="图片标题">
                                                                    <textarea class="form-control" rows="5">这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--图片单张模式结束-->
                                                        <!--图片单张模式-->
                                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                                            <div class="panel panel-success userlist">
                                                                <div class="panel-heading">
                                                                    <h3 class="page-header small" style="font-size:14px;">20161009170601</h3>
                                                                    <a href="javascript:;" class="delete-pic availablity btn btn-circle btn-danger" title="删除"><i class="fa fa-times"></i></a> </div>
                                                                <div class="panel-body text-center">
                                                                    <div class="userprofile">
                                                                        <div> <img src="img/500.png" width="100%"> </div>
                                                                    </div>
                                                                    <input class="form-control " placeholder="图片标题">
                                                                    <textarea class="form-control" rows="5">这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊这里写的是图片的简介啊</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--图片单张模式结束-->
                                                    </div>
                                                    <!--图片列表模式结束-->
                                                </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-3">
                                                <h3>封面上传 </h3>
                                                <input type="file">
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
        $('.uploadImgGroup').click(function(){
            layer.open({
                type: 2,
                border: [0],
                title: false,
                shadeClose: true,
                closeBtn: true,
                area: ['830px' , '363px'],
                content: 'plupLoad.html'
            })
        });
        $('.delete-pic').click(function(){
            layer.confirm('确认删除此图片', {
                title: '删除确认',
                btn: ['确认','取消'] //按钮
            }, function(){
                layer.msg('删除成功', {icon: 1});
            });
        });
    </script>
@endsection