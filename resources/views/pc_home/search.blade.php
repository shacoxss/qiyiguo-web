@extends('pc_home.commonIn')
@section('content')
	<style>
		.tab-header-ul>ul>li {
			margin: 0;
		}
		.tab-search>div>input{
			width: 112px;
			background: #333;
			border: 0px;
			border-radius: 2px;
			height: 26px;
		}
		.search-banner{
			width: 100%;
			height: 400px;
			overflow: hidden;
			position: relative;
			background: url("{{asset('home/images/search/banner.jpg')}}");
			background-size: cover;
		}
		.search-banner h1{
			font-size: 36px;
			text-align: center;
			font-weight: normal;
			margin-top: 110px;
		}
		.search-input{
			width: 634px;

			margin:0 auto;
			border:5px solid rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		.search-input input,.search-input button{
			border:none;
			height: 41px;
		}
		.search-input button{
			width: 171px;

			background-color: #fff;
			background-image: url("{{asset('home/images/search/seacrh-btn.png')}}");
		}
		.search-input button.am-btn-default:hover{
			background-color: #fff;
		}
		.s-tabs-all dt{
			display: inline-block;
			margin-right: 5px;
			margin-bottom: 10px;

		}
		.s-tabs-all dt a{
			padding: 5px;
			border-radius: 3px;
			background: rgba(0,0,0,0.2);
			font-size: 12px;
			color:#fff;
		}
		.tab-s-wp{

			margin:30px auto 0;
			max-width: 467px;
			max-height: 70px;
			overflow: hidden;
		}
		.search-c{
			width: 1200px;
			margin:0 auto;
			overflow: hidden;
		}
		.s-c-title{
			width: 100%;
			background: #fff;
			height: 42px;
			margin-bottom:20px;
			border-bottom:2px solid #ccc;
		}
		.s-c-title ul{
			padding-left: 0;

		}
		.s-c-title ul li{
			height: 42px;

			font-size: 14px;
			width:80px;
			text-align: center;
			color: #333;
		}
		.s-on{
			border-bottom: 2px solid #669900
		}
		.s-c-content dt a{
			color: #fff;
		}
		.s-c-content{
			color:#333;
		}
		.s-c-ul{
			padding-left: 0;
		}
		.s-c-ul>li>.s-c-a{
			display: block;
			background: #fff;
			width: 100%;
			height: 100%;
		}
		.s-c-all{
			margin-right: -1.5rem;
			margin-left: -1.5rem;
		}
		.s-c-ul>li.am-u-sm-3:last-child{
			float: left;
		}
	</style>
		<div class="search-banner" style="margin-top: 81px;">
			<h1>搜点有意思的</h1>
			<div class="am-input-group search-input">
					<input type="text" class="am-form-field index-form-input" id="keys">
					<span class="am-input-group-btn ">
        				<button class="am-btn am-btn-default index-input-label " id="search" type="button" style="margin-left: 0">
        				</button>
     			 	</span>
					
			</div>
			<div class="tab-s-wp">
				<dl class="s-tabs-all">
					@if($tags)
						@foreach($tags as $tag)
							<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
						@endforeach
					@endif
			</div>
			
		</div>

		<div class="search-c">
			<div class=" tab-block-r-title s-c-title">
					<ul>
						<a href="{{url('search/result/'.$key)}}">
							@if($way=='all')
							<li class="on s-on">
							@else
							<li>
							@endif
								全部</li></a>
						<a href="{{url('search/result/'.$key.'/news')}}">
							@if($way=='news')
								<li class="on s-on">
							@else
								<li>
							@endif新闻</li></a>
						<a href="{{url('search/result/'.$key.'/video')}}">
							@if($way=='video')
								<li class="on s-on">
							@else
								<li>
							@endif视频</li></a>
						<a href="{{url('search/result/'.$key.'/gallery')}}">
							@if($way=='gallery')
								<li class="on s-on">
							@else
								<li>
							@endif图集</li></a>
					</ul>
			</div>

			<div class="s-c-content " >
				@if($archives)
					@foreach($archives as $v)
				<div class="am-u-sm-12 am-u-sm-centered list-box" style="padding-left: 0;background: #FFFFFF;margin-bottom: 20px;width: 100%">

						<div class="am-u-sm-3" style="padding: 0;margin-right: 30px;">
							<a href="{{route('archive.show', $v->id)}}"><img class="am-thumbnail list-pic" src="{{route('image', [trim($v->cover, '/'), '300x160'])}}" onerror="this.src='{{'homeimages/banner-3.jpg'}}'" alt="" /></a>
						</div>
						<div class="am-thumbnail-caption content-list">
							<a href="{{route('archive.show', $v->id)}}">
								<h3>{{$v->title}}</h3></a>
							<span><a href="">tkor</a>{{worldTime(strtotime($v->updated_at))}}</span>
							<p style="height: 44px;overflow: hidden;">{{$v->abstrct}}</p>
							<dl class="tab-block-r-ul">
								@foreach($v->tags()->get() as $tag)
									<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
								@endforeach
								</dl>
							<p style="text-align: right;">
								<span><img src="{{asset('home/images/pinglun.png')}}">300</span>
								<span><img src="{{asset('home/images/shoucang.png')}}">{{$v->visit_count}}</span>
							</p>

						</div>
					</div>
				@endforeach
				@endif
			</div>

{{--			<div class="s-c-content s-c-all">
				<ul class="s-c-ul am-g">

							<li class="am-u-sm-3">
								<div class="s-c-a">
									<div class="v-lost">
										<div class="v-lost">
											<a href=""><img src="{{asset('')}}" class="pbtn-p"></a>
											<div class="btn-pic" style="height: 145px;"><img src="images/v-btn.png"></div>

										</div>
										<div style="margin-top: 10px;border-bottom: 1px solid #DDDDDD;overflow: hidden;padding-left: 10px;">
											<dl class="tab-block-r-ul">
									<dt style="background: #006633;"><a href="">守望先锋</a></dt>
									<dt style="background: #006633;"><a href="">守望先锋</a></dt>
									<dt style="background: #006633;"><a href="">守望先锋</a></dt>
								</dl>
										</div>

										<div class="v-lost v-lost-h">
											<h2><a href="">赛特：走下神坛的召唤命运坎坷！</a></h2>
											<p><span class="v-lost-l"><img src="images/rt1.jpg">李雷</span>
												<span class="v-lost-r"><img src="images/rd.jpg">1000w</span></p>
										</div>
									</div>
								</div>
							</li>


						</ul>
					
			</div>--}}
{{$archives->links()}}
		</div>

	<script>
		$(function(){

			$('#search').click(function(){
				var key = $('#keys').val();
				if(key.length==0){
					layer.msg('请输入要搜索的内容！');
				}else{
					var token = "{{csrf_token()}}";
					$.ajax({
						type:'post',
						url:"{{url('search')}}",
						data:{_token:token,key:key},
						success:function(data){
							if(data=='error'){
								layer.msg('错误！');
							}else if(data=='none'){
								layer.msg('对不起，没有找到相关内容！');
							}else{
								location.href = "{{url('search/result')}}"+'/'+data.key;
							}
						}
					})
				}
			});
		});
		$('li').each().on('click',function(){
			alert(1)

		})


	</script>
@endsection