<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<title>文章列表 - 奇异果 qiyiguo.tv</title>

<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/adminnine.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- loader -->
<!-- loader ends -->
<div id="wrapper">
	<?php include"inc/userSidebar.php"; ?>
  <!-- /.navbar-static-side --> 
    
  <!-- Page Content -->
  <div id="page-wrapper">
	<?php include"inc/navbarTop.php"; ?>
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">文档列表</h1>
        <p class="page-subtitle">您发布的所有文档都在这里啦</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)">内容管理</a></li>
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
                <div class="huge">121566</div>
                <div>文章</div>
              </div>
            </div>
          </div>
          <a href="articleAdd.php">
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
                <div class="huge">1562</div>
                <div>图集</div>
              </div>
            </div>
          </div>
          <a href="galleryAdd.php">
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
                <div class="huge">1562</div>
                <div>视频</div>
              </div>
            </div>
          </div>
          <a href="vedioAdd.php">
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
        <table class="table table-bordered table-hover" id="dataTables-userlist">
          <thead>
      			<div class="row">
      				<p>
      				  <button type="button" class="btn btn-primary btn-xs" onclick="window.open('userArticleAdd.php','_self')"><i class="fa fa-plus"></i> 发布</button>
      				  <button type="button" class="btn btn-success btn-xs"><i class="fa fa-arrows"></i> 全选</button>
      				  <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> 删除</button>
      				</p>
      			</div>
            <tr>
              <th><input type="checkbox" /> </th>
              <th>ID </th>
              <th>标题 </th>
              <th>时间</th>
              <th>发布者</th>
              <th width="100">类型</th>
              <th>标签</th>
              <th width="100">点击</th>
              <th>权限</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd">
      			  <td><input type="checkbox" /></td>
      			  <td>1</td>
              <td><img src="http://www.qiyiguo.tv/uploads/allimg/160930/18_09301I13RY1.jpg" alt="" class="gridpic"> 川烈解说：弹无虚发的世界第一麦克雷！</td>
              <td>2016-09-30</td>
              <td>caomengli</td>
              <td class="center">文章</td>
              <td class="center">
                <a href="#" class="btn btn-primary btn-xss">OW</a>
                <a href="#" class="btn btn-primary btn-xss">麦克雷</a>
                <a href="#" class="btn btn-primary btn-xss">FPS</a>
              </td>
              <td class="center">51</td>
              <td class="center"><span class="status inactive">待审核稿件</span></td>
              <td class="center">
                <a href="article_add.php" class="btn btn-circle btn-primary ">编辑</a>
                <a href="" class="btn btn-circle btn-success ">预览</a>
                <a href="" class="btn btn-circle btn-danger ">删除</a>
              </td>
            </tr>
            <tr class="even">
              <td><input type="checkbox" /></td>
              <td>2</td>
              <td><img src="http://www.qiyiguo.tv/uploads/allimg/160930/18_09301612153202.jpg" alt="" class="gridpic"> 这个身材很不错哦！守望D.VA精美同人COS秀</td>
              <td>2016-09-29</td>
              <td>caomengli</td>
              <td class="center">图集</td>
              <td class="center">
                <a href="#" class="btn btn-primary btn-xss">COS</a>
                <a href="#" class="btn btn-primary btn-xss">D.VA</a>
                <a href="#" class="btn btn-primary btn-xss">守望先锋</a>
              </td>
              <td class="center">108</td>
              <td class="center"><span class="status active">开放浏览</span></td>
              <td class="center">
                <a href="article_add.php" class="btn btn-circle btn-primary ">编辑</a>
                <a href="" class="btn btn-circle btn-success ">预览</a>
                <a href="" class="btn btn-circle btn-danger ">删除</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.row --> 
    
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper -->
<!-- jQuery --> 
<script src="vendor/jquery/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="vendor/bootstrap/js/bootstrap.min.js"></script> 

<!-- DataTables JavaScript --> 
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script> 
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script> 
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="js/adminnine.js"></script> 
<script>
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
        });
    </script>
</body>
</html>
