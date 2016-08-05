<?php
/**
 * 文件名：NewsController.class.php
 * 作者: Min
 * 日期时间: 2016/8/5  16:30
 * 描述：消息的控制器
 */

namespace Home\Controller;

use Think\Controller;

class NewsController extends CommonController {

    public function index() {
        $this->display('lookNews');
    }
    public function create(){
        $this->display('createNew');
    }
}