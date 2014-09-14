<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link rel="shortcut icon" href="/sms/Public/imgaes/logo.ico" type="image/x-icon" />

<!--
<script type="text/javascript" src="/sms/Public/js/jquery.js"></script> -->
<script type="text/javascript" src="/sms/Public/js/jquery-1.8.0.min.js"></script>


<script type="text/javascript" src="/sms/Public/js/style.js"></script> 
<link rel="stylesheet" type="text/css" href="/sms/Public/css/public.css"/>
<link rel="stylesheet" type="text/css" href="/sms/Public/css/style.css"/>
</head>

<body>
<div  >
<!--头部-->
<div class="header">
    <a href="<?php echo U('Index/index');?>">
        <div class="header_left">

          <img src="/sms/Public/imgaes/logo.png" />

        </div>

    </a>
    <div class="daohang">
        <ul class="daohang_ul">
            <li>
                <a href="<?php echo U('Brt/index');?>" class="daohang_a">博润堂 </a>

                <dl class="daohang_dl">
                    <dd><a href="<?php echo U('Brt/qyjj');?>">企业简介</a></dd>
                    <dd><a href="<?php echo U('Brt/yjry');?>">业界荣誉</a></dd>
                    <dd><a href="<?php echo U('Brt/spxs');?>">视频欣赏</a></dd>
                   
                    <dd class="dl_last_a"><a href="<?php echo U('Brt/mass');?>">公益事业</a></dd> 
                </dl>
               
            </li>

             <li>
                <a href="<?php echo U('Index/index');?>" class="daohang_a">官方商城 </a>


               
            </li>

            <li>
                <a href="<?php echo U('Brt/qpsx');?>" class="daohang_a">精品赏析</a>

                <!--
                <dl class="daohang_dl">
                    <dd><a href="#">企业简介</a></dd>
                    <dd><a href="#">业界荣誉</a></dd>
                    <dd><a href="#">视频欣赏</a></dd>
                    <dd class="dl_last_a"><a href="#">公益事业</a></dd>
                </dl> -->
            </li>
            <li>
                <a href="<?php echo U('Brt/news');?>" class="daohang_a">最新资讯 </a>
                        <!-- daohang_dlio-->
                    <dl class="daohang_dl daohang_dlio ">
                    <dd><a href="<?php echo U('Brt/news',array('zhuan'=>1));?>">企业新闻</a></dd>
                    
                    <dd><a href="<?php echo U('Brt/news',array('zhuan'=>3));?>">媒体关注</a></dd>
                    <dd style="border:none;"><a  href="<?php echo U('Brt/news',array('zhuan'=>2));?>">藏品推荐</a></dd>
                   
               
                </dl>
                
            </li>
           
            <li>
                <a href="<?php echo U('Cont/index');?>" class="daohang_a">联系我们 </a>

                <style>
                    
                   

                        .daohang_dlio{
                    position:absolute; top:25px; left:0; min-width:237px; height:24px;background:#97824b; border-top:1px solid #fff;

                }
                
                .daohang_dlio dd a {
                    color: #FFFFFF;
                    display: block;
                    float: left;
                    font-size: 15px;
                    height: 17px;
                    line-height: 17px;
                    text-align: center;
                    width: 78px;
                }


                .daohang_dli{

                  


                 position:absolute; top:25px; left:0; min-width:157px; height:24px;background:#97824b; border-top:1px solid #fff;

                }
                
                
                .daohang_dli dd a {
                    color: #FFFFFF;
                    display: block;
                    float: left;
                    font-size: 15px;
                    height: 17px;
                    line-height: 17px;
                    text-align: center;
                    width: 78px;
                }
                </style>

                <!--daohang_dli-->

                <dl class="daohang_dl daohang_dli " />
                    <dd><a href="<?php echo U('Brt/zxns');?>">诚聘英才</a></dd>
                    <dd style="border:none;"><a href="<?php echo U('Cont/index');?>">公司地址</a></dd>
                    
                </dl>

            
            </li>

             <li>
                <a href="<?php echo U('Zshou/index');?>" class="daohang_a">证书查询 </a>

                
            </li>
         
        </ul>
    </div>

    <script>





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
         $('.wocaonii').addClass("lli");

    }


    function shubu6(){

         $('#cao4').attr('src','/sms/Public/imgaes/index_12.jpg');
         $('.wocaonii').removeClass("lli");
    }


    </script>
    <style>
        .wocaonii{

            position: absolute;
            width:100px;
            height:100px;
            
            display: none;              
                          
                        
             } 
                   
         .lli{

            display: block;
            }

     </style>


    <div class="header_right">
        <div class="header_right_top">
            <ul>
                <!--  -->
                <li><a target="_blank" href="http://boruntang.taobao.com/"><img id="cao" onmousemove="shubu()" src="/sms/Public/imgaes/index_06.jpg" onmouseout="shubu2()" /></a></li>
                <li><a target="_blank" href="http://weibo.com/boruntang/profile?rightmod=1&wvr=5&mod=personinfo"><img  id="cao3" onmousemove="shubu3()"  onmouseout="shubu4()"  src="/sms/Public/imgaes/index_08.jpg" /></a></li>
                <!--
                <li><a href="#"><img src="/sms/Public/imgaes/index_10.jpg" /></a></li>-->
                <li class="hea_right_lastli"><a href="#"><img id="cao4" onmousemove="shubu5()"  onmouseout="shubu6()" src="/sms/Public/imgaes/index_12.jpg" /></a></li>


            <div class="wocaonii">
                               
              <img  src="/sms/Public/imgaes/rccc.jpg"  style="width:100px;height:100px;">
                      
            </div>
            </ul>
        </div>

  

             
               

        <div class="header_right_bot">
        <form action="<?php echo U('Index/getgoods');?>" method="get">
            <div class="text_div">
                <input name="name" type="text" class="text" placeholder="输入商品名称">
                <input name="" type="image" class="image" src="/sms/Public/imgaes/index_19.jpg" />
            </div>
        </form>
        </div>
    </div>
</div>


<!--banner-->
<!--<div class="effective_div"><img src="/sms/Public/imgaes/index_24.jpg" /></div>-->
<div class="img_bg"><!--<img src="/sms/Public/imgaes/index_24.jpg" />--></div>
<!--内容-->
<div class="effective_div">
	<div class="content">
   	  <!--内容左边-->
        <div class="con_left">
            <div class="con_left_con">
                <a href="#">
                    <span>黄杨洪 中国海派玉雕大师，中国青年玉雕艺术家，上海玉雕大师，上海海派文化协会理事。</span>
                    1973年生于重庆，1995年开始从事玉雕，师承上海玉雕厂程广彦。2008年成立个人玉雕工作室——博润堂。他善于雕刻花鸟题材作品。造型讲究审美重点的突出及其逼真形态，常常通过适度的夸张营造视觉的冲击感，细节上追求线条的流畅、灵动，给人以 充满弹性的感觉；块面处理干净利落，繁简相宜，且注重线条和块面的完 基础上，灵活运用薄意雕、深浮雕、圆雕、镂雕等各种技法，丰富作品层次，营造深邃透视空间和艺 术意境。他的作品，俏丽新颖，有着“素”“雅”“静”的唯美气韵，既发扬了海派玉雕的传统精髓，又符合当 代审美志趣的走向，在业内备受青睐。
                    <span ><img src="/sms/Public/imgaes/index_04.jpg" /></span>
                </a>
            </div>
        </div>
      <!--内容中间-->
        <div class="con_cen"><img src="/sms/Public/imgaes/index_05.jpg" usemap="#Map" border="0" />
          <map name="Map" id="Map">
            <area shape="circle" coords="44,83,27" href="<?php echo U('index/index');?>" />
          </map>
        </div>
      <!--内容右边边-->
        <div class="con_right">
        	<div class="p_rel">
              <form action="<?php echo U('Zshou/index');?>" method="get">
              <!--
            	<img src="/sms/Public/imgaes/index_32.jpg" usemap="#Map2" border="0" />-->

              <input name="" type="image" src="/sms/Public/imgaes/index_32.jpg" />
              <!--
                <map name="Map2" id="Map2">
                  <area shape="rect" coords="75,86,144,110" href="#" />
                </map> -->
              <p class="p_abs"><input name="bianhao" type="text" class="p_text" value="" /></p>

              </form>


          </div>
            
        </div>
    </div>
</div>

<!--底部-->
<div class="bottom">
    <p>版权所有 © 博润堂 www.boruntang.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;全国统一销售热线：400 082 1688 </p>
</div>
</body>
</html>