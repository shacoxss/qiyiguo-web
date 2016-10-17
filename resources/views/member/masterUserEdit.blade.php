@extends('member.masterCommon')
@section('content')
    <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">用户编辑</h1>
        <p class="page-subtitle">网站用管相关信息设置</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body no-padding"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profile" data-toggle="tab">个人资料</a></li>
              <li><a href="#skills" data-toggle="tab">编辑绩效</a></li>
              <li><a href="#settings" data-toggle="tab">设置</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content ">
              <div class="tab-pane fade padding in active" id="profile">
                <div class="row">
                  <div class="col-md-12 text-center ">
                    <div class="userprofile ">
                      @if(empty($user->head_img))
                      <div class="userpic"> <img src="{{asset('img/200200.png')}}" alt="" class="userpicimg"> </div>
                      @else
                        <div class="userpic"> <img src="{{$user->head_img}}" alt="" class="userpicimg"> </div>
                      @endif
                      <h3 class="username">{{$user->nickname}}</h3>
                        @if($user->admin)
                          <p>超级管理员</p>
                        @elseif($user->master)
                          <p>网站管理员</p>
                        @else
                          <p>普通用户</p>
                        @endif
                        <div class="socials tex-center">
                          @if($user->phone)
                            <i class="fa fa-tablet btn btn-circle btn-warning"></i>
                          @else
                            <i class="fa fa-tablet btn btn-circle btn-default"></i>
                          @endif
                          @if($user->binding_qq)
                            <i class="fa fa-qq btn btn-circle btn-primary"></i>
                          @else
                            <i class="fa fa-qq btn btn-circle btn-default"></i>
                          @endif
                          @if($user->binding_weixin)
                            <i class="fa fa-weixin btn btn-circle btn-success"></i>
                          @else
                            <i class="fa fa-weixin btn btn-circle btn-default"></i>
                          @endif
                          @if($user->binding_weibo)
                            <i class="fa fa-weibo btn btn-circle btn-danger"></i>
                          @else
                            <i class="fa fa-weibo btn btn-circle btn-default"></i>
                          @endif
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade  padding  " id="skills">
                <div class="row">
                  <div class="col-md-12">
                    <div class="bordered-block">
                      <div class="panel-heading border-bottom">
                        <h1 class="page-header small">编辑月任务</h1>
                        <p class="page-subtitle small">月任务完成概要</p>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="progress-radial progress-25">
                              <div class="overlay">25%</div>
                            </div>
                            <h3>月文章发布量</h3>
                            <p class="light">每月文章完成量</p>
                          </div>
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="progress-radial progress-50">
                              <div class="overlay">50%</div>
                            </div>
                            <h3>文章访问量</h3>
                            <p class="light">发布的所有文章的访问量综合</p>
                          </div>
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="progress-radial progress-75">
                              <div class="overlay">75%</div>
                            </div>
                            <h3>文章收录量</h3>
                            <p class="light">发布的文章在百度的收录量要求</p>
                          </div>
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="progress-radial progress-90">
                              <div class="overlay">90%</div>
                            </div>
                            <h3>文章分享量</h3>
                            <p class="light">发布的所有文章在微信的分享量统计</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade padding " id="settings">
                <div class="row">
                  <div class="col-md-6 col-lg-4">
                    <div class="bordered-block">
                      <div class="col-md-12 border-bottom">
                        <h1 class="page-header small">个人资料</h1>
                        <p class="page-subtitle small">用户个人资料编辑</p>
                      </div>
                      <div class="col-md-12">
                        <form action="{{url('member/saveNickname')}}" method="post">
                          <input type="hidden" name="id" value="{{$user->id}}">
                          {{csrf_field()}}
                          @if(session('msg'))
                            <div class="alert alert-danger">{{session('msg')}}</div>
                          @endif
                          <div class="form-group">
                            <label>昵称</label>
                            <input type="text" class="form-control" placeholder="昵称" value="{{$user->nickname}}" name="nickname">
                          </div>
                          <br>
                          <button type="submit" class="btn btn-primary">保存</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="bordered-block">
                      <div class="col-md-12 border-bottom">
                        <h1 class="page-header small">安全设置</h1>
                        <p class="page-subtitle small">密码等相关设置</p>
                      </div>
                      <div class="col-md-12">
                        @if(count('errors')>0)
                          @if(is_string($errors))
                            <div class="alert alert-danger">{{$errors}}</div>
                          @else
                            @foreach($errors->all() as $error)
                              <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                          @endif
                        @endif
                        <form action="{{url('member/savePhonePassword')}}" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="id" value="{{$user->id}}">
                          <div class="form-group">
                            <label>安全手机号</label>
                            <input type="text" class="form-control" placeholder="安全手机号" value="{{$user->phone}}" name="phone">
                          </div>
                          <div class="form-group">
                            <label>密码重设</label>
                            <input type="password" class="form-control" placeholder="密码重设" name="password">
                          </div>
                          <br>
                          <button type="submit" class="btn btn-primary">保存</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="bordered-block">
                      <div class="col-md-12 border-bottom">
                        <h1 class="page-header small">特殊设置</h1>
                        <p class="page-subtitle small">特殊权限控制</p>
                      </div>
                      <div class="col-md-12">
                        <div class="list-group">
                          @if(session('msg2'))
                            <div class="alert alert-danger">{{session('msg')}}</div>
                          @endif
                          <form action="{{url('member/saveAuth')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$user->id}}">
                          <div class="list-group-item withswitch">
                            <h5 class="list-group-item-heading">认证主播</h5>
                            <p class="list-group-item-text">显示认证icon</p>
                            <div class="switch">
                              @if($user->anchor_auth=='off')
                                <input id="cmn-toggle-5" class="cmn-toggle cmn-toggle-round" type="checkbox" name="anchor_auth">
                              @else
                                <input id="cmn-toggle-5" class="cmn-toggle cmn-toggle-round" type="checkbox" name="anchor_auth" checked>
                              @endif
                              <label for="cmn-toggle-5"></label>
                            </div>
                          </div>
                          <div class="list-group-item withswitch">
                            <h5 class="list-group-item-heading">第三方平台管理员</h5>
                            <p class="list-group-item-text">显示认证icon</p>
                            <div class="switch">
                              @if($user->third_manage_auth=='off')
                                <input id="cmn-toggle-6" class="cmn-toggle cmn-toggle-round" type="checkbox" name="third_manage_auth">
                              @else
                                <input id="cmn-toggle-6" class="cmn-toggle cmn-toggle-round" type="checkbox" name="third_manage_auth" checked>
                              @endif

                              <label for="cmn-toggle-6"></label>
                            </div>
                          </div>
                          <div class="list-group-item withswitch">
                            <h5 class="list-group-item-heading">编辑认证</h5>
                            <p class="list-group-item-text">显示认证icon</p>
                            <div class="switch">
                              @if($user->third_manage_auth=='off')
                                <input id="cmn-toggle-7" class="cmn-toggle cmn-toggle-round" type="checkbox" name="editor_auth">
                              @else
                                <input id="cmn-toggle-7" class="cmn-toggle cmn-toggle-round" type="checkbox" name="editor_auth" checked>
                              @endif
                              <label for="cmn-toggle-7"></label>
                            </div>
                          </div>
                          <br>
                          <button type="submit" class="btn btn-primary">保存</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
              </div>
            </div>
          </div>
        </div>
        
        <!-- /.col-lg-12 --> 
      </div>
    </div>
    



<!-- layer.js -->
<script src="{{asset('pulgin/layer/layer.js?v=2.4')}}"></script>
<link rel="stylesheet" href="{{asset('pulgin/layer/skin/layer.css')}}" media="all">
    <script>
      $(document).ready(function() {

        var msg = "{{session('msg')}}";
        if(msg.length!=0){
          layer.msg(msg, {icon: 1});
        }
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
          layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'yourclass',
            content: '<div class="col-md-12 col-lg-12"><div class="panel panel-default"><div class="panel-heading"><h1 class="page-header small">权限编辑</h1><p class="page-subtitle small">用户后台管理的权限编辑</p></div><div class="col-md-12"><div class="list-group "><div class="list-group-item withswitch"><h5 class="list-group-item-heading">用户管理</h5><p class="list-group-item-text">是否可见用户管理选项</p><div class="switch"><input id="cmn-toggle-1"class="cmn-toggle cmn-toggle-round"type="checkbox"><label for="cmn-toggle-1"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">内容管理</h5><p class="list-group-item-text">是否可见内容管理选项</p><div class="switch"><input id="cmn-toggle-2"class="cmn-toggle cmn-toggle-round"type="checkbox"><label for="cmn-toggle-2"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">标签管理</h5><p class="list-group-item-text">是否可见标签管理选项</p><div class="switch"><input id="cmn-toggle-3"class="cmn-toggle cmn-toggle-round"type="checkbox"><label for="cmn-toggle-3"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">栏目管理</h5><p class="list-group-item-text">是否可见栏目管理选项</p><div class="switch"><input id="cmn-toggle-4"class="cmn-toggle cmn-toggle-round"type="checkbox"><label for="cmn-toggle-4"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">权限管理</h5><p class="list-group-item-text">是否可见权限管理选项</p><div class="switch"><input id="cmn-toggle-5"class="cmn-toggle cmn-toggle-round"type="checkbox"><label for="cmn-toggle-5"></label></div></div><div class="list-group-item withswitch"><h5 class="list-group-item-heading">全局变量</h5><p class="list-group-item-text">是否可见全局变量选项</p><div class="switch"><input id="cmn-toggle-6"class="cmn-toggle cmn-toggle-round"type="checkbox"><label for="cmn-toggle-6"></label></div></div></div><div class="form-group"><button type="submit"class="btn btn-primary" id="saveOk">提交</button></div></div><div class="clearfix"></div></div></div>'
          });
          $('#saveOk').click(function(){
            parent.layer.msg('设置成功', {shade: 0.3})
          });
        });
        $('.masterUserAdd').click(function(){
          layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'yourclass',
            content: '<div class="panel panel-default"><div class="panel-heading"><h1 class="page-header small">新增管理员</h1><p class="page-subtitle small">输入用户ID已新增一个管理员</p></div><div class="col-md-12"><form><div class="form-group"><label>用户ID</label><input type="text"class="form-control"placeholder="用户ID"></div><br><button type="submit"id="masterUserAddOk"class="btn btn-primary">保存</button></form></div><div class="clearfix"></div></div>'
          });
          $('#masterUserAddOk').click(function(){
            parent.layer.msg('增加管理员成功', {shade: 0.3})
          });
        });
        $('.delete-masterUser').click(function(){
          layer.confirm('确认管理员', {
            title: '删除确认',
            btn: ['确认','取消'] //按钮
          }, function(){
            layer.msg('删除成功', {icon: 1});
          });
        });
      });
    </script>
  @endsection

