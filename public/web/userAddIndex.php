<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<title>内容管理 - 奇异果 qiyiguo.tv</title>

<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="vendor/morrisjs/morris.css" rel="stylesheet">

<!-- jvectormap CSS -->
<link href="vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet">

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

<!-- loader ends -->        
    
<div id="wrapper">
	<?php include"inc/userSidebar.php"; ?>
  <!-- /.navbar-static-side -->
  
  <div id="page-wrapper">
	<?php include"inc/navbarTop.php"; ?>
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">内容管理</h1>
        <p class="page-subtitle">请选择您要发布的文档类型</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)">奇异果聚合</a></li>
      <li class="active">内容管理</li>
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
          <a href="userArticleAdd.php">
          <div class="panel-footer"> <span class="pull-left"><i class="fa fa-plus"></i> 发布文章</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
          <div class="panel-footer"> <span class="pull-left"><i class="fa fa-plus"></i> 发布图集</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
          <div class="panel-footer"> <span class="pull-left"><i class="fa fa-plus"></i> 发布视频</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a>
        </div>
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

<!-- Custom Theme JavaScript --> 
<script src="js/adminnine.js"></script> 
</body>
</html>
