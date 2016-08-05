<?php
/**
 * 文件名：LoginController.class.php
 * 作者: Min
 * 日期时间: 2016/8/5  1:12
 * 描述：登陆控制器
 */
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
    //首页显示模板
    public function index(){

        $this->display();
    }
    //登陆操作
    public function Login(){
        if(!IS_POST) $this->error('请先登陆',U('Login/index'));
        // Get输入的账号和密码
        $account = $_POST['account'];
//        $account = "admin";
        $password = $_POST['password'];
//        $password = "2";
        $AfterMd5 = base64_encode(md5($password, true));
        $User = D('UserView')->where("account= '%s' and pwd= '%s'",array($account,$AfterMd5))->select();
        if(isset($User)){
            // 设置session
            $_SESSION['userId']=$User[0]['id'];
            $_SESSION['userName']=$User[0]['userName'];
            $_SESSION["postId"] = $User[0]['postId'];
            $_SESSION["postName"] = $User[0]['postName'];
            $_SESSION["orgId"] = $User[0]['orgId'];
            $_SESSION["orgName"] = $User[0]['orgName'];
            $this->redirect('index/index');
        }
    }

}

