@extends('member.masterCommon')
@section('content')
	<div class="row">
		<div class="col-md-12  header-wrapper" >
			<h1 class="page-header">栏目列表</h1>
			<p class="page-subtitle">系统栏目都在这里</p>
		</div>
		<!-- /.col-lg-12 -->
	</div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="{{url('member/masterCategory')}}">栏目管理</a></li>
      <li class="active">栏目列表</li>
    </ol>
    
    <!-- /.row -->
    <div class="row">
      	<div class="row">
	      	<p style="margin-left:30px;">
		      	<button type="button" class="btn btn-primary btn-xs" onclick="window.open('{{url('member/masterCategoryAdd')}}','_self')"><i class="fa fa-plus"></i> 新增</button>
		      	<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> 删除</button>
	      	</p>
      	</div>
    	<div class="col-lg-12">
        <div class="panel panel-default">   
          <!-- .panel-heading -->
          <div class="panel-body">
          	<!-- id="accordian"是每次只展开一个tab，id="accordian2"用户决定展开几个 -->
            <div class="panel-group accordian" id="accordian2" role="tablist" aria-multiselectable="true">
            	<!-- 单个栏目列表样式开始 -->
				@foreach($cate_list as $v)
              	<div class="panel panel-default rows" style="margin:0;" data-lev="{{$v->lev}}">
	                <div class="panel-heading">
	                  	<!-- 没有子栏目用的图标 -->
						@if($v->isLast)
							<div class="CategoryNoSon">-</div>
						@else
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordian" href="#collapseOne2" aria-expanded="false" class="show "><span class="fa fa-angle-down pull-left"></span></a>
							</h4>
						@endif
						<!-- 没有子栏目用的图标 -->
	                  	<input type="checkbox"> {{str_repeat('--',$v->lev)}}{{$v->cate_name}}[ID:208](文档：1)
	                	<div class="CategoryRight">                  	
			                <a href="{{url('member/masterCategory').'/'.$v->cate_id}}" class="btn btn-circle btn-primary ">编辑</a>
			                <a href="" class="btn btn-circle btn-warning ">内容</a>
			                <a href="" class="btn btn-circle btn-success ">预览</a>
			                <a href="javascript:void(0)" class="btn btn-circle btn-danger" onclick="del({{$v->cate_id}})">删除</a>
	                	</div>
	                </div>

              	</div>
				@endforeach

            </div>
          </div>
          <!-- .panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
    </div>
    <!-- /.row -->
	<script src="{{asset('pulgin/layer/layer.js?v=2.4')}}"></script>
	<link rel="stylesheet" href="{{asset('pulgin/layer/skin/layer.css')}}" media="all">
	<script type="text/javascript">
		$(function(){
			$('.rows').each(function(){
				if($(this).data('lev')!=0){
					$(this).hide();
				}
			});
			var msg = "{{session('msg')}}";
			if(msg.length!=0){
				layer.msg(msg);
			}
		});
		function del(id){
			layer.confirm('确认删除该栏目？', {
				title: '删除栏目',
				btn: ['确认','取消'] //按钮
			}, function(){
				location.href = "{{url('member/masterCategoryDel')}}"+'/'+id;
			});
		}
		$('.show').click(function(){
			if($(this).hasClass('collapsed')){
				$(this).removeClass('collapsed');
				var lev = $(this).parents('.rows').data('lev');
				$(this).parents('.rows').nextAll().each(function(){
					if($(this).data('lev')==0){
						return false;
					}else if($(this).data('lev')>lev){
						$(this).hide();
					}else{
						return true;
					}
				});

			}else{
				$(this).addClass('collapsed');
				var lev = $(this).parents('.rows').data('lev');
				$(this).parents('.rows').nextAll().each(function(){
					if($(this).data('lev')==0){
						return false;
					}else if($(this).data('lev')==(lev+1)){
						$(this).show();
					}else{
						return true;
					}
				});
			}
		});
	</script>
@endsection