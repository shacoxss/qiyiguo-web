<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>用户中心 - 奇异果 qiyiguo.tv</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- jvectormap CSS -->
    <link href="{{asset('vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/adminnine.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>


</head>

<body>
<!-- loader-->

<!-- loader ends -->

<div id="wrapper">
    <div class="navbar-default sidebar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" title="伸缩导航" > <span class="sr-only">伸缩导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="{{'/'}}" target="_blank">奇异果聚合</a> </div>
        <div class="clearfix"></div>
        <div class="sidebar-nav navbar-collapse">

            <!-- user profile pic -->
            <div class="userprofile text-center">
                <div class="userpic">
                    <img src="{{session('user')->head_img}}" onerror="this.src='{{asset('img/100100.png')}}'" alt="" class="userpicimg">
                    <!-- 判断是否有后台权限，有后台权限显示此按钮后可互相切换 -->
                    <a href="{{url('member/index')}}" title="切换至普通用户" class="btn btn-primary settingbtn"><i class="fa fa-random"></i></a>
                    <!-- 判断是否有后台权限，有后台权限显示此按钮后可互相切换 -->
                </div>
                @if(session('user')->nickname)
                    <h3 class="username">{{session('user')->nickname}}</h3>
                @else
                    <h3 class="username">{{session('user')->phone}}</h3>
                @endif
                <p>用户组</p>
            </div>
            <div class="clearfix"></div>
            <!-- user profile pic -->

            <ul class="nav" id="side-menu">
                <li> <a href="{{url('member/masterIndex')}}"><i class="fa fa-dashboard fa-fw"></i> 控制中心</a> </li>
                @if(session('user')->user_manage)
                <li> <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-users"></i> 用户管理 <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('member/userManage')}}">用户列表</a></li>
                        <li><a href="#">编辑绩效</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                @if(session('user')->content_manage)
                <li>
                    <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-save"></i> 内容管理 <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('archives.index', ['master','mode'=>'review'])}}">待审核内容</a></li>
                        <li><a href="{{route('archives.index', ['master'])}}">所有内容</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                @if(session('user')->tag_manage)
                <li>
                    <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-tag"></i> 标签管理 <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('tag.create') }}">新增</a></li>
                        <li><a href="{{route('tag.index')}}">列表</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                @if(session('user')->cat_manage)
                <li> <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-file"></i> 栏目管理 <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('member/masterCategoryAdd')}}">新建栏目</a></li>
                        <li><a href="{{url('member/masterCategory')}}">栏目列表</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endif
                @if(session('user')->root_manage)
                <li> <a href="{{url('member/masterPowers')}}"><i class="fa fa-user fa-fw"></i> 权限管理</a> </li>
                @endif
                @if(session('user')->global_manage)
                <li> <a href="{{url('member/masterGlobal')}}"><i class="fa fa-gear fa-fw"></i> 全局变量</a> </li>
                @endif

                @if(session('user')->admin)
                    <li> <a href="javascript:void(0)" class="menudropdown"><i class="fa fa-link"></i> 友情链接 <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('member/links/create')}}">新增链接</a></li>
                            <li><a href="{{url('member/links')}}">链接列表</a></li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                @endif
                <li> <a href="{{url('auth/logout')}}"><i class="fa fa-sign-out fa-fw"></i> 注销</a> </li>
            </ul>
        </div>
    </div>
    <!-- /.navbar-static-side -->

    <div id="page-wrapper">
        <div class="row">
            <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
                <button class="menubtn pull-left btn "><i class="glyphicon  glyphicon-th"></i> 隐藏/显示导航栏</button>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"> <a class="dropdown-toggle userdd" data-toggle="dropdown" href="javascript:void(0)">
                            <div class="userprofile small "> <span class="userpic"> <img src="{{session('user')->head_img}}" onerror="this.src='{{asset('img/100100.png')}}'" alt="" class="userpicimg">  </span>
                                <div class="textcontainer">
                                    @if(session('user')->nickname)
                                        <h3 class="username">{{session('user')->nickname}}</h3>
                                    @else
                                        <h3 class="username">{{session('user')->phone}}</h3>
                                    @endif
                                    <p>用户组</p>
                                </div>
                            </div>
                            <i class="caret"></i> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li> <a href="{{url('member/userProfile')}}"><i class="fa fa-user fa-fw"></i> 个人资料</a> </li>
                            {{--<li> <a href="userSetting.php"><i class="fa fa-gear fa-fw"></i> 隐私设置</a> </li>--}}
                            <li> <a href="{{url('auth/logout')}}"><i class="fa fa-sign-out fa-fw"></i> 注销</a> </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
            </nav>
        </div>
        @section('content')
        @show
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->




<!-- jQuery -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>



<!-- DataTables JavaScript -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/datatables-responsive/dataTables.responsive.js')}}"></script>



<!-- jvectormap JavaScript -->
<script src="{{asset('vendor/jquery-jvectormap/jquery-jvectormap.js')}}"></script>
<script src="{{asset('vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('js/adminnine.js')}}"></script>
<script src="{{asset('pulgin/layer/layer.js?v=2.4')}}"></script>
<script>
    $uploadImgUrl = '{{route('archives.upload')}}';
    $_token = '{{ csrf_token() }}';
    $editor_change = function () {};
</script>
@yield('script')
@yield('scripts')
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script src="{{asset('vendor/raphael/raphael.js')}}"></script>
<script src="{{asset('vendor/morrisjs/morris.min.js')}}"></script>
<script src="{{asset('vendor/morrisjs/morris-data.js')}}"></script>
</body>
</html>