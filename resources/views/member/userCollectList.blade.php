@extends('member.userCommon')
@section('content')
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">我的收藏</h1>
        <p class="page-subtitle">您喜欢的文章、视频、图集都在这里啦</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)">我的收藏</a></li>
      <li class="active">收藏列表</li>
    </ol>    
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="dataTables-userlist">
          <thead>
            <tr>
              <th>标题 </th>
              <th>分类</th>
              <th>收藏时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          @foreach($mark as $v)
            <tr class="odd">
              <td>
                <a href="#">
                    @if($v->archive->cover)
                  <img src="{{route('image', [$v->cover, '30x30'])}}"  class="gridpic">
                    @endif
                  {{$v->archive->title}}
                </a>
              </td>
                @if($v->archive->archive_type_id==1)
                    <td>文章</td>
                @elseif($v->archive->archive_type_id==2)
                    <td>图集</td>
                @elseif($v->archive->archive_type_id==3)
                    <td>视频</td>
                @else
                    <td>默认</td>
                @endif
              <td class="center">{{$v->created_at}}</td>
              <td class="center">
                <a href="{{url('archive/'.$v->archive_id)}}" class="btn btn-circle btn-primary ">浏览</a>
                <a href="javascript:;" class="delete-collect btn btn-circle btn-danger " data-archive="{{$v->archive_id}}">取消</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.row --> 

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
            $('.delete-collect').click(function(){
                var _this = $(this);
              layer.confirm('确认取消收藏', {
                title: '取消收藏',
                btn: ['确认','取消'] //按钮
              }, function(){
                  var token = "{{csrf_token()}}";
                  var id = _this.data('archive');
                  $.ajax({
                      url:"{{url('member/userCollect')}}",
                      type:"post",
                      data:{_token:token,id:id},
                      success:function(data){
                          if(data=='success'){
                              layer.msg('取消收藏成功！', {icon: 1});
                              location.reload();
                          }else{
                              layer.msg('取消收藏失败！', {icon: 2});
                          }
                      }
                  });
              });
            });
        });
</script>
@endsection
