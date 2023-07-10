<?php
require_once "../backend/list_back.php";
require_once "../backend/detail_back_info.php";


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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse">
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
                <li class="active"><a href="#">帖子板</a></li>
            </ul>

            <!-- 右侧登录按钮 -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <img src="<?= $img ?>" alt="" width="50px" class="img-circle" style="margin-top: 10px">
                </li>
                <li><a><?= $uname ?></a></li>
                <li><a><?= $isAdmin ? "管理员" : "访客" ?></a></li>
                <li><a href="../backend/logout_back.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>


<body>
<div class="container text-center">
    <p class="h3">修改帖子 <small><a href="../front/list.php">查看帖子</a></small></p>
</div>
<div class="container">
    <form action="../backend/update_back.php?id=<?= $res['id'] ?>" role="form" class="form-horizontal"
          enctype="multipart/form-data"
          method="post" onsubmit="return checkError()">
        <div class="form-group">
            <label for="name" class="col-md-offset-2 col-md-2 control-label">帖子标题</label>
            <div class="col-md-5">
                <input type="text" name="title" class="form-control" id="name" value="<?= $res['title'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-md-offset-2 col-md-2 control-label">作者</label>
            <div class="col-md-5">
                <input type="text" name="author" class="form-control" value="<?= $res['author'] ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-md-offset-2 col-md-2 control-label">帖子内容</label>
            <div class="col-md-5">
                <textarea name="content" class="form-control" cols="30" rows="20" id="content"
                          style="resize: none"><?= $res['content'] ?></textarea>
            </div>
        </div>
        <div class="form-group text-center">
            <div>
                <input type="submit" role="button" class="btn btn-primary btn-sm" value="修改">
                <a href="../front/list.php" class="btn btn-primary btn-sm">返回</a>
            </div>
        </div>
    </form>
</div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/bootstrap-3.4.1-dist/js/jquery.min.js" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/bootstrap-3.4.1-dist/js/jquery.min.js" crossorigin="anonymous"></script>

</body>
</html>

