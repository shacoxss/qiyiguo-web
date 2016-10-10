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
<!-- loader-->
	<?php include"inc/loader.php"; ?>

<!-- loader ends -->        
    
<div id="wrapper">
	<?php include"inc/usersidebar.php"; ?>
  <!-- /.navbar-static-side -->
  
  <div id="page-wrapper">
	<?php include"inc/navbarTop.php"; ?>
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">用户中心</h1>
        <p class="page-subtitle">奇异果用户中心，在这里您可以管理自己的文章、图片、视频。
        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> 签到</button>
        <button type="button" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> 今天已签到，明天再来吧</button>
        </p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    
    <ol class="breadcrumb">
      <li><a href="http://www.qiyiguo.tv" target="_blank">奇异果聚合</a></li>
      <li class="active">用户中心</li>
    </ol>
    
    <!-- /.row -->
    
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-blue">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-save fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">121566</div>
                <div>文档总数</div>
              </div>
            </div>
          </div>
          <a href="archivesList.php">
          <div class="panel-footer"> <span class="pull-left">所有文档</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-users fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">1562</div>
                <div>粉丝</div>
              </div>
            </div>
          </div>
          <a href="userFansList.php.php">
          <div class="panel-footer"> <span class="pull-left">粉丝管理</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-star fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">1562</div>
                <div>关注主播</div>
              </div>
            </div>
          </div>
          <a href="javascript:void(0)">
          <div class="panel-footer"> <span class="pull-left">所有关注收藏的</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-key fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">1562</div>
                <div>积分</div>
              </div>
            </div>
          </div>
          <a href="javascript:void(0)">
          <div class="panel-footer"> <span class="pull-left">积分可以干什么</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
