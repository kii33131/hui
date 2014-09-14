<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
       layout(false); // 临时关闭当前模板的布局功能

       $model =D('Goods');

       $list = $model->order('created DESC')->limit(1)->select();

       //var_dump($list);

       $this->assign('id',$list[0]['id']);

    	$this->display('Landed1');



    }
    //注销登陆
    public function zhu(){
    	session(null);
    	//$this->success('注销成功   ','/index.php/Home/Index/index');
        $this->redirect('Index/index');
    }

    //会员登陆

    public function login(){
    	$email = I('post.email');

    	$password = md5(I('post.password'));
    	$model = D('Vip');
    	$list = $model->where(array('email'=>$email))->select();

    	if(!$list){
    		$this->error('用户名错误');

    	}else{
    		//if()

    		
    		if($password != $list[0]['password']){

    			$this->error('密码错误');	

    		}

    	  $_SESSION['Home']['name'] =  $email;
          $_SESSION['Home']['id']  = $list[0]['id'];
         // $this->success('登陆成功','/index.php/Home/Index/index');

          $this->redirect('Index/index');


    	}






    }
}