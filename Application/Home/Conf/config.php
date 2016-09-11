<?php
return array(
    //开启显示页面Trace信息
    'SHOW_PAGE_TRACE' => true,
    // 默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR' => APP_PATH . 'Home/View/Public/dispatch_jump.html',
    // 默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => APP_PATH . 'Home/View/Public/dispatch_jump.html',

    /* 数据库设置 */
    'DB_TYPE' => 'sqlsrv',     // 数据库类型
    //'DB_HOST'               => 'www.mitarl.com', // 服务器地址
    'DB_HOST' => 'localhost',       // 服务器地址
    'DB_NAME' => 'mtcb_MBtest',          // 数据库名
    'DB_USER' => 'sa',      // 用户名
    'DB_PWD' => 'erp123.',          // 密码
    'DB_PORT' => 1433,        // 端口
    'DB_PREFIX' => '',    // 数据库表前缀

    'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session

    'URL_MODEL' => 0,

    //微信公众号
    'appID' =>'wxc8793be48c555a1c',
    'appsecret' =>'9dbcfc2dfcc9560c48139b6aa9a99878',
);