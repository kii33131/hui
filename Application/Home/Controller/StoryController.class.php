<?php
namespace Home\Controller;
use Think\Controller;
class StoryController extends Controller {
    public function index(){
       layout('Layout/new3layout');
    	$this->display('story');

    }
}