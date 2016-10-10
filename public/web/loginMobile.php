<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<title>手机号快捷登录 - 奇异果 qiyiguo.tv</title>

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

<body class="loginpages">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="userpic"><a href="http://www.qiyiguo.tv" target="_blank"><img src="img/100100.png" alt="" ></a></div>
        <div class="panel-body">
          <h2 class="text-center">手机号快捷登录</h2>
          <form>
            <div class="alert alert-danger">错误提示信息样式</div>
            <div class="form-group">
              <label>手机号</label>
              <input type="text" class="form-control" placeholder="手机号">
            </div>
            <div class="col-md-12" style="padding-left:0;padding-right:0;">
              <div class="text-center col-md-2" style="padding-left:0; margin-top:15px;">
                  QYG -
              </div>
              <div class="form-group col-md-6" style="padding-left:0;">
                  <input type="text" class="form-control" placeholder="验证码" maxlength="4">
              </div>
              <div class="form-group col-md-4">
                  <button type="button" class="btn btn-success btn-xs">发送验证码</button>
              </div>
            </div>
            <div class="col-md-12" style="padding-left:0;padding-right:0;"><br>
              <a href="loginSuccess.php" class="btn btn-lg btn-primary btn-block">登 录</a>
            </div>
          </form>
          <div class="row">
            <div class="col-md-12  text-center"> <br><br>
            <a href="login.php">您还可以选用以下帐号登录,或者已经注册点此登录</a><br><br> </div>
          </div>          
          <?php include"inc/loginPugin.php"; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery --> 
<script src="vendor/jquery/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="vendor/bootstrap/js/bootstrap.min.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="js/adminnine.js"></script>
</body>
</html>
