<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-3.4.1-dist/css/background.css">
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
                <li class="active"><a href="login.php">首页</a></li>
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
    <form action="../backend/regis_back.php" role="form" id="myForm" method="post" class="form-horizontal"
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
            <label for="rpass" class="col-md-5 control-label">确认密码</label>
            <div class="col-md-3">
                <input type="password" name="rpass" class="form-control" id="rpass" placeholder="请再次输入密码"
                       onblur=" checkInput(this)">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">性别</label>
            <div class="radio col-md-1">
                <label><input type="radio" value="1" name="sex" checked>男</label>
            </div>
            <div class="radio col-md-1">
                <label><input type="radio" value="0" name="sex">女</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-5 control-label">头像</label>
            <input type="file" name="img" value="请上传头像">
        </div>
        <div class="form-group">
            <div class="col-md-offset-5 col-md-2">
                <input type="submit" role="button" class="btn btn-primary" value="注册">
            </div>
        </div>
    </form>
</div>
<script>
    function checkInput(str) {
        // console.log(str);
        var inp = str.value;
        if (inp.match(/['"<>=()]/g)) {
            str.parentElement.className = 'col-md-5 has-error';
            // return false;

        } else {
            str.parentElement.className = 'col-md-5 has-success';
        }
    }

    function checkError() {
        var a = document.getElementsByClassName('has-error');
        if (a.length !== 0) {
            alert('输入内容存在错误，请更改后重新提交！');
            return false;
        }
    }

</script>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/bootstrap-3.4.1-dist/js/jquery.min.js" crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/bootstrap-3.4.1-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>