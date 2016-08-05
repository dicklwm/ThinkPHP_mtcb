<?php
/**
 * 文件名：CommonController.class.php
 * 作者: Min
 * 日期时间: 2016/8/5  1:29
 * 描述：
 */

namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{

    public function _initialize() {
        if(!isset($_SESSION['userId'])){
            $this->error('请先登陆',U('Login/index'));
        }
    }

}