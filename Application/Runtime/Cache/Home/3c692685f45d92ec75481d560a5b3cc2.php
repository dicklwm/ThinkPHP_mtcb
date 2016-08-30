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

<link rel="stylesheet" href="/ThinkPHP_mtcb/Public/css/bootstrap-treeview.min.css">
<link rel="stylesheet" href="/ThinkPHP_mtcb/Public/css/bootstrap-datetimepicker.min.css">
<script src="/ThinkPHP_mtcb/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/ThinkPHP_mtcb/Public/js/bootstrap-treeview.min.js"></script>

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
                    <li><a href = "/MyPHPWorks/mtcb/Login/CleanSession.php" class = "glyphicon glyphicon-off">登出</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <form role="form">
                <div class="form-group">
                    <label for="NewsTitle">消息主题</label>
                    <input type="text" class="form-control" id="NewsTitle"
                           placeholder="请输入消息主题" >
                    <label for="NewsKind">消息主题</label>
                    <select class="form-control" id="NewsKind">
                        <option>全体消息</option>
                        <option>部门消息</option>
                        <option>个人消息</option>
                    </select>
                    <label for="SendTime">发送时间</label>
                    <div class="input-append date form_datetime ">
                        <input type="text" value="" id="SendTime" class="form-control" readonly>
                    </div>
                    <!--引入中文包-->
                    <script charset="UTF-8" src="/ThinkPHP_mtcb/Public/js/bootstrap-datetimepicker.zh-CN.js"></script>
                    <script type="text/javascript">
                        $("#SendTime").datetimepicker({
                            format: "yyyy-mm-dd hh:ii:ss",
                            language: 'zh-CN',
                            autoclose: true,
                            todayBtn: true,
                            startDate: "2016-01-01 10:00:00",
                            minuteStep: 5,
                            todayHighlight: true
                        });
                        //设置默认日期为当前日
                        $("#SendTime").datetimepicker('setDate', new Date());
                    </script>

                    <label for="SendKind">消息类型</label>
                    <div class="radio" id="SendKind">
                        <label class="radio-inline">
                            <input type="radio" name="SendKind" id="gb"
                                   value="gb" checked onclick="changeDisplay('gb')"> 广播
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SendKind" id="bm"
                                   value="bm" onclick="changeDisplay('bm')" >
                            部门
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SendKind" id="gw"
                                   value="bm" onclick="changeDisplay('gw')" >
                            岗位
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SendKind" id="gr"
                                   value="gr" onclick="changeDisplay('gr')">
                            个人
                        </label>
                    </div>
                    <!--默认隐藏、只读的输入框-->
                    <input type="text" class="form-control" id="chooseWho"
                           placeholder="请点击选择发送对象" style="display : none;"
                           data-target="#myModal" data-toggle="modal" readonly>

                    <!--切换单选框时触发的时间-->
                    <script>
                        function changeDisplay(who) {
                            var inputCor = document.getElementById('chooseWho');
                            switch (who) {
                                //选中部门
                                case 'gb':
                                    inputCor.style.display = 'none';
                                    $('#chooseWho').val('');
                                    break;
                                default:
                                    inputCor.style.display = 'block';
                                    $('#chooseWho').val('');
                                    break;
                            }
                        }
                    </script>
                    <!-- 模态框（Modal） data-backdrop="false"设置不能点外面弹走-->
                    <div class="modal" id="myModal" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close"
                                            data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        选择发送对象
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <div id="tree"></div>
                                    <script>
                                        function getTree() {
                                            // 树的data
                                            var tree = [
                                                {
                                                    icon:"glyphicon glyphicon-home",
                                                    text: "铭泰船舶有限公司",
                                                    nodes: [
                                                        {
                                                            icon:"glyphicon glyphicon-user",
                                                            text: "内务部",
                                                            //tags可以设置id值
                                                            tags: ['Min1']
                                                        },
                                                        {
                                                            icon:"glyphicon glyphicon-user",
                                                            text: "业务部"
                                                        },
                                                        {
                                                            icon:"glyphicon glyphicon-user",
                                                            text: "财务部"
                                                        }
                                                    ]
                                                }];
                                            return tree;
                                        }
                                        $('#tree').treeview({
                                            data: getTree(),
                                            multiSelect: true,
                                            showTags: true
                                        });
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">关闭
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="getSelected()">
                                        确认
                                    </button>
                                    <script>
                                        //获取树中选中的值
                                        function getSelected() {
                                            var SelectNode = $('#tree').treeview('getSelected');
                                            var AllText = "";
                                            for (var i = 0; i < SelectNode.length; i++) {
                                                var s = SelectNode[i].text;
                                                if (i == SelectNode.length - 1)
                                                    AllText += s;
                                                else
                                                    AllText += s + ",";
                                            }
                                            $('#chooseWho').val(AllText);
                                            $('#myModal').modal('hide');
                                        }
                                    </script>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>


                    <label for="SendKind">重要程度</label>
                    <div class="radio" id="ImportantDegree">
                        <label class="radio-inline">
                            <input type="radio" name="ImportantDegree" id="Degree1"
                                   value="1"> 1
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ImportantDegree" id="Degree2"
                                   value="2" checked>
                            2
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="ImportantDegree" id="Degree3"
                                   value="3">
                            3
                        </label>
                    </div>
                    <label for="NewsDetail">消息内容</label>
                    <textarea class="form-control" rows="5" id="NewsDetail"></textarea>
                </div>
                <button class="btn btn-lg btn-success btn-block" type="submit">发送</button>
                <button class="btn btn-lg btn-default btn-block" type="reset">重置</button>
                <button class="btn btn-lg btn-danger btn-block" type="button" href="">取消</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>