<?php
session_start();

if (!isset($_SESSION['login_fail']) || $_SESSION['login_fail'] == 0) {
    // 首次
    $_SESSION['login_fail'] = 1;
    $_SESSION['login_time'] = time();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/background.css">
    <style>

    </style>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- 导航栏头部 -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">论坛</a>
        </div>

        <!-- 导航栏内容 -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页</a></li>
            </ul>
            <!-- 右侧登录按钮 -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.php">注册</a></li>
                <li><a href="login.php">登录</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 200px">
    <form action="../backend/login_back.php?" role="form" id="myForm" method="post" class="form-horizontal"
          onsubmit="return checkError()" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name" class="col-md-5 control-label ">用户名</label>
            <div class="col-md-3">
                <input type="text" name="uname" class="form-control" id="name" placeholder="请输入用户名"
                       onblur=" checkInput(this)">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-md-5 control-label">密码</label>
            <div class="col-md-3">
                <input type="password" name="upass" class="form-control" id="pass" placeholder="请输入密码"
                       onblur=" checkInput(this)">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-5 col-md-1">
                <input type="submit" role="button" class="btn btn-primary" value="登录">
            </div>
        </div>
    </form>
</div>

</body>
</html>