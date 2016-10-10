<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<title>标签管理 - 奇异果 qiyiguo.tv</title>

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
	<?php include"inc/masterSidebar.php"; ?>
  <!-- /.navbar-static-side --> 
    
  <!-- Page Content -->
  <div id="page-wrapper">
	<?php include"inc/navbarTop.php"; ?>
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">标签管理</h1>
        <p class="page-subtitle">网站文章、视频、图集的标签都在这里</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)">标签管理</a></li>
      <li class="active">标签列表</li>
    </ol>    
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="dataTables-userlist">
          <thead>
            <div class="row">
              <p>
                <button type="button" class="btn btn-primary btn-xs" onclick="window.open('masterTagAdd.php','_self')"><i class="fa fa-plus"></i> 新增</button>
                <button type="button" class="btn btn-success btn-xs"><i class="fa fa-arrows"></i> 全选</button>
                <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> 审核</button>
                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> 停用</button>
              </p>
            </div>
            <tr>
              <th width="100"><input type="checkbox" /> </th>
              <th width="100">ID</th>
              <th>标签名</th>
              <th>文档数</th>
              <th>权重</th>
              <th>点击量</th>
              <th>权限</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <tr class="odd">
              <td><input type="checkbox" /></td>
              <td>1</td>
              <td>OW</td>
              <td>115</td>
              <td>64</td>
              <td>0</td>
              <td class="center"><span class="status inactive">待审核标签</span></td>
              <td class="center">
                <a href="masterTagEdit.php" class="btn btn-circle btn-primary ">编辑</a>
                <a href="#" class="btn btn-circle btn-success ">预览</a>
                <a href="#" class="btn btn-circle btn-danger ">停用</a>
              </td>
            </tr>
            <tr class="even">
              <td><input type="checkbox" /></td>
              <td>2</td>
              <td>守望先锋</td>
              <td>123</td>
              <td>115</td>
              <td>765</td>
              <td class="center"><span class="status active">开放浏览</span></td>
              <td class="center">
                <a href="masterTagEdit.php" class="btn btn-circle btn-primary ">编辑</a>
                <a href="#" class="btn btn-circle btn-success ">预览</a>
                <a href="#" class="btn btn-circle btn-danger ">停用</a>
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
