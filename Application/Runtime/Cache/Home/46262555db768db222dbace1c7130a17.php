<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<link rel="Shortcut Icon" href="/sms/Public/imgaes/logo.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $freed['title']?></title>
<link rel="stylesheet" type="text/css" href="/sms/Public/admin/stylesheets/theme.css">
<link rel="stylesheet" href="/sms/Public/admin/lib/font-awesome/css/font-awesome.css">

<link rel="stylesheet" type="text/css" href="/sms/Public/css/public.css"/>  
<link rel="stylesheet" type="text/css" href="/sms/Public/css/style.css"/>
<script type="text/javascript" src="/sms/Public/js/jquery-1.7.2.min.js"></script>
<!--
<script type="text/javascript" src="/sms/Public/js/style.js"></script>  -->

<script type="text/javascript" src="/sms/Public/js/marquee.js"></script>

<script type="text/javascript" src="/sms/Public/js/Validform_v5.3.2_min.js"></script>




              <style>
                .kui{
                    position:relative;
                    top:-63px;
                    left:792px;

                }


                .wocaon{

             position: relative;
            width:100px;
            height:100px;
            top:-50px;
            left:-114px;
            display: none;                   
                          
                        
             } 
                   
         .lli{

            display: block;
            }


             .demo{

                        position:fixed;

                        
                        top:378px;
                         
                         z-index:100000;

                    }

              </style>





    <script>

    $(function(){


      //alert('ds');

      $(".store_daohang_ul").hide();


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




    function shubu(){

         $('#cao').attr('src','/sms/Public/imgaes/hah1.jpg');

    }

    function shubu2(){

         $('#cao').attr('src','/sms/Public/imgaes/index_06.jpg');

    }



       function shubu3(){

         $('#cao3').attr('src','/sms/Public/imgaes/hah3.jpg');

    }


    function shubu4(){

         $('#cao3').attr('src','/sms/Public/imgaes/index_08.jpg');

    }



   function shubu5(){

         $('#cao4').attr('src','/sms/Public/imgaes/hah2.jpg');
         $('.wocaon').removeClass("lli");
    }


    function shubu6(){

         $('#cao4').attr('src','/sms/Public/imgaes/index_12.jpg');
         $('.wocaon').addClass("lli");
    }


    </script>

</head>
<body style="background:#f7f7f7">
<!--顶部-->
<div class="ding">
	<div class="new_eff">

        <!--    
    	<div class="ding_left">
        	<p>您好，欢迎光临博润堂！</p>
            <a href="#">登录&nbsp;|</a>
            <a href="#">注册</a>
        </div> -->
           <div class="ding_left">
            <p>您好，<?php echo $_SESSION['Home']['name']?>欢迎光临佰瑞！</p>

            <?php if($_SESSION['Home']['name']){ echo "<a href='".U('login/zhu')."'>".'注销 '."</a>"; }else{ echo "<a href='".U('Login/index')."'>".'登录 '."</a>"; } ?>

                <?php  if($_SESSION['Home']['name']==null){ echo "<a href='".U('Reg/index')."'>".' | 注册 '."</a>"; } ?>
           <!--
            <a href="<?php echo U('Reg/index');?>">注册</a>  -->
        </div>



       <div class="ding_right">
            <dl>
                <dt>客服热线：</dt>
                <dd>028-82630858</dd>
            </dl>
            <a href="<?php echo U('User/index');?>">我的订单&nbsp;|</a>
            <a href="<?php echo U('Index/cont');?>">&nbsp;联系我们</a>
        </div>  
    </div>
</div>

<?php if($freed['status']==1){ die('网站正在维护。。。'); }?>
<!--头部-->
<div class="help_header">
  <div class="new_eff" style="overflow:hidden;">
        <div class="logo">
        <a href="<?php echo U('Index/index');?>">
        <img src="/sms/Public/imgaes/logo.png" /> </a>

        </div>
        <div class="help_hea_right">
        	<div class="new_hea">


                <div class="help_hea_right_top">
                    <form action="<?php echo U('Index/getgoods');?>" method="get">
    
                    <input name="name" type="text"  class="help_text"/><input name="" type="image" class="help_imgage" src="/sms/Public/imgaes/help_03.jpg" />
    
                    </form>
    
                </div>


                <div class="help_hea_right_bot">
                    <p>热门搜索：

                          <?php if(!empty($remen)):?>
                      <?php foreach($remen as $arr):?>
                    <a style="color:#000" href="<?php echo U('Index/getgoodjs',array('name'=>$arr['title']));?>"><?php echo $arr['title'] ?></a>
                   <?php endforeach;?>
              <?php endif;?>

                    </p>
                </div>
            </div>

          <!--
              <div class="header_right_top">
           		<ul>
                   
                    <li><a target="_blank" href="http://zhangxg6688.taobao.com"><img id="cao" onmousemove="shubu()" src="/sms/Public/imgaes/index_06.jpg" onmouseout="shubu2()" /></a></li>
                    <li><a target="_blank" href="http://weibo.com/boruntang/profile?rightmod=1&wvr=5&mod=personinfo"><img  id="cao3" onmousemove="shubu3()"  onmouseout="shubu4()"  src="/sms/Public/imgaes/index_08.jpg" /></a></li>
                    
                    <li class="hea_right_lastli"><a href="#"><img id="cao4" onmousemove="shubu5()"  onmouseout="shubu6()"  src="/sms/Public/imgaes/index_12.jpg" /></a></li>
    
    
                   
            	</ul>

               <div class="wocaon lli">
                                       
                      <img  src="/sms/Public/imgaes/rccc.jpg"  style="width:100px;height:100px;">
                              
                    </div> -->
        	</div>


        </div>
  </div>
</div>


<!--导航栏-->
<div class="help_daohang">
    <div class="new_eff">
      <ul class="stroe_daohang">
            <li class="store_ul1_li">
                <h2>全部分类</h2>

                <ul class="store_daohang_ul">

                    <?php if(!empty($fenlei)):?>
                      <?php foreach($fenlei as $arr):?>
                    <li>
                        <div class="store_div_li"><?php echo $arr['title']?></div>

                        <dl class="store_daohang_dl">
                            <dd>
                               
                                <?php echo getCategoryc($arr['id']);?>
                            </dd>
                           
                        </dl>
                    </li>
                   <?php endforeach;?>
              <?php endif;?>


                </ul>

               
            </li>
      </ul>
      <ul class="help_daohang_ul">
        <li><a  href="<?php echo U('Index/index');?>">首页</a></li>

      
        <li><a target="_blank" href="<?php echo U('Index/hetian');?>">日立铣刀片1</a></li>
     	<li><a target="_blank" href="<?php echo U('Index/nanhong');?>">日立铣刀片2</a></li>
      <!--
        <li><a target="_blank" href="<?php echo U('Index/qyjj');?>">博润堂</a></li> -->
        <!--
        <li><a href="#">精品赏析</a></li> -->
        <li><a target="_blank" href="<?php echo U('Index/nanhong');?>">日立铣刀片3</a></li>
        
        <li><a target="_blank" href="<?php echo U('Index/nanhong');?>">日立铣刀片4</a></li>
        
      </ul>
      <h1><a href="<?php echo U('Shop/gowu');?>">去结算</a></h1>
    </div>
</div>
<!--内容区域-->

<script>

    function shu(i){

        var ids = i;

        $.post('/sms/index.php/Home/Index/shu',{'goodsid':ids},function(date){


        })

    }

    function tejia(){

      if($('.yaya').val()==0){
        $('.yaya').val('1');
        $('.news').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'new'=>1,'teijia'=>1));?>');

        $('.moneys').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'money'=>1,'teijia'=>1));?>');
        $('.people').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'shu'=>1,'teijia'=>1));?>');
      }
      else{

        $('.yaya').val('0');
        $('.news').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'new'=>1));?>');
        $('.moneys').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'money'=>1));?>');
        $('.people').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'shu'=>1));?>');

      }

    }



    function yishou(){

      if($('.chacha').val()==0){
        $('.chacha').val('1');
        $('.news').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'new'=>1,'yisou'=>1));?>');

        $('.moneys').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'money'=>1,'yisou'=>1));?>');
        $('.people').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'shu'=>1,'yisou'=>1));?>');
      }
      else{

        $('.chacha').val('0');
        $('.news').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'new'=>1));?>');
        $('.moneys').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'money'=>1));?>');
        $('.people').attr('href','<?php echo U('Index/index',array('goods_id'=>$category_id,'shu'=>1));?>');

      }

    }


   /*
    
   function unk(i){


    //alert($.this)


        var oo=  window.location.href;

       // var oo = '<?php echo U('Index/index');?>';

       // alert(oo);
       strs=oo.split('.html');
     //alert(strs[0]);
     //alert(strs);
     if(strs[0]=='http://boruntang.gotoip3.com/index.php/Home/Index/index'){


      $(".jji"+i).attr('href',strs[0]+'/goods_id/'+i);


     }

     else{

      $(".jji"+i).attr('href',strs[0]+','+i);
     }

   }  */


   $(function(){

    var aaarr = $('.llioi').val();
    
    //alert($('.sto_con_cen a').html());
    //var obj2 = aaarr.split(",");
   //alert(obj2);

 	ssi = aaarr.split(",");
 	
 	for (i = 0; i <= ssi.length; i++)
	{
		$('.jji'+ssi[i]).removeClass('bbiu');
		$('.jji'+ssi[i]).addClass('wocaioni');
		
	}

	//alert('d');
   })

</script>

<style>
  .wocaioni{
    color:#a80000;
  }

  .bbiu{

  	 color:#333333;
  }

</style>

<link href="/sms/Public/css/jquery.slideBox.css" rel="stylesheet" type="text/css" />
<script src="/sms/Public/js/jquery.slideBox.min.js" type="text/javascript"></script>
<script>
jQuery(function($){
  <!-- $('#demo1').slideBox(); -->
  $('#demo2').slideBox({
    direction : 'top',//left,top#方向
    duration :1,//滚动持续时间，单位：秒
    easing : 'linear',//swing,linear//滚动特效
    delay : 5,//滚动延迟时间，单位：秒
    startIndex : 1//初始焦点顺序
  }); 
  $('#demo3').slideBox({
    duration : 1,//滚动持续时间，单位：秒
    easing : 'linear',//swing,linear//滚动特效
    delay : 5,//滚动延迟时间，单位：秒
    hideClickBar : false,//不自动隐藏点选按键
    clickBarRadius : 10
  });
   $('#demo4').slideBox({
    hideBottomBar : true//隐藏底栏
  }); 
});
</script>




<!--banner-->

<input class="llioi" type="hidden" value="<?php echo $cateidsse?>">
<div class="store_banner">

  
<div id="demo3" class="slideBox">
  <ul class="items">
         <li><img width="100%" height="430" src="/sms/Public/imgaes/banner1.jpg"></li>
         <li><img width="100%" height="430" src="/sms/Public/imgaes/banner2.jpg"></li>
         <li><img width="100%" height="430" src="/sms/Public/imgaes/banner1.jpg"></li>
         <li><img width="100%" height="430" src="/sms/Public/imgaes/banner2.jpg"></li>

         <!--
         <li><img width="100%" height="430" src="/sms/Public/imgaes/banner3.jpg"></li>
         <li><img width="100%" height="430" src="/sms/Public/imgaes/banner4.jpg"></li>  -->
 
   
<div class="clear"></div>
 
    </ul>
</div>

</div>  



  



<!--内容区域-->
<div class="clear"></div>
<div class="new_eff" style="overflow:hidden; background:#f0f0f0;">
<div class="store_content">
	<div class="sto_con_top">
   	  <div class="sto_con_top_left">商品筛选</div>
      <div class="sto_con_top_right"><a href="<?php echo U('Index/index');?>">重置筛选条件</a></div>
  </div>
  <div class="sto_con_cen">
    	<ul>
            
            <?php if(!empty($fenlei)):?>
                <?php foreach($fenlei as $arr):?>
       	  <li>
            	<div class="sto_con_cen_div"><?php echo $arr['title']?></div>
                <dl class="sto_con_cen_dl">
                	<dd><a href="<?php echo U('Index/index');?>" class="curoust_a">全部</a></dd>
                    <dd><?php echo getCategoryc($arr['id']);?></dd>
               
                </dl>
            </li>
            <?php endforeach;?>
        <?php endif;?>


       	  
        </ul>
  </div>
  <div class="sto_con_bot">
    	<div class="sto_con_bot_top">
        	<div class="sto_bot_left">
            	<dl class="sto_bot_left_dl">
               
                	<dt>商品</dt> 
                  <!--
                    <h3>商品展示</h3> -->
                  
                    
                    <dd><a class="news" href="<?php echo U('Index/index',array('goods_id'=>$category_id,'new'=>1));?>">最新</a></dd>

                    <dd><a class="moneys" href="<?php echo U('Index/index',array('goods_id'=>$category_id,'money'=>1));?>">价格</a></dd>
                    
                    <dd><a class="people" href="<?php echo U('Index/index',array('goods_id'=>$category_id,'shu'=>1));?>">人气</a></dd> 
                </dl>
                
              <ul class="sto_bot_left_ul">
                	<li>
                    <input class="yaya" name="" type="checkbox" value="0" class="sto_bot_text" onclick="tejia()" value="" />
                    <p>特价</p>
                    </li>
                	<li><input class="chacha" onclick="yishou()" name="" type="checkbox" value="0" class="sto_bot_text"  value="" /><p>已售</p></li>
                </ul> 

          </div>
          <div class="sto_bot_right">
           	<dl class="sto_bot_right_dl">
            <!--
                    <div id="page">
                    <?php echo $page?>
                    </div> -->
                    
                </dl>
          </div>
        </div>
    </div>
    <div class="sto_content_show">
    	<ul class="sto_con_show_ul">
         <?php if(!empty($lost)):?>
            <?php foreach($lost as $val):?>
                <div onclick="shu(<?php echo $val['id']?>)">
        	<li>
            	<a  href="<?php echo U('index/xgoods',array('id'=>$val['id']));?>" class="sto_a1">
                    <img id="lli" class="wocha" style="height:230px;width:230px;" src="/sms/Uploads/<?php echo reurl(getonepicture($val['id']));?>" />
                    </a>
                <a href="#" class="sto_a2"><?php echo $val['name']?><br><?php echo $val['money']?>元</a>


			</li>
            </div>
            <?php endforeach;?>
        <?php endif;?>
        	
        </ul>
    </div>
    <div class="sto_bot_pages">
        
        
    	<div class="sto_pages_div">
        <!--
        	<p>总计<span>51</span>个记录，共<span>3</span>页</p> -->

               <div id="page">
              <?php echo $page;?>
              </div>
               <script type="text/javascript">
                var aleng = $('#page a').length;
                var current = $('#page .current').html();
                $('#page .end').html('最后一页');
                var first = $('#page .first').html();
                if(first && current>=7){
                  $('#page .first').html(1);
                  if(current>7){
                    $('#page .first').after('<b>...</b>');
                  }
                  
                }
             
              </script>


            <!--
            <dl class="sto_pages_dl">
                <dd><a href="#">1</a></dd>
                <dd><a href="#">2</a></dd>
                <dd><a href="#">3</a></dd>
                <dd><a href="#">&gt;&gt;</a></dd>
                <dd><a href="#">尾页</a></dd>
            </dl> -->
        </div>
    </div>
</div>
</div>




<div class="help_bottom">
    

    <div class="new_eff" style="overflow:hidden;" >
      <div class="help_bot_left">
        <strong>400-082-1688</strong>
        <p>（周一至周日）服务时间：10:00- 22:00</p>
        <a target="_blank" href="http://weibo.com/boruntang/profile?rightmod=1&wvr=5&mod=personinfo"><img src="/sms/Public/imgaes/help1.png" /></a>

        <!--  腾讯微博我先注释
        <a href="#"><img src="/sms/Public/imgaes/help2.png" /></a> -->
    </div>
    <!--底部中间-->
     <div class="help_bot_cen">
      <div class="help_bot_cen_ul">
            <p>购物指南</p>
            <ul>
                <li><a target="_blank" href="<?php echo U('User/zhuceil');?>">注册用户</a></li>
                <!--
                <li><a href="#">购买流程</a></li> -->
            </ul>
        </div>
        
        <div class="help_bot_cen_ul">
            <p>支付配送</p>
            <ul>
                <li><a target="_blank" href="<?php echo U('User/zhifuf');?>">支付方式</a></li>
                <li><a target="_blank" href="<?php echo U('User/wangszhuan');?>">网上转账</a></li>
                <li><a target="_blank" href="<?php echo U('User/prrrr');?>">配送流程</a></li>
            </ul>
        </div>
        
        <div class="help_bot_cen_ul">
            <p>售后与服务</p>
            <ul>
                <li><a target="_blank" href="<?php echo U('User/tuihuol');?>">退换货流程</a></li>
                <li><a target="_blank" href="<?php echo U('User/shouhou');?>">售后服务保证</a></li>
                <li><a target="_blank" href="<?php echo U('User/bais');?>">免费服务及赠送</a></li>
                <li><a target="_blank" href="<?php echo U('User/pinz');?>">品质保证</a></li>
            </ul>
        </div>
        
        <div class="help_bot_cen_ul">
            <p>关于我们</p>
            <ul>       
                <li><a target="_blank"  href="<?php echo U('User/jieshao');?>">博润堂介绍</a></li>
                <li><a target="_blank"  href="<?php echo U('User/licheng');?>">博润堂历程</a></li>
                <li><a  target="_blank" href="<?php echo U('User/zhanting');?>">博润堂展厅</a></li>
                <li><a  target="_blank" href="<?php echo U('Brt/zxns');?>">诚聘贤才</a></li>
                <li><a target="_blank" href="<?php echo U('Cont/index');?>">联系我们</a></li>
                <li><a target="_blank" href="<?php echo U('User/zhuceil');?>">帮助中心</a></li>
            </ul>
        </div>
    </div>
    <!--底部右边-->
  <div class="help_bot_right">
        <strong>博润堂微信二维码</strong>
        <a href="#"><img style="height:113px; width:113px;" src="/sms/Public/imgaes/rccc.jpg" /></a>
        <p>微信号：boruntang</p>
    </div>


      
      
    </div>




</div>
<!--底部-->
<div class="footer">
 
</div>

<div class="bottom2">
    <div class="new_eff" style="overflow:hidden;">
        <div class="bot2_ul" >
            <ul>
                <li><a href="<?php echo U('Index/index');?>">返回首页&nbsp;&nbsp;|</a></li>
                <li><a href="<?php echo U('User/falv');?>">法律声明&nbsp;&nbsp;|</a></li>
                <li><a href="<?php echo U('Index/cont');?>">联系我们&nbsp;&nbsp;|</a></li>
            </ul>
        </div>
        <p class="bot2_p">版权所有 © 博润堂 www.boruntang.com</p>
    </div>
</div>

                   <style>

                    .wocaonii{
                          position: absolute;
                          width:100px;
                          height:100px;
                          left:-101px;
                          top:-1px;
                          display: none;
                        
                      } 
                    .lli{

                      display: block;
                    }


                    </style>
                        
                    <script>

                       function kki(obj){
                      
                        $('.wocaonii').addClass("lli");
                        $('#lli1').attr('src',$(obj).attr('src'));
                       
                      }


                      function uud(){

                             $('.wocaonii').removeClass("lli");

                      }
   
                    </script>

                    <!--QQFloat-->

<div class="right_abs  demo" id="">
    <ul class="right_abs_ul">
        <li>

            <div class="wocaonii">
                               
              <img  id="lli1" src=""  style="width:100px;height:100px;">
                      
            </div>
            <p class="abs_ul_p1"><img onmouseOut="uud()"  onmousemove="kki(this)" style="height:46px; width:46px; cursor:pointer;" src="/sms/Public/imgaes/rccc.jpg" /></p>
            <p class="abs_ul_p2">扫码关注</p>
        </li>
        <li>
            <p class="abs_ul_p3">
            <!--
            <img src="/sms/Public/imgaes/store_11.jpg" /> -->

            <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=zhangxg66881688&site=cntaobao&s=1&charset=utf-8" ><img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid=331363625&site=cntaobao&s=2&charset=utf-8" alt="点击这里给我发消息" /></a>




            </p>


            <p class="abs_ul_p4">
                <a target="_blank" href="http://www.taobao.com/webww/?ver=1&&touid=cntaobao%E5%8D%9A%E6%B6%A6%E5%A0%82%E9%BB%84%E6%9D%A8%E6%B4%AA&siteid=cntaobao&status=2&portalId=&gid=&itemsId="><input name="" type="image" src="/sms/Public/imgaes/store_15.jpg" /></a>
            </p>
        </li>
        <li>
            <p class="abs_ul_p3">
            <!--
            <img src="/sms/Public/imgaes/store_19.jpg" /> -->
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=417088684&site=qq&menu=yes"><img border="0" src="/sms/Public/imgaes/store_19.jpg" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>

            </p>
            <p class="abs_ul_p4"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=417088684&site=qq&menu=yes">QQ咨询</a></p>
        </li>
        <li>
            <p class="abs_ul_p3" onclick="pageScroll()"><img src="/sms/Public/imgaes/store_23.jpg" /></p>
        </li>
    </ul>
</div>

</body>
</html>