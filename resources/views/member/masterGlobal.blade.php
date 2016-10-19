@extends('member.masterCommon')
@section('content')
	<div class="row">
		<div class="col-md-12  header-wrapper" >
			<h1 class="page-header">全局设置</h1>
			<p class="page-subtitle">系统参数控制</p>
		</div>
		<!-- /.col-lg-12 -->
	</div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="{{url('member/masterIndex')}}">奇异果管理</a></li>
      <li class="active">全局设置</li>
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
              <li class="active"><a href="#normal" data-toggle="tab"> <span class="fa fa-file-text-o icon"></span>常规设置</a> </li>
              <li><a href="#api" data-toggle="tab"> <span class="fa fa-gear icon"></span>第三方接入</a> </li>
            </ul>
            
            <!-- Tab panes -->
			  <form action="{{url('member/masterGlobal')}}" method="post">
				  {{csrf_field()}}
				  <input type="hidden" name="id" value="{{$global->id}}" />
				  <input type="hidden" id="img" name="web_logo" value="{{$global->web_logo}}" />
            <div class="tab-content">
              	<div class="tab-pane fade padding in active" id="normal">
                <!--Tab start-->
					<style>
						p.cur {background: #eee; padding: 3px; font-style: inherit;}
						.col-md-12,.col-md-4,.col-md-6{padding-left: 0;}
					</style>


				  	<div class="col-lg-9">
							<div class="col-md-12">
								<div class="form-group col-md-6">
		                    		<label>网站名称：</label>
									<input class="form-control " placeholder="网站名称" name="web_name" value="{{$global->web_name}}">
								</div>
								<div class="form-group col-md-6">
		                    		<label>网站关键词：</label>
									<input class="form-control " placeholder="网站关键词" name="web_keys" value="{{$global->web_keys}}">
								</div>
								<div class="form-group col-md-12">
		                    		<label>网站描述：</label>
									<input class="form-control " placeholder="网站描述" name="web_intro" value="{{$global->web_intro}}">
								</div>	
							</div>
				  	</div>

				  	<!-- /.col-lg-6 (nested) -->
				  	<div class="col-lg-3">
						<h3>LOGO上传</h3>

						<div id="crop-avatar" class="col-md-6">
							<div class="avatar-view" title="封面上传">
								<img src="{{$global->web_logo}}" onerror="this.src='{{asset('img/200200.png')}}'" alt="Logo" id="head">
							</div>
						</div>
				  	</div>




				  	<!-- /.col-lg-6 (nested) --> 
				<!--Tab End-->
              	</div>
              <div class="tab-pane fade padding" id="api">
				<div class="form-group col-md-6">
			        <label>微信登录 APPID</label>
					<input class="form-control " placeholder="微信登录 APPID" name="weixin_appID" value="{{$global->weixin_appID}}">
				</div>
				<div class="form-group col-md-6">
			        <label>微信登录 Secret</label>
					<input class="form-control " placeholder="微信登录 Secert" name="weixin_secret" value="{{$global->weixin_secret}}">
				</div>
				<div class="form-group col-md-6">
			        <label>微博登录 APPID</label>
					<input class="form-control " placeholder="微博登录 APPID" name="weibo_appID" value="{{$global->weibo_appID}}">
				</div>
				<div class="form-group col-md-6">
			        <label>微博登录 Secret</label>
					<input class="form-control " placeholder="微博登录 Secert" name="weibo_secret" value="{{$global->weibo_secret}}">
				</div>
				<div class="form-group col-md-6">
			        <label>QQ登录 APPID</label>
					<input class="form-control " placeholder="QQ登录 APPID" name="qq_appID" value="{{$global->qq_appID}}">
				</div>
				<div class="form-group col-md-6">
			        <label>QQ登录 Secret</label>
					<input class="form-control " placeholder="QQ登录 Secert" name="qq_secret" value="{{$global->qq_secret}}">
				</div>
				<div class="form-group col-md-6">
			        <label>阿里云</label>
					<input class="form-control " placeholder="阿里云" name="aliyun_appID" value="{{$global->aliyun_appID}}">
				</div>
				<div class="form-group col-md-6">
			        <label>阿里云</label>
					<input class="form-control " placeholder="阿里云" name="aliyun_secret" value="{{$global->aliyun_secret}}">
				</div>
				<div class="form-group col-md-4">
			        <label>云讯通 ACCOUNT SID</label>
					<input class="form-control " placeholder="云讯通 ACCOUNT SID"  value="{{$global->yunxuntong_accountSID}}" name="yunxuntong_accountSID">
				</div>
				<div class="form-group col-md-4">
			        <label>云讯通 APP ID</label>
					<input class="form-control " placeholder="云讯通 APP ID"  value="{{$global->yunxuntong_appID}}" name="yunxuntong_appID">
				</div>
				<div class="form-group col-md-4">
			        <label>云讯通 模版ID</label>
					<input class="form-control " placeholder="云讯通 模版ID" name="yunxuntong_telID" value="{{$global->yunxuntong_telID}}">
				</div>
				<div class="form-group col-md-6">
			        <label>极验证ID</label>
					<input class="form-control " placeholder="极验证ID" value="{{$global->gee_appID}}" name="gee_appID" >
				</div>
				<div class="form-group col-md-6">
			        <label>极验证KEY</label>
					<input class="form-control " placeholder="极验证KEY" value="{{$global->gee_secret}} " name="gee_secret">
				</div>
				<div class="form-group col-md-12">
			        <label>统计代码</label>					
                    <textarea class="form-control" rows="3" name="count_code"><script>var _hmt = _hmt || [];(function() {var hm = document.createElement("script");hm.src = "//hm.baidu.com/hm.js?a1ae8dd0606684f1ebcdb69493f237c5";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(hm, s);})();</script></textarea>
				</div>
              </div>
            </div>
            <!-- Tab panes -->
	        <div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary">提 交</button>
				<button type="reset" class="btn btn-default">重 置</button>
			</div>
            </form>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
    </div>
    </div>
    </div>
    <!-- /.row -->

<!-- /.row -->
<!-- upload acatar -->
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="avatar-form" action="{{url('uploadWebLogo')}}" enctype="multipart/form-data" method="post">
				{{csrf_field()}}
				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button">&times;</button>
					<h4 class="modal-title" id="avatar-modal-label">LOGO上传</h4>
				</div>
				<div class="modal-body">
					<div class="avatar-body">
						<div class="avatar-upload">

							<input class="avatar-data" name="avatar_data" type="hidden">
							<label for="avatarInput">图片上传</label>
							<input class="avatar-input" id="avatarInput" name="avatar_file" type="file"></div>
						<div class="row">
							<div class="col-md-9">
								<div class="avatar-wrapper"></div>
							</div>
							<div class="col-md-3">
								<div class="avatar-preview preview-lg"></div>
								<div class="avatar-preview preview-md"></div>
								<div class="avatar-preview preview-sm"></div>
							</div>
						</div>
						<div class="row avatar-btns">
							<div class="col-md-9">
								<div class="btn-group">
									<button class="btn" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-undo"></i> 向左旋转</button>
								</div>
								<div class="btn-group">
									<button class="btn" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-repeat"></i> 向右旋转</button>
								</div>
							</div>
							<div class="col-md-3">
								<button class="btn btn-success btn-block avatar-save" type="submit"><i class="fa fa-save"></i> 保存修改</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@section('script')
<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
<script src="{{asset('pulgin/layer/layer.js?v=2.4')}}"></script>
<link rel="stylesheet" href="{{asset('pulgin/layer/skin/layer.css')}}" media="all">
<script type="text/javascript">
	$(function(){
		var msg = "{{session('msg')}}";
		if(msg.length!=0){
			layer.msg(msg);
		}

		$('#upload').click(function(){
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
	});
</script>

<link href="{{asset('pulgin/uploadAvatar/cropper/cropper.min.css')}}" rel="stylesheet">
<link href="{{asset('pulgin/uploadAvatar/sitelogo/sitelogo.css')}}" rel="stylesheet">
<script src="{{asset('pulgin/uploadAvatar/cropper/cropper.min.js')}}"></script>
<script src="{{asset('pulgin/uploadAvatar/sitelogo/sitelogo.js')}}"></script>
@endsection
@endsection