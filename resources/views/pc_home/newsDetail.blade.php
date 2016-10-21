@extends('pc_home.commonIn')
@section('content')
		<!--banner-->
		<div class="am-g news-d-title" style="margin-top:79px">
			<div class="am-g width">
				<div class="news-d-word">
					<p>{{ $archive->title }}</p>
				</div>
				<div class="news-author-view">
					<span class="news-author-view-name">作者：{{$archive->user->nickname}}</span>
					<span>发布于：{{date('Y-n-d G:i', strtotime($archive->updated_at))}}</span>
					{{--<span>来源：乐视网</span>--}}
					<div style="display: inline-block;float: left;">
						<dl class="tab-block-r-ul">
							@foreach($archive->tags()->get() as $tag)
								<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
							@endforeach
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="am-g news-detail-content">
			<div class="am-g width ">
				<div class="am-u-sm-8 news-detail-content-left" style="width: 796px;margin-top: 10px;">
					<div class="news-detail-content-left-p">
						{!! $archive->detail->content !!}
						<p style="text-align: center;"><button type="button" class="am-btn am-btn-success btn">喜欢&nbsp;{{$archive->like}}</button></p>
					</div>
					<div class="changyan-comment">
						<!--<div id="comment_frame">
						<a name="comment_top"></a>
						<div class="dw-comment-ctn dw-comment-skin_white">
							<div class="dw-comment-box dw-comment-comments-ctn">
								<div id="pin_view_add_comment">
									<a name="comment"></a>
									<!--高速版-->
						<!--<div id="SOHUCS" sid="6402"></div>
									<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js"></script>
									<script type="text/javascript">
										window.changyan.api.config({
											appid: 'cyrlo1kOL',
											conf: 'prod_4fe8ec20e3b7ae54f762116055738844'
										});
									</script>
								</div>
							</div>
						</div>
					</div>-->
						<!-- }通用评论 -->
						<!-- 畅言插件js -->
						<!--<script type="text/javascript" charset="utf-8" src="http://changyan.itc.cn/js/lib/jquery.js"></script>-->
						<!--<script type="text/javascript" charset="utf-8" src="https://changyan.sohu.com/js/changyan.labs.https.js?appid=cyrlo1kOL"></script>-->
					</div>

				</div>

				<div class="am-u-sm-4 news-d-right-block" style="width: 404px;">
					<div class="am-g news-d-about-author">
						<div class="news-d-author-title">关于作者 <span>About the author</span> </div>
						<div class="am-u-sm-6 ">
							<div class="news-d-about-author-l">
								@if($archive->user->head_img)
									<img src="{{route('image', [$archive->user->head_img, '161x161'])}}" alt=""/>
								@else
									<img src="{{asset('img/200200.png')}}" alt=""/>
								@endif
							</div>

						</div>
						<div class="am-u-sm-6">
							<div class="news-d-about-author-r">
								<h3>{{$archive->user->nickname}}</h3>
								<button class="news-d-about-author-r-add"></button>
								
								<p>个人简介：网络就像是监狱，本来是偷了个钱包进来的，等出去的 时候就什么都学会了。</p>
							</div>

						</div>
					</div>

					<div class="am-g author-guess">
						<div class="author-guess-title news-d-other">其他文章</div>
						<ul class="v-list-recommend author-guess-ul news-d-other-ul">
							<li>
								<a href="">
									<div class="am-u-sm-6 v-r-a-left author-guess-ul-left news-d-other-l">
										<img src="{{asset('home/images/video/v-recommend1.jpg')}}" />
									</div>
									<div class="am-u-sm-6 v-r-a-right author-guess-ul-r news-d-other-r">
										<p>万物皆可手游 光荣特库摩《讨鬼传：武士》</p>
										<div style="line-height: 19px;">
											<span>2016-10-11 09:00</span>

										</div>

										<div style="margin-top: 5px;">
											<dl class="tab-block-r-ul">
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>

											</dl>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="">
									<div class="am-u-sm-6 v-r-a-left author-guess-ul-left news-d-other-l">
										<img src="{{asset('home/images/video/v-recommend1.jpg')}}" />
									</div>
									<div class="am-u-sm-6 v-r-a-right author-guess-ul-r news-d-other-r">
										<p>万物皆可手游 光荣特库摩《讨鬼传：武士》</p>
										<div style="line-height: 19px;">
											<span>2016-10-11 09:00</span>

										</div>

										<div style="margin-top: 5px;">
											<dl class="tab-block-r-ul">
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>

											</dl>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="">
									<div class="am-u-sm-6 v-r-a-left author-guess-ul-left news-d-other-l">
										<img src="{{asset('home/images/video/v-recommend1.jpg')}}" />
									</div>
									<div class="am-u-sm-6 v-r-a-right author-guess-ul-r news-d-other-r">
										<p>万物皆可手游 光荣特库摩《讨鬼传：武士》</p>
										<div style="line-height: 19px;">
											<span>2016-10-11 09:00</span>

										</div>

										<div style="margin-top: 5px;">
											<dl class="tab-block-r-ul">
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>
												<dt style="background: #006633;"><a href="">守望先锋</a></dt>

											</dl>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>

					<div class="am-g author-guess author-hot-tabs-block author-recommand news-d-recommand">
						<div class="author-guess-title news-d-other">精彩推荐</div>
						<div class="am-u-sm-6 author-recommand-block">
							<div class="author-recommand-img">
								<a href="">
									<img src="{{asset('home/images/banner-3.jpg')}}" />
									<div class="author-recommand-img-shade "></div>

								</a>
								<div class="author-recommand-img-tab-shade img-tab-shade-on">
									<span class="author-recommand-people"></span>
									<span>李雷</span>
									<dl class="tab-block-r-ul" style="float: right;margin-right: 10px;">
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
									</dl>
								</div>

							</div>
							<p>再也不能随心所欲抓小精灵啦！《精灵宝可梦GO》</p>
						</div>
						<div class="am-u-sm-6 author-recommand-block">
							<div class="author-recommand-img">
								<a href="">
									<img src="{{asset('home/images/banner-3.jpg')}}" />
									<div class="author-recommand-video-shade "></div>

								</a>
								<div class="author-recommand-img-tab-shade img-tab-shade-on">
									<span class="author-recommand-people"></span>
									<span>李雷</span>
									<dl class="tab-block-r-ul" style="float: right;margin-right: 10px;">
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
									</dl>
								</div>

							</div>
							<p>再也不能随心所欲抓小精灵啦！《精灵宝可梦GO》</p>
						</div>
						<div class="am-u-sm-6 author-recommand-block">
							<div class="author-recommand-img">
								<a class='video-hover' href="">
									<img src="{{asset('home/images/banner-3.jpg')}}" />
									<div class="author-recommand-article-shade "></div>

								</a>
								<div class="author-recommand-img-tab-shade img-tab-shade-on">
									<span class="author-recommand-people"></span>
									<span>李雷</span>
									<dl class="tab-block-r-ul" style="float: right;margin-right: 10px;">
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
									</dl>
								</div>

							</div>
							<p>再也不能随心所欲抓小精灵啦！《精灵宝可梦GO》</p>
						</div>

					</div>

				</div>
			</div>
		</div>

		<!--底部-->
@endsection