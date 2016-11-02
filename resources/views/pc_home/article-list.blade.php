@extends('pc_home.commonIn')
@section('content')
		<!--轮播图-->
		@include('inc.top-slide')
		<!--轮播图-->
		<div class="am-g nl-bg">
			<div class="am-u-sm-12 am-u-sm-centered nl-width">
				<div class="zm-u-sm-6 am-u-sm-centered banner-t">
					<h2>文章 </h2>
				</div>
				<div class="am-g nl-width">
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
					@each('inc.each.archive', $archives, 'archive')
					{{ $archives->links() }}
			</div>
			<div class="am-u-sm-4 " style="width: 370px;padding: 0;">
				<div class="am-g" style="width: 370px;padding: 0;margin-left: 0;">
					<div class="table-l">
						<h2>视频游戏 </h2>
						<span>VIDEO GAME</span>
					</div>
					
					<ul class="am-avg-sm-2 am-thumbnails"style="margin-top: 72px;">
						<li class="p-thumbnail">
							<a href="">
								<img src="{{asset('home/images/banner-3.jpg')}}" class="am-thumbnail" />
								<div class="list-shade">
									<span>游图有真相No.51</span>
								</div>
								<div class="v-gbtn"><img src="{{asset('home/images/tab/img-shade.png')}}" style=" width: 30px; height: 30px;"></div>
							</a>
						</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="{{asset('home/images/banner-3.jpg')}}" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="{{asset('home/images/tab/img-shade.png')}}" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="{{asset('home/images/banner-3.jpg')}}" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="{{asset('home/images/tab/img-shade.png')}}" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="{{asset('home/images/banner-3.jpg')}}" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="{{asset('home/images/tab/img-shade.png')}}" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="{{asset('home/images/banner-3.jpg')}}" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="{{asset('home/images/tab/img-shade.png')}}" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="{{asset('home/images/banner-3.jpg')}}" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="{{asset('home/images/tab/img-shade.png')}}" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					</ul>
				</div>
				<div class="am-g" style="width: 370px;padding: 0;margin-left: 0;">
					<div class="table-l">
						<h2>游戏攻略</h2>
						<span>RAIDERS</span>
					</div>
				</div>
						<div class="am-g">
							<ul>																								
								<li>
									<div class="am-g list-gl">
										<div class="am-u-sm-3 list-gl-h">
											<h2>守望先锋</h2>
											<span>7.5</span>
					</div>
					<div class="am-u-sm-9 am-u-end list-gl-con">
						<p>
							<a href="">还好你没放弃！Gameloft宣布狂野飙车系列新作《极限》</a>
						</p>
						<p>
							<span><img src="{{asset('home/images/shoucang.png')}}">50</span>
							<span><img src="{{asset('home/images/pinglun.png')}}">10</span>
						</p>
					</div>
				</div>
				</li>
				<li>
					<div class="am-g list-gl">
						<div class="am-u-sm-3 list-gl-h">
							<h2>守望先锋</h2>
							<span>7.5</span>
						</div>
						<div class="am-u-sm-9 am-u-end list-gl-con">
							<p>
								<a href="">还好你没放弃！Gameloft宣布狂野飙车系列新作《极限》</a>
							</p>
							<p>
								<span><img src="{{asset('home/images/shoucang.png')}}">50</span>
								<span><img src="{{asset('home/images/pinglun.png')}}">10</span>
							</p>
						</div>
					</div>
				</li>

				</ul>
			</div>
		</div>
		</div>
		</div>

@endsection