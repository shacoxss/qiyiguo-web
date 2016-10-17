@if(session('user')->master)
    @extends('member.masterCommon')
@else
    @extends('member.userCommon')
@endif
@section('content')
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">403 Page Forbidden</h1>
        <p class="page-subtitle">You can remove this header-wrapper.</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12 text-center"> <img src="{{asset('img/403.png')}}" alt="" class="responsiveimg"><br>
        <h1 class="page-header ">对不起! 您没有权限访问此页面...</h1>
        <br>
        <a class="btn btn-primary" href="{{url('member/index')}}">Go Back to Home</a> </div>
      <!-- /.col-lg-12 --> 
    </div>
@endsection