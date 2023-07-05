<?php

$uname = $_COOKIE['uname'];
$img = $_COOKIE['img'];

require_once '../backend/list_back.php'

?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>留言板</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        #s1 {
            margin-top: 5px;
            display: inline-block;
        }
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
            <a class="navbar-brand" href="#">网站名</a>
        </div>

        <!-- 导航栏内容 -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">留言板</a></li>
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
<div class="container text-center">
    <p class="h3">留言列表<a href="./add.php">增加留言</a></p>

</div>

<!---->
<?php
//$path = isset($_GET['path']) ? $_GET['path'] : './show_list.php';
//
//?>
<div class="container">
    <table class="table table-striped text-center">
        <thead>
        <tr class="info" style="font-weight: bold">
            <td class="col-md-1">序号</td>
            <td class="col-md-2">标题</td>
            <td class="col-md-2">作者</td>
            <td class="col-md-3">创建时间</td>
            <td class="col-md-3">操作</td>
            <!--            <td></td>-->
        </tr>

        </thead>
        <tbody>
        <?php
        foreach ($res as $k => $rs):
            ?>
            <tr class="tr">
                <td><?= $rs['id'] ?></td>
                <td><?= $rs['title'] ?></td>
                <td><?= $rs['author'] ?></td>
                <td><?= $rs['create_time'] ?></td>
                <td>
                    <!--                    <a href="../front/detail.php?id=--><?//=$rs['id']
                    ?><!--" role="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-search"></span></a>-->


                    <a href="../backend/detail_back.php?id=<?= $rs['id'] ?>" role="button"
                       class="btn-xs info">查看详情</a>
                    <!--                    管理员显示删除按钮-->
                    <?php
                    if ($isAdmin) {
                        ?>
                        <a href="../front/update.php?id=<?= $rs['id'] ?>" role="button"
                           class="btn-xs info">修改</a>
                        <a href="../backend/del_back.php?id=<?= $rs['id'] ?>" role="button" class="danger btn-xs"
                           onclick="return delMsg()">删除</a>
                        <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>

    </table>


</div>
<!-- 分页 --todo -->
<div class="container text-center">
    <ul class="pagination">
        <li class="page-item"><a class="page-link"
                                 href="?pageNum=<?= $_GET['pageNum'] <= 1 ? 1 : $_GET['pageNum'] - 1 ?>">Previous</a>
        </li>
        <!--        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
        <!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
        <!--        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        <li class="page-item"><a class="page-link"
                                 href="?pageNum=<?= $_GET['pageNum'] == 0 ? 2 : $_GET['pageNum'] + 1 ?>">Next</a></li>
    </ul>
</div>


<script>
    trs = document.querySelectorAll('.tr');
    console.log(trs);
    for (i = 0; i < trs.length; i++) {
        trs[i].querySelector('td').innerHTML = i + 1;
    }
</script>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/bootstrap-3.4.1-dist/js/jquery.min.js" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/bootstrap-3.4.1-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>


<script>
    function delMsg() {
        return confirm('你确定要删除吗?')
    }
</script>
</body>
</html>