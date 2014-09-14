<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博润堂--登录</title>
<link rel="stylesheet" type="text/css" href="/sms/Public/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/sms/Public/css/public.css"/>
<script type="text/javascript" src="/sms/Public/js/jquery.js"></script>
<script type="text/javascript" src="/sms/Public/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="/sms/Public/js/style.js"></script>

</head>
<body>
<!--头部-->
<div class="help_header">
  <div class="effective_div">
    	<div class="lan_logo">
         <a href="<?php echo U('Index/index');?>">   
        <img src="/sms/Public/imgaes/logo.png" />
        </a>

        </div>
        <div class="lan_hea_right">
        	<div class="tel"><img src="/sms/Public/imgaes/tel.png" /></div>
            <div class="tel_right">
            	<p>全国统一销售热线：</p>
                <strong>400-082-1688</strong>
            </div>
        </div>
  </div>
</div>
<!--内容区域-->
<!--内容区域-->
<div class="landed_content">
	<div class="effective_div">
    	<div class="landed1_con_left">	
            <ul class="landed1_ul">


              <img id="lli" class="wocha" style="height:370px;width:370px;" src="/sms/Uploads/<?php echo reurr(getonepicture($id));?>" />

            <!--
                <li>
                    <dl>
                        <dt><img src="/sms/Public/imgaes/Landed1_03.jpg" /></dt>
                        <dd>
                            <strong>100%和田玉</strong>
                            <p>100%和田玉</p>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><img src="/sms/Public/imgaes/Landed1_03.jpg" /></dt>
                        <dd>
                            <strong>满200万全国送货上</strong>
                            <p>满200万全国送货上</p>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><img src="/sms/Public/imgaes/Landed1_03.jpg" /></dt>
                        <dd>
                            <strong>7天无理由退换货</strong>
                            <p>7天无理由退换货</p>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><img src="/sms/Public/imgaes/Landed1_03.jpg" /></dt>
                        <dd>
                            <strong>专属定制服务</strong>
                            <p>专属定制服务</p>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><img src="/sms/Public/imgaes/Landed1_03.jpg" /></dt>
                        <dd>
                            <strong>金牌客服1对1服务</strong>
                            <p>金牌客服1对1服务</p>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt><img src="/sms/Public/imgaes/Landed1_03.jpg" /></dt>
                        <dd>
                            <strong>终身免费保养</strong>
                            <p>终身免费保养</p>
                        </dd>
                    </dl>
                </li> -->
            </ul>
        </div>
        <div class="lan_con_right">
            <div class="lan_right_con">
                <div class="lan_con_right_top">登录博润堂</div>

                <form action="<?php echo U('Login/login');?>" method="post">
                <div class="table">
                    <table width="338">
                        <tr>
                            <td width="55">登录名</td>
                            <td width="225"><input type="text" name="email"  class="td_text" value="" /></td>
                        </tr>
                        <tr>
                            <td>密码</td>
                            <td><input type="password" name="password"   class="td_text" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><input name="" type="image" src="/sms/Public/imgaes/login.png" /></p>
                                <a href="#">忘记了密码？</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="lan_con_bot">
                    <p class="lan_bot_p">
                        <span>还不是博润堂会员？</span>
                        <a href="<?php echo U('Reg/index');?>">马上注册</a>
                    </p>
                    <!--
                    <div class="lan_bot_div">
                        <p>使用合作网站帐号登录</p>
                        <a href="#"><img src="/sms/Public/imgaes/Landed_19.jpg" />QQ</a>
                        <a href="#"><img src="/sms/Public/imgaes/Landed_21.jpg" />腾讯微博</a>
                        <a href="#"><img src="/sms/Public/imgaes/Landed_23.jpg" />百度</a>
                        <a href="#"><img src="/sms/Public/imgaes/Landed_33.jpg" />新浪微博</a>
                        <a href="#"><img src="/sms/Public/imgaes/Landed_29.jpg" />开心网</a>
                    </div> -->
                </div>
                </form>
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
    <div class="new_eff" style=" overflow:hidden;">
        <ul class="footer_ul">
            <li>
                <dl class="footer_dl first-child">
                    <dt><img src="/sms/Public/imgaes/help_15.jpg" /></dt>
                    <dd>免费配证书</dd>
                </dl>
            </li>
            <li>
                <dl class="footer_dl">
                    <dt><img src="/sms/Public/imgaes/help_17.jpg" /></dt>
                    <dd>7天无理由退换</dd>
                </dl>
            </li>
            <li>
                <dl class="footer_dl">
                    <dt><img src="/sms/Public/imgaes/help_19.jpg" /></dt>
                    <dd>终身保养</dd>
                </dl>
            </li>
            <li>
                <dl class="footer_dl">
                    <dt><img src="/sms/Public/imgaes/help_21.jpg" /></dt>
                    <dd>赠送配绳</dd>
                </dl>
            </li>
            <li>
                <dl class="footer_dl">
                    <dt><img src="/sms/Public/imgaes/help_23.jpg" /></dt>
                    <dd>赠送锦盒</dd>
                </dl>
            </li>
            <li class="foter_last_li">
                <dl class="footer_dl">
                    <dt><img src="/sms/Public/imgaes/help_25.jpg" /></dt>
                    <dd>全国免运费</dd>
                </dl>
            </li>
        </ul>
    </div>
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

                
</body>
</html>