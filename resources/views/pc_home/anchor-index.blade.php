@extends('pc_home.commonIn')
@section('content')
		<!--头部	-->
		<!--banner-->
<style>
	.zbsp-content li {
		width: 340px;
		height: 290px;
		margin-left: 35px;
		margin-right: 0px;
		margin-top: 0px;
		background-color: #fff;
		float: left;
	}
	.zbsp-content-items {
		padding-left: 0px;
		padding-right: 0px;
		margin-bottom: 0px;
	}
	.zbsp-content li img {

		height: auto;

	}
	.zbsp-content-items .word {
		background: #fff;
	}
	.video-btn{
		clear: all;
	}
</style>
		<!--轮播图-->
		<div class="am-g" style="margin-top: 81px;">
			<div class="fullSlide">
				<div class="contextual">
					<ul>
						<li><img src="{{('home/images/host/1.jpg')}}">
							<a target="_blank" href=""></a>
						</li>
						<li><img src="{{('home/images/host/2.jpg')}}">
							<a target="_blank" href=""></a>
						</li>
					</ul>
				</div>

			</div>
			<script type="text/javascript" src="{{asset('home/js/jquery.SuperSlide.2.1.1.js')}}"></script>
			<script type="text/javascript">
				jQuery(".fullSlide").slide({
					mainCell: ".contextual ul",
					effect: "fold",
					autoPlay: true,
					delayTime: 700
				});
			</script>
		</div>
		<!--轮播图-->

		<div class="am-g postion">
			<div class="relative">
				<ul class="zbsp-content">
					<li class="zbsp-content-items">
						<a href="">
							<img src="{{('home/images/item1.jpg')}}" />

							<div class="word">
								<div class="bt">
									<span>赛特</span>
									<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 90px;">1220℃</span>
								</div>
								<div class="liulan">
									<P>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体 重43公斤，三围83 58 84，学校专业英文系二外选修日
									</P>
									<div style="margin-top: 5px;">
										<dl class="tab-block-r-ul">
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										</dl>
									</div>

								</div>
							</div>

						</a>
					</li>
					<li class="zbsp-content-items">
						<a href="">
							<img src="{{('home/images/item1.jpg')}}" />

							<div class="word">
								<div class="bt">
									<span>赛特</span>
									<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 90px;">1220℃</span>
								</div>
								<div class="liulan">
									<P>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体 重43公斤，三围83 58 84，学校专业英文系二外选修日 
									</P>
									<div style="margin-top: 5px;">
										<dl class="tab-block-r-ul">
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										</dl>
									</div>
								</div>
							</div>

						</a>
					</li>
					<<li class="zbsp-content-items">
						<a href="">
							<img src="{{('home/images/item1.jpg')}}" />

							<div class="word">
								<div class="bt">
									<span>赛特</span>
									<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 90px;">1220℃</span>
								</div>
								<div class="liulan">
									<P>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体 重43公斤，三围83 58 84，学校专业英文系二外选修
									</P>
									<div style="margin-top: 5px;">
										<dl class="tab-block-r-ul">
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
											<dt style="background: #006633;"><a href="">守望先锋</a></dt>
										</dl>
									</div>
								</div>
							</div>

						</a>
						</li>

				</ul>
			</div>
		</div>
		<!--优播排行-->
		<div class="am-g" style="background-color:#17353b ;">
			<div class="am-u-sm-10 am-u-sm-centered">
				<div class="am-u-sm-5 am-u-sm-centered banner-b">
					<h2>精彩推荐 </h2>
					<span>EXCELLENT SOWING RANKING</span>
				</div>
				<div class="am-g" style="width: 1200px;margin: 0 auto;margin-bottom: 20px;">
					<ul class="fd">
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<img class="pm-hg" src="{{('home/images/host/hg.png')}}">
								<span class="pm-pic"><h3>第一名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic two"><h3>第二名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic three"><h3>第三名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic other"><h3>第四名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic other"><h3>第五名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic other"><h3>第六名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic other"><h3>第七名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic other"><h3>第八名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic other"><h3>第九名</h3></span>
							</div>
						</li>
						<li>
							<div class="am-g" style="display: inline-block; margin:10px 0;position: relative;">
								<div class="am-u-sm-12 am-u-sm-centered" style="padding: 0; width: 590px; height: 160px;background-color:#FFFFFF ;overflow: hidden;">
									<div class="am-u-sm-4" style="padding: 0;margin-right: 98px;">
										<a href=""><img class="am-thumbnail list-pics" src="{{('home/images/banner-3.jpg')}}" alt="" /></a>
									</div>
									<div class="am-thumbnail-caption content-lists">
										<a href="">
											<h3>韩梅梅</h3></a>
										<span style="color:#ffab73 ;background: url({{('home/images/host/hot.png')}}) no-repeat;padding-left: 15px;margin-left: 170px;">1220℃</span>
										<p>大家好我叫蒋雪菲，年龄23岁，摩羯座，身高166，体重43公斤，三围83 58 84，学校专业英文系二外选修日文，赴日留学半年回国，现居上海，为平面模特，做过淘宝店铺</p>
										<p style="text-align: right;">
											<button type="button" class="am-btn am-btn-primary tp-btn" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 460, height: 275}">投票</button>
										</p>
									</div>
								</div>
								<span class="pm-pic other"><h3>第十名</h3></span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--优播排行-->
		<div class="am-g" style="background-color: #FFFFFF; height: 405px;">
			<div class="am-g big-pic">
				<div class="am-u-sm-5 am-u-sm-centered">
					<h2>想要成为签约<strong>主播</strong>吗？</h2>
					<h3>DO YOU WANT TO BE AN ANCHOR</h3>
					<button class="cwzb">成为主播</button>
				</div>
			</div>
		</div>

		<div class="am-g">
			<div class="am-u-sm-5 am-u-sm-centered" style="width: 1200px; padding: 0;position: relative;height: 677px;">
				<div class="am-g">
					<ul class="pt">
						<li>
							<a href="">全部</a>
						</li>
						<li>
							<a href="">斗鱼直播</a>
						</li>
						<li>
							<a href="">熊猫TV</a>
						</li>
						<li>
							<a href="">YY直播</a>
						</li>
						<li>
							<a href="">战旗直播</a>
						</li>
						<li>
							<a href="">虎牙直播</a>
						</li>
					</ul>
				</div>
				<div class="am-g">
					<ul class="fm">
						<li>
							<img src="{{('home/images/host/zb.jpg')}}">
							<div class="am-g op"></div>
							<div class="fm-h">
								<a href="" class="fd-h"></a>
								<a href="" class="hy-h"></a>
							</div>
							<div class="name-h">
								<span>韩梅梅</span>
							</div>
						</li>
						<li>
							<img src="{{('home/images/host/zb.jpg')}}">
							<div class="am-g op"></div>
							<div class="fm-h">
								<a href="" class="fd-h"></a>
								<a href="" class="hy-h"></a>
							</div>
							<div class="name-h">
								<span>韩梅梅</span>
							</div>
						</li>
						<li>
							<img src="{{('home/images/host/zb.jpg')}}">
							<div class="am-g op"></div>
							<div class="fm-h">
								<a href="" class="fd-h"></a>
								<a href="" class="hy-h"></a>
							</div>
							<div class="name-h">
								<span>韩梅梅</span>
							</div>
						</li>
						<li>
							<img src="{{('home/images/host/zb.jpg')}}">
							<div class="am-g op"></div>
							<div class="fm-h">
								<a href="" class="fd-h"></a>
								<a href="" class="hy-h"></a>
							</div>
							<div class="name-h">
								<span>韩梅梅</span>
							</div>
						</li>
						<li>
							<img src="{{('home/images/host/zb.jpg')}}">
							<div class="am-g op"></div>
							<div class="fm-h">
								<a href="" class="fd-h"></a>
								<a href="" class="hy-h"></a>
							</div>
							<div class="name-h">
								<span>韩梅梅</span>
							</div>
						</li>
						<li>
							<img src="{{('home/images/host/zb.jpg')}}">
							<div class="am-g op"></div>
							<div class="fm-h">
								<a href="" class="fd-h"></a>
								<a href="" class="hy-h"></a>
							</div>
							<div class="name-h">
								<span>韩梅梅</span>
							</div>
						</li>
					</ul>
					<div class="ym">
						<ul>
							<li style="background-color: #000000;color: #FFFFFF;">
								<a href="">
									<</a>
							</li>
							<li>
								<a href="">1</a>
							</li>
							<li>
								<a href="">2</a>
							</li>
							<li>
								<a href="">3</a>
							</li>
							<li>
								<a href="">4</a>
							</li>
							<li>
								<a href="">5</a>
							</li>
							<li style="background-color: #000000;color: #FFFFFF;">
								<a href="">></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--弹窗-->
		<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
			<div class="am-modal-dialog">
				<div class="am-modal-hd" style="background-color: #ffff66; text-align: center; font-size: 18px;">投&nbsp;&nbsp;&nbsp;票
					<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
				</div>
				<div class="am-modal-bd" style="padding: 0; height: 100%;">
					<div class="am-g" style="background-color: #161c58; height: 100%;">
						<ul class="dc">
							<li>
								<a href="">10</a>
							</li>
							<li>
								<a href="">52</a>
							</li>
							<li>
								<a href="">66</a>
							</li>
							<li>
								<a href="">99</a>
							</li>
							<li>
								<a href="">520</a>
							</li>
							<li>
								<a href="">999</a>
							</li>
							<li>
								<a href="">1314</a>
							</li>
							<li>
								<a href="">9999</a>
							</li>
						</ul>
						<div class="adm-u-sm-5 right-btn">
							<button data-am-modal-close class="qx">取消</button>
							<button data-am-modal-close class="qd">投票</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--banner-->
@endsection