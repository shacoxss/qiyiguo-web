@extends('auth.common')
@section('content')

<body class="loginpages">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="userpic"><a href="http://www.qiyiguo.tv" target="_blank"><img src="img/100100.png" alt="" ></a></div>
        <div class="panel-body">
          <h2 class="text-center">奇异果用户登录</h2>
          <form action="">
            <fieldset>
              <div class="alert alert-danger">错误提示信息样式</div>
              <div class="form-group">
                <input class="form-control" placeholder="手机号" id="phone" type="text" autofocus>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="密码" id="password" type="password" value="">
              </div>
              <div class="checkbox">
                <label>
                  <input id="remember" type="checkbox" value="1">
                  记住帐号
                </label>
                <label class="radio-inline text-right">
                  <a href="{{url('forget')}}" target="_blank">忘记密码</a>
                </label>
              </div>
              <br>
              <!-- Change this to a button or input when using this as a form --> 
              <button type="button" class="btn btn-lg btn-primary btn-block" id="popup-submit">登 录</button>
            </fieldset>
            <br>
            <br>
            <div class="row">
              <div class="col-md-12  text-center"> <a href="{{url('register')}}">您还可以选用以下帐号登录,或者注册一个新帐号</a><br><br> </div>
            </div>
            <div class="row">
              <div class="col-md-12  text-center">
                <a href="{{url('auth/loginMobile')}}" class="btn btn-circle btn-warning " title="手机号码登录"> <i class="fa fa-tablet"></i></a>
                <a id="qq" href="javascript:void(0)" class="btn btn-circle btn-primary " title="QQ登录"> <i class="fa fa-qq"></i></a>
                <a id="weixin" href="javascript:void(0)" class="btn btn-circle btn-success " title="微信登录"> <i class="fa fa-weixin"></i></a>
                <a id="weibo" href="javascript:void(0)" class="btn btn-circle btn-danger " title="新浪微博登录"> <i class="fa fa-weibo"></i></a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('pulgin/layer/layer.js?v=2.4')}}"></script>
<link rel="stylesheet" href="{{asset('pulgin/layer/skin/layer.css')}}" media="all">
<script type="text/javascript">
  $(function(){
    var index = parent.layer.getFrameIndex(window.name);
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
      });
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
      });
      parent.layer.close(index);
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
      });
      parent.layer.close(index);
    });
//第三方登陆结束
    $('.alert-danger').hide();
    // 代码详细说明
    var handlerPopup = function (captchaObj) {
      // 注册提交按钮事件，比如在登陆页面的登陆按钮
      $("#popup-submit").click(function () {
        // 此处省略在登陆界面中，获取登陆数据的一些步骤

        // 先校验是否点击了验证码
        var validate = captchaObj.getValidate();
        if($('#remember').is(':checked')){
          var remember = 1;
        }else{
          var remember = 0;
        }
        var phone = $("#phone").val();
        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if(!myreg.test(phone))
        {
          $('.alert-danger').show();
          $('.alert-danger').text('请输入有效的手机号码！');
          return;
        }
        var password = $("#password").val();
        if(password.length == 0){
          $('.alert-danger').show();
          $('.alert-danger').text('密码不能为空！');
          return;
        }
        if (!validate) {
          $('.alert-danger').show();
          $('.alert-danger').text('请先完成验证！');
          return;
        }
        // 提交验证码信息，比如登陆页面，你需要提交登陆信息，用户名和密码等登陆数据
        $.ajax({
          url: "{{url('auth/verifyLogin')}}",
          type: "post",
          // dataType: "json",
          data: {
            // 用户名和密码等其他数据，自己获取，不做演示
            phone:phone,
            password:password,
            remember:remember,
            _token:"{{csrf_token()}}",
            geetest_challenge: validate.geetest_challenge,
            geetest_validate: validate.geetest_validate,
            geetest_seccode: validate.geetest_seccode
          },
          // 这里是正确返回处理结果的处理函数
          // 假设你就返回了1，2，3
          // 当然，正常情况是返回JSON数据
          success: function (result) {
            if(result=='success'){
              location.href = "{{url('auth/success')}}";
            }else{
              $('.alert-danger').show();
              $('.alert-danger').text(result);
            }
          }
        });
      });
      captchaObj.bindOn("#popup-submit");
      captchaObj.appendTo(".text-center");
    };
    $.ajax({

      // 获取id，challenge，success（是否启用failback）
      url: "{{url('auth/startCaptcha')}}" + "/"+(new Date()).getTime(), // 加随机数防止缓存
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

  });
</script>
@endsection
