<?php
namespace Home\Controller;
use Think\Controller;
class DiziController extends Controller {
    public function index(){
       layout('Layout/new2layout');
    	$this->display('dizi');

    }
}