
@extends('member.masterCommon')
@section('content')

  <div class="loader"><h1 class="loadingtext">奇异果<span>聚合</span></h1><p>QiYIGUO.COM 看点有意思的...</p><br><img src="{{asset('img/loader2.gif')}}" alt=""></div>

  <div class="row">
      <div class="col-md-12  header-wrapper" >
        <h1 class="page-header">控制中心</h1>
        <p class="page-subtitle">奇异果监控中心，集合百度统计、阿里云服务器实时数据监控以及奇异果聚合核心数据统计。</p>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)">奇异果聚合</a></li>
      <li class="active">控制中心</li>
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
          <a href="javascript:void(0)">
          <div class="panel-footer"> <span class="pull-left">所有文档</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a> </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-users fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">1562</div>
                <div>注册用户</div>
              </div>
            </div>
          </div>
          <a href="javascript:void(0)">
          <div class="panel-footer"> <span class="pull-left">所有注册用户</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a> </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-star fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">12445</div>
                <div>收录主播</div>
              </div>
            </div>
          </div>
          <a href="javascript:void(0)">
          <div class="panel-footer"> <span class="pull-left">所有主播</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a> </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <i class="fa fa-support fa-2x"></i> </div>
              <div class="col-xs-9 text-right">
                <div class="huge">113</div>
                <div>视频文件</div>
              </div>
            </div>
          </div>
          <a href="javascript:void(0)">
          <div class="panel-footer"> <span class="pull-left">所有视频文件</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </a> </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> 带宽负载</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div id="ultra-wide-band"></div>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> CPU 负载</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div id="cpu-load"></div>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> 内存负载</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div id="Memory-load"></div>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-4 -->
        
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> 文档数量与收录量分析</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div id="included-number"></div>
              </div>
              <!-- /.col-lg-12 (nested) --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.panel-body --> 
        </div>
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading"> <i class="fa fa-bar-chart-o fa-fw"></i> 搜索引擎来路分析 </div>
          <div class="panel-body">
            <div id="income-load"></div>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
        
      </div>
      <!-- /.col-lg-4 --> 
        
    </div>
    <!-- /.row -->
    <div class="row">        
        <div class="col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading"> 会员类型分析 </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div id="member-load"></div>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
        
    </div>
    <!-- /.row -->

    <script>
      $(document).ready(function(){
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

        Morris.Bar({
          element: 'morris-bar-chart2',
          data: [
            { y: '2006', a: 100, b: 100},
            { y: '2007', a: 75,  b: 75 },
            { y: '2008', a: 60 , b: 60 },
            { y: '2009', a: 75 , b: 75 },
            { y: '2006', a: 100, b: 100},
            { y: '2007', a: 75,  b: 75 },
            { y: '2008', a: 40,  b: 40 },
            { y: '2009', a: 25,  b: 25 },
            { y: '2006', a: 110, b: 110},
            { y: '2007', a: 75,  b: 75 },
            { y: '2008', a: 60,  b: 60 },
            { y: '2009', a: 75,  b: 75 },
            { y: '2012', a: 100, b: 100}
          ],
          resize: true,
          axes:'',
          hideHover: 'auto',
          xkey: 'y',
          padding:1,
          ykeys: ['a', 'b'],
          labels: ['Series A'],
          barColors: ["#ffffff", "#cfdfed"]
        });

        $('#mapwrap').vectorMap({map: 'world_mill'});


        $(window).resize(function(){

          $('#dataTables-userlist').DataTable();

        });

      });
    </script>
  <!-- Morris Charts JavaScript -->

@endsection

