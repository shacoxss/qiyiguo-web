@extends('pc_home.commonIn')

@section('title')
	<title>{{$archive->title}}</title>
	<meta name="Keywords" content="">
	<meta name="description" content="" />
@endsection
@section('content')
		<!--banner-->
		<div class="am-g news-d-title" style="margin-top:79px">
			<div class="am-g width">
				<div class="news-d-word">
					<p>{{ $archive->title }}</p>
				</div>
				<div class="news-author-view">
					<span class="news-author-view-name">作者：{{$archive->user->nickname or ''}}</span>
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
						<p style="text-align: center;">
							<button type="button"
			   					class="am-btn am-btn-success btn like" @if($archive->isLiked(session('user'))) disabled @endif>
								喜欢&nbsp;<span>{{$archive->liked_count}}</span>
							</button>
						</p>
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
									<img src="{{route('image', [$archive->user->head_img, '161x161'])}}" alt="" onerror="this.src='{{asset('img/200200.png')}}'"/>
								@else
									<img src="{{asset('img/200200.png')}}" alt=""/>
								@endif
							</div>

						</div>
						<div class="am-u-sm-6">
							<div class="news-d-about-author-r">
								@if($archive->user->nickname)
									<h3 title="{{$archive->user->nickname}}">{{mb_substr($archive->user->nickname,0,4)}}
									@if(strlen($archive->user->nickname)>5)
									...
									@endif
									</h3>
								@else
									<h3>{{mb_substr($archive->user->phone)}}...</h3>
								@endif
								@if($followed==1)
									<button class="news-d-about-author-r-add" data-follow="{{$followed}}" style="background:url('{{asset('home/images/tab/del.png')}}')center no-repeat;background-size: 24px 24px;"></button>
								@elseif($followed==-1)
									<button class="news-d-about-author-r-add" data-follow="{{$followed}}" style="background:url('{{asset('home/images/tab/add.png')}}')center no-repeat;background-size: 24px 24px;"></button>
								@else
									<button class="news-d-about-author-r-add" data-follow="{{$followed}}" style="background:url('{{asset('home/images/tab/add.png')}}')center no-repeat;background-size: 24px 24px;"></button>
								@endif
								@if($archive->user->intro)
									<p>个人简介：{{$archive->user->intro}}</p>
								@else
									<p>作者很懒，什么也没有留下~</p>
								@endif
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

@section('scripts')
	<script>
		$(function () {
			$('.like').on('click', function () {
				var islogin = $('.news-d-about-author-r-add').data('follow');
				if(islogin==-1){
					layer.msg('请先登录！');
					return false;
				}
				var $this = $(this)
				var index = layer.load(0, {shade: false, time : 10000});
				$.getJSON('{{ route('archive.like', [$archive->id]) }}', function (response){
					$this.attr('disabled', true)
					layer.close(index)
					layer.msg(response.msg)
					if (response.code == 0) {
						var count = parseInt($this.find('span').text())
						$this.find('span').text(count + 1)
					}
				})
			})
		})

		//添加关注
		$(function(){

			$('.news-d-about-author-r-add').click(function(){
				var token = "{{csrf_token()}}";
				var followed_id = "{{$archive->user->id}}";
				if($(this).data('follow')==-1){
					layer.msg('请先登录！');
					return false;
				}else if($(this).data('follow')==1){
					$('.news-d-about-author-r-add').data('follow',0);
					var followed = 1;
					$.ajax({
						url:"{{url('archive/follow')}}",
						type:"post",
						data:{_token:token,followed_id:followed_id,followed:followed},
						success:function(data){
							if(data.rs=='error'){
								layer.msg('取消关注失败！');
							}else{
								var url = "{{asset('home/images/tab/add.png')}}";
								$('.news-d-about-author-r-add').attr('style',"background:url('"+url+"')center no-repeat;background-size: 24px 24px;");
								layer.msg('您已取消关注！');
							}
						}
					});
				}else{
					$('.news-d-about-author-r-add').data('follow',1);
					var followed = 0;
					$.ajax({
						url:"{{url('archive/follow')}}",
						type:"post",
						data:{_token:token,followed_id:followed_id,followed:followed},
						success:function(data){
							if(data.rs=='error'){
								layer.msg('关注失败！');
							}else{
								var url = "{{asset('home/images/tab/del.png')}}";
								$('.news-d-about-author-r-add').attr('style',"background:url('"+url+"')center no-repeat;background-size: 24px 24px;");
								layer.msg('感谢您的关注！');
							}
						}
					});
				}
			});
		});
	</script>
@endsection