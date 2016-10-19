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
            <tr class="odd">
              <td>
                <a href="#">
                  <img src="http://www.qiyiguo.tv/uploads/allimg/160930/18_09301I13RY1.jpg" class="gridpic">
                  LOL主播帝师直播遇灵异事件全过程 木偶转动衣柜自开
                </a>
              </td>
              <td>视频</td>
              <td class="center">2016-09-06</td>
              <td class="center">
                <a href="#" class="btn btn-circle btn-primary ">浏览</a>
                <a href="javascript:;" class="delete-collect btn btn-circle btn-danger ">取消</a>
              </td>
            </tr>
            <tr class="even">
              <td>
                <a href="#">
                  <img src="http://www.qiyiguo.tv/uploads/allimg/160930/18_09301612153202.jpg" class="gridpic">
                  男子与性感女主播为邻报警:午夜劲歌艳舞
                </a>
              </td>
              <td>文章</td>
              <td class="center">2016-09-06</td>
              <td class="center">
                <a href="#" class="btn btn-circle btn-primary ">浏览</a>
                <a href="javascript:;" class="delete-collect btn btn-circle btn-danger ">取消</a>
              </td>
            </tr>
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
              layer.confirm('确认取消收藏', {
                title: '取消收藏',
                btn: ['确认','取消'] //按钮
              }, function(){
                layer.msg('取消收藏成功', {icon: 1});
              });
            });
        });
</script>
@endsection
