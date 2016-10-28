@extends('member.userCommon')
@section('content')

  <div class="loader"><h1 class="loadingtext">奇异果<span>聚合</span></h1><p>QiYIGUO.COM 看点有意思的...</p><br><img src="{{asset('img/loader2.gif')}}" alt=""></div>
    <!--content-->
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">用户中心</h1>
        <p class="page-subtitle">奇异果用户中心，在这里您可以管理自己的文章、图片、视频。
          @if($is_sign)
            <a class=" btn btn-success btn-xs"><i class="fa fa-pencil"></i> 今天已签到，明天再来吧</a>
          @else
            <a href="javascript:;" class="sign btn btn-primary btn-xs" ><i class="fa fa-pencil"></i> 签到</a>
          @endif
        </p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    
    <ol class="breadcrumb">
      <li><a href="http://www.qiyiguo.tv" target="_blank">奇异果聚合</a></li>
      <li class="active">用户中心</li>
    </ol>
    
    <!-- /.row -->
    
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-blue">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-save fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">121566</div>
                <div>文档总数</div>
              </div>
            </div>
          </div>
          <a href="archivesList.php">
          <div class="panel-footer"> <span class="pull-left">所有文档</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-users fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">1562</div>
                <div>粉丝</div>
              </div>
            </div>
          </div>
          <a href="{{'member/userFans'}}">
          <div class="panel-footer"> <span class="pull-left">粉丝管理</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-star fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">1562</div>
                <div>关注主播</div>
              </div>
            </div>
          </div>
          <a href="javascript:void(0)">
          <div class="panel-footer"> <span class="pull-left">所有关注收藏的</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-key fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">{{$user->points}}</div>
                <div>积分</div>
              </div>
            </div>
          </div>
          <a href="javascript:void(0)">
          <div class="panel-footer"> <span class="pull-left">积分可以干什么</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  <script type="text/javascript">
    $(function(){
      $('.sign').click(function(){
        var token = "{{csrf_token()}}";
        var id = "{{session('user')->id}}";
        if(id.length==0){
          layer.alert('登陆超时，请重新登陆！', {icon: 6});
          return false;
        }else{
          $.ajax({
            url:"{{url('member/sign')}}",
            type:"post",
            data:{_token:token,id:id},
            success:function(data){
              layer.alert(data, {icon: 6});
              setTimeout('reload()',1000);
            }
          });
        }
      });
    });
    function reload(){
      location.reload();
    }
  </script>
@endsection

