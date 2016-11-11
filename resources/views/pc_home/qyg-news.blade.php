@extends('pc_home.commonIn')
@section('content')
			<!--头部	-->

			<!--banner-->
			     <div class="am-g" style="background-color: #f4f4f4; margin-top: 81px;margin-bottom: 350px;">
			     	<div class="am-u-sm-12 am-u-sm-centered list-style" >
			     	<div class="am-u-sm-8"  style="padding: 0;width: 800px;overflow: hidden;">
			     	  <div class="am-g" style="padding: 0; border-bottom:#CCCCCC 2px solid ; height: 40px;">
			     	  <ul class="table-tilte">
						  @if($cate=='')
						  <li style="border-bottom: 2px #99cc33 solid;"><a href="{{url('qyg/all')}}" >全部</a></li>
							@else
						  <li><a href="{{url('qyg/all')}}">全部</a></li>
						  @endif
						  @if($cate=='news')
								  <li style="border-bottom: 2px #99cc33 solid;"><a href="{{url('qyg/news')}}" >新闻</a></li>
							@else
								  <li><a href="{{url('qyg/news')}}" >新闻</a></li>
							@endif
							  @if($cate=='active')
								  <li style="border-bottom: 2px #99cc33 solid;"><a href="{{url('qyg/active')}}" >活动</a></li>
							  @else
								  <li><a href="{{url('qyg/active')}}">活动</a></li>
							  @endif
							  @if($cate=='notice')
								  <li style="border-bottom: 2px #99cc33 solid;"><a href="{{url('qyg/notice')}}" >公告</a></li>
							  @else
								  <li><a href="{{url('qyg/notice')}}">公告</a></li>
							  @endif
					  </ul>
			     	 </div>
			     	 <div class="am-g table-cont">
			     	 	<ul>
							@if($list)
							@foreach($list as $v)
			     	 		<li>
								@if($cate=='news')
			     	 			<div class="am-u-sm-2" style="margin-left: 27px;color: #999999;"><a href="{{url('qig/news')}}">【新闻】</a></div>
								@elseif($cate=='notice')
								<div class="am-u-sm-2" style="margin-left: 27px;color: #999999;"><a href="{{url('qyg/notice')}}">【公告】</a></div>
								@elseif($cate=='active')
								<div class="am-u-sm-2" style="margin-left: 27px;color: #999999;"><a href="{{url('qyg/active')}}">【活动】</a></div>
								@else
								<div class="am-u-sm-2" style="margin-left: 27px;color: #999999;"><a href="">【{{$v->category->cate_name}}】</a></div>
								@endif
			     	 		{{--	<div class="am-u-sm-2"><a href="">【虎牙】</a></div>--}}
			     	 			<div class="am-u-sm-5"><a href="{{url('qyg/detail/'.$v->id)}}">{{$v->title}}</a></div>
			     	 			<div class="am-u-sm-3">{{worldTime(strtotime($v->updated_at))}}</div>
			     	 		</li>
							@endforeach
								@endif
			     	 	</ul>
			     	 </div>
			     	</div>
			     	
						<div class="am-u-sm-6 am-u-sm-offset-6 pagination">
						{{$list->links()}}
			     	
			     		</div>
			     	<div class="am-u-sm-4" style="padding: 0;width: 360px;overflow: hidden;">
			     		<div class="am-g" style="padding: 0; border-bottom:#CCCCCC 2px solid ; height: 40px;">
			     			<h2 class="r-tiltle">联系我们</h2>
			     		</div>
			     		<div class="r-cont">
			     			<p>奇异果聚合是中国首个主播门户网站，内容涵盖了优质主播图片、资料、甚至主播微信的整理；粉丝互动产生的积分可以有效转换；经纪公司招聘、运作资讯的一站整合；直播内容的提升分享，致力于主播这个全新的行业，以不断提升主播内容，增强粉丝互动为主旨</p>
			     		<ul class="gz">
			     			<li><a href=""><img src="{{asset('home/images/QYGnews/wx.png')}}"></a></li>
			     			<li><a href=""><img src="{{asset('home/images/QYGnews/tx.png')}}"></a></li>
			     			<li><a href=""><img src="{{asset('home/images/QYGnews/qq.png')}}"></a></li>
			     			<li><a href=""><img src="{{asset('home/images/QYGnews/xl.png')}}"></a></li>
			     		</ul>
			     		</div>
			     		<div class="am-g">
			     			<ul class="gl-pic" style="width:auto">
			     				<li><a href=""><img src="{{asset('home/images/QYGnews/gl.png')}}"></a></li>
			     				<li><a href=""><img src="{{asset('home/images/QYGnews/sp.png')}}"></a></li>
			     				<li><a href=""><img src="{{asset('home/images/QYGnews/tj.png')}}"></a></li>
			     			</ul>
			     		</div>
			     	</div>
			     </div>
			     </div>
@endsection
