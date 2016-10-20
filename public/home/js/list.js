;$(function(){
	$(".p-thumbnail").hover(
		function(){
			var _this=$(this);
			_this.find($(".v-gbtn")).show();
			_this.find($(".list-shade")).css("bottom","-100px");
		},
		function(){
			var _this=$(this);
			_this.find($(".v-gbtn")).hide();
			_this.find($(".list-shade")).css("bottom","0");
		}
	)
})
;$(function(){
	$(".fm li").hover(
		function(){
			var _this=$(this);
			_this.find($(".op,.fm-h")).show(50);
		},
		function(){
			var _this=$(this);
			_this.find($(".op,.fm-h")).hide(50);
		}
	)
})
;$(function(){
	$(".slider li a").hover(
		function(){
			var _this=$(this);
			_this.find($(".v-title")).show();
			_this.find($(".v-title")).css("boutom","6px").slideUp();
		},
		function(){
			var _this=$(this);
			_this.find($(".v-title")).hide();
			_this.find($(".v-title")).css("bottom","6px").slideDown();
		}
	)
})