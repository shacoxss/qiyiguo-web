@extends('member.masterCommon')
@section('content')
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">权限管理</h1>
        <p class="page-subtitle">网站管理中心用户权限设置</p>
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
                <a class="masterUserAdd btn btn-success btn-xs"><i class=" fa fa-plus"></i> 新增</a>
                <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> 删除</button>
              </p>
            </div>
{{--            <div class="row" >
              <div class="col-sm-6">
                <div class="dataTables_length form-inline" id="dataTables-userlist_length">
                  <label>每页
                    <select name="dataTables-userlist_length" aria-controls="dataTables-userlist" class="form-control input-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> 条数据
                  </label>
                </div>
              </div>
              <div class="col-sm-6" >
                <div id="dataTables-userlist_filter" class="dataTables_filter form-inline">
                  <label>搜索:<input class="form-control input-sm" placeholder="" aria-controls="dataTables-userlist" type="search"></label>
                </div>
              </div>
            </div>--}}
            <tr>
              <th width="100"><input type="checkbox" /> </th>
              <th width="100">ID </th>
              <th>头像 </th>
              <th>用户名</th>
              <th>最近登录</th>
              <th>权限</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $v)
            <tr class="odd">
              <td><input type="checkbox" /></td>
              <td>{{$v->id}}</td>
              @if(empty($v->head_img))
                <td><img src="{{asset('img/100100.png')}}" class="gridpic"></td>
              @else
                <td><img src="{{$v->head_img}}" class="gridpic"></td>
              @endif
              <td>{{$v->nickname}}</td>
              <td class="center">{{$v->lastlogin_at}}</td>
              <td class="center">
                @if($v->user_manage)
                <i class="btn btn-primary btn-xss">用户管理</i>
                @endif
                @if($v->content_manage)
                <i class="btn btn-primary btn-xss">内容管理</i>
                @endif
                @if($v->tag_manage)
                  <i class="btn btn-primary btn-xss">标签管理</i>
                @endif
                @if($v->cat_manage)
                  <i class="btn btn-primary btn-xss">栏目管理</i>
                @endif
                @if($v->root_manage)
                  <i class="btn btn-primary btn-xss">权限管理</i>
                @endif
                @if($v->global_manage)
                  <i class="btn btn-primary btn-xss">全局变量</i>
                @endif
              </td>
              <td class="center">
                <a href="#" class="btn btn-circle btn-success ">看他</a>
                @if(!($v->admin))
                <a href="#" class="masterPowerEdit btn btn-circle btn-warning " data-id="{{$v->id}}" data-user="{{$v->user_manage}}" data-content="{{$v->content_manage}}" data-tag="{{$v->tag_manage}}" data-cat="{{$v->cat_manage}}" data-root="{{$v->root_manage}}" data-global="{{$v->global_manage}}">编辑</a>
                <a href="#" class="delete-masterUser btn btn-circle btn-danger " data-id="{{$v->id}}">删除</a>
                @endif
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.row -->
{{--    <div class="row">
      <div class="col-sm-6">
        <div class="dataTables_info" id="dataTables-userlist_info" role="status" aria-live="polite">一共{{$count}}数据</div>
      </div>
      <div class="col-sm-6">
        <div class="dataTables_paginate paging_full_numbers" id="dataTables-userlist_paginate">
          {{$users->links()}}
        </div>
      </div>
    </div>--}}


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
        $(document).ready(function() {

          var msg = "{{session('msg')}}";
          if(msg.length!=0){
            layer.msg(msg);
          }

            $('.uploadImgGroup').click(function(){
              layer.open({
                type: 2,
                border: [0],
                title: false,
                shadeClose: true,
                closeBtn: true,
                area: ['830px' , '363px'],
                content: 'plupLoad.html'
              })
            });
            $('.masterPowerEdit').click(function(){
              var id = $(this).data('id');
              var url = "{{url('member/masterPowerEdit')}}";
              var token = "{{csrf_token()}}";
              var user_manage = $(this).data('user');
              var content_manage = $(this).data('content');
              var tag_manage = $(this).data('tag');
              var cat_manage = $(this).data('cat');
              var root_manage = $(this).data('root');
              var global_manage = $(this).data('global');
              if(user_manage){
                user_manage = '<input id="cmn-toggle-1"class="cmn-toggle cmn-toggle-round"type="checkbox" name="user_manage" checked>';
              }else{
                user_manage = '<input id="cmn-toggle-1"class="cmn-toggle cmn-toggle-round"type="checkbox" name="user_manage" >';
              }
              if(content_manage){
                content_manage = '<input id="cmn-toggle-2"class="cmn-toggle cmn-toggle-round"type="checkbox" name="content_manage" checked>';
              }else{
                content_manage = '<input id="cmn-toggle-2"class="cmn-toggle cmn-toggle-round"type="checkbox" name="content_manage" >';
              }
              if(tag_manage){
                tag_manage = '<input id="cmn-toggle-3"class="cmn-toggle cmn-toggle-round"type="checkbox" name="tag_manage" checked>';
              }else{
                tag_manage = '<input id="cmn-toggle-3"class="cmn-toggle cmn-toggle-round"type="checkbox" name="tag_manage" >';
              }
              if(cat_manage){
                cat_manage = '<input id="cmn-toggle-4"class="cmn-toggle cmn-toggle-round"type="checkbox" name="cat_manage" checked>';
              }else{
                cat_manage = '<input id="cmn-toggle-4"class="cmn-toggle cmn-toggle-round"type="checkbox" name="cat_manage" >';
              }
              if(root_manage){
                root_manage = '<input id="cmn-toggle-5"class="cmn-toggle cmn-toggle-round"type="checkbox" name="root_manage" checked>';
              }else{
                root_manage = '<input id="cmn-toggle-5"class="cmn-toggle cmn-toggle-round"type="checkbox" name="root_manage" >';
              }
              if(global_manage){
                global_manage = '<input id="cmn-toggle-6"class="cmn-toggle cmn-toggle-round"type="checkbox" name="global_manage" checked>';
              }else{
                global_manage = '<input id="cmn-toggle-6"class="cmn-toggle cmn-toggle-round"type="checkbox" name="global_manage" >';
              }
              layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                shadeClose: true,
                skin: 'yourclass',
                content: '<form action="'+url+'" method="post"><input type="hidden" name="id" value="'+id+'"><input type="hidden" name="_token" value="'+token+'"><div class="col-md-12 col-lg-12"><div class="panel panel-default"><div class="panel-heading"><h1 class="page-header small">权限编辑</h1><p class="page-subtitle small">用户后台管理的权限编辑</p></div><div class="col-md-12"><div class="list-group "><div class="list-group-item withswitch"><h5 class="list-group-item-heading">用户管理</h5><p class="list-group-item-text">是否可见用户管理选项</p><div class="switch">'+user_manage+'<label for="cmn-toggle-1"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">内容管理</h5><p class="list-group-item-text">是否可见内容管理选项</p><div class="switch">'+content_manage+'<label for="cmn-toggle-2"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">标签管理</h5><p class="list-group-item-text">是否可见标签管理选项</p><div class="switch">'+tag_manage+'<label for="cmn-toggle-3"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">栏目管理</h5><p class="list-group-item-text">是否可见栏目管理选项</p><div class="switch">'+cat_manage+'<label for="cmn-toggle-4"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">权限管理</h5><p class="list-group-item-text">是否可见权限管理选项</p><div class="switch">'+root_manage+'<label for="cmn-toggle-5"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">全局变量</h5><p class="list-group-item-text">是否可见全局变量选项</p><div class="switch">'+global_manage+'<label for="cmn-toggle-6"></label></div></div></div><div class="form-group"><button type="submit"class="btn btn-primary" id="saveOk">提交</button></div></div><div class="clearfix"></div></div></div></form>'
              });
              $('#saveOk').click(function(){
                  parent.layer.msg('设置成功', {shade: 0.3})
              });
            });
            $('.masterUserAdd').click(function(){
              var url = "{{url('member/addMaster')}}";
              var token = "{{csrf_token()}}";
              layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                shadeClose: true,
                skin: 'yourclass',
                content: '<div class="panel panel-default"><div class="panel-heading"><h1 class="page-header small">新增管理员</h1><p class="page-subtitle small">输入用户ID已新增一个管理员</p></div><div class="col-md-12"><form action="'+url+'" method="post"><input type="hidden" name="_token" value="'+token+'"><div class="form-group"><label>用户ID</label><input type="text"class="form-control"placeholder="用户ID" name="id"></div><br><button type="submit"  class="btn btn-primary" id="fmasterUserAddOk">保存</button></form> </div><div class="clearfix"></div></div>'
              });
            });

            $('.delete-masterUser').click(function(){
              var id = $(this).data('id');
              var token = "{{csrf_token()}}";
              layer.confirm('确认删除管理员?', {
                title: '删除确认',
                btn: ['确认','取消'] //按钮
              }, function(){
                $.ajax({
                  url:"{{url('member/delMaster')}}",
                  data:{id:id,_token:token},
                  type:'post',
                  success:function(data){
                    if(data=='success'){
                      layer.msg('删除成功!', {icon: 1});
                      location.reload();
                    }else{
                      layer.msg('删除失败!', {icon: 2});
                    }
                  }
                });

              });
            });
        });
</script>
@endsection
