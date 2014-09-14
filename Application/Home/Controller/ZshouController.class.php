<?php
namespace Home\Controller;
use Think\Controller;
class ZshouController extends Controller {
    public function index(){
       layout('Layout/newlayout');

        	$bianhao = I('get.bianhao');
        	$model=D('Zhens');
        	$list = $model->where(array('bianhao'=>$bianhao))->select();
        	if($list){
        		//echo '<pre>';
        		//print_r($list);exit;

        		$this->assign('list',$list[0]);

        		$this->display('Certificate');
        	}else{

        		//Certificate_no

        		$this->display('Certificate_no');
        	
        	}



         	//var_dump($bianhao);exit;

    	

    }
}