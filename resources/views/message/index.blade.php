@extends('member.userCommon')
@section('content')
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">消息中心</h1>
        <p class="page-subtitle">奇异果的小秘密都在这里，仔细看哦</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="{{url('member/index')}}">用户中心</a></li>
      <li class="active">消息中心</li>
    </ol>    
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-lg-12" style="padding:0">
        <div class="panel panel-primary">
          <div class="col-md-6 col-lg-5">
            <div class="row">
              <div class="col-md-12 padding borderbtm">
                <input type="checkbox" id="checkall">
                <label for="check1"></label>
                <button type="button" class="btn btn-default " id="del"><i class="fa fa-trash-o  "></i> 删除</button>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="maillist">
                <table class="mailmessages table">
                  @foreach($messages as $v)
                  <tr>
                    <td class="@if($v->view==1) default @else @if($v->is_pass) primary @else important @endif @endif statusmail view" data-id="{{$v->id}}"><input type="checkbox" id="check{{$v->id}}" class="select-id" data-id="{{$v->id}}">
                      <label for="check{{$v->id}}"></label>
                      <a href="javascript:void(0)">
                      <div class="imgpic"><img src="{{asset('img/100100.png')}}" alt=""> </div>
                      <div class="textmail"> <strong>系统消息</strong> <span class="pull-right text-muted">{{$v->updated_at}}</span>
                        <p>{{$v->message_info}}</p>
                      </div>
                      </a></td>
                  </tr>
                  @endforeach
                    <td class="read"><a class="text-center" href="javascript:void(0)"> <strong>更多消息·没有更多信息了</strong> <i class="fa fa-angle-right"></i> </a></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-7">
            <div class="row">
              <div class="col-md-12 padding borderbtm">
                <div class="pull-right">
                  <button type="button" class="btn btn-default "><i class="fa fa-reply "></i> </button>
                  <button type="button" class="btn btn-default "><i class="fa  fa-mail-forward "></i> </button>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="maillist "> 
            <div class="mailpreview">
              <div class="imgpic"><img src="{{asset('img/100100.png')}}" alt=""> </div>
              <div class="textmail"> <strong>系统消息</strong> <span class="pull-right text-muted"> 2016-11-09 | 11:00</span>
                <p>内容审核小组·可乐上瘾</p>
              </div>
            </div>
            @foreach($messages as $v)
            <div class="mailcontent">
              <h2 class="mailtitle">@if($v->is_pass) 审核通过 @else 审核未通过 @endif</h2>
              <p>{{$v->message_info}}，原因：<br>
                <b>{!! $v->message !!}</b>
                <br><br>
                感谢您的阅读<br>
                内容审核小组·{{$v->user['nickname']}}</p>
            </div>
            @endforeach
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      </div>
    </div>
    <!-- /.row --> 
    
  </div>
  <!-- /#page-wrapper -->
    <script>

    $(function(){
      $('.view').click(function() {
        var _this = $(this);
        var token = "{{csrf_token()}}";
        var id = _this.data('id');
        if (_this.attr('class') != 'default statusmail view'){
          $.ajax({
            url:"{{url('member/message/change')}}",
            type:"post",
            data:{_token:token,id:id},
            success:function(data){
              if(data=='success'){
                _this.attr('class', 'default statusmail view');
              }else{
                layer.msg('错误！');
              }
            }
          })
        }
      })
    });
      //全选，不全选
    $("#checkall").click(

            function(){
              if(this.checked){
                $(":checkbox").each(function(){this.checked=true;});
              }else{
                $(":checkbox").each(function(){this.checked=false;});
              }
            }

    );
    //批量删除
    $(function(){

      $("#del").click(function(){



          var ids = "";



          $(".select-id:checked").each(function(){

            ids += $(this).data("id")+",";

          });



          if(ids == ""){

            layer.msg('请选择要删除的内容');

            return;

          }else{

            ids = ids.substring(0,ids.length-1);

          }



        layer.confirm('确定要删除所选内容？', {
          title:'确认删除所选内容',
          btn: ['确定', '取消']
        },function(){
          var token = "{{csrf_token()}}";
          $.ajax({
            url:"{{url('member/message/destroy')}}",
            type:"post",
            data:{ids:ids,_token:token},
            success:function(data){
              if(data=='success'){
                layer.msg('删除成功！',{icon: 1});
                location.reload();
              }else{
                layer.msg('删除失败！',{icon: 2});
              }
            }
          })

        });


        });

    });

    </script>
@endsection
