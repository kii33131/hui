<?php
namespace Home\Controller;
use Think\Controller;
class ContController extends Controller {
    public function index(){
       layout('Layout/newlayout');
    	$this->display('touch');

    }
}