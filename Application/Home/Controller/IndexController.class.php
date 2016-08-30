<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {
    public function index() {
//        $this->display();
        $URL = "http://www.mitarl.com:8084/module-operation!executeOperation?operation=Form&componentCode=hr_mt_mb_login&windowCode=mt_mb_login";
        header("Location:" . $URL);
    }
}
