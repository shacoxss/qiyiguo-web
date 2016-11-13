@extends('member.masterCommon')
@section('content')
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">链接管理</h1>
        <p class="page-subtitle">友情链接管理</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="dataTables-userlist">
          <thead>
            <div class="row">
              <p>
                <a class="masterUserAdd btn btn-success btn-xs" href="{{url('member/links/create')}}"><i class=" fa fa-plus"></i> 新增</a>
              </p>
            </div>

            <tr>
              <th width="100"><input type="checkbox" /> </th>
              <th width="100">ID </th>
              <th>链接名称</th>
              <th>链接地址</th>
              <th>状态</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          @foreach($links as $v)
            <tr class="odd">
              <td><input type="checkbox" /></td>
              <td>{{$v->id}}</td>
              <td>{{$v->name}}</td>
              <td class="center">
                  {{$v->link_url}}
              </td>
              <td class="center">
                @if($v->is_on)
                  <a href="#" class="btn btn-circle btn-success status" data-id="{{$v->id}}" data-status="{{$v->is_on}}" >启用</a>
                @else
                  <a href="#" class="btn btn-circle btn-danger status" data-id="{{$v->id}}" data-status="{{$v->is_on}}">停用</a>
                @endif
              </td>
              <td class="center">
                <a href="{{$v->link_url}}" class="btn btn-circle btn-success ">查看</a>
                <a href="{{url('member/links/'.$v->id.'/edit')}}" class="masterPowerEdit btn btn-circle btn-warning" >编辑</a>
                <a href="javascript:void(0)" class="delete-masterUser btn btn-circle btn-danger " onclick="del({{$v->id}})">删除</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <script src="{{asset('pulgin/layer/layer.js?v=2.4')}}"></script>
    <link rel="stylesheet" href="{{asset('pulgin/layer/skin/layer.css')}}" media="all">
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
<script>
  function del(id){

    var token = "{{csrf_token()}}";
    var method = "delete";
    layer.confirm('确认删除链接?', {
      title: '删除确认',
      btn: ['确认','取消'] //按钮
    }, function(){
      $.ajax({
        url: "{{url('member/links')}}" + "/" + id,
        type: "post",
        data: {_token: token, id: id, _method: method},
        success: function (data) {
          if (data == 'success') {
            layer.msg('删除成功！');
            location.reload();
          } else {
            layer.msg('删除失败！');
          }
        }
      });
    });
  }

  $(function(){
    $('.status').click(function(){
      var status = $(this).data('status');
      var id = $(this).data('id');
      var token = "{{csrf_token()}}";
      var _this = $(this);
        $.ajax({
          type:"post",
          data:{id:id,_token:token,is_on:status},
          url:"{{url('member/links/status')}}",
          success:function(data){
            if(data=='success'){
              layer.msg('状态修改成功！');
              if(status){
                _this.attr('class','btn btn-circle btn-danger status');
                _this.data('status',0);
                _this.text('停用');
              }else{
                _this.attr('class','btn btn-circle btn-success status');
                _this.data('status',1);
                _this.text('启用');
              }
            }else{
              layer.msg('状态修改失败！');
            }
          }
        });
    })
  })
</script>
@endsection
