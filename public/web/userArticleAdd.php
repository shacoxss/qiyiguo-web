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
        <h1 class="page-header">新增文章</h1>
        <p class="page-subtitle">添加一篇普通文章</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="addIndex.php">内容管理</a></li>
      <li class="active">新增文章</li>
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
                <blockquote>
                <p class="text-danger">此表除可视的表单字段以外，额外需增加隐藏字段：作者，发布时间，更新时间，文章简介（截取正文前120个字符，过滤html标签）</p>
                </blockquote>
				<form role="form">
				<div class="row">
				  	<div class="col-lg-9">
								<div class="form-group has-error">
		                    		<label>文章标题：</label>
									<input class="form-control " placeholder="文章标题：" id="inputError">
						            <!--from通用提示-->
						            <br><p class="text-danger">标题不能为空！错误提示对应div添加has-error样式</p>
						            <!--from通用提示-->
								</div>
								<div class="form-group">
		                    		<label>标签(数量不可超过三个，写好标签有助提升阅读量，<a href="#">点此学习如何写好标签</a>)</label>
									<input class="form-control " placeholder="标签">
						            <!--from通用提示-->
						            <br><p class="text-danger">标签不能为空！</p>
						            <!--from通用提示-->
								</div>   
							  <!--编辑器开始-->
							  <div class="form-group">	
		                    		<label style="padding:15px 0;">正文</label>								
									<link rel="stylesheet" type="text/css" href="pulgin/wangEditor/dist/css/wangEditor.min.css">
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
									</style>
									<div id="editor-container" class="container">
										<div id="editor-trigger"><p>请输入内容</p><p>&lt;script&gt;&lt;/script&gt;</p></div>
										<!-- <textarea id="editor-trigger" style="display:none;">
											<p>请输入内容...</p>
										</textarea> -->
									</div>									
							  	</div>						
								<!--编辑器结束-->
				  	</div>
				  	<!-- /.col-lg-6 (nested) -->
				  	<div class="col-lg-3">
						<h3>缩略图上传</h3>
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