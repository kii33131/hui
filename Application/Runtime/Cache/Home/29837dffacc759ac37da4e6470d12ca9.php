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
	<style>
    .wocao{
        width:20px;

    }
    </style>

    <script>
    function jian(i){
        var num = -1;
        $.get('/sms/index.php/Home/Shop/index',{'num':num,'ids':i},function(data){

            history.go(0)

        })

    }

    function jia(i){
        var num = 1;

         $.get('/sms/index.php/Home/Shop/index',{'num':num,'ids':i},function(data){

            history.go(0)

        })


    }
    </script>
    <div class="cart_content">
    	<div class="car_con_top">
        	<div class="car_con_top_left">我的购物车</div>
        	<div class="car_con_top_right"><img src="/sms/Public/imgaes/Cart_06.jpg" /></div>
        </div>
        <div class="car_con_bot">
        	<table width="1045" cellpadding="0" cellspacing="0">
            	<tr>
                	
                	<th width="100">商品</th>
                	<th width="276">名称</th>
                	<th width="112">单价（元）</th>
                	<th width="112">数量</th>
                	<th width="137">小计（元）</th>
                	<th width="136">操作</th>
                </tr>
                <?php if(!empty($cookies)):?>

                    <?php foreach($cookies as $arr):?>
                <tr>
                	
                	<td><img style="height:58px;width:65px;" src="/sms/Uploads/<?php echo getonepicture($arr['id']);?>" /></td>
                	<td><?php echo $arr['name']?></td>
                	<td>￥<?php echo $arr['money']?>元</td>
                	<td><?php echo $arr['num']?></td>
                	<td>￥<?php echo $arr['num']*$arr['money'] ; ?>元</td>
                	<td>
                    	<!--<h1>删除</h1>
                	  	<h1>放入收藏夹</h1>-->
                        <span><a href="<?php echo U('Shop/index',array('ids'=>$arr['id'],'num'=>-1));?>">-</a><input class="wocao" readonly  name="num" type="text" value="<?php echo $arr['num']?>" class="span_text" /><a href="<?php echo U('Shop/index',array('ids'=>$arr['id'],'num'=>1));?>">+</a></span>
                        <a href="<?php echo U('Shop/shanchu',array('id'=>$arr['id']));?>">删除</a>
                    </td>

                </tr>
            <?php endforeach;?>
            <?php endif;?>

            </table>
        </div>
        <div class="cart_bottom">
        	<p class="cart_bot_p1">
            	比市场价<span>￥<?php echo $num1?>元</span>节省了<span>￥<?php echo $cha?>元</span>
            </p>
            <strong>商品总金额：<span>￥<?php echo $num?>元</span></strong>
            <p class="cart_bot_p2">
            	<span><a href="<?php echo U('index/index');?>"><input name="" type="image" src="/sms/Public/imgaes/Cart_11.jpg" /></a></span>
            	<span><a href="<?php echo U('Shop/jiesuan');?>"><input name="" type="image" src="/sms/Public/imgaes/Cart_13.jpg" /></a></span>
            </p>
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