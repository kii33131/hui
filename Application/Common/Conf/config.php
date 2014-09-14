<?php
return array(
    //'配置项'=>'配置值'
    'LAYOUT_ON'=>true,
    'LAYOUT_NAME'=>'layout',
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'boruntang', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'jiangxi123', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'xy_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    '__ROOT__'      =>__ROOT__,       // 当前网站地址
    //'DEFAULT_GROUP'         => 'Home',  // 默认分组
   //'DEFAULT_MODULE'        => 'Brt',
    'DEFAULT_CONTROLLER' => 'Index',

        //支付宝配置参数
    'alipay_config'=>array(
    'partner' =>'2088311896128700',   //这里是你在成功申请支付宝接口后获取到的PID；
    'key'=>'p4ir93rkxbzjwg9xlj2tmwfda41ah3s1',//这里是你在成功申请支付宝接口后获取到的Key
    'sign_type'=>strtoupper('MD5'),
    'input_charset'=> strtolower('utf-8'),
    'cacert'=> getcwd().'\\cacert.pem',
    'transport'=> 'http',
          ),
     //以上配置项，是从接口包中alipay.config.php 文件中复制过来，进行配置；
        
    'alipay'   =>array(
     //这里是卖家的支付宝账号，也就是你申请接口时注册的支付宝账号
    'seller_email'=>'qixiangwangluo@163.com',
    //这里是异步通知页面url，提交到项目的Pay控制器的notifyurl方法；
    'notify_url'=>'http://boruntang.gotoip3.com/index.php/Home/Pay/notifyurl', 
    //这里是页面跳转通知url，提交到项目的Pay控制器的returnurl方法；
    'return_url'=>'http://boruntang.gotoip3.com/index.php/Home/Pay/returnurl',
    //支付成功跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参payed（已支付列表）
    'successpage'=>'User/index',   
    //支付失败跳转到的页面，我这里跳转到项目的User控制器，myorder方法，并传参unpay（未支付列表）
    'errorpage'=>'User/index', 
    ),
);