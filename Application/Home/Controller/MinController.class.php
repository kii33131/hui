<?php
namespace Home\Controller;
use Think\Controller;
class MinController extends Controller {
    public function index(){
       layout('Layout/newlayout');
    	$this->display('minutetravels');

    }
}