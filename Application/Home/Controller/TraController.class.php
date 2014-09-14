<?php
namespace Home\Controller;
use Think\Controller;
class TraController extends Controller {
    public function index(){
      layout('Layout/tralayout');
    	//layout(false); // 临时关闭当前模板的布局功能
    	$this->display('travelsbox');

    }



     public function news(){
      layout('Layout/tralayout');
    	//layout(false); // 临时关闭当前模板的布局功能
    	$this->display('newstory');

    }



}