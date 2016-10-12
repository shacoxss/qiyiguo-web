@extends('auth.common')
@section('content')
<body class="loginpages">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="userpic"><a href="http://www.qiyiguo.tv" target="_blank"><img src="{{asset('img/100100.png')}}" alt="" ></a></div>
        <div class="panel-body">
          <h2 class="text-center">忘记密码 - 重设密码</h2>
          <form action="" method="post">
            {{csrf_field()}}
            @if(count('errors')>0)
              @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
              @endforeach
            @endif

            <div class="form-group">
              <label>新密码</label>
              <input type="password" class="form-control" placeholder="新密码" name="password">
            </div>
            <div class="form-group">
              <label>重复新密码</label>
              <input type="password" class="form-control" placeholder="重复新密码" name="password_confirmation">
            </div>
            <br>
            <!-- Change this to a button or input when using this as a form --> 
            <button type="submit" class="btn btn-lg btn-primary btn-block">重设密码</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
