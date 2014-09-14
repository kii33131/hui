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
<script src="/sms/Public/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="/sms/Public/js/jquery.jqzoom.min.js" type="text/javascript"></script>

<!--11-->

<script>
    $(function(){
        var goodsid = $('.goodsid').val();
     
        $('.dianji').click(function(){

            var content = $('.pinglun_text').val();

            var code = $('.p_btn_text').val();

            $.post('/sms/index.php/Home/Index/pinlun',{'goodsid':goodsid,'content':content,'code':code},function(date){

                    alert(date);


            })

        })



        $(".deat_li").toggle(function(){

            $(this).siblings(".deat_dl").show();
            $(this).find("p").addClass("cur")
            },function(){
                $(this).find("p").removeClass("cur")
                $(this).siblings(".deat_dl").hide();
                })

        $(".xingqu_top_ul ul li").click(function(){
                var index=$(this).index();
                $(".xingqu_ul2").eq(index).show().siblings().hide();
                })  


        

    })

                  
        function kk(obj){

                                
            $('#lli').attr('src',$(obj).attr('src'));
                                
            $('#lli').attr('jqimg',$(obj).attr('rel'));
                               
                                
        }                    
                            





</script>



<script type="text/javascript">
$(document).ready(function() {
	jQuery.jqtab = function(tabtit,tab_conbox,shijian) {
		$(tab_conbox).find("li").hide();
		$(tabtit).find("li:first").addClass("thistab").show(); 
		$(tab_conbox).find("li:first").show();
	
		$(tabtit).find("li").bind(shijian,function(){
		  $(this).addClass("thistab").siblings("li").removeClass("thistab"); 
			var activeindex = $(tabtit).find("li").index(this);
			$(tab_conbox).children().eq(activeindex).show().siblings().hide();
			return false;
		});
	
	};
	/*调用方法如下：*/
	$.jqtab("#tabs","#tab_conbox","click");
	$.jqtab("#tabp","#xingqu_ul2","mouseenter");
	//$.jqtab("#tabs2","#tab_conbox2","mouseenter");
	
});
</script>


<script type="text/javascript">
$(function(){

    //alert("ds");
     $(".tabs  li").eq(0).addClass("li_hover")
    $('.tabs').click(function(){

        $(this).addClass("li_hover").siblings().removeClass("li_hover")
    })


})
    

</script>




<style>
    .bbc{

        margin-top: 15px;
    }

</style>



<script type="text/javascript">

$(function() {



        $(document).ready(function(){   
    $(".jqzoom").jqueryzoom({   
        xzoom: 400, //设置放大 DIV 长度（默认为 200）   
        yzoom: 400, //设置放大 DIV 高度（默认为 200）   
        offset: 10, //设置放大 DIV 偏移（默认为 10）   
        position: "right", //设置放大 DIV 的位置（默认为右边）   
         preload:1,   
        lens:false  
    });   
    });   
    
});
</script>



<div class="effective_div">
    <div class="sto_detail_content">
    	<div class="sto_det_top">
        	<ul>
            	<li><a href="<?php echo U('Index/index');?>">首页&gt;</a></li>
                <li><a href="#"><?php echo $list['name']?></a></li>
              
            </ul>
        </div>

        <div class="sto_dte_con_show">
        	<div class="detail_con_show_left">
                
             <h3>相关藏品</h3>
                <ul>

                <?php if(!empty($xincang)):?>
                    <?php foreach($xincang as $cang):?>
                    
                    <li>
                        <div class="deat_li">
                            <p><?php echo $cang['shu'];?></p>
                            <span><?php echo $cang['name'];?></span>
                        </div>
                        <dl class="deat_dl">
                        <a href="<?php echo U('Index/xgoods',array('id'=>$cang['id']));?>">
                            <dt><img style="height:61px;width:61px;" src="/sms/Uploads/<?php echo getonepicture($cang['id']);?>" /></dt>
                            <dd>
                        </a>    
                                <p>编号：<?php echo $cang['bianhao'];?></p>
                                <strong><?php echo $cang['money'];?></strong>
                            </dd>
                        </dl>
                    </li>


                   <?php endforeach;?>
               <?php endif;?>


                </ul>
            </div>




            <div class="deatil_con_right">
            	<div class="detail_con_top">

                   
                    <div class="det_con_top_left">
                        <div class="detail_top_left_changes">
                            <div class="detail_imgs_l ShowPictureBox">

                           

                            <div  class="jqzoom">  
                                    <img id="lli" style="height:443px;width:443px;" src="/sms/Uploads/<?php echo reurr(getonepicture($list['id'])) ?>" jqimg="/Uploads/<?php echo dadada(getonepicture($list['id'])) ?>"/>  
                             </div>  

                           

                            </div>

                            <!--
                             <div id="ShowBigPictureBox" class="ShowBigPictureBox" style=" position:absolute; top:287px; left:750px; overflow:hidden; display:none; border:3px solid #ccc; padding:5px; background-repeat:no-repeat; background-color:#fff; width:443px; height:443px;">
        
                             </div> -->


                        </div>
                        <ul class="detail_changes_ul tb-thumb"  id="thumblist">

                            <?php if(!empty($images)):?>
                                 <?php foreach($images as $cao):?>
                            
                            <li class="tb-selected">
                             <a href="#">       
                            <img style="height:99px;width:99px;"   onmousemove="kk(this)" src="/sms/Uploads/<?php echo dadada($cao['filename']); ?>"   rel="/sms/Uploads/<?php echo dadada($cao['filename']); ?>"  />
                            </a>



                            </li>
                              
                                <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </div>









                    <div class="det_con_top_right">
                    	<strong><?php echo $list['name']?></strong>
                        <p>商品编号：<?php echo $list['bianhao']?></p>



                        <div class="detail_table">
                        	<table width="555" cellpadding="0" cellspacing="0">
                            	<tr>
                                	<td width="255"><span>重量：</span><span><?php echo $list['weight']?>克</span></td>
                                	<td width="300"><span>颜色：<?php echo $list['color']?></span></td>
                                </tr>
                                <tr>
                                	<td width="255"><span>皮色：</span><span><?php echo $list['pise']?></span></td>
                                	<td width="300"><span>产地：</span><span><?php echo $list['place']?></span></td>
                                </tr>
                                <tr>
                                	<td width="255"><span>题材：</span><span><?php echo $list['ticai']?></span></td>
                                	<td width="300"><span>尺寸：</span><span><?php echo $list['bigger']?></span></td>
                                </tr>
                            </table>
                        </div>



                        <div class="detail_table2">
                        	<table width="578" cellpadding="0" cellspacing="0">
                            	<tr>
                                	<td width="578">
                                    	<span class="span1_deatail">库存：<?php echo $list['stock']?>块</span></p>
                                        <span>点击：<?php echo $list['shu']?></span>
                                    </td>
                                </tr>
                                <tr>
                                	<td><span>市场价：￥<?php echo $list['smoney']?></span></td>
                                </tr>
                                <tr>
                                	<td><strong>全国统一价：<span>￥<?php echo $list['money']?></span></strong></td>
                                </tr>
                                <tr>
                                	<td>
                                        <span>商品所在地：</span>
                                        <span><input name="" type="text" value="<?php echo $list['splace']?>" class="span_text" /></span>
                                        <span>有货</span>		
                                    </td>
                                </tr>
                           
                                <tr>
                                	<td>
                                        <span class="span_img1"> <a href="<?php echo U('Shop/index',array('id'=>$list['id']));?>"><input name="" type="image" src="/sms/Public/imgaes/store_detail_20.jpg" /></a> </span>

                                        <span><a href="<?php echo U('Shop/index',array('id'=>$list['id']));?>"><input class="gowujia" name="" type="image" src="/sms/Public/imgaes/store_detail_23.jpg" /></a></span>
                                    </td>
                                </tr>
                            </table>
                        </div>



                        <div class="det_top_right_ul">
                        	<h3 class="detail_p1">赠送服务：</h3>
                            <ul>
                            	<li>精美礼盒包装</li>
                            	<li>权威签定证书</li>
                            	<li>终身免费保养</li>
                            </ul>
                        </div>

                        <div class="det_top_right_bot_ul">
                        	<h3 class="detail_p1">支付方式：</h3>
                        	<ul>
                            	<li><a href="#"><img src="/sms/Public/imgaes/store_detail_32.jpg" /></a></li>

                                <!--
                            	<li><a href="#"><img src="/sms/Public/imgaes/store_detail_34.jpg" /></a></li>
                            	<li><a href="#"><img src="/sms/Public/imgaes/store_detail_36.jpg" /></a></li>  -->
                            </ul>
                        </div>


                    </div>
                </div>
                


                <div class="deatil_con_bot">


                	<div class="dea_con_bot_top">
                    	<ul class="tabs" id="tabs">
                        	<li style="cursor:pointer;"  class="">商品详情</li>
                        	<li style="cursor:pointer;"  class="">网友评论（<?php echo count($pinlu)?>）</li>
                        	<li style="cursor:pointer;"  class="">信誉担保</li>
                        	<li style="cursor:pointer;"  class="">支付帮助</li>
                        	<li style="cursor:pointer;"  class="">服务条款</li>
                        	<li style="cursor:pointer;"  class="">配送信息</li>
                        </ul>
                    </div>

                    <!--联系我们-->
                 
					
					<!--什么-->
					<ul class="tab_conbox" id="tab_conbox">
				    <li style="display: none;" class="tab_con">

							                    <!--商品详情-->
                    <div class="shopping_con">
                    	<div class="tou_dea_top">
                    	  <p>商品详情</p>
                    	</div>
                        <div class="shopping_dea_con">
                                                      <table width="597">
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>商品状态</h5></td>
                                <td><p><?php if($list['status']==0){echo '正常';}else{ echo '下架';}?></p></td>
                              </tr>
                          
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>商品重量</h5></td>
                                <td><p><?php echo $list['weight']?>克</p></td>
                              </tr>
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>题材</h5></td>
                                <td><p><?php echo $list['ticai']?></p></td>
                              </tr>
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>颜色</h5></td>
                                <td><p><?php echo $list['color']?></p></td>
                              </tr>
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>尺寸</h5></td>
                                <td><p><?php echo $list['bigger']?></p></td>
                              </tr>
                         
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>存货地</h5></td>
                                <td><p><?php echo $list['splace']?></p></td>
                              </tr>
                   
                                <td width="90" bgcolor="#eeeeee"><h5>原料产地</h5></td>
                                <td><p><?php echo $list['place']?></p></td>
                              </tr>
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>瑕疵外伤</h5></td>
                                <td><p>无</p></td>
                              </tr>
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>商品包装</h5></td>
                                <td><p>精美包装</p></td>
                              </tr>
                              <tr>
                                <td width="90" bgcolor="#eeeeee"><h5>商品简介</h5></td>
                                <td><p class="td_p">尺寸：<?php echo $list['bigger']?><br />重量：<?php echo $list['weight']?>g</p></td>
                              </tr>
                            </table>
                        
                            <div class="shop_img">
                            <img style="height:338px;width:338px;" src="/sms /Uploads/<?php echo reurrrr(getonepicture($list['id']));?>" />

                            </div>
                        </div>

                        <div class="tou_dea_top bbc"><p>商品描述</p></div>
                       <div>
                           <?php echo $list['comment']?>

                       </div> 
                    </div>




                    <!--商品实拍-->

                    <div class="shop_ship">
                      <div class="tou_dea_top"><p>商品实拍</p></div>
                        <?php if(!empty($llls)):?>
                    <?php foreach($llls as $val):?>
                      <p class="shop_img_show"><img style="height:600px;width:1000px;" src="/sms/Uploads/<?php echo spai($val['filename']) ;?>" /></p>
                    <?php endforeach;?>

            <?php endif; ?>

                    

                    </div>
	
				        </li>
				            
				        <li style="display: none;" class="tab_con">
                            
                                        <!--网友评论-->
                    <div class="friends">
                      <div class="tou_dea_top"><p>网友评论</p></div>
                      <div class="fri_top_dl">
                          <dl>
                              <dt>查看评论</dt>
                                <dd>（共<?php echo count($pinlu)?>条评论）</dd>
                  
                            </dl>
                        </div>
                        <p class="sop_pinlun">

                            <?php if(!empty($pinlu)): ?>
                                <?php foreach($pinlu as $val):?>
                                <div><h4><?php  getname($val['user_id'])?></h4>
                                   <?php echo date('Y-m-d',$val['created'])?>

                             
                                </br>
                                 <h5><?php echo $val['content']?></h5>

                                </div>
                             <?php endforeach;?>           
                            <?php endif;?>                                                 

                           
                           
                        </p>
                   

                        <div class="shop_pages"><?php echo $page?></div>

                        <div class="shop_pinglun">
                          <div class="pinglun_con">
                              <p> 我要评论：</p>
                                <textarea name="content" cols="" rows="" class="pinglun_text"></textarea>
                            </div>
                            <input class="goodsid" type="hidden" value="<?php echo $list['id']?>">
                            <div class="pl_btn">
                              <p>验证码：</p>
                                <dl>
                                  <dt><input name="code" type="text" class="p_btn_text" /></dt>
                                    <dd><span>
                                    <img style="height:20px;width:70px;" src="<?php echo U('/Home/Verify/code');?>" id="codeClick" class="pass-verifyCode" onClick="this.src=this.src+'?'+Math.random()"></span>

                                    </dd>
                                </dl>
                                <div class="btn_pl"><input name="" class="dianji" type="image" src="/sms/Public/imgaes/store_detail_63.jpg" /></div>
                            </div>


                        </div>
                    </div>
                        
				        </li>
				    
				        <li style="display: list-item;" class="tab_con">
				        <img  src="/sms/Public/imgaes/xydb.jpg" />

						2223213

				        </li>
				    
				        <li style="display: none;" class="tab_con">
				        	765757657576757657575
				        </li>

				         <li style="display: none;" class="tab_con">
				        	111111111
				        </li>

				         <li style="display: none;" class="tab_con">
				        	2222222222
				        </li>
				    </ul>	

				                    <!--你可能感兴趣-->
                   
            <div class="xingqu">
                    	<div class="tou_dea_top"><p>你可能感兴趣</p></div>
                       
                    	<div class="xingqu_top_ul">
                          
                        	<ul class="tabp" id="tabp" >
                            	<li>浏览记录</li>
                            	<!--
                            	<li></li> -->
                            	<li>同类商品</li>
                            	<li>特价促销</li>
                            </ul>  
                        </div>  

         <div class="xingqu_dl">
                 
                    
              <ul class="xingqu_ul2" id="xingqu_ul2">

               <li style="display: none;" >

                 <?php if(!empty($cxincang)):?>
                    <?php foreach($cxincang as $xcang):?>

                                <div>
                                    <a href="<?php echo U('Index/xgoods',array('id'=>$xcang['id']));?>"><img style="height:159px;width:188px;" src="/sms/Uploads/<?php echo reurl(getonepicture($xcang['id']));?>" /></a>
                                    <a href="#" class="imga_a"><?php echo $xcang['name'] ?><br>¥<?php echo $xcang['money'] ?></a>
                               </div>

                            
                       <?php endforeach;?>  
                   <?php endif;?>
                    </li>


                    <li style="display: none;" >
                    
                <?php if(!empty($mama)):?>
                    <?php foreach($mama as $xcang):?>

                                <div>
                                    <a href="<?php echo U('Index/xgoods',array('id'=>$xcang['id']));?>"><img style="height:159px;width:188px;" src="/sms/Uploads/<?php echo reurl(getonepicture($xcang['id']));?>" /></a>
                                    <a href="#" class="imga_a"><?php echo $xcang['name'] ?><br>¥<?php echo $xcang['money'] ?></a>
                               </div>

                            
                       <?php endforeach;?>  
                   <?php endif;?>

                           
                    </li>


                                        <li style="display: none;" >
                    
                <?php if(!empty($mame)):?>
                    <?php foreach($mame as $xicang):?>

                                <div>
                                    <a href="<?php echo U('Index/xgoods',array('id'=>$xcang['id']));?>"><img style="height:159px;width:188px;" src="/sms/Uploads/<?php echo reurl(getonepicture($xicang['id']));?>" /></a>
                                    <a href="#" class="imga_a"><?php echo $xicang['name'] ?><br>¥<?php echo $xicang['money'] ?></a>
                               </div>

                            
                       <?php endforeach;?>  
                   <?php endif;?>

                           
                    </li>


                                        <li style="display: none;" >
                    
                <?php if(!empty($canjjg)):?>
                    <?php foreach($canjjg as $xcang):?>

                                <div>
                                    <a href="<?php echo U('Index/xgoods',array('id'=>$xcang['id']));?>"><img style="height:159px;width:188px;" src="/sms/Uploads/<?php echo getonepicture($xcang['id']);?>" /></a>
                                    <a href="#" class="imga_a"><?php echo $xcang['name'] ?><br>¥<?php echo $xcang['money'] ?></a>
                               </div>

                       <?php endforeach;?>  
                   <?php endif;?>

                           
                    </li>


                  </ul>            

                

      
            </div> 


        </div>			



					
     </div>




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