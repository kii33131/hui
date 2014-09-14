<?php
namespace Home\Controller;
use Think\Controller;
class VomController extends Controller {
    public function index(){
      layout('Layout/new4layout');
    	//layout(false); // 临时关闭当前模板的布局功能
    	$this->display('vomiting');

    }
}