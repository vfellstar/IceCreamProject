<?php
session_start();
if(!isset($_SESSION['user']))header("Location: ./login.html");
?>
<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>Order management system</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- Let IE8/9 support media queries to be compatible with grid -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
        </script>
    </head>
    <body class="index">
        <!-- Start at the top -->
        <div class="container">
            <div class="logo">
                <a href="./index.html">Cavallo</a></div>
            <div class="left_open">
                <a><i title="Expand the left column" class="iconfont">&#xe699;</i></a>
            </div>
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;"><?=$_SESSION['user']['username']?></a>
                    <dl class="layui-nav-child">
                        <!-- Secondary menu -->
                        <dd>
                            <a href="./controller/logout.php">logout</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
        <!-- Top end -->
        <!-- Start in the middle -->
        <!-- Start from the left menu -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="Order Management">&#xe723;</i>
                            <cite>Order Management</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('Report','report.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>Report</cite></a>
                            </li>
                             <li>
                                <a onclick="xadmin.add_tab('Statistics','statistics.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>Statistics</cite></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- End of left menu -->
        <!-- The right body starts -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>Home</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">Close current</dd>
                        <dd data-type="other">Close others</dd>
                        <dd data-type="all">Close all</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='./welcome.php' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- End of the right body -->
        <!-- Middle end -->


    </body>

</html>
