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
    <style>
        .panel-btnGroup{
            margin-top: 10px;
        }
        .panel-header{
            margin-bottom: 0px;
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

<div class="panel-group" id="accordion">

    <div class="panel-body">

        <div class="panel-header">
           <ul class="list-group">
               <li class="list-group-item">
                   <p><b>请假申请单 VCT20160715</b></p>
                   <p>张XX 2016-07-14 11：03：03</p>
               </li>
           </ul>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne">
                        单据详情
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">

                <ul class="list-group">
                    <li class="list-group-item">申请人：张XX</li>
                    <li class="list-group-item">部门名：销售部</li>
                    <li class="list-group-item">岗位名：销售员</li>
                    <li class="list-group-item">申请时间：2016-07-14 11：03：03</li>
                    <li class="list-group-item">假别：事假</li>
                    <li class="list-group-item">拟休假日期自 2016-07-15 至 2016-07-20</li>
                    <li class="list-group-item">本年度第 2 次请假，拟请假 5 天</li>
                    <li class="list-group-item">工作代理人：王XX</li>
                    <li class="list-group-item">紧急联系电话：11111111111</li>
                    <li class="list-group-item">审批状态：审批中</li>
                    <li class="list-group-item">请假事由：XXXXXXXXXXXXXXXXXXXXXXXXX</li>
                </ul>

                </div>
            </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseTwo">
                        历史审批意见
                    </a>
                </h4>
            </div>

            <div id="collapseTwo" class="panel-collapse collapse in">
                <ul class="list-group">
                    <li class="list-group-item">
                        <p>审核人：张XX</p>
                        <p>审核意见：</p>
                        <p>审核时间：2016-07-14 11：03：03</p>
                        <p>状态：审批通过</p>
                    </li>
                    <li class="list-group-item">
                        <p>审核人：赵XX</p>
                        <p>审核意见：</p>
                        <p>审核时间：2016-07-14 12：03：03</p>
                        <p>状态：审批通过</p>
                    </li>
                </ul>
            </div>

    </div>

        <div id="btnGroup" class="panel-btnGroup" align="right">
            <button type="button" class="btn btn-success">任务提交</button>
            <button type="button" class="btn btn-danger">任务退回</button>
            <button type="button" class="btn btn-info">取消</button>
        </div>

</div>
</div>
</body>
</html>