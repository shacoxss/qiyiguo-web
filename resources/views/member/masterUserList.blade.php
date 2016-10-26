@extends('member.masterCommon')
@section('content')
    <div class="row">
        <div class="col-md-12  header-wrapper" >
            <h1 class="page-header">用户列表</h1>
            <p class="page-subtitle">奇异果的所有用户都在这里了</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
        <li><a href="javascript:void(0)">用户管理</a></li>
        <li class="active">用户列表</li>
    </ol>
    <!-- /.row -->
    <div class="row">
        <p>
            <button type="button" class="btn btn-success btn-xs" id="checkall" data-check="1"><i class="fa fa-arrows"></i> 全选</button>
            <button type="button" class="btn btn-danger btn-xs" id="del-by-ids"><i class="fa fa-times"></i> 删除</button>
        </p>
    </div>
{{--    <div class="row" >
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
    <div class="row">

        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="dataTables-userlist">
                <thead>

                <tr>
                    <th width="100"><input type="checkbox" /> </th>
                    <th width="100">ID </th>
                    <th>头像 </th>
                    <th>用户名/手机号</th>
                    <th>果龄</th>
                    <th>最近登录</th>
                    <th>等级</th>
                    <th>关注</th>
                    <th>粉丝</th>
                    <th>绑定</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $v)
                <tr class="odd">
                    <td><input type="checkbox"  class="select-id" value="{{$v->id}}"/></td>
                    <td>{{$v->id}}</td>
                    @if(empty($v->head_img))
                        <td><img src="{{asset('img/100100.png')}}" class="gridpic"></td>
                    @else
                        <td><img src="{{$v->head_img}}" class="gridpic"></td>
                    @endif
                    @if($v->nickname)
                        <td>{{$v->nickname}}</td>
                    @else
                        <td>{{$v->phone}}</td>
                    @endif
                    <td>{{floor((time()-time($v->create_at))/(3600*24*30))}}个月</td>
                    <td class="center">{{$v->lastlogin_at}}</td>
                    <td class="center">{{$v->level}}</td>
                    <td class="center">{{$v->follows_count}}</td>
                    <td class="center">{{$v->fans_count}}</td>
                    <td class="center">
                        @if($v->phone)
                            <i class="fa fa-tablet btn btn-circle btn-warning"></i>
                        @else
                            <i class="fa fa-tablet btn btn-circle btn-default"></i>
                        @endif
                        @if($v->binding_qq)
                            <i class="fa fa-qq btn btn-circle btn-primary"></i>
                        @else
                            <i class="fa fa-qq btn btn-circle btn-default"></i>
                        @endif
                        @if($v->binding_weixin)
                            <i class="fa fa-weixin btn btn-circle btn-success"></i>
                        @else
                            <i class="fa fa-weixin btn btn-circle btn-default"></i>
                        @endif
                        @if($v->binding_weibo)
                            <i class="fa fa-weibo btn btn-circle btn-danger"></i>
                        @else
                            <i class="fa fa-weibo btn btn-circle btn-default"></i>
                        @endif
                    </td>
                    <td class="center">
                        <a href="{{url('member/userManage/'.$v->id.'/edit')}}" class="btn btn-circle btn-warning ">编辑</a>
                        <a href="#" class="btn btn-circle btn-primary ">私信</a>
                        <a href="#" class="btn btn-circle btn-success ">看他</a>
                        @if(!$v->admin)
                        <a href="javascript:void(0)" class="btn btn-circle btn-danger del" data-id="{{$v->id}}">删除</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
    <!-- /.row -->
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
$(function(){
    //全选，全不选
    $("#checkall").click(
            function(){
                if($(this).data('check')){
                    $(":checkbox").each(function(){this.checked=true;});
                    $(this).data('check',0);
                }else{
                    $(":checkbox").each(function(){this.checked=false;});
                    $(this).data('check',1);
                }
            }

    );
    //批量操作
    $("#del-by-ids").click(function(){

        var ids = "";



        $(".select-id:checked").each(function(){

            ids += $(this).val()+",";

        });



        if(ids == ""){

            layer.msg('要删除内容为空', {icon: 2});

            return;

        }else{

            ids = ids.substring(0,ids.length-1);

        }


        layer.confirm('删除所选用户', {
            title: '确认删除所选用户？',
            btn: ['确认','取消'] //按钮
        }, function(){
            $.ajax({
                url:"{{url('member/userManage')}}"+"/"+ids,
                data:{id:ids,_token:"{{csrf_token()}}"},
                type:"delete",
                success:function(data){
                    if(data == 'success'){
                        layer.msg('删除成功', {icon: 1});
                        location.reload();
                    }else{
                        layer.msg('删除失败', {icon: 2});
                    }
                },
                error:function(){
                    layer.msg('错误', {icon: 2});
                }
            });
        });

    });
        $(".del").click(function(){
            var user_id = $(this).data('id');
            layer.confirm('删除用户', {
                title: '确认删除',
                btn: ['确认','取消'] //按钮
            }, function(){
                $.ajax({
                    url:"{{url('member/userManage')}}"+"/"+user_id,
                    data:{id:user_id,_token:"{{csrf_token()}}"},
                    type:"delete",
                    success:function(data){
                        if(data == 'success'){
                            layer.msg('删除成功', {icon: 1});
                            location.reload();
                        }else{
                            layer.msg('删除失败', {icon: 2});
                        }
                    },
                    error:function(){
                        layer.msg('错误', {icon: 2});
                    }
                });
            });
        });
});
    </script>
@endsection