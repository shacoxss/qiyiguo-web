@extends('member.masterCommon')
@section('content')
	<div class="row">
		<div class="col-md-12  header-wrapper" >
			<h1 class="page-header">新增栏目</h1>
			<p class="page-subtitle">新增一个系统栏目</p>
		</div>
		<!-- /.col-lg-12 -->
	</div>
    <!-- /.row -->
    <ol class="breadcrumb">
      <li><a href="{{url('member/masterCategory')}}">栏目管理</a></li>
      <li class="active">新增栏目</li>
    </ol>
    
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
		<div class="row">
		<div class="col-lg-12">
        <div class="panel panel-default"> 
          <!-- /.panel-heading -->
          <div class="panel-body"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#normal" data-toggle="tab"> <span class="fa fa-file-text-o icon"></span>常规设置</a> </li>
              <li><a href="#SEO" data-toggle="tab"> <span class="fa fa-google icon"></span>SEO设置</a> </li>
              <li><a href="#content" data-toggle="tab"> <span class="fa fa-save icon"></span>html编辑器</a> </li>
            </ul>
            
            <!-- Tab panes -->
            <form action="{{url('member/masterCategory')}}" method="post" enctype="multipart/form-data">
				<input	type="hidden" name="cate_logo" id="img" value="" />
	{{--			<input	type="hidden" name="cate_background" id="img_background" value="" />--}}
				{{csrf_field()}}
            <div class="tab-content">
              	<div class="tab-pane fade padding in active" id="normal">
                <!--Tab start-->
					<style>
						p.cur {background: #eee; padding: 3px; font-style: inherit;}
						.col-md-12,.col-md-4,.col-md-6{padding-left: 0;}
					</style>
				  	<div class="col-lg-9">
						@if(count('errors')>0)
							@if(is_string($errors))
								<div class="alert alert-danger">{{$errors}}</div>
							@else
								@foreach($errors->all() as $error)
									<div class="alert alert-danger">{{$error}}</div>
								@endforeach
							@endif
						@endif
							<div class="col-md-12">
								<div class="form-group col-md-6">
		                    		<label>栏目名称：</label>
									<input class="form-control " placeholder="栏目名称" value="" name="cate_name">
								</div>								
								<div class="form-group col-md-6">
		                    		<label>上级栏目：</label>
				                    <select class="form-control" name="cate_pid" >
				                      <option value="0">顶级栏目</option>
										@foreach($cate_list as $v)
											<option value="{{$v->cate_id}}">{{str_repeat('----',$v->lev)}}{{$v->cate_name}}</option>
										@endforeach
				                    </select>
								</div>
								<div class="form-group col-md-6">
		                    		<label>URL自定义</label>
									<input class="form-control " placeholder="URL自定义" value="" name="cate_url">
									<p class="cur">例如：/ow</p>
								</div>   
								<div class="form-group col-md-6">
		                    		<label>栏目模版：</label>
									<input class="form-control " placeholder="栏目模版" value="" name="cate_templates">
									<p class="cur">例如：/Public/templates/tag/tagOw.html，未指定用默认模版</p>
								</div>
							</div>   
				  	</div>
				  	<!-- /.col-lg-6 (nested) -->
				  	<div class="col-lg-3">
						<h3>LOGO上传</h3>
						<div id="crop-avatar" class="col-md-12" >
							<div class="avatar-view" title="logo上传"  style="height: 100px;width: 100px;">
								<img src="{{asset('img/100100.png')}}"  alt="Logo" id="head">
							</div>
						</div>
						<h3>背景上传</h3>
	                    <input type="file" id="background" name="cate_background"><br/>
						<div  class="col-md-12" >
								<img class="avatar-view" src="{{asset('img/200200.png')}}"  alt="Logo" id="background_img" style="height: 150px;width: 450px;" >
						</div>
				  	</div>
				  	<!-- /.col-lg-6 (nested) --> 
				<!--Tab End-->
              	</div>
              	<div class="tab-pane fade padding" id="SEO"> 
					<div class="form-group">
		        		<label>关键词：</label>
						<input class="form-control " placeholder="关键词" name="seo_key">
					</div>
					<div class="form-group">
		        		<label>描述：</label>
						<textarea class="form-control" rows="3" name="seo_intro"></textarea>
					</div>  
              	</div>
              <div class="tab-pane fade padding" id="content">
							  <!--编辑器开始-->
							  <div class="form-group">								
									<link rel="stylesheet" type="text/css" href="{{asset('pulgin/wangEditor/dist/css/wangEditor.min.css')}}">
									<style type="text/css">
										#editor-trigger {
											height: 600px;
											/*max-height: 600px;*/
										}
										.container {
											width: 100%;
											margin: 0 auto;
											position: relative;
											padding: 0;
										}
									</style>
									<div id="editor-container" class="container" >
										<textarea id="editor-trigger" name="cate_intro"></textarea>
										<!-- <textarea id="editor-trigger" style="display:none;">
											<p>请输入内容...</p>
										</textarea> -->
									</div>									
							  	</div>						
								<!--编辑器结束-->
              </div>
            </div>
            <!-- Tab panes -->
	        <div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary">提 交</button>
				<button type="reset" class="btn btn-default">重 置</button>
			</div>
            </form>
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
    </div>
    </div>
    </div>
    <!-- /.row -->
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="avatar-form" action="{{url('uploadWebLogo')}}" enctype="multipart/form-data" method="post">
				{{csrf_field()}}
				<div class="modal-header">
					<button class="close" data-dismiss="modal" type="button">&times;</button>
					<h4 class="modal-title" id="avatar-modal-label">LOGO上传</h4>
				</div>
				<div class="modal-body">
					<div class="avatar-body">
						<div class="avatar-upload">

							<input class="avatar-data" name="avatar_data" type="hidden">
							<label for="avatarInput">图片上传</label>
							<input class="avatar-input" id="avatarInput" name="avatar_file" type="file"></div>
						<div class="row">
							<div class="col-md-9">
								<div class="avatar-wrapper"></div>
							</div>
							<div class="col-md-3">
								<div class="avatar-preview preview-lg"></div>
								<div class="avatar-preview preview-md"></div>
								<div class="avatar-preview preview-sm"></div>
							</div>
						</div>
						<div class="row avatar-btns">
							<div class="col-md-9">
								<div class="btn-group">
									<button class="btn" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-undo"></i> 向左旋转</button>
								</div>
								<div class="btn-group">
									<button class="btn" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-repeat"></i> 向右旋转</button>
								</div>
							</div>
							<div class="col-md-3">
								<button class="btn btn-success btn-block avatar-save" type="submit"><i class="fa fa-save"></i> 保存修改</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
@section('script')
	<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
	<script src="{{asset('pulgin/layer/layer.js?v=2.4')}}"></script>
	<link rel="stylesheet" href="{{asset('pulgin/layer/skin/layer.css')}}" media="all">
	<script type="text/javascript">
		$(function(){
			var msg = "{{session('msg')}}";
			if(msg.length!=0){
				layer.msg(msg);
			}
			//上传背景
			$("#background").change(function(){
				var file = $(this).val();
				var token = "{{csrf_token()}}";
				$.ajax({
					url:"{{url('uploadBackground')}}",
					type:"post",
					data:{file:file,_token:token},
					success:function(data){
						console.log(data)
					}
				});
			});

		});
	</script>

	<link href="{{asset('pulgin/uploadAvatar/cropper/cropper.min.css')}}" rel="stylesheet">
	<link href="{{asset('pulgin/uploadAvatar/sitelogo/sitelogo.css')}}" rel="stylesheet">
	<script src="{{asset('pulgin/uploadAvatar/cropper/cropper.min.js')}}"></script>
	<script src="{{asset('pulgin/uploadAvatar/sitelogo/sitelogo.js')}}"></script>
	<!--wangEditor js-->
	<script type="text/javascript" src="{{asset('pulgin/wangEditor/dist/js/wangEditor.js')}}"></script>
	<!--<script type="text/javascript" src="pulgin/wangEditor/dist/js/wangEditor.min.js"></script>-->
	<script type="text/javascript" src="{{asset('js/wangEditor_emoji.js')}}"></script>
@endsection