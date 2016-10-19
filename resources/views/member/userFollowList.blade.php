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
		      	<div class="col-lg-3 col-md-4 col-sm-6">
			        <div class="panel panel-default userlist">
			          <div class="panel-body text-center">
			            <div class="userprofile">
			              <div class="userpic">
			              	<a href="#" target="_blank" title="TA的主页"><img src="{{asset('img/200200.png')}}" alt="" class="userpicimg"></a>
			              </div>
			              <h3 class="username">韩夏夏</h3>
			              <p><a href="#" title="斗鱼直播">斗鱼直播</a></p>
			            </div>
			            <p>10月30日休息一天，11月1日继续，亲们等我，爱你们，么么哒</p>
			            <div class="socials tex-center">
				            <a href="" class="btn btn-circle btn-warning" title="TA的主页"><i class="fa fa-home"></i></a>
				            <a href="" class="btn btn-circle btn-primary" title="粉丝QQ群"><i class="fa fa-qq"></i></a>
				            <a href="" class="btn btn-circle btn-success" title="微信号"><i class="fa fa-weixin"></i></a>
				            <a href="" class="btn btn-circle btn-danger" title="TA的微博"><i class="fa fa-weibo"></i></a>
			            </div>
			          </div>
			          <div class="panel-footer">
				          <span class="status active">正在直播</span>
				          <a href="javascript:;" title="取消关注" class="delete-compere btn btn-link pull-right favorite"><i class="fa fa-heart"></i></a>
			          </div>
			        </div>
		      	</div>
		      <!-- /.col-lg-3 col-md-4 --> 
		      <!-- /.col-lg-3 col-md-4 -->
		      	<div class="col-lg-3 col-md-4 col-sm-6">
			        <div class="panel panel-default userlist">
			          <div class="panel-body text-center">
			            <div class="userprofile">
			              <div class="userpic">
			              	<a href="#" target="_blank" title="TA的主页"><img src="{{asset('img/200200.png')}}" alt="" class="userpicimg"></a>
			              </div>
			              <h3 class="username">韩夏夏</h3>
			              <p><a href="#" title="斗鱼直播">斗鱼直播</a></p>
			            </div>
			            <p>10月30日休息一天，11月1日继续，亲们等我，爱你们，么么哒</p>
			            <div class="socials tex-center">
				            <a href="" class="btn btn-circle btn-warning" title="TA的主页"><i class="fa fa-home"></i></a>
				            <a href="" class="btn btn-circle btn-primary" title="粉丝QQ群"><i class="fa fa-qq"></i></a>
				            <a href="" class="btn btn-circle btn-success" title="微信号"><i class="fa fa-weixin"></i></a>
				            <a href="" class="btn btn-circle btn-danger" title="TA的微博"><i class="fa fa-weibo"></i></a>
			            </div>
			          </div>
			          <div class="panel-footer">
				          <span class="status active">正在直播</span>
				          <a href="javascript:;" title="取消关注" class="delete-compere btn btn-link pull-right favorite"><i class="fa fa-heart"></i></a>
			          </div>
			        </div>
		      	</div>
		      <!-- /.col-lg-3 col-md-4 --> 
		      <!-- /.col-lg-3 col-md-4 -->
		      	<div class="col-lg-3 col-md-4 col-sm-6">
			        <div class="panel panel-default userlist">
			          <div class="panel-body text-center">
			            <div class="userprofile">
			              <div class="userpic">
			              	<a href="#" target="_blank" title="TA的主页"><img src="{{asset('img/200200.png')}}" alt="" class="userpicimg"></a>
			              </div>
			              <h3 class="username">韩夏夏</h3>
			              <p><a href="#" title="斗鱼直播">斗鱼直播</a></p>
			            </div>
			            <p>10月30日休息一天，11月1日继续，亲们等我，爱你们，么么哒</p>
			            <div class="socials tex-center">
				            <a href="" class="btn btn-circle btn-warning" title="TA的主页"><i class="fa fa-home"></i></a>
				            <a href="" class="btn btn-circle btn-primary" title="粉丝QQ群"><i class="fa fa-qq"></i></a>
				            <a href="" class="btn btn-circle btn-success" title="微信号"><i class="fa fa-weixin"></i></a>
				            <a href="" class="btn btn-circle btn-danger" title="TA的微博"><i class="fa fa-weibo"></i></a>
			            </div>
			          </div>
			          <div class="panel-footer">
				          <span class="status inactive">主播不在</span>
				          <a href="javascript:;" title="取消关注" class="delete-compere btn btn-link pull-right favorite"><i class="fa fa-heart"></i></a>
			          </div>
			        </div>
		      	</div>
		      <!-- /.col-lg-3 col-md-4 --> 
		      <!-- /.col-lg-3 col-md-4 -->
		      	<div class="col-lg-3 col-md-4 col-sm-6">
			        <div class="panel panel-default userlist">
			          <div class="panel-body text-center">
			            <div class="userprofile">
			              <div class="userpic">
			              	<a href="#" target="_blank" title="TA的主页"><img src="{{asset('img/200200.png')}}" alt="" class="userpicimg"></a>
			              </div>
			              <h3 class="username">韩夏夏</h3>
			              <p><a href="#" title="斗鱼直播">斗鱼直播</a></p>
			            </div>
			            <p>10月30日休息一天，11月1日继续，亲们等我，爱你们，么么哒</p>
			            <div class="socials tex-center">
				            <a href="" class="btn btn-circle btn-warning" title="TA的主页"><i class="fa fa-home"></i></a>
				            <a href="" class="btn btn-circle btn-primary" title="粉丝QQ群"><i class="fa fa-qq"></i></a>
				            <a href="" class="btn btn-circle btn-success" title="微信号"><i class="fa fa-weixin"></i></a>
				            <a href="" class="btn btn-circle btn-danger" title="TA的微博"><i class="fa fa-weibo"></i></a>
			            </div>
			          </div>
			          <div class="panel-footer">
				          <span class="status inactive">主播不在</span>
				          <a href="javascript:;" title="取消关注" class="delete-compere btn btn-link pull-right favorite"><i class="fa fa-heart"></i></a>
			          </div>
			        </div>
		      	</div>
		      <!-- /.col-lg-3 col-md-4 --> 
		      <!-- /.col-lg-3 col-md-4 -->
		      	<div class="col-lg-3 col-md-4 col-sm-6">
			        <div class="panel panel-default userlist">
			          <div class="panel-body text-center">
			            <div class="userprofile">
			              <div class="userpic">
			              	<a href="#" target="_blank" title="TA的主页"><img src="{{asset('img/200200.png')}}" alt="" class="userpicimg"></a>
			              </div>
			              <h3 class="username">韩夏夏</h3>
			              <p><a href="#" title="斗鱼直播">斗鱼直播</a></p>
			            </div>
			            <p>10月30日休息一天，11月1日继续，亲们等我，爱你们，么么哒</p>
			            <div class="socials tex-center">
				            <a href="" class="btn btn-circle btn-warning" title="TA的主页"><i class="fa fa-home"></i></a>
				            <a href="" class="btn btn-circle btn-primary" title="粉丝QQ群"><i class="fa fa-qq"></i></a>
				            <a href="" class="btn btn-circle btn-success" title="微信号"><i class="fa fa-weixin"></i></a>
				            <a href="" class="btn btn-circle btn-danger" title="TA的微博"><i class="fa fa-weibo"></i></a>
			            </div>
			          </div>
			          <div class="panel-footer">
				          <span class="status inactive">主播不在</span>
				          <a href="javascript:;" title="取消关注" class="delete-compere btn btn-link pull-right favorite"><i class="fa fa-heart"></i></a>
			          </div>
			        </div>
		      	</div>
		      <!-- /.col-lg-3 col-md-4 -->
	      	</div>
    	</div>
    	</div>
    </div>
    <!-- /.row -->
	<!-- layer.js -->
<script>
        $(document).ready(function() {
            $('.delete-compere').click(function(){
              layer.confirm('取消关注主播', {
                title: '取消关注',
                btn: ['确认','取消'] //按钮
              }, function(){
                layer.msg('取消关注成功', {icon: 1});
              });
            });
        });
</script>


@endsection