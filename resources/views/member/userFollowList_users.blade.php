@extends('member.userCommon')
@section('content')
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header text">我的关注
        	<ul class="nav navbar-top-links" style="display:inline-block; position:relative; top:10px;">
	          	<li class="dropdown"> 
		          	<a class="dropdown-toggle userdd" data-toggle="dropdown" href="javascript:void(0)" title="点击微信扫描关注我们">
			            <div class="userprofile small">
			            	<span class="userpic"><img src="{{asset('img/qrcode_demo.jpg')}}" alt="" class="userpicimg" style="border-radius:0"></span>
			            </div>
			            <i class="caret"></i>
		            </a>
		            <ul class="dropdown-menu dropdown-user">
		              <li> <a href="#"><img src="{{asset('img/weixin_qrcode.jpg')}}" width="150" alt=""></a> </li>
		              <li> <a href="#"><i class="fa fa-wechat fa-fw"></i> 微信扫描关注我们</a> </li>
		            </ul>
	            <!-- /.dropdown-user --> 
	          	</li>
          	</ul>        
          <!-- /.dropdown -->
        </h1>
        <p class="page-subtitle">关注奇异果官方微信公众号，您喜欢的主播上线第一时间有通知哦！</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="addIndex.php">我的关注</a></li>
      <li class="active">我的主播</li>
    </ol>
    
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
		<div class="row">
			<div class="col-lg-12"> 
		      <!-- /.col-lg-3 col-md-4 -->
				@foreach($followed as $v)
		      	<div class="col-lg-3 col-md-4 col-sm-6" id="{{$v->followed_id}}">
			        <div class="panel panel-default userlist">
			          <div class="panel-body text-center">
			            <div class="userprofile">
			              <div class="userpic">
			              	<a href="{{url('author').'/'.$v->users->id}}" target="_blank" title="TA的主页"><img src="{{route('image', [$v->users->head_img, '100x100'])}}" onerror="this.src='{{asset('img/200200.png')}}'" alt="" class="userpicimg"></a>
			              </div>
			              <h3 class="username">{{$v->users->nickname}}</h3>
			            </div>
						  @if($v->users->intro)
			            <p>{{$v->users->intro}}</p>
						  @else
							  <p>作者很懒，什么也没留下~</p>
						  @endif
			            <div class="socials tex-center">
				            <a href="{{url('author').'/'.$v->users->id}}" class="btn btn-circle btn-warning" title="TA的主页"><i class="fa fa-home"></i></a>
				            <a href="" class="btn btn-circle btn-primary" title="粉丝QQ群"><i class="fa fa-qq"></i></a>
				            <a href="" class="btn btn-circle btn-success" title="微信号"><i class="fa fa-weixin"></i></a>
				            <a href="" class="btn btn-circle btn-danger" title="TA的微博"><i class="fa fa-weibo"></i></a>
			            </div>
			          </div>
			          <div class="panel-footer">
						  <span class="status active">关注于{{$v->followed_at}}</span>
				          <a href="javascript:;" title="取消关注" class="delete-compere btn btn-link pull-right favorite" data-follow="{{$v->followed_id}}"><i class="fa fa-heart"></i></a>
			          </div>
			        </div>
		      	</div>
		      <!-- /.col-lg-3 col-md-4 --> 
			@endforeach
	      	</div>
    	</div>
    	</div>
    </div>
    <!-- /.row -->
	<!-- layer.js -->
<script>
        $(document).ready(function() {
            $('.delete-compere').click(function(){
              layer.confirm('取消关注作者？', {
                title: '取消关注',
                btn: ['确认','取消'] //按钮
              }, function(){
				  var token = "{{csrf_token()}}";
				  var user_id = "{{session('user')->id}}";
				  var followed_id = $('.delete-compere').data('follow');
				  $.ajax({
					  url:"{{url('member/userFollow_users')}}",
					  data:{_token:token,user_id:user_id,followed_id:followed_id},
					  type:"post",
					  success:function(data){
							if(data=='success'){
								$('#'+followed_id+'').remove();
								layer.msg('取消关注成功', {icon: 1});
							}else{
								layer.msg('取消关注失败！', {icon: 2});
							}
					  }
				  });

              });
            });
        });
</script>


@endsection