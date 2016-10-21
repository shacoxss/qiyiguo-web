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


})



