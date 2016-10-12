@extends('auth.common')
@section('content')

<body class="loginpages">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="userpic"><a href="http://www.qiyiguo.tv" target="_blank"><img src="{{asset('img/100100.png')}}" alt="" ></a></div>
        <div class="panel-body">
          <h2 class="text-center">密码重置成功</h2>
          <form>
            <!-- Change this to a button or input when using this as a form --> 
            <a href="{{url('member/index')}}" class="btn btn-lg btn-primary btn-block">3秒后跳转会员中心，点击马上登陆</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
