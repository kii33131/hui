// JavaScript Document
$(function(){
	$(".deat_li").toggle(function(){

		$(this).siblings(".deat_dl").show();
		$(this).find("p").addClass("cur")
		},function(){
			$(this).find("p").removeClass("cur")
			$(this).siblings(".deat_dl").hide();
			})
//storeœÍœ∏“≥
$(".xingqu_top_ul ul li").click(function(){
		var index=$(this).index();
		$(".xingqu_ul2").eq(index).show().siblings().hide();
		})	


	})