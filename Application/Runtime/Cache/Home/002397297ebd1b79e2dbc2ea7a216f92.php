<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <title>移动端首页</title>
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
                    <li><a href = "#">待办任务</a></li>
                    <li><a href = "#">已办任务</a></li>
                </ul>
            </li>

        </ul>

        <ul class = "nav navbar-nav navbar-right">

            <li class = "dropdown">
                <a href = "#" class = "dropdown-toggle glyphicon glyphicon-cog" data-toggle = "dropdown">设置 <b
                        class = "caret"></b></a>
                <ul class = "dropdown-menu">
                    <li><a href = "/MyPHPWorks/mtcb/Login/CleanSession.php" class = "glyphicon glyphicon-off">登出</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <!--面板的头-->
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion"
             href="#collapseOne">
            <h4 class="panel-title">
                <!--标题-->
                MinTest1
                <!--时间-->
                <span class="badge" style="float:right;">2016-07-17 14:05:33</span>
            </h4>
        </div>
        <!--面板的内容-->
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">发送人：Min</li>
                    <li class="list-group-item">重要程度：2</li>
                    <li class="list-group-item">
                        消息内容：移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2移动端消息测试2
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion"
             href="#collapseTwo">
            <h4 class="panel-title">
                MinTest2
                <span class="badge" style="float:right;">2016-07-17 15:33:33</span>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">发送人：Min</li>
                    <li class="list-group-item">重要程度：2</li>
                    <li class="list-group-item">消息内容：移动端消息测试1</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>