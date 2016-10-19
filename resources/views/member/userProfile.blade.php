@extends('member.userCommon')
@section('content')


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
				@if(empty(session('user')->phone))
              <li><a href="#cellphone" data-toggle="tab"> 绑定手机号码</a> </li>
				@else
              <li><a href="#cellphoneEdit" data-toggle="tab"> 修改手机号码</a> </li>
				@endif
              <li><a href="#accounts" data-toggle="tab"> 第三方帐号绑定</a> </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              	<div class="tab-pane fade padding in active" id="avatar">
					@if(count('errors')>0)
						@if(is_string($errors))
							<div class="alert alert-danger">{{$errors}}</div>
						@else
							@foreach($errors->all() as $error)
								<div class="alert alert-danger">{{$error}}</div>
							@endforeach
						@endif
					@endif
					@if(session('msg'))
						<div class="alert alert-success">{{session('msg')}}</div>
					@endif
						@if(session('error'))
							<div class="alert alert-danger">{{session('error')}}</div>
						@endif
              		<div class="alert alert-danger headerror">上传失败！</div>
              		<div class="alert alert-success headsuccess">上传成功！</div>
	              	<form role="form" class="col-md-4" action="{{url('member/saveHeadImg')}}" method="post">
						{{csrf_field()}}
						<input class="avatar-src" id="img" name="avatar_src" type="hidden" value="">
						<div class="ibox-content">
							<div class="row">
								<div id="crop-avatar" class="col-md-6">
									<div class="avatar-view" title="封面上传">
								    	<img src="{{$user->head_img}}" onerror="this.src='{{asset('pulgin/uploadAvatar/logo.jpg')}}'" alt="Logo" id="head">
								    </div>
								</div>
							</div>
						</div><br>               
						<button type="submit" class="btn btn-primary">提 交</button>
						<button type="reset" class="btn btn-default">重 置</button>
	                </form>
              	</div>
              	<div class="tab-pane fade padding" id="password">
	              	<form role="form" class="col-md-4" action="{{url('member/resetPassword')}}" method="post">
						{{csrf_field()}}
		                <div class="form-group">
			                <label>老密码</label>
			                <input class="form-control" name="old_password" type="password">
		                </div>	
		                <div class="form-group">
			                <label>新密码</label>
			                <input class="form-control" name="password" type="password">
		                </div>	
		                <div class="form-group">
			                <label>重复密码</label>
			                <input class="form-control" name="password_confirmation" type="password">
		                </div>
		                <br><br>	                
						<button type="submit" class="btn btn-primary">提 交</button>
						<button type="reset" class="btn btn-default">重 置</button>
	                </form>
              	</div>
              	<div class="tab-pane fade padding" id="nickname">

	              	<form role="form" class="col-md-4" action="{{url('member/resetNickname')}}" method="post">
						{{csrf_field()}}
		                <div class="form-group">
			                <label>当前用户名(可重复)：{{$user->nickname}}</label>
		                </div>	
		                <div class="form-group">
			                <label>新用户名</label>
			                <input class="form-control" type="text" name="nickname">
		                </div>	   	                
						<button type="submit" class="btn btn-primary">修 改</button>
	                </form>
              	</div>
				@if(empty(session('user')->phone))
              	<div class="tab-pane fade padding" id="cellphone">

              		<div class="alert alert-danger" id="bindingPhone_error">错误提示信息样式</div>
              		<div class="alert alert-success" id="bindingPhone_success">成功提示信息</div>
	              	<form role="form" class="col-md-4" action="{{url('member/bindingPhone')}}" method="post">
						{{csrf_field()}}
		                <div class="form-group">
			              <label>手机号</label>
			              <input type="text" class="form-control" placeholder="手机号" name="phone" id="phone">
			            </div>
			            <div class="col-md-12" style="padding-left:0;padding-right:0;">
			              	<div class="text-center col-md-2" style="padding-left:0; margin-top:15px;">
			                  	QYG -
			              	</div>
			              	<div class="form-group col-md-6" style="padding-left:0;">
			                  	<input type="text" class="form-control" placeholder="验证码" maxlength="4" name="code">
			              	</div>
			              	<div class="form-group col-md-4">
			                  	<button type="button" class="btn btn-success btn-xs get_code" id="get_code2">发送验证码</button>
			              	</div>
			            </div> <br><br><br>
			            <br>         
						<button type="submit" class="btn btn-primary">绑 定</button>
	                </form>
              	</div>
				@else
              	<div class="tab-pane fade padding" id="cellphoneEdit">

              		<div class="alert alert-danger" id="resetphone_success">错误提示信息样式</div>
              		<div class="alert alert-success" id="resetphone_error">成功提示信息</div>
	              	<form role="form" class="col-md-4" method="post" action="{{url('member/resetPhone')}}">
						{{csrf_field()}}
		                <div class="form-group">
			              <label>已绑定手机号：{{str_replace(substr($user->phone,3,5),"*****",$user->phone)}}</label>
			            </div>
			            <div class="col-md-12" style="padding-left:0;padding-right:0;">
			              <div class="text-center col-md-2" style="padding-left:0; margin-top:15px;">
			                  QYG -
			              </div>
			              <div class="form-group col-md-6" style="padding-left:0;">
			                  <input type="text" class="form-control" placeholder="验证码" maxlength="4" name="code">
			              </div>
			              <div class="form-group col-md-4">
			                  <button type="button" class="btn btn-success btn-xs get_code" id="get_code">发送验证码</button>
			              </div>
			            </div>
		                <div class="form-group">
			              <label>新手机号</label>
			              <input type="text" class="form-control" placeholder="手机号" name="phone">
			            </div>
		                <div class="form-group">
			              <label>重复新手机号</label>
			              <input type="text" class="form-control" placeholder="手机号" name="phone_confirmation">
			            </div>      
						<button type="submit" class="btn btn-primary">修改绑定</button>
	                </form>
              	</div>
				@endif
	            <div class="tab-pane fade padding" id="accounts">
              		<div class="alert alert-danger" id="binding_error">错误提示信息样式</div>
              		<div class="alert alert-success" id="binding_success">成功提示信息</div>
		            <div class="row">
		              	<div class="col-md-12">
			              	<label>已绑定：</label>
							@if($user->binding_qq)
			                <a href="#" class="btn btn-circle btn-primary btn-lg" title="QQ登录"><i class="fa fa-qq" style="font-size:15px;"></i></a>
			                @endif
							@if($user->binding_weixin)
							<a href="#" class="btn btn-circle btn-success btn-lg" title="微信登录"> <i class="fa fa-weixin" style="font-size:15px;"></i></a>
		              		@endif
							@if($user->binding_weibo)
							<a href="#" class="btn btn-circle btn-danger btn-lg" title="点击绑定新浪微博登录"> <i class="fa fa-weibo" style="font-size:15px;"></i></a>
							@endif
						</div>
		              	<div class="col-md-12" style="padding:15px 0;"></div>
		              	<div class="col-md-12">
			              	<label>未绑定：</label>
							@if(!$user->binding_qq)
								<a id="qq" href="javascript:void(0)" class="btn btn-circle btn-default btn-lg" title="QQ登录"><i class="fa fa-qq" style="font-size:15px;"></i></a>
							@endif
							@if(!$user->binding_weixin)
								<a id="weixin" href="javascript:void(0)" class="btn btn-circle btn-default btn-lg" title="微信登录"> <i class="fa fa-weixin" style="font-size:15px;"></i></a>
							@endif
							@if(!$user->binding_weibo)
								<a id="weibo" href="javascript:void(0)" class="btn btn-circle btn-default btn-lg" title="点击绑定新浪微博登录"> <i class="fa fa-weibo" style="font-size:15px;"></i></a>
		              		@endif
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
	<link href="{{asset('pulgin/uploadAvatar/cropper/cropper.min.css')}}" rel="stylesheet">
	<link href="{{asset('pulgin/uploadAvatar/sitelogo/sitelogo.css')}}" rel="stylesheet">
	<script src="{{asset('pulgin/uploadAvatar/cropper/cropper.min.js')}}"></script>
	<script src="{{asset('pulgin/uploadAvatar/sitelogo/sitelogo.js')}}"></script>

<!-- upload acatar -->
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="avatar-form" action="{{url('uploadHeadImg')}}" enctype="multipart/form-data" method="post">
				{{csrf_field()}}
				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button">&times;</button>
					<h4 class="modal-title" id="avatar-modal-label">封面上传</h4>
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
<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>


	<!-- Custom Fonts -->

	<script src="http://static.geetest.com/static/tools/gt.js"></script>
	<script>
		$('.headerror').hide();
		$('.headsuccess').hide();
		$('#resetphone_success').hide();
		$('#resetphone_error').hide();
		$('#binding_error').hide();
		$('#binding_success').hide();
		$('#bindingPhone_error').hide();
		$('#bindingPhone_success').hide();

		var handlerPopup = function (captchaObj) {
			var tel = "{{$user->phone}}";
			//点击验证发送短信验证码
			var wait = 60;
			$("#get_code").click(function () {
				//再次发送验证码时间

				var validate = captchaObj.getValidate();
				var phone = "{{$user->phone}}";
				if (!validate) {
					$('.resetphone_error').show();
					$('.resetphone_error').text('请先完成验证！');
					return;
				}
				// 提交验证码信息

				$.ajax({
					url: "{{url('register/verifyLogin')}}",
					type: "post",
					// dataType: "json",
					data: {
						phone:phone,
						_token:"{{csrf_token()}}",
						geetest_challenge: validate.geetest_challenge,
						geetest_validate: validate.geetest_validate,
						geetest_seccode: validate.geetest_seccode
					},
					// 短信验证发送成功
					success: function (result) {
						if(result=='sendsuccess'){
							time();
						}else{
							$('.resetphone_error').show();
							$('.resetphone_error').text('验证码发送失败，请稍后再试！')
						}
					}
				});
			});

			$("#get_code2").click(function () {
				//再次发送验证码时间

				var validate = captchaObj.getValidate();
				var phone = $("#phone").val();
				if (!validate) {
					$('#bindingPhone_error').show();
					$('#bindingPhone_error').text('请先完成验证！');
					return;
				}
				// 提交验证码信息

				$.ajax({
					url: "{{url('register/verifyLogin')}}",
					type: "post",
					// dataType: "json",
					data: {
						phone:phone,
						_token:"{{csrf_token()}}",
						geetest_challenge: validate.geetest_challenge,
						geetest_validate: validate.geetest_validate,
						geetest_seccode: validate.geetest_seccode
					},
					// 短信验证发送成功
					success: function (result) {
						if(result=='sendsuccess'){
							time();
						}else{
							$('#bindingPhone_error').show();
							$('#bindingPhone_error').text('验证码发送失败，请稍后再试！')
						}
					}
				});
			});
		if(tel.length==0){
			captchaObj.bindOn("#get_code2");
		}else{
			captchaObj.bindOn("#get_code");
		}
			captchaObj.appendTo(".row");


		};
		$.ajax({

			// 获取id，challenge，success（是否启用failback）
			url: "{{url('register/startCaptcha')}}" + "/"+(new Date()).getTime(), // 加随机数防止缓存
			type: "get",
			dataType: "json",
			success: function (data) {
				// 使用initGeetest接口
				// 参数1：配置参数
				// 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
				initGeetest({
					gt: data.gt,
					challenge: data.challenge,
					product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
					offline: !data.success // 表示用户后台检测极验服务器是否宕机，与SDK配合，用户一般不需要关注
				}, handlerPopup);
			}
		});


		//60秒定时器
		var wait = 60;
		function time(btn) {
			if (wait == 0) {
				$(".get_code").attr("disabled",false);
				$(".get_code").text("发送验证码");
				wait = 60;
			} else {
				$(".get_code").attr("disabled", true);
				$(".get_code").text(wait + "秒重新获取");
				wait--;
				setTimeout(function () {
							time($(".get_code"));
						},
						1000)
			}

		}
		//第三方登陆
		$('#qq').click(function(){
			layer.open({
				type: 2,
				border: [0],
				title: false,
				shadeClose: true,
				closeBtn: true,
				area: ['830px' , '400px'],
				content: '{{url('auth/qq')}}'
			})
		});

		$('#weixin').click(function(){
			layer.open({
				type: 2,
				border: [0],
				title: false,
				shadeClose: true,
				closeBtn: true,
				area: ['830px' , '400px'],
				content: '{{url('auth/weixinWeb')}}'
			})
		});

		$('#weibo').click(function(){
			layer.open({
				type: 2,
				border: [0],
				title: false,
				shadeClose: true,
				closeBtn: true,
				area: ['830px' , '400px'],
				content: '{{url('auth/weibo')}}'
			})
		});
		//第三方登陆结束

		//绑定手机号


	</script>
@endsection