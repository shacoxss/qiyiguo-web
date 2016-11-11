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
                  <tr id="{{$v->id}}">
                    <td class="@if($v->view==1) default @else @if($v->is_pass) primary @else important @endif @endif statusmail view"  data-id="{{$v->id}}" data-head_img="{{$v->user['head_img']}}" data-updated_at="{{$v->created_at}}" data-nickname="{{$v->user['nickname']}}" data-message_info="{{$v->message_info}}" data-message="{!! $v->message !!}" data-is_pass="{{$v->is_pass}}">
                      <input type="checkbox" id="check{{$v->id}}" class="select-id" data-id="{{$v->id}}">
                      <label for="check{{$v->id}}"></label>
                      <a href="javascript:void(0)">
                      <div class="imgpic"><img src="{{asset('img/100100.png')}}" alt=""> </div>
                      <div class="textmail"> <strong>系统消息</strong> <span class="pull-right text-muted">{{$v->created_at}}</span>
                        <p>{{$v->message_info}}</p>
                      </div>
                      </a></td>
                  </tr>
                  @endforeach
                </table>
                  <table class="table">
                      <tr>
                          <td class="read" style="text-align: center">
                              @if($count<15)
                                  <strong >没有更多信息了</strong>
                              @else
                                  <a class="text-center" href="javascript:void(0)" id="more"><strong>更多消息</strong><i class="fa fa-angle-right"></i> </a>
                              @endif
                          </td>
                      </tr>
                  </table>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-7">

            <div class="maillist detail" data-id="">
                    @if(empty($messages))
                    <div class="col-lg-12" >
                        <h2 class="page-header text-center">没有任何消息</h2>
                    </div>
                    @endif
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
        var num = 1;
    $(function(){
      $(document).on('click','.view',function() {
        var _this = $(this);
        var token = "{{csrf_token()}}";
        var id = _this.data('id');
        var updated_at = _this.data('updated_at');
        var nickname = _this.data('nickname');
        var message_info = _this.data('message_info');
        var message = _this.data('message');
        var is_pass = _this.data('is_pass')?'审核通过':'审核未通过';
        var system_img = "{{asset('img/100100.png')}}";
        var detail = $('.detail');
        //显示详情
          $('.page').remove();
          detail.before("<div class='row page'>" +
                  "<div class='col-md-12 padding borderbtm'>" +
                  "<div class='pull-right'>" +
                  "<button type='button' class='btn btn-default preg'><i class='fa fa-reply '></i> </button>" +
                  "<button type='button' class='btn btn-default next'><i class='fa  fa-mail-forward '></i> </button>" +
                  "</div>" +
                  "<div class='clearfix'></div>" +
                  "</div>" +
                  "</div>");
          detail.children().remove();
          detail.data('id',id);
          detail.append("<div class='mailpreview'>" +
                "<div class='imgpic'><img src='"+system_img+"' alt=''> </div>" +
                "<div class='textmail'> <strong>系统消息</strong> <span class='pull-right text-muted'>"+updated_at+"</span>" +
                "<p>内容审核小组·"+nickname+"</p>" +
                "</div>" +
                "</div>" +
                "<div class='mailcontent'>" +
                "<h2 class='mailtitle'>"+is_pass+"</h2>" +
                "<p>" + message_info + "，原因：<br>" +
                "<b>" + message + "</b>" +
                "<br><br>" +
                "感谢您的阅读<br>" +
                "内容审核小组·" + nickname + "</p>" +
                "</div>"
        );



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

        //加载更多
        $(function(){
            $('#more').click(function(){
                $.ajax({
                    type:"get",
                    url:"{{url('member/message/more')}}"+"/"+num,
                    success:function(data){
                        var system_img = "{{asset('img/100100.png')}}";
                        for(var i= 0;i<data.length;i++){
                            if(data[i].view){
                                var pop = "default";
                            }else{
                                if(data[i].is_pass){
                                    var pop = "primary";
                                }else{
                                    var pop = "important";
                                }
                            }
                            $('.mailmessages').append(
                                    "<tr id='"+data[i].id+"'>" +
                                    "<td class='"+pop+" statusmail view' data-id='"+data[i].id+"' data-head_img='"+data[i].user['head_img']+"' data-updated_at='"+data[i].created_at+"' data-nickname='"+data[i].user['nickname']+"' data-message_info='"+data[i].message_info+"' data-message='"+data[i].message+"' data-is_pass='"+data[i].is_pass+"'>" +
                                    "<input type='checkbox' class='select-id' data-id='"+data[i].id+"'>" +
                                    "<a href='javascript:void(0)'>" +
                                    "<div class='imgpic'><img src='"+system_img+"' alt=''> </div>" +
                                    "<div class='textmail'> <strong>系统消息</strong> <span class='pull-right text-muted'>"+data[i].created_at+"</span>" +
                                    "<p>"+data[i].message_info+"</p>" +
                                    "</div>" +
                                    "</a></td>" +
                                    "</tr>");
                        }
                    }
                })
                num +=1;
            });
        })

        //上一条，下一条
        $(document).on('click','.preg',function(){
            var now = $('.detail').data('id');
            var prev = $('#'+now).prev();
            var _this = prev.find('.view');
            var token = "{{csrf_token()}}";
            var updated_at = _this.data('updated_at');
            var nickname = _this.data('nickname');
            var message_info = _this.data('message_info');
            var message = _this.data('message');
            var is_pass = _this.data('is_pass')?'审核通过':'审核未通过';
            var system_img = "{{asset('img/100100.png')}}";
            if(prev.length==0){
                layer.msg('已经是第一条了！');
            }else{
                if (_this.attr('class') != 'default statusmail view'){
                    $.ajax({
                        url:"{{url('member/message/change')}}",
                        type:"post",
                        data:{_token:token,id:prev.attr('id')},
                        success:function(data){
                            if(data=='success'){
                                _this.attr('class', 'default statusmail view');
                            }else{
                                layer.msg('错误！');
                            }
                        }
                    })
                }
                var detail = $('.detail');
                detail.children().remove();
                detail.data('id',prev.attr('id'));
                detail.append("<div class='mailpreview'>" +
                        "<div class='imgpic'><img src='"+system_img+"' alt=''> </div>" +
                        "<div class='textmail'> <strong>系统消息</strong> <span class='pull-right text-muted'>"+updated_at+"</span>" +
                        "<p>内容审核小组·"+nickname+"</p>" +
                        "</div>" +
                        "</div>" +
                        "<div class='mailcontent'>" +
                        "<h2 class='mailtitle'>"+is_pass+"</h2>" +
                        "<p>" + message_info + "，原因：<br>" +
                        "<b>" + message + "</b>" +
                        "<br><br>" +
                        "感谢您的阅读<br>" +
                        "内容审核小组·" + nickname + "</p>" +
                        "</div>"
                );
            }
        });

        $(document).on('click','.next',function(){
            var now = $('.detail').data('id');
            var next = $('#'+now).next();
            var _this = next.find('.view');
            var token = "{{csrf_token()}}";
            var updated_at = _this.data('updated_at');
            var nickname = _this.data('nickname');
            var message_info = _this.data('message_info');
            var message = _this.data('message');
            var is_pass = _this.data('is_pass')?'审核通过':'审核未通过';
            var system_img = "{{asset('img/100100.png')}}";
            if(next.length==0){
                layer.msg('已经是最后一条了！');
            }else{
                if (_this.attr('class') != 'default statusmail view'){
                    $.ajax({
                        url:"{{url('member/message/change')}}",
                        type:"post",
                        data:{_token:token,id:next.attr('id')},
                        success:function(data){
                            if(data=='success'){
                                _this.attr('class', 'default statusmail view');
                            }else{
                                layer.msg('错误！');
                            }
                        }
                    })
                }
                var detail = $('.detail');
                detail.children().remove();
                detail.data('id',next.attr('id'));
                detail.append("<div class='mailpreview'>" +
                        "<div class='imgpic'><img src='"+system_img+"' alt=''> </div>" +
                        "<div class='textmail'> <strong>系统消息</strong> <span class='pull-right text-muted'>"+updated_at+"</span>" +
                        "<p>内容审核小组·"+nickname+"</p>" +
                        "</div>" +
                        "</div>" +
                        "<div class='mailcontent'>" +
                        "<h2 class='mailtitle'>"+is_pass+"</h2>" +
                        "<p>" + message_info + "，原因：<br>" +
                        "<b>" + message + "</b>" +
                        "<br><br>" +
                        "感谢您的阅读<br>" +
                        "内容审核小组·" + nickname + "</p>" +
                        "</div>"
                );
            }
        });

    </script>
@endsection
