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
</head>
<body>
<nav class = "navbar navbar-default navbar-fixed-top" role = "navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class = "navbar-header">
        <button type = "button" class = "navbar-toggle" data-toggle = "collapse" data-target = "#mtcb-navbar">
            <span class = "sr-only">Toggle navigation</span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
            <span class = "icon-bar"></span>
        </button>

        <a class = "navbar-brand" href = "#"><strong>铭泰移动端系统</strong></a>
    </div>

    <div class = "collapse navbar-collapse" id = "mtcb-navbar">
        <ul class = "nav navbar-nav">
            <li><a class = "glyphicon glyphicon-home" href = "<?php echo U('index/index');?>">首页</a></li>
            <li class = "dropdown">
                <a href = "#" class = "dropdown-toggle " data-toggle = "dropdown">消息管理<b class = "caret"></b></a>
                <ul class = "dropdown-menu">
                    <li><a href = "<?php echo U('News/index');?>">查看消息</a></li>
                    <li><a href = "<?php echo U('News/create');?>">发送消息</a></li>
                </ul>
            </li>
            <li class = "dropdown">
                <a href = "#" class = "dropdown-toggle " data-toggle = "dropdown">公告管理<b class = "caret"></b></a>
                <ul class = "dropdown-menu">
                    <li><a href = "#">查看公告</a></li>
                    <li><a href = "#">发送公告</a></li>
                </ul>
            </li>
            <li class = "dropdown">
                <a href = "#" class = "dropdown-toggle " data-toggle = "dropdown">流程管理 <b class = "caret"></b></a>
                <ul class = "dropdown-menu">
                    <li><a href = "<?php echo U('Workflow/index');?>">待办任务</a></li>
                    <li><a href = "#">已办任务</a></li>
                </ul>
            </li>

        </ul>

        <ul class = "nav navbar-nav navbar-right">

            <li class = "dropdown">
                <a href = "#" class = "dropdown-toggle glyphicon glyphicon-cog" data-toggle = "dropdown">设置 <b
                        class = "caret"></b></a>
                <ul class = "dropdown-menu">
                    <li><a href = "<?php echo U('Login/Logout');?>" class = "glyphicon glyphicon-off">登出</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <img src="/ThinkPHP_mtcb/Public/images/mtcblogo.png" class="img-responsive">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a role="button" class="btn btn-default btn-block btn-lg" href="<?php echo U('News/index');?>">查看消息</a>
        </div>
        <div class="col-xs-6">
            <a role="button" class="btn btn-default btn-block btn-lg" href="<?php echo U('News/create');?>">发送消息</a>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-xs-6">
            <a role="button" class="btn btn-default btn-block btn-lg" href="#">查看公告</a>
        </div>
        <div class="col-xs-6">
            <a role="button" class="btn btn-default btn-block btn-lg" href="#">发送公告</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-xs-6">
            <a role="button" class="btn btn-default btn-block btn-lg" href="<?php echo U('Workflow/index');?>">待办任务</a>
        </div>
        <div class="col-xs-6">
            <a role="button" class="btn btn-default btn-block btn-lg" href="#">已办任务</a>
        </div>
    </div>
</div>


<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <div class="navbar-header">
        <lable class="navbar-brand">欢迎您：<?php echo (session('userName')); ?></lable>
    </div>
</nav>
</body>
</html>