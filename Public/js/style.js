// JavaScript Document
//导航下拉
$(function(){
	/**/$(".daohang_dl").hide()
	$(".daohang_ul li").mouseover(function(){
			
			/*$(this).addClass("daohang_a").siblings().removeClass("daohang_a");*/
			$(this).find("dl").show();
			$(this).siblings().find("dl").hide();
		}).mouseout(function(){
			$(this).find("dl").hide();
			})
	$(".daohang_a").mousemove(function(){
		$(this).addClass("cur").parent().siblings().find("a").removeClass("cur")
		})
//帮助
$(".li_a").toggle(function(){
						 
		$(this).siblings(".help_con_left_dl").show();
		},function(){
			$(this).siblings(".help_con_left_dl").hide();
			})
//store详细页

			
$(".detail_changes_ul li").click(function(){
		var index=$(this).index();
		$(".detail_imgs_l").eq(index).show().siblings().hide();
		})	
})
//产品

$(".pro_con_li li").mouseover(function(){
		$(".pro_con_li li").removeClass("pro_con_ulhover");
		$(this).addClass("pro_con_ulhover");
		var index=$(this).index();
		$(".pro_content1").eq(index).show().siblings().hide();
		})	


$(document).ready(function(){
	var picindex=0;

	$("#leftpre").click(function(){
		var nowcontent;
		$(".pro_content1").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
		var piccount=nowcontent.children("ul:first").children("li").size()-1;

		if(picindex<piccount){
			picindex++;
		}else{
			picindex=0;
		}
		picshow(picindex);
	});
	
	$("#rightpre").click(function(){
		var nowcontent;
		$(".pro_content1").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
		var piccount=nowcontent.children("ul:first").children("li").size()-1;

		if(picindex>0){
			picindex--;
			
		}else{
			picindex=piccount;
		}
		picshow(picindex);
	});
	
})





function picshow(obj){
	var nowcontent;
		$(".pro_content1").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
	nowcontent.children("ul:first").children("li").hide();
	nowcontent.children("ul:first").children("li:eq("+obj+")").fadeIn(800);

}




$(document).ready(function(){
	var picindex=0;
	
	$("#leftpre1").click(function(){
		var nowcontent;
		$(".pro_content2").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
		var piccount=nowcontent.children("ul:first").children("li").size()-1;

		if(picindex<piccount){
			picindex++;
		}else{
			picindex=0;
		}
		picshow1(picindex);
	});
	
	$("#rightpre1").click(function(){
		var nowcontent;
		$(".pro_content2").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
		var piccount=nowcontent.children("ul:first").children("li").size()-1;

		if(picindex>0){
			picindex--;
			
		}else{
			picindex=piccount;
		}
		picshow1(picindex);
	});
	
})


function picshow1(obj){
	var nowcontent;
		$(".pro_content2").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
	nowcontent.children("ul:first").children("li").hide();
	nowcontent.children("ul:first").children("li:eq("+obj+")").fadeIn(800);
}









$(document).ready(function(){
	var picindex=0;
	
	$("#leftpre2").click(function(){
		var nowcontent;
		$(".pro_content3").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
		var piccount=nowcontent.children("ul:first").children("li").size()-1;

		if(picindex<piccount){
			picindex++;
		}else{
			picindex=0;
		}
		picshow2(picindex);
	});
	
	$("#rightpre2").click(function(){
		var nowcontent;
		$(".pro_content3").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
		var piccount=nowcontent.children("ul:first").children("li").size()-1;

		if(picindex>0){
			picindex--;
			
		}else{
			picindex=piccount;
		}
		picshow2(picindex);
	});
	
})


function picshow2(obj){
	var nowcontent;
		$(".pro_content3").each(function(){
			if(!$(this).hasClass("hidden")){
				nowcontent=$(this);
			}
		})
	nowcontent.children("ul:first").children("li").hide();
	nowcontent.children("ul:first").children("li:eq("+obj+")").fadeIn(800);
}


	//视频欣赏




$(function(){
    //初始化载入
     $('#img_box_show').html($('.img_list li').eq(0).children(0).children(0).html());
   //对图片点击
    $('.img_list li').click(function(){
      $('#img_box_show').html($(this).children(0).children(0).html());//更换显示框内容
    });
  //图片滚动
  //定位处理
   var len = $('.img_list li').length;//li的个数
   var le = 168;//left值步长
   var max_left = (len-1)*le;//最大left
   var min_left = -le;//最小left
    for(var i=0;i<len;i++){
      var lefts = i*le;
      $('.img_list li').eq(i).css('left',lefts);//初始化所有元素定位

    }
   //1.向左运动
   $('.prev').click(function(){
    //克隆节点插入到最后面
    //1.1所有元素left减去步长(即le)
    var str;
    var index_cut;
    $('.img_list li').each(function(index){
        var curr_left = $('.img_list li').eq(index).css('left');
            curr_left =parseInt(curr_left);
            curr_left =curr_left-le;
            $('.img_list li').eq(index).css('left',curr_left);
        if(curr_left==min_left){
            index_cut = index;
        }

    });
      str = "<li>"+$('.img_list li').eq(index_cut).html()+"</li>";//组合成为最后一个节点
      $(str).appendTo(".img_list ");//追加节点
      $('.img_list li').eq(index_cut).remove();//移除节点
      $('.img_list li:last').css('left',max_left).bind('click',function(){
      $('#img_box_show').html($(this).html());//更换显示框内容
    });//定位追加节点left值


   });
  //2.向右运动
  $('.next').click(function(){
   //最后一张图片插入第一张图片前面
    var str1 = "<li>"+$('.img_list li:last').html()+"</li>";//克隆节点内容组合成第一个节点
    $(str1).prependTo(".img_list");//插入节点作为第一个节点
    //定位追加第一个节点left值,并且重新绑定点击事件，解决click事件消失
    $('.img_list li:first').css('left',min_left).bind('click',function(){
      $('#img_box_show').html($(this).html());//更换显示框内容
    });
    $('.img_list li:last').remove();//移除最后一个节点
    //所有元素节点加上步长le
    $('.img_list li').each(function(index){
       var curr_left = $('.img_list li').eq(index).css('left');
           curr_left =parseInt(curr_left);
           curr_left =curr_left+le;
           $('.img_list li').eq(index).css('left',curr_left);

    });




  });
//store
	$(".store_daohang_ul").hide()
	$(".store_ul1_li").mouseover(function(){
			$(this).find(".store_daohang_ul").show();
			$(this).siblings().find(".store_daohang_ul").hide();
		}).mouseout(function(){
			$(this).find(".store_daohang_ul").hide();
			
			})
			
$(".store_div_li").toggle(function(){
						 
		$(this).siblings(".store_daohang_dl").show();
		},function(){
			$(this).siblings(".store_daohang_dl").hide();
			})	

})
//返回顶部
function pageScroll()
 {     
  //把内容滚动指定的像素数（第一个参数是向右滚动的像素数，第二个参数是向下滚动的像素数）    
  window.scrollBy(0,-100);    
  //延时递归调用，模拟滚动向上效果    
  scrolldelay = setTimeout('pageScroll()',0);    
  //获取scrollTop值，声明了DTD的标准网页取document.documentElement.scrollTop，否则取document.body.scrollTop；因为二者只有一个会生效，另一个就恒为0，所以取和值可以得到网页的真正的scrollTop值    
  var sTop=document.documentElement.scrollTop+document.body.scrollTop;    
  //判断当页面到达顶部，取消延时代码（否则页面滚动到顶部会无法再向下正常浏览页面）    
  if(sTop==0) clearTimeout(scrolldelay);
 }



