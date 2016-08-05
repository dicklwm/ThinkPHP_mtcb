<?php
/**
 * 文件名：WorkflowController.class.php
 * 作者: Min
 * 日期时间: 2016/8/5  17:04
 * 描述：
 */

namespace Home\Controller;

use Think\Controller;

class WorkflowController extends CommonController{

    public function index(){
        $this->display('unfinishedTask');
    }
    public function leaveTask(){
        $this->display('leaveTask');
    }
}