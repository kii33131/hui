<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: huajie <banhuajie@163.com>
// +----------------------------------------------------------------------

namespace Home\Model; 
use Think\Model;

/**
 * 用户模型
 * @author huajie <banhuajie@163.com>
 */

class VipModel extends Model {

     protected $_validate = array(
        
        array('phone', '/^1(2|3|4|6|7|8|5)\d{9}$/', '请填写正确的手机号码', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        // array('phone','','手机号码已存在',0,'unique',1),
        array('email','','邮箱已存在',0,'unique',1), // 在新增的时候验证name字段是否唯一
        array('email', '/^[^\.@]+@[^\.@]+\.[a-z]+$/', '请使用正确的邮箱', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        
        array('password', '/^[a-zA-Z0-9]\w{6,10}$/', '密码格式不对', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        /*
        array('repassword','password','确认密码不正确',0,'confirm'), */ 
        );


}
