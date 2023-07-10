<?php
require_once '../common/comm_func.php';

$uname = $_COOKIE['uname'];
$img = $_COOKIE['img'];
if (empty($uname)) {
    alertMsg('请先登录', '../front/login.php');
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>增加帖子</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/background.css">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <![endif]-->

</head>
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
            <a class="navbar-brand" href="#">网站名</a>
        </div>

        <!-- 导航栏内容 -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">帖子</a></li>
            </ul>

            <!-- 右侧登录按钮 -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <img src="<?= $img ?>" alt="" width="50px" class="img-circle" style="margin-top: 10px">
                </li>
                <li><a><?= $uname ?></a></li>
                <!--                <li><a href="#">注册</a></li>-->
                <li><a href="../backend/logout_back.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>

<body>

<div class="container text-center">
    <label for="title" class="col-md-offset-1 control-label">添加帖子</label>
    <small><a href="./list.php">查看帖子</a></small>
</div>


<div class="container">
    <form action="../backend/add_back.php" role="form" class="form-horizontal" method="post"
          onsubmit="check_has_error()"
          enctype="multipart/form-data">

        <div class="form-group">

            <label for="title" class="col-md-4 control-label">帖子标题:</label>
            <div class="col-md-5">
                <input type="text" name="title" class="form-control" id="name" placeholder="请输入标题"
                       onblur="checkInput(this)">
                <!-- this指当前文本框输入的值 -->
            </div>

        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">作者:</label>
            <div class="col-md-5">
                <input type="text" name="author" class="form-control" value="<?= $uname ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-md-4 control-label"">帖子内容</label>
            <div class="col-md-4 ">
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"
                          placeholder="请输入帖子内容"
                          style="resize:none"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-1">
                <!--                <a href="./regis.php" type="submit" role="button" class="btn btn-success">提交</a>-->
                <input type="submit" role="button" class="btn btn-primary" value="提交">
            </div>

        </div>

    </form>
</div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/bootstrap-3.4.1-dist/js/jquery.min.js" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/bootstrap-3.4.1-dist/js/bootstrap.js" crossorigin="anonymous"></script>
<script>
    function checkInput(str) {
        // console.log(str)
        var num = str.value;
        if (num.match(/['"<>]/g)) {
            str.parentElement.className = 'col-md-5 has-error';
            return false
        } else {
            str.parentElement.className = 'col-md-5 has-success';
        }
    }

    function check_has_error() {
        var id = document.getElementsByClassName('has-error');
        if (a.length !== 0) {
            alert('输入内容存在错误，请更改后重新提交！');
            return false;
        }
    }
</script>
</body>
</html>