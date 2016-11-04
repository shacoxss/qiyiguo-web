@extends('pc_home.commonIn')


@section('content')
    @if(!$review)
        <h2 style="color:red;">该篇内容尚未通过审核，现属于预览状态！</h2>
    @endif
		<div class="am-g v-detail" style="margin-top:81px">
			<div class="content">
				<div class="am-g v-d-link">
					<a href="">首页></a>
					<a href="">首页></a>
					<a href="">首页></a>
				</div>
				<div class="am-g v-d-title">
					<div class="am-u-sm-6">

						<h2>{{$archive->title}}</h2>
					</div>
					<div class="am-u-sm-6">
						<div class="bdsharebuttonbox v-d-content-share">
							<a href=" " class="bds_more" data-cmd="more"></a>
								<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
								<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
								<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
								<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
								<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
						</div>
					</div>
				</div>
				<div class="am-g">
					<div class="am-u-sm-9 v-container" style="height:512px">

						{!! $archive->detail->link !!}

					</div>

					<div class="am-u-sm-3 v-detail-list">
						<div class="am-g v-d-list-title">最新视频</div>
						<div class="am-g v-d-list-content">
							<div class="am-u-sm-6">
								<a href="">
									<img src="{{asset('home/images/host/zb.jpg')}}" />
								</a>

							</div>
							<div class="am-u-sm-6">
								<p>
									<a href="">就大声回答说好的好的技术的很好就是大红色的决定</a>
								</p>
							</div>
							<hr data-am-widget="divider" style="" class="am-divider am-divider-default am-video-divider" />

						</div>
						<div class="am-g v-d-list-content">
							<div class="am-u-sm-6">
								<a href="">
									<img src="{{asset('home/images/host/zb.jpg')}}" />
								</a>

							</div>
							<div class="am-u-sm-6">
								<p>
									<a href="">就大声回答说好的好的技术的很好就是大红色的决定</a>
								</p>
							</div>
							<hr data-am-widget="divider" style="" class="am-divider am-divider-default am-video-divider" />

						</div>
						<div class="am-g v-d-list-content">
							<div class="am-u-sm-6">
								<a href="">
									<img src="{{asset('home/images/host/zb.jpg')}}" />
								</a>

							</div>
							<div class="am-u-sm-6">
								<p>
									<a href="">就大声回答说好的好的技术的很好就是大红色的决定</a>
								</p>
							</div>
							<hr data-am-widget="divider" style="" class="am-divider am-divider-default am-video-divider" />

						</div>
						<div class="am-g v-d-list-content">
							<div class="am-u-sm-6">
								<a href="">
									<img src="{{asset('home/images/host/zb.jpg')}}" />
								</a>

							</div>
							<div class="am-u-sm-6">
								<p>
									<a href="">就大声回答说好的好的技术的很好就是大红色的决定</a>
								</p>
							</div>

						</div>
					</div>
				</div>
				<div class="am-g">
					<div class="v-comment">
						<span>356<span>条评论</span></span><span>&nbsp;|&nbsp;</span>
						<span>{{$archive->visit_count}}<span>次播放</span></span>
					</div>
				</div>
			</div>
		</div>

		<div class="am-g v-list">
			<div class="content">
				<ul>
					<li>
						<a href="">
							<img src="{{asset('home/images/video/v-list1.jpg')}}" />
							<div class="am-g v-list-shade">
								<span>游图有真相No.51：我是国产我最屌 那些洗脑的国</span>
							</div>
							<div class="v-btn"></div>
						</a>
					</li>
					<li>
						<a href="">
							<img src="{{asset('home/images/video/v-list1.jpg')}}" />
							<div class="am-g v-list-shade">
								<span>游图有真相No.51：我是国产我最屌 那些洗脑的国</span>
							</div>
							<div class="v-btn"></div>
						</a>
					</li>
					<li>
						<a href="">
							<img src="{{asset('home/images/video/v-list1.jpg')}}" />
							<div class="am-g v-list-shade">
								<span>游图有真相No.51：我是国产我最屌 那些洗脑的国</span>
							</div>
							<div class="v-btn"></div>
						</a>
					</li>
					<li>
						<a href="">
							<img src="{{asset('home/images/video/v-list1.jpg')}}" />
							<div class="am-g v-list-shade">
								<span>游图有真相No.51：我是国产我最屌 那些洗脑的国</span>
							</div>
							<div class="v-btn"></div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="am-g">
			<div class="content">
				<div class="am-u-sm-9 v-d-article">
					<div class="v-pl-l">
						<div class="v-article">
							<h2>{{$archive->title}}</h2>
							<div class="news-author-view">
								<span class="news-author-view-name">作者：{{$archive->user->nickname or $archive->user->phone}}</span>
								<span>发布于： {{worldTime(strtotime($archive->updated_at))}}</span>
								{{--<span>来源：乐视网</span>--}}
								<div style="display: inline-block;">
									<dl class="tab-block-r-ul">
										@foreach($archive->tags()->get() as $tag)
											<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
										@endforeach
									</dl>
								</div>
							</div>
							<div class="news-detail-content-left-p">
								{!! $archive->detail->content !!}
								<p style="text-align: center;">
									<button type="button"
											class="am-btn am-btn-success btn like" @if($archive->isLiked(session('user'))) disabled @endif>
										喜欢&nbsp;<span>{{$archive->liked_count}}</span>
									</button>
								</p>
							</div>
						</div>
						<div class="v-changyanpl album-article">
							
						</div>

					</div>
				</div>

				<div class="am-u-sm-3 r-width">

					<div class="am-g v-d-recommand">
						<div class="am-u-sm-11 am-u-sm-centered" style="background-color: #FFFFFF;width: 280px;margin-top: 10px;">
							<div class="am-u-sm-6 am-u-sm-centered r-title">精彩推荐</div>
							<div class="am-u-sm-6 am-u-sm-centered bg-url">
								<h2>有点意思</h2>
							</div>
							@if($article_archives)
								@foreach($article_archives as $v)
							<div class="am-u-sm-11 am-u-sm-centered r-news">
								<P>
									<a href="{{route('archive.show', $v->id)}}"><img class="am-radius" alt="140*140" src="{{route('image', [trim($v->cover, '/'), '230x130'])}}"onerror="this.src='{{asset('home/images/banner-1.jpg')}}'" /></a>
								</P>
								<p>
									<a href="{{route('archive.show', $v->id)}}">{{$v->title}}</a>
								</p>
								<dl class="tab-block-r-ul">
									@foreach($v->tags()->get() as $tag)
										<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
									@endforeach
								</dl>
							</div>
								@endforeach
							@endif
							<div class="am-u-sm-6 am-u-sm-centered more">
								<a href="{{url('contentLists/'.$category_id)}}">更多内容</a>
							</div>
						</div>
					</div>

					<div class="am-g">
						<div class="am-u-sm-11 am-u-sm-centered" style="background-color: #FFFFFF;width: 280px;margin-top: 10px;">
							<div class="am-u-sm-6 am-u-sm-centered r-title">游戏攻略</div>
							<div class="am-u-sm-6 am-u-sm-centered bg-url">
								<h2>技术宅</h2>
							</div>
							@if($game_archives)
								@foreach($game_archives as $v)
							<div class="am-u-sm-11 am-u-sm-centered r-news">
								<P>
									<a href="{{route('archive.show', $v->id)}}"><img class="am-radius" alt="140*140" src="{{route('image', [trim($v->cover, '/'), '230x130'])}}"onerror="this.src='{{asset('home/images/banner-1.jpg')}}'" /></a>
								</P>
								<p>
									<a href="{{route('archive.show', $v->id)}}">{{$v->title}}</a>
								</p>
								<dl class="tab-block-r-ul">
									@foreach($v->tags()->get() as $tag)
										<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
									@endforeach
								</dl>
							</div>
							@endforeach
							@endif
							<div class="am-u-sm-6 am-u-sm-centered more">
								<a href="{{url('contentLists/'.$category_id2)}}">更多内容</a>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
<script>
	$(function(){
		$('embed').attr('width','900');
		$('embed').attr('height','512');
	})
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
</script>
@endsection