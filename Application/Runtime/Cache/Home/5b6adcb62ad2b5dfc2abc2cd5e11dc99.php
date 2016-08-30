<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <title>铭泰船舶移动端</title>
    <link rel = "stylesheet" href = "/ThinkPHP_mtcb/Public/css/bootstrap.min.css">
    <script src = "/ThinkPHP_mtcb/Public/js/jquery-1.12.3.min.js"></script>
    <script src = "/ThinkPHP_mtcb/Public/js/bootstrap.min.js"></script>
    <!-- 自适应移动端 -->
    <meta name = "viewport" content = "width=device-width,initial-scale=1,user-scalable=0">
    <style>
        body {
            padding-top: 70px; /*有顶部固定导航条时设置*/
            padding-bottom: 70px; /*有底部固定导航条时设置*/
        }
    </style>
<link rel = "stylesheet" href = "/ThinkPHP_mtcb/Public/css/LoginStyle.css">
</head>

<body class="login-body">
<div class="container">

    <form class="form-signin" action="<?php echo U('Login/Login');?>" method="post">
        <h2 class="form-signin-heading">铭泰移动端系统登录</h2>
        <div>
            <input type="text" class="form-control" name="account" placeholder="用户名" autofocus id="account">
            <input type="password" name="password" class="form-control" placeholder="密码" id="password">
            <button class="btn btn-lg btn-info btn-block" type="submit" >登录</button>
        </div>
    </form>
</div>
</body>
</html>