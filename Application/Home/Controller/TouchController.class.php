<?php
namespace Home\Controller;
use Think\Controller;
class TouchController extends Controller {
    public function index(){
       layout('Layout/newlayout');
    	$this->display('touch');

    }
}