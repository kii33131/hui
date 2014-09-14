<?php
namespace Home\Controller;
use Think\Controller;
class VerifyController extends Controller{
  public function code(){
        $Verify = new \Think\Verify();
        $Verify->fontSize=19;
        $Verify->length=4;
        $Verify->imageH=42;
        $Verify->imageW=140;
        $Verify->useCurve = false;
        $Verify->fontttf = '4.ttf'; 
        $Verify->codeSet = '0123456789'; 
        $Verify->entry();
    }
}