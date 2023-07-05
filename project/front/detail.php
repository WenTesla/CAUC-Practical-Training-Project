<?php
require_once "../backend/detail_back_info.php";
//require_once "../backend/detail_back.php";
?>
<!Doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>帖子详情</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/background.css">

    <style>
        #s1 {
            display: inline-block;
            margin-top: 5px;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">我的留言板</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><span id="s1"><img src="<?= $img ?>" width="40" class="img-circle"
                                   alt=""></span>&nbsp;&nbsp;<?= $uname ?>
            </li>
            <li><a href="../backend/logout_back.php"><span class="glyphicon glyphicon-log-in"></span> 退出</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container text-center">
    <p class=:"h3">增加留言
        <sma1l><a href="../front/list.php">查看留言</a></sma1L>
    </p>
</div>

<div class="container text-center">
    <form action="../backend/add_back.php" role="form" method="post" class="form-horizontal"
          onsubmit="return checkError()" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="col-md-2 control-label ">留言标题</label>
            <div class="col-md-5">
                <input type="text" name="title" class="form-control" id="name" value="<?= $res['title'] ?>"
                       readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">作者</label>
            <div class="col-md-5">
                <input type="text" name="auther" class="form-control" value="<?= $res['author'] ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="control-label col-md-2">留言内容</label>
            <div class="col-md-5">
                    <textarea name="content" class="form-control" id="content" cols="30" rows="10" readonly
                              style="resize: none"><?= $res['content'] ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-4 col-md-1">
                <a href="../front/list.php" role="button" class="btn btn-primary">返回<a/>
            </div>
        </div>
    </form>
</div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/bootstrap-3.4.1-dist/js/jquery.min.js" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/bootstrap-3.4.1-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>