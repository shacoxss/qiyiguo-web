@extends('pc_home.commonIn')
@section('title')
		<title>{{$cate->cate_name}}</title>
		<meta name="Keywords" content="{{$cate->seo_key}}">
		<meta name="description" content="{{$cate->seo_intro}}" />
@endsection

@section('content')
		<!--轮播图-->
		@include('inc.top-slide')
		<!--轮播图-->
		<div class="am-g nl-bg">
			<div class="am-u-sm-12 am-u-sm-centered nl-width">
				<div class="zm-u-sm-6 am-u-sm-centered banner-t">
					<h2>{{ $cate->cate_name }} </h2>
				</div>
				<div class="am-g">
					<div class="am-u-sm-3 nl-box">
						<div class="am-thumbnail banner-v">
							<a href=""><img src="{{asset('home/images/hot-holder-1.jpg')}}" alt="" /></a>
							<div class="am-thumbnail-caption">
								<h3>守望先锋 能否上场的阻击手 </h3>
								<p><span style="margin-right: 90px;">1小时前</span><span class="hot-numb"><img src="{{asset('home/images/pinglun.png')}}">6</span><span class="hot-numb"><img src="{{asset('home/images/shoucang.png')}}">17</span></p>
							</div>
						</div>
					</div>
					<div class="am-u-sm-3 nl-box">
						<div class="am-thumbnail banner-v">
							<a href=""><img src="{{asset('home/images/hot-holder-1.jpg')}}" alt="" /></a>
							<div class="am-thumbnail-caption">
								<h3>守望先锋 能否上场的阻击手 </h3>
								<p><span style="margin-right: 90px;">1小时前</span><span class="hot-numb"><img src="{{asset('home/images/pinglun.png')}}">6</span><span class="hot-numb"><img src="{{asset('home/images/shoucang.png')}}">17</span></p>
							</div>
						</div>
					</div>
					<div class="am-u-sm-3 nl-box">
						<div class="am-thumbnail banner-v">
							<a href=""><img src="{{asset('home/images/hot-holder-1.jpg')}}" alt="" /></a>
							<div class="am-thumbnail-caption">
								<h3>守望先锋 能否上场的阻击手 </h3>
								<p><span style="margin-right: 90px;">1小时前</span><span class="hot-numb"><img src="{{asset('home/images/pinglun.png')}}">6</span><span class="hot-numb"><img src="{{asset('home/images/shoucang.png')}}">17</span></p>
							</div>
						</div>
					</div>
					<div class="am-u-sm-3 am-u-end nl-box">
						<div class="am-thumbnail banner-v">
							<a href=""><img src="{{asset('home/images/hot-holder-1.jpg')}}" alt="" /></a>
							<div class="am-thumbnail-caption">
								<h3>守望先锋 能否上场的阻击手 </h3>
								<p><span style="margin-right: 90px;">1小时前</span><span class="hot-numb"><img src="{{asset('home/images/pinglun.png')}}">6</span><span class="hot-numb"><img src="{{asset('home/images/shoucang.png')}}">17</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!---->
		<div class="am-g am-width">
			<div class="am-u-sm-12 am-u-sm-centered nl-width">
				<div class="am-u-sm-8" style=" width: 793px;">
					<div class="am-g">
						<div class="am-u-sm-4 table-l">
							<h2>看点有意思的 </h2>
							<span>INTERESTING<span></div>
						<div class="am-u-sm-8 table-t">
							<ul>
								<li>
									<a href="">一周看点</a>/
								</li> 
								<li>
									<a href="">睛彩世界 </a>/
								</li> 
								<li>
									<a href="">小奇有话说</a>/
								</li>
								<li>
									<a href="">技术宅</a>
								</li>
							</ul>
						</div>
					</div>
					@foreach($archives as $archive)
					<div class="am-g list-c">
						<div class="am-u-sm-12 am-u-sm-centered list-box">
							<div class="am-u-sm-4" style="padding: 0;margin-right: 30px;">
								<a href="{{route('archive.show', [$archive->id])}}">
									@if($archive->cover)
										<img class="am-thumbnail list-pic" src="{{route('image', [trim($archive->cover, '/'), '264x160'])}}" alt=""/>
									@else
										<img class="am-thumbnail list-pic" src="{{asset('img/200200.png')}}" alt=""/>
									@endif
								</a>
							</div>
							<div class="am-thumbnail-caption content-list">
								<a href="{{route('archive.show', [$archive->id])}}"> <h3>{{$archive->title}}</h3></a>
								<span>
									<a href="#">{{ $archive->user->nickname }}</a>
									&nbsp;{{worldTime(strtotime($archive->updated_at))}}
								</span>
								<p>
									{{ mb_substr($archive->abstract, 0, 66) }}...
								</p>
								<dl class="tab-block-r-ul">
									@foreach($archive->tags()->get() as $tag)
									<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
									@endforeach
								</dl>
								<p style="text-align: right;">
									<span><img src="{{asset('home/images/pinglun.png')}}">300</span>
									<span><img src="{{asset('home/images/shoucang.png')}}">{{$archive->liked_count}}</span>
								</p>
							</div>
						</div>
					</div>
					@endforeach
					{{ $archives->links() }}
			</div>
			<div class="am-u-sm-4 " style="width: 370px;padding: 0;">
				<div class="am-g" style="width: 370px;padding: 0;margin-left: 0;">
					<div class="table-l">
						<h2>视频游戏 </h2>
						<span>VIDEO GAME<span>
					</div>
					
					<ul class="am-avg-sm-2 am-thumbnails"style="margin-top: 72px;">
						@if($video_archives)
							@foreach($video_archives as $v)
								<li class="p-thumbnail">
									<a href="{{route('archive.show', $v->id)}}">
										<img src="{{route('image', [trim($v->cover, '/'), '180x101'])}}" onerror="this.src='{{asset('home/images/banner-3.jpg')}}'" class="am-thumbnail" />
										<div class="list-shade">
											<span>{{$v->title}}</span>
										</div>
										<div class="v-gbtn"><img src="{{asset('home/images/tab/img-shade.png')}}" style=" width: 30px; height: 30px;"></div>
									</a>
								</li>
							@endforeach
						@endif
					</ul>
				</div>
				<div class="am-g" style="width: 370px;padding: 0;margin-left: 0;">
					<div class="table-l">
						<h2>游戏攻略</h2>
						<span>RAIDERS<span>
					     	</div>
						</div>
						<div class="am-g">
							<ul>
								@if($game_archives)
									@foreach($game_archives as $v)
										<li>
											<div class="am-g list-gl">
												<div class="am-u-sm-3 list-gl-h">
													<h2>守望先锋</h2>
													<span>7.5</span>
												</div>
												<div class="am-u-sm-9 am-u-end list-gl-con">
													<p>
														<a href="{{route('archive.show', $v->id)}}">{{$v->title}}</a>
													</p>
													<p>
														<span><img src="{{asset('home/images/shoucang.png')}}">50</span>
														<span><img src="{{asset('home/images/pinglun.png')}}">{{$v->visit_count}}</span>
													</p>
												</div>
											</div>
										</li>
									@endforeach
								@endif

				</ul>
			</div>
		</div>
		</div>
		</div>

@endsection