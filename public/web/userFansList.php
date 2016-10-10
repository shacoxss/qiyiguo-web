<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<title>粉丝管理 - 奇异果 qiyiguo.tv</title>

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
        <h1 class="page-header">粉丝管理</h1>
        <p class="page-subtitle">他们都是你的粉丝哦，好好维护吧</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)">粉丝管理</a></li>
      <li class="active">粉丝列表</li>
    </ol>    
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="dataTables-userlist">
          <thead>
            <tr>
              <th>头像 </th>
              <th>用户名</th>
              <th>果龄</th>
              <th>最近登录</th>
              <th>等级</th>
              <th>关注</th>
              <th>粉丝</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd">
              <td><img src="http://www.qiyiguo.tv/uploads/allimg/160930/18_09301I13RY1.jpg" class="gridpic"></td>
              <td>信心阿仔</td>
              <td>7个月</td>
              <td class="center">2016-09-06</td>
              <td class="center">果宝宝</td>
              <td class="center">7</td>
              <td class="center">11</td>
              <td class="center">
                <a href="article_add.php" class="btn btn-circle btn-primary ">私信</a>
                <a href="" class="btn btn-circle btn-success ">看他</a>
              </td>
            </tr>
            <tr class="even">
              <td><img src="http://www.qiyiguo.tv/uploads/allimg/160930/18_09301612153202.jpg" class="gridpic"></td>
              <td>阿毛</td>
              <td>6个月</td>
              <td class="center">2016-10-07</td>
              <td class="center">果小班</td>
              <td class="center">17</td>
              <td class="center">23</td>
              <td class="center">
                <a href="article_add.php" class="btn btn-circle btn-primary ">私信</a>
                <a href="" class="btn btn-circle btn-success ">看他</a>
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
