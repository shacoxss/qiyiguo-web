/**
 * Created by Administrator on 2016/9/13 0013.
 */
;
$(function() {
	var slide = {
		init: function() {
			var _this = this;
			var len = $(".lunbo .content li").length;
			$(".lunbo .content ul").width($(".lunbo .content li").width() * len);
			var wd = $(window).width();
			var marginL = (3600 - wd) / 2 - 300;
			if(1200 < wd <= 1920) {
				$(".mr_frUl").css("margin-left", "-" + marginL + "px ");
				$(".banner").height(539 / 1920 * wd);
			} else if(wd <= 1200) {
				$(".mr_frUl").css("margin-left", "-" + marginL + "px ");
				$(".banner").height("330px").width("1200px");
			} else {
				$(".mr_frUl").css("margin-left", "-" + marginL + "px ");
				$(".banner").height(9 / 32 * wd);
			}

			var bh = $(".banner-left").height();
			var blph = (bh * 0.2);
			$(".banner-left p").css("line-height", "" + blph + "px");

			var blw = $(".banner-little").width();
			var izbjjw;
			if(blw > 394) {
				$(".index-zb-jianjie").width("" + 253 + "px");
			} else {
				izbjjw = (blw - 141);
				$(".index-zb-jianjie").width(izbjjw);
			}
			
			//主播自适应
			var imgH=$(".zhubo-banner").find($(".zb-banner-bg img")).height();
			if(wd>1200){
				$(".zhubo-banner").height(imgH);
			}
			else{
				$(".zhubo-banner").height(528);
				$(".zhubo-banner").find($(".zb-banner-bg img")).height(528);
			}

			$(window).resize(function() {
				var wd = $(window).width();
				var marginL = (3600 - wd) / 2 - 300;
				if(1200 < wd <= 1920) {
					$(".mr_frUl").css("margin-left", "-" + marginL + "px ");
					$(".banner").height(539 / 1920 * wd);
				} else if(wd <= 1200) {
					$(".mr_frUl").css("margin-left", "-" + marginL + "px ");
					$(".banner").height("330px").width("1200px");
					console.log("ok");
				} else {
					$(".mr_frUl").css("margin-left", "-" + marginL + "px ");
					$(".banner").height(9 / 32 * wd);
				}
				var bh = $(".banner-left").height();
				var blph = (bh * 0.2);
				$(".banner-left p").css("line-height", "" + blph + "px");

				var blw = $(".banner-little").width();
				var izbjjw;
				if(blw > 394) {
					$(".index-zb-jianjie").width(253);
				} else {
					izbjjw = (blw - 141);
					$(".index-zb-jianjie").width(izbjjw);
				}
				
				//主播自适应
			var imgH=$(".zhubo-banner").find($(".zb-banner-bg img")).height();
			if(wd>1200){
				$(".zhubo-banner").height(imgH);
			}
			else{
				$(".zhubo-banner").height(528);
				$(".zhubo-banner").find($(".zb-banner-bg img")).height(528);
			}
			});

			$(".zbd-view li").hover(
				function() {
					var _this = $(this);

					var idx = _this.index();
					var zdbView = $(".zbd-v-guanzhu");
					if(zdbView.hasClass("zbl-v-guangzhu")) {
						zdbView.show().css("left", "" + (37 * idx + 50) + "px");
						console.log(50 * idx + 10);
					} else {
						zdbView.show().css("left", "" + 37 * idx - 2 + "px");
						console.log(idx);
					}

				},
				function() {
					var _this = this;
					$(".zbd-v-guanzhu").hide();
				}
			)

			//			_this.silder();						
		},

	}
	slide.init();

	var hover = {
		init: function() {
			var _this = this;
			_this.hotholder();
			_this.spzb();
			_this.member();
			_this.tuku();
			_this.toutiao();
		},
		hotholder: function() {
			$(".hot-holder-l a").hover(

				function() {
					var _this = $(this);
					_this.find($(".hot-holder-content-title")).css("-webkit-transform", "translateY(23px)");
				},
				function() {
					var _this = $(this);
					_this.find($(".hot-holder-content-title")).css("-webkit-transform", "translateY(0)");
				}
			)
		},
		spzb: function() {
			$(".zbsp-content-items").hover(
				function() {
					var _this = $(this);
					_this.append("<div class='video-btn'></div>");
				},
				function() {

					$(".video-btn").remove();
				}

			)
		},
		member: function() {
			$(".already-l").hover(
				function() {

					$(".already-l-ul").show();
				},
				function() {

					$(".already-l-ul").hide();

				}
			)
		},
		tuku: function() {
			$(".tuku-list a").hover(
				function() {
					var _this = $(this);
					_this.find($(".zhezhao,.tuku-word")).show();
				},
				function() {
					var _this = $(this);
					_this.find($(".zhezhao,.tuku-word")).hide();
				}
			)
		},
		weixinDrop: function() {
			$(".dropdown").hover(
				function() {
					$(".topic .content").append("<div class='weixin-drop'></div>");
				},
				function() {
					$(".weixin-drop").remove();
				}
			)
		},
		toutiao: function() {
			$(".qyg-toutiao-content a").hover(
				function() {
					var _this = $(this);
					_this.find($("img")).css({
						"-webkit-transform": "scale(1.2)"
					}, {
						"transform": "scale(1.2)"
					}, {
						"-moz-transform": "scale(1.2)"
					});
				},
				function() {
					var _this = $(this);
					_this.find($("img")).css({
						"-webkit-transform": "scale(1)"
					}, {
						"transform": "scale(1)"
					}, {
						"-moz-transform": "scale(1)"
					});
				}

			)
		}

	}
	hover.init();

	var videoPages = {
		init: function() {
			var _this = this;
			_this.vList();
			_this.vGameHover();
			_this.ddewm();
		},
		vList: function() {
			$(".v-list .content li").hover(
				function() {
					var _thisList = $(this);
					_thisList.find($(".v-list .v-btn")).show();
					_thisList.find($(".v-list-shade")).css("bottom", "-50px");
				},
				function() {
					var _thisList = $(this);
					_thisList.find($(".v-list .v-btn")).hide();
					_thisList.find($(".v-list-shade")).css("bottom", "0px");
				}
			)
		},
		vGameHover: function() {
			$(".v-vgame li").hover(
				function() {
					var _thisList = $(this);
					_thisList.find($(".v-btn")).show();
					_thisList.find($(".v-list-shade")).css("bottom", "-50px");
				},
				function() {
					var _thisList = $(this);
					_thisList.find($(".v-btn")).hide();
					_thisList.find($(".v-list-shade")).css("bottom", "0px");
				}
			)
		},

		ddewm: function() {
			$(".dd-weixin,.dd-weixin-d").hover(
				function() {
					$(".dd-ewm").show();
					$(".dd-weixin span,.dd-weixin-d span").css("color", "#92ba1c");

				},
				function() {
					$(".dd-ewm").hide();
					$(".dd-weixin span,.dd-weixin-d span").css("color", "#b9b9b9");

				}
			)
		}
	}
	videoPages.init();

	var login = {
		init: function() {
			$('.u-login').click(function() {
				layer.open({
					type: 1,
					title: false,
					closeBtn: 0,
					shadeClose: true,
					content: '<div class="login-pop"data-point="dlk"><div class="login-pop-close"></div><div class="login-pop-tab"><ul><li><a href="#" class="t-login current">登录</a></li><li><a href="" target="_blank">注册</a></li></ul></div><div class="login-pop-cont clearfix"><div class="c-item clearfix popLogin"><form method="post" action=""><input type="hidden" name="fmdo" value="login"><input type="hidden" name="dopost" value="login"><input type="hidden" name="gourl" value=""><p><input class="ipt" type="text" name="userid" id="txtUsername" placeholder="昵称"></p><p><input class="ipt" type="password" name="pwd" id="txtPassword" placeholder="密码"></p><p><input class="ipt" type="text" name="vdcode" id="vdcode" placeholder="验证码" maxlength="4" style="width:150px;margin-right:7px;"><img id="" align="absmiddle" onclick="this.src=this.src+\'?\'" style="cursor: pointer;" alt="看不清？点击更换" title="看不清？点击更换" src="images/login/ewm.jpg"/></p><div class="toreg clearfix"><input class="btn-sub"type="submit"value="登录"><p>没有账号？<a href="" title="马上注册" target="_blank">马上注册</a></p></div></form></div><div class="c-oth"><p>用第三方账号直接登录</p><div><a href="/member/qqlogin.php" class="btn-qq"target="_blank"title="QQ账号登录"data-point-2="qq"><span class="dy-icon dy-sina"></span><span>QQ账号登录</span></a></div><div><a href="/member/wechatLogin.php" class="btn-wx"target="_blank"title="微信登录"data-point-2="qq"><span class="dy-icon dy-wx"></span><span>微信登录</span></a></div><p class="forget-pass"><a href="/member/resetpassword.php" target="_blank">忘记密码？</a></p></div></div></div>'
				})
				$(".t-login").on("click", function() {
					$(".t-login").addClass("current");
					$(".t-reg").removeClass("current");
					$(".popLogin").removeClass("hide");
					$(".popReg").addClass("hide");
				})
				$(".t-reg").on("click", function() {
					$(".t-reg").addClass("current");
					$(".t-login").removeClass("current");
					$(".popLogin").addClass("hide");
					$(".popReg").removeClass("hide");
				})
				$(".login-pop-close").on("click", function() {
					layer.closeAll();
				})
			})
		}
	}
	login.init();
})