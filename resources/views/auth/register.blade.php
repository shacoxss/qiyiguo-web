@extends('auth.common')
@section('content')

<body class="loginpages">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="userpic"><a href="http://www.qiyiguo.tv" target="_blank"><img src="{{asset('img/100100.png')}}" alt="" ></a></div>
        <div class="panel-body">
          <h2 class="text-center">注册奇异果用户</h2>

            <div class="alert alert-danger">错误提示信息样式</div>
            <div class="form-group">
              <label>手机号</label>
              <input type="text" class="form-control" placeholder="手机号" id="phone">
            </div>
            <div class="col-md-12" style="padding-left:0;padding-right:0;">
              <div class="text-center col-md-2" style="padding-left:0; margin-top:15px;">
                  QYG -
              </div>
              <div class="form-group col-md-6" style="padding-left:0;">
                  <input type="text" class="form-control" placeholder="验证码" maxlength="4" id="code">
              </div>
              <div class="form-group col-md-4">
                  <button type="button" class="btn btn-success btn-xs" id="get_code">发送验证码</button>
              </div>
            </div>
            <div class="form-group">
              <label>密码</label>
              <input type="password" class="form-control" placeholder="密码" id="password">
            </div>
            <div class="form-group">
              <label>重复密码</label>
              <input type="password" class="form-control" placeholder="重复密码" id="re_password">
            </div>
            <br>
            <!-- Change this to a button or input when using this as a form --> 
            <button  class="btn btn-lg btn-primary btn-block" id="reg">注 册</button>

          <br>
          <div class="row">
            <div class="col-md-12  text-center"> <a href="{{url('auth')}}">您还可以选用以下帐号登录,或者已经注册点此登录</a><br><br> </div>
          </div>
          <div class="row">
            <div class="col-md-12  text-center">
              <a href="{{url('auth/loginMobile')}}" class="btn btn-circle btn-warning " title="手机号码登录"> <i class="fa fa-tablet"></i></a>
              <a id="qq" href="javascript:void(0)" class="btn btn-circle btn-primary " title="QQ登录"> <i class="fa fa-qq"></i></a>
              <a id="weixin" href="javascript:void(0)" class="btn btn-circle btn-success " title="微信登录"> <i class="fa fa-weixin"></i></a>
              <a id="weibo" href="javascript:void(0)" class="btn btn-circle btn-danger " title="新浪微博登录"> <i class="fa fa-weibo"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('pulgin/layer/layer.js?v=2.4')}}"></script>
<link rel="stylesheet" href="{{asset('pulgin/layer/skin/layer.css')}}" media="all">
<script type="text/javascript">
  $(function(){

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
    $("#phone").focus(function(){
      $('.alert-danger').hide();
    });
    $("#phone").blur(function(){
      var phone = $("#phone").val();
      var token = "{{csrf_token()}}";
      var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
      if(!myreg.test(phone))
      {
        $('.alert-danger').show();
        $('.alert-danger').text('请输入有效的手机号码！');
        $("#get_code").attr('disabled','disabled');
        return;
      }
      $.ajax({
          type:"post",
          url:"{{url('register/checkPhone')}}",
          data:{phone:phone,_token:token},
          success:function(data){
            if(data==='success'){
              $('.alert-danger').hide();
              $("#get_code").attr('disabled',false);
            }else{
              $('.alert-danger').show();
              $('.alert-danger').text(data);
              $("#get_code").attr('disabled',true);
            }
          }
        });
    });

    var handlerPopup = function (captchaObj) {
      //点击验证发送短信验证码
      var wait = 60;
      $("#get_code").click(function () {
        //再次发送验证码时间

        var validate = captchaObj.getValidate();
        var phone = $("#phone").val();
        var code = $("#code").val();
        if (!validate) {
          $('.alert-danger').show();
          $('.alert-danger').text('请先完成验证！');
          return;
        }
        if (phone.length<11) {
          $('.alert-danger').show();
          $('.alert-danger').text('请输入有效的手机号码！');
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
                $('.alert-danger').show();
                $('.alert-danger').text('验证码发送失败，请稍后再试！')
              }
          }
        });
      });
      captchaObj.bindOn("#get_code");
      captchaObj.appendTo(".container");
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

  });

  var wait = 60;
  function time(btn) {
    if (wait == 0) {
      $("#get_code").attr("disabled",false);
      $("#get_code").text("发送验证码");
      wait = 60;
    } else {
      $("#get_code").attr("disabled", true);
      $("#get_code").text(wait + "秒重新获取");
      wait--;
      setTimeout(function () {
                time($("#get_code"));
              },
              1000)
    }

  }
  //注册
  $('#reg').click(function(){

    var phone = $("#phone").val();
    var code = $("#code").val();
    var password = $("#password").val();
    var re_password = $("#re_password").val();
    var token = "{{csrf_token()}}";
    //客户端验证
    if(phone.length!=11){
      $('.alert-danger').show();
      $('.alert-danger').text('请输入有效的手机号码！');
      return false;
    }else if(code.length!=4){
      $('.alert-danger').show();
      $('.alert-danger').text('请填写验证码！');
      return false;
    }else if(password != re_password){
      $('.alert-danger').show();
      $('.alert-danger').text('两次密码不一致！');
      return false;
    }else{
      $.ajax({
        url:"{{url('register')}}",
        data:{phone:phone,code:code,password:password,_token:token},
        type:"post",
        success:function(data){
          if(data == 'success'){
            location.href = "{{url('register/success')}}";
          }else{
            $('.alert-danger').show();
            $('.alert-danger').text(data);
          }
        }
      });
    }



  });
</script>
@endsection
