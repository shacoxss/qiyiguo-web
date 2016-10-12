@extends('auth.common')
@section('content')
<body class="loginpages">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="userpic"><a href="http://www.qiyiguo.tv" target="_blank"><img src="{{asset('img/100100.png')}}" alt="" ></a></div>
        <div class="panel-body">
          <h2 class="text-center">登陆成功</h2>
          <form>
            <!-- Change this to a button or input when using this as a form --> 
            <a href="{{url('member/index')}}" class="btn btn-lg btn-primary btn-block" id="go">3秒后跳转会员中心，点击马上登陆</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  //3秒后跳转会员中心
  var wait = 3;
  window.onload = function(){
      time();
  }
  function time() {
    if (wait == 0) {
      location.href = "{{url('member/index')}}";
    } else {
      $("#go").text(wait + "秒后跳转会员中心，点击马上登陆");
      wait--;
      setTimeout(function () {
                time($("#go"));
              },
              1000)
    }
  }
</script>
@endsection
