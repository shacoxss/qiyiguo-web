@extends('pc_home.commonIn')
@section('title')
	<title>奇异果聚合-{{$arc->title}}</title>
	<meta name="Keywords" content="">
	<meta name="description" content="" />
	@show
@section('content')
		<!--banner-->
<style>
	.liulan {
		padding: 0px 10px 5px;
		overflow: hidden;
		width: 257px;
		font-size: 12px;
		margin-top: 10px;
		height:auto;
	}
	.bt {
		padding: 10px 10px;
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
</style>
		<div class="am-g" style="background-color: #F4F4F4;margin-top: 81px">
			<div class="am-g width">
				<div class="am-u-sm-8 l-width">
					<div class="am-g">
						<h1 style="font-size: 30px;font-weight: normal;text-align: center">{{$arc->title}}</h1>
					</div>

					<div class="am-g" style="width:900px; margin-top: 40px;">
						<div class="am-u-sm-11 am-u-sm-centered" style="padding: 0;">
							<div class="am-u-sm-8" style="padding: 0;">
								<div class="am-u-sm-3" style="padding: 0;">
									<a href=""><img src="{{$arc->user->head_img}}" onerror="this.src='{{asset('home/images/banner-1.jpg')}}'" alt="..." class="am-img-thumbnail am-circle block-pic" style="width: 46px;height: 46px; padding: 0;">
									<div class="user">
										<h2>{{isset($arc->user->nickname)?$arc->user->nickname:$arc->user->phone}}</br><span>{{worldTime(strtotime($arc->updated_at))}}</span></h2></div>
								</a></div>
								<div style="display: inline-block;float: left;margin-top: 20px;">
									<dl class="tab-block-r-ul">
										@foreach($arc->tags()->get() as $tag)
											<dt style="background: #{{$tag->background_color or '006633'}};"><a href="{{$tag->url}}">{{$tag->name}}</a></dt>
										@endforeach
									</dl>
								</div>
							</div>
							<div class="am-u-sm-4" style="padding: 0;">
								<div class="bdsharebuttonbox" style="padding-left: 88px;">
									<a href="#" class="bds_more" data-cmd="more"></a>
									<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
									<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
									<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
									<a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
									<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
								</div>
								<script>
									window._bd_share_config = {
										"common": {
											"bdSnsKey": {},
											"bdText": "",
											"bdMini": "2",
											"bdMiniList": false,
											"bdPic": "",
											"bdStyle": "0",
											"bdSize": "24"
										},
										"share": {}
									};
									with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
								</script>
							</div>
						</div>
					</div>
					<div class="am-g">
						<div class="am-u-sm-11 am-u-sm-centered new-content">
							{!! $arc->detail->content !!}
							<p style="text-align: center;">
								<button type="button"
										class="am-btn am-btn-success btn like" @if($arc->isLiked(session('user'))) disabled @endif>
									喜欢&nbsp;<span>{{$arc->liked_count}}</span>
								</button>
							</p>
						</div>
					</div>
					<div class="am-u-sm-12 br"></div>
					<div class="am-g" style="background-color: #F4F4F4;padding-top: 20px;">
						<div class="zbsp-content sz">
							<div class="am-u-sm-4 zbsp-content-items host-d-items">
								<a href="">
									<img src="{{asset('home/images/item1.jpg')}}" />
								</a>
								<div style="border-bottom: 1px solid #DDDDDD;overflow: hidden;padding-left: 10px;padding-top: 10px;background: #fff;">
									<dl class="tab-block-r-ul">
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
									</dl>
								</div>
								<a href="">
									<div class="word">
										<div class="bt">
											<span>赛特：走下神坛的召唤命运坎坷！水电费方式方法</span>
										</div>
										<div class="liulan">
											<div class="liulan-l">
												<span class="img"></span><span>李雷</span>
											</div>
											<div class="liulan-r">
												<span>10000</span><span class="img"></span>
											</div>
										</div>
									</div>
								</a>

							</div>
							<div class="am-u-sm-4 zbsp-content-items host-d-items">
								<a href="">
									<img src="{{asset('home/images/item1.jpg')}}" />
								</a>
								<div style="border-bottom: 1px solid #DDDDDD;overflow: hidden;padding-left: 10px;padding-top: 10px;background: #fff;">
									<dl class="tab-block-r-ul">
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
									</dl>
								</div>
								<a href="">
									<div class="word">
										<div class="bt">
											<span>赛特：走下神坛的召唤命运坎坷！水电费方式方法</span>
										</div>
										<div class="liulan">
											<div class="liulan-l">
												<span class="img"></span><span>李雷</span>
											</div>
											<div class="liulan-r">
												<span>10000</span><span class="img"></span>
											</div>
										</div>
									</div>
								</a>

							</div>
							<div class="am-u-sm-4 zbsp-content-items host-d-items">
								<a href="">
									<img src="{{asset('home/images/item1.jpg')}}" />
								</a>
								<div style="border-bottom: 1px solid #DDDDDD;overflow: hidden;padding-left: 10px;padding-top: 10px;background: #fff;">
									<dl class="tab-block-r-ul">
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										<dt style="background: #006633;"><a href="">守望先锋</a></dt>
									</dl>
								</div>
								<a href="">
									<div class="word">
										<div class="bt">
											<span>赛特：走下神坛的召唤命运坎坷！水电费方式方法</span>
										</div>
										<div class="liulan">
											<div class="liulan-l">
												<span class="img"></span><span>李雷</span>
											</div>
											<div class="liulan-r">
												<span>10000</span><span class="img"></span>
											</div>
										</div>
									</div>
								</a>

							</div>
						</div>
					</div>
				</div>

				<!--right-->
				<div class="am-u-sm-4 r-width">
					
					<div class="am-g">
						<div class="am-u-sm-11 am-u-sm-centered" style="background-color: #FFFFFF;width: 280px;">
							<div class="am-u-sm-6 am-u-sm-centered bg-url">
								<h3>关于我们</h3>
							</div>
							<div class="am-u-sm-11 am-u-sm-centered r-qygnew">								
								<p>奇异果聚合是中国首个主播门户网站，内容涵盖了优质主播图片、资料、甚至主播微信的整理；粉丝互动产生的积分可以有效转换；经纪公司招聘、运作资讯的一站整合；直播内容的提升分享，致力于主播这个全新的行业，以不断提升主播内容，增强粉丝互动为主旨！
									<img src="{{asset('home/images/QYGnews/ewm.jpg')}}">
								</p>
							<ul class="gz">
			     			<li><a href=""><img src="{{asset('home/images/QYGnews/wx.png')}}"></a></li>
			     			<li><a href=""><img src="{{asset('home/images/QYGnews/tx.png')}}"></a></li>
			     			<li><a href=""><img src="{{asset('home/images/QYGnews/qq.png')}}"></a></li>
			     			<li><a href=""><img src="{{asset('home/images/QYGnews/xl.png')}}"></a></li>
			     		        </ul>
			     		  <div class="am-g">
			     			<ul class="gl-pic">
			     				<li><a href=""><img src="{{asset('home/images/QYGnews/gl.png')}}"></a></li>
			     				<li><a href=""><img src="{{asset('home/images/QYGnews/sp.png')}}"></a></li>
			     				<li><a href=""><img src="{{asset('home/images/QYGnews/tj.png')}}"></a></li>
			     			</ul>
			     		</div>
							</div>												
						</div>
					</div>

				</div>
			</div>
			</div>
<input id="islogin" value="{{$islogin}}" type="hidden">
<script>
	$(function () {
		$('.like').on('click', function () {
			var islogin = $('#islogin').val();
			if(islogin==-1){
				layer.msg('请先登录！');
				return false;
			}
			var $this = $(this)
			var index = layer.load(0, {shade: false, time : 10000});
			$.getJSON('{{ route('archive.like', $arc->id) }}', function (response){
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