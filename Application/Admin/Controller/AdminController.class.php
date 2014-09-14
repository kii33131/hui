<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.9lu.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Lewis
// +----------------------------------------------------------------------
// | 后台公共控制器 
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
 
class AdminController extends Controller {

    /**
     * 后台控制器初始化
     */
    protected function _initialize(){
        // 获取当前用户ID
       
        if(!isset($_SESSION['admin']['name'])){// 还没登录 跳转到登录页面
            $this->redirect('Login/index');
        
        }

       
    }



}
