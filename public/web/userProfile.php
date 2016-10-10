<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<title>个人资料 - 奇异果 qiyiguo.tv</title>

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
        <h1 class="page-header">个人资料</h1>
        <p class="page-subtitle">用户个人资料及安全资料修改</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="userIndex.php">个人资料</a></li>
      <li class="active">个人资料</li>
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
              <li class="active"><a href="#avatar" data-toggle="tab"> 修改头像</a> </li>
              <li><a href="#password" data-toggle="tab"> 修改密码</a> </li>
              <li><a href="#nickname" data-toggle="tab"> 修改昵称</a> </li>
              <li><a href="#cellphone" data-toggle="tab"> 绑定手机号码</a> </li>
              <li><a href="#cellphoneEdit" data-toggle="tab"> 修改手机号码</a> </li>
              <li><a href="#accounts" data-toggle="tab"> 第三方帐号绑定</a> </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              	<div class="tab-pane fade padding in active" id="avatar">
              		<div class="alert alert-danger">错误提示信息样式</div>
              		<div class="alert alert-success">成功提示信息</div>
	              	<form role="form" class="col-md-4">		               
		                <br><br>	                
						<button type="submit" class="btn btn-primary">提 交</button>
						<button type="reset" class="btn btn-default">重 置</button>
	                </form>
              	</div>
              	<div class="tab-pane fade padding" id="password">
              		<div class="alert alert-danger">错误提示信息样式</div>
              		<div class="alert alert-success">成功提示信息</div>
	              	<form role="form" class="col-md-4">
		                <div class="form-group">
			                <label>老密码</label>
			                <input class="form-control">
		                </div>	
		                <div class="form-group">
			                <label>新密码</label>
			                <input class="form-control">
		                </div>	
		                <div class="form-group">
			                <label>重复密码</label>
			                <input class="form-control">
		                </div>
		                <br><br>	                
						<button type="submit" class="btn btn-primary">提 交</button>
						<button type="reset" class="btn btn-default">重 置</button>
	                </form>
              	</div>
              	<div class="tab-pane fade padding" id="nickname">
              		<div class="alert alert-danger">错误提示信息样式</div>
              		<div class="alert alert-success">成功提示信息</div>
	              	<form role="form" class="col-md-4">
		                <div class="form-group">
			                <label>当前用户名(可重复)：null</label>
		                </div>	
		                <div class="form-group">
			                <label>新用户名</label>
			                <input class="form-control">
		                </div>	   	                
						<button type="submit" class="btn btn-primary">修 改</button>
	                </form>
              	</div>
              	<div class="tab-pane fade padding" id="cellphone"> 
              		<div class="alert alert-danger">错误提示信息样式</div>
              		<div class="alert alert-success">成功提示信息</div>
	              	<form role="form" class="col-md-4">
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
			            </div> <br><br><br>
			            <div class="form-group" style="margin-top:15px">
				        	<label>设置密码</label>
				        	<input class="form-control">
			            </div>	
			            <div class="form-group">
				        	<label>重复密码</label>
				        	<input class="form-control">
			            </div>
			            <br>         
						<button type="submit" class="btn btn-primary">绑 定</button>
	                </form>
              	</div>
              	<div class="tab-pane fade padding" id="cellphoneEdit"> 
              		<div class="alert alert-danger">错误提示信息样式</div>
              		<div class="alert alert-success">成功提示信息</div>
	              	<form role="form" class="col-md-4">
		                <div class="form-group">
			              <label>已绑定手机号：138*****427</label>
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
		                <div class="form-group">
			              <label>新手机号</label>
			              <input type="text" class="form-control" placeholder="手机号">
			            </div>
		                <div class="form-group">
			              <label>重复新手机号</label>
			              <input type="text" class="form-control" placeholder="手机号">
			            </div>      
						<button type="submit" class="btn btn-primary">修改绑定</button>
	                </form>
              	</div>
	            <div class="tab-pane fade padding" id="accounts">
              		<div class="alert alert-danger">错误提示信息样式</div>
              		<div class="alert alert-success">成功提示信息</div>
		            <div class="row">
		              	<div class="col-md-12">
			              	<label>已绑定：</label>
			                <a href="#" class="btn btn-circle btn-primary btn-lg" title="QQ登录"><i class="fa fa-qq" style="font-size:15px;"></i></a>
			                <a href="#" class="btn btn-circle btn-success btn-lg" title="微信登录"> <i class="fa fa-weixin" style="font-size:15px;"></i></a>
		              	</div>
		              	<div class="col-md-12" style="padding:15px 0;"></div>
		              	<div class="col-md-12">
			              	<label>未绑定：</label>
			                <a href="#" class="btn btn-circle btn-default btn-lg" title="点击绑定新浪微博登录"> <i class="fa fa-weibo" style="font-size:15px;"></i></a>
		              	</div>
	            	</div>
	            </div>
            </div>
            <!-- Tab panes -->
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
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

<!--wangEditor js-->
<script type="text/javascript" src="pulgin/wangEditor/dist/js/wangEditor.js"></script>
									<!--<script type="text/javascript" src="pulgin/wangEditor/dist/js/wangEditor.min.js"></script>-->
									<script type="text/javascript">
										// 阻止输出log
										// wangEditor.config.printLog = false;

										var editor = new wangEditor('editor-trigger');

										// 上传图片
										editor.config.uploadImgUrl = '/upload';
										editor.config.uploadParams = {
											// token1: 'abcde',
											// token2: '12345'
										};
										editor.config.uploadHeaders = {
											// 'Accept' : 'text/x-json'
										}
										// editor.config.uploadImgFileName = 'myFileName';

										// 隐藏网络图片
										// editor.config.hideLinkImg = true;

										// 表情显示项
										editor.config.emotionsShow = 'value';
										editor.config.emotions = {
											'default': {
												title: '默认',
												data: 'pulgin/wangEditor/dist/emotions.data'
											},
											'weibo': {
												title: '微博表情',
												data: [
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7a/shenshou_thumb.gif',
														value: '[草泥马]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/60/horse2_thumb.gif',
														value: '[神马]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/fuyun_thumb.gif',
														value: '[浮云]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c9/geili_thumb.gif',
														value: '[给力]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f2/wg_thumb.gif',
														value: '[围观]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/vw_thumb.gif',
														value: '[威武]'
													}
												]
											},
											'weibo2': {
												title: '微博表情2',
												data: [
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7a/shenshou_thumb.gif',
														value: '[草泥马]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/60/horse2_thumb.gif',
														value: '[神马]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/fuyun_thumb.gif',
														value: '[浮云]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c9/geili_thumb.gif',
														value: '[给力]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f2/wg_thumb.gif',
														value: '[围观]'    
													},
													{
														icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/vw_thumb.gif',
														value: '[威武]'
													}
												]
											}
										};

										// 插入代码时的默认语言
										// editor.config.codeDefaultLang = 'html'

										// 只粘贴纯文本
										// editor.config.pasteText = true;

										// 跨域上传
										// editor.config.uploadImgUrl = 'http://localhost:8012/upload';

										// 第三方上传
										// editor.config.customUpload = true;

										// 普通菜单配置
										// editor.config.menus = [
										//     'img',
										//     'insertcode',
										//     'eraser',
										//     'fullscreen'
										// ];
										// 只排除某几个菜单（兼容IE低版本，不支持ES5的浏览器），支持ES5的浏览器可直接用 [].map 方法
										// editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
										//     if (item === 'insertcode') {
										//         return null;
										//     }
										//     if (item === 'fullscreen') {
										//         return null;
										//     }
										//     return item;
										// });

										// onchange 事件
										// editor.onchange = function () {
										//     console.log(this.$txt.html());
										// };

										// 取消过滤js
										// editor.config.jsFilter = false;

										// 取消粘贴过来
										// editor.config.pasteFilter = false;

										// 设置 z-index
										// editor.config.zindex = 20000;

										// 语言
										// editor.config.lang = wangEditor.langs['en'];

										// 自定义菜单UI
										// editor.UI.menus.bold = {
										//     normal: '<button style="font-size:20px; margin-top:5px;">B</button>',
										//     selected: '.selected'
										// };
										// editor.UI.menus.italic = {
										//     normal: '<button style="font-size:20px; margin-top:5px;">I</button>',
										//     selected: '<button style="font-size:20px; margin-top:5px;"><i>I</i></button>'
										// };
										editor.create();
									</script>			
</body>
</html>