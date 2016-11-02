@extends('pc_home.commonIn')
@section('content')

		<!--轮播图-->
		@include('inc.top-slide')
		<!--轮播图-->

		<div class="am-g v-list">
			<div class="content">
				<ul>
					<li>
						<a href="">
							<img src="images/video/v-list1.jpg" />
							<div class="am-g v-list-shade">
								<span>游图有真相No.51：我是国产我最屌 那些洗脑的国</span>
							</div>
							<div class="v-btn"></div>
						</a>
					</li>
					<li>
						<a href="">
							<img src="images/video/v-list1.jpg" />
							<div class="am-g v-list-shade">
								<span>游图有真相No.51：我是国产我最屌 那些洗脑的国</span>
							</div>
							<div class="v-btn"></div>
						</a>
					</li>
					<li>
						<a href="">
							<img src="images/video/v-list1.jpg" />
							<div class="am-g v-list-shade">
								<span>游图有真相No.51：我是国产我最屌 那些洗脑的国</span>
							</div>
							<div class="v-btn"></div>
						</a>
					</li>
					<li>
						<a href="">
							<img src="images/video/v-list1.jpg" />
							<div class="am-g v-list-shade">
								<span>游图有真相No.51：我是国产我最屌 那些洗脑的国</span>
							</div>
							<div class="v-btn"></div>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<!---->
		<div class="am-g am-width">
			<div class="am-u-sm-12 am-u-sm-centered nl-width">
				<div class="am-u-sm-8" style=" width: 793px;">
					<div class="am-g">
						<div class="am-u-sm-4 table-l">
							<h2>视频</h2>
							<span>VIDEO<span></div>
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
						<div class="am-g" style="background-color: #F4F4F4;padding-top: 10px;">
						<ul class="pbtn">

					@foreach($videoList as $archive)
					<li>
						<a href="{{route('archive.show', [$archive->id])}}">
							<div class="v-lost">
								<div class="v-lost">

									@if($archive->cover)
										<img class="pbtn-p" src="{{route('image', [trim($archive->cover, '/'), '257x145'])}}" alt=""/>
									@else
										<img class="pbtn-p" src="{{asset('images/banner-1.jpg')}}" alt=""/>
									@endif
									<div class="btn-pic" style="height: 145px;"><img src="{{asset('images/v-btn.png')}}"></div>

								</div>
								<div style="height:34px;margin-top: 10px;border-bottom: 1px solid #DDDDDD;overflow: hidden;padding-left: 10px;">
									<dl class="tab-block-r-ul">
										@foreach($archive->tags()->get() as $tag)
											<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}" title="{{$tag->name}}">{{ mb_substr($tag->name,0,4)}}
												@if(strlen($tag->name)>15)
												..
												@endif
												</a></dt>
										@endforeach
									</dl>
								</div>

								<div class="v-lost v-lost-h">
									<h2>{{$archive->title}}</h2>
									<p><span class="v-lost-l"><img src="{{asset('images/rt1.jpg')}}">{{ $archive->user->nickname }}</span>
										<span class="v-lost-r"><img src="{{asset('images/rd.jpg')}}">{{$archive->visit_count}}</span></p>
								</div>
							</div>
						</a>
					</li>
					@endforeach

					</ul>
				</div>

					{{ $videoList->links() }}
			</div>
			<div class="am-u-sm-4 " style="width: 370px;padding: 0;">
				<div class="am-g" style="width: 370px;padding: 0;margin-left: 0;">
					<div class="table-l">
						<h2>精彩推荐</h2>
						<span>RECOMMEND<span>
					     	</div>
						</div>
						<div class="am-g">
							<ul class="v-list-recommend">
								<li>
									
										<div class="am-g v-r-a-left">
											<a href="">
											<img src="images/video/v-recommend1.jpg" />
											</a>
										</div>
										<div class="am-g v-r-a-right">
											<p style="padding-top: 0;padding-bottom: 5px;padding-left: 10px;"><a href="">万物皆可手游 光荣特库摩《讨鬼传：武士》宣传视频首曝传</a></p>
											<div style="margin-left: 10px;">
												<dl class="tab-block-r-ul">
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											</dl>
											</div>
											
										</div>
									
								</li>
								<li>
									
										<div class="am-g v-r-a-left">
											<a href="">
											<img src="images/video/v-recommend1.jpg" />
											</a>
										</div>
										<div class="am-g v-r-a-right">
											<p style="padding-top: 0;padding-bottom: 5px;padding-left: 10px;"><a href="">万物皆可手游 光荣特库摩《讨鬼传：武士》宣传视频首曝传</a></p>
											<div style="margin-left: 10px;">
												<dl class="tab-block-r-ul">
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											</dl>
											</div>
											
										</div>
									
								</li>
								<li>
									
										<div class="am-g v-r-a-left">
											<a href="">
											<img src="images/video/v-recommend1.jpg" />
											</a>
										</div>
										<div class="am-g v-r-a-right">
											<p style="padding-top: 0;padding-bottom: 5px;padding-left: 10px;"><a href="">万物皆可手游 光荣特库摩《讨鬼传：武士》宣传视频首曝传</a></p>
											<div style="margin-left: 10px;">
												<dl class="tab-block-r-ul">
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											</dl>
											</div>
											
										</div>
									
								</li>
							</ul>
						</div>
			<div class="am-g" style="    margin-right: 0;width: 370px;margin-left: 0;" >
				<div class="table-l">
					<h2>视频游戏 </h2>
					<span>VIDEO GAME<span>
					     	</div>
					
							<ul class="am-avg-sm-2 am-thumbnails"style="margin-top: 72px;">
								<li class="p-thumbnail">
									<a href="">
										<img src="images/banner-3.jpg" class="am-thumbnail" />
										<div class="list-shade">
											<span>游图有真相No.51</span>
					</div>
					<div class="v-gbtn"><img src="images/v-btn.png" style=" width: 30px; height: 30px;"></div>
					</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="images/banner-3.jpg" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="images/v-btn.png" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="images/banner-3.jpg" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="images/v-btn.png" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="images/banner-3.jpg" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="images/v-btn.png" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="images/banner-3.jpg" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="images/v-btn.png" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
					<li class="p-thumbnail">
						<a href="">
							<img src="images/banner-3.jpg" class="am-thumbnail" />
							<div class="list-shade">
								<span>游图有真相No.51</span>
							</div>
							<div class="v-gbtn"><img src="images/v-btn.png" style=" width: 30px; height: 30px;"></div>
						</a>
					</li>
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
							<span><img src="images/shoucang.png">50</span>
							<span><img src="images/pinglun.png">10</span>
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
								<span><img src="images/shoucang.png">50</span>
								<span><img src="images/pinglun.png">10</span>
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