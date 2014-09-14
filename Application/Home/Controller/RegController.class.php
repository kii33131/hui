<?php
namespace Home\Controller;
use Think\Controller;
class RegController extends Controller {
    public function index(){
      	layout(false); // 临时关闭当前模板的布局功能

    	$this->display('reg');

    }


    public function regs(){

      //var_dump('dsds');exit;
      
       $data['email'] =I('post.email');
       $data['phone'] = I('post.phone');
       $data['password'] = md5(I('post.password'));
      $data['repassword'] = md5(I('post.repassword'));
       $data['created'] = time();
       $data['modified'] = time();
       $model = D('Vip');
      
      

    
       if(!$model->create()){
       	//exit($model->getError());
       	$this->error($model->getError());

       }else{
        $ids=$model->add($data);
        if($ids){
          //
          $_SESSION['Home']['name'] =  $data['email'];
          $_SESSION['Home']['id']  = $ids;
          //$this->success('注册成功');

          $this->redirect('Index/index');


        }else{

          $this->error('注册失败');
        }
       } 
    }


}