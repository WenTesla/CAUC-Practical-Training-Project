<?php
require '../common/comm_func.php';
require_once '../common/db_func.php';

session_start();

$uname = post('uname');
$upass = post('upass');


if (!isset($_SESSION['login_fail']) || $_SESSION['login_fail'] == 0) {
    alertMsg('请携带session', '../front/login.php');
}


if (time() - $_SESSION['login_time'] <= 600 && $_SESSION['login_fail'] >= 3) {
    alertMsg('您的账号被锁定,请10min后使用', '../front/login.php');
}
// 判空
if (empty($uname) || empty($upass)) {
    alertMsg('参数为空', '../front/login.php');
}

$upass = hash('sha256', $upass);


$sql = "select * from users where uname = '$uname' and upass = '$upass'";
// 预编译
$pre_sql = "select * from users where uname = ? and upass = ?";



alertMsg($sql, '../front/login.php');
//die();
$res = QueryOne($dbconfig, $sql);

if (!$res) {
    if ($_SESSION['login_fail'] == 1) {
        $_SESSION['login_fail']++;
        alertMsg('用户名或密码错误', '../front/login.php');
    } else {
        if (time() - $_SESSION['login_time'] >= 600) {
            $_SESSION['login_fail'] = 1;
            $_SESSION['login_time'] = time();
            alertMsg('用户名或密码错误', '../front/login.php');
        } else {
            $_SESSION['login_fail']++;
            alertMsg('密码错误三次，账号将被锁定！', '../front/login.php');
        }
    }

} else {
    setcookie('uname', $res['uname'], time() + 600, '/');
    setcookie('img', $res['img'], time() + 600, '/');
    setcookie('uid', $res['id'], time() + 600, '/');
    $_SESSION['login_fail'] = 0;
    unset($_SESSION['login_time']);
    // 修改最后登录时间
    $sql = "update users set last_login_time = now() where uname = '$uname';";
    Execute($dbconfig, $sql);

    alertMsg('登录成功!', '../front/list.php?pageNum=1');
}
