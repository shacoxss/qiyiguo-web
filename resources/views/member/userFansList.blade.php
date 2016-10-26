@extends('member.userCommon')
@section('content')
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">粉丝管理</h1>
        <p class="page-subtitle">他们都是你的粉丝哦，好好维护吧</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)">粉丝管理</a></li>
      <li class="active">粉丝列表</li>
    </ol>    
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="dataTables-userlist">
          <thead>
            <tr>
              <th>头像 </th>
              <th>用户名</th>
              <th>果龄</th>
              <th>最近登录</th>
              <th>等级</th>
              <th>关注</th>
              <th>粉丝</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          @foreach($fans as $v)
            <tr class="odd">
              <td><img src="{{$v->user['head_img']}}" onerror="this.src='{{asset('img/100100.png')}}'" class="gridpic"></td>
                @if($v->nickname)
                    <td>{{$v->user['nickname']}}</td>
                @else
                    <td>{{$v->user['phone']}}</td>
                @endif
              <td>{{floor((time()-time($v->user['create_at']))/(3600*24*30))}}个月</td>
              <td class="center">{{$v->user['lastlogin_at']}}</td>
              <td class="center">果宝宝</td>
              <td class="center">{{$v->user['follows_count']}}</td>
              <td class="center">{{$v->user['fans_count']}}</td>
              <td class="center">
                <a href="article_add.php" class="btn btn-circle btn-primary ">私信</a>
                <a href="" class="btn btn-circle btn-success ">看他</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.row -->
    <!-- DataTables JavaScript -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-userlist').DataTable({
                responsive: true,
                pageLength:10,
                sPaginationType: "full_numbers",
                oLanguage: {
                    oPaginate: {
                        sFirst: "<<",
                        sPrevious: "<",
                        sNext: ">", 
                        sLast: ">>" 
                    }
                }
            });
        });
    </script>
@endsection
