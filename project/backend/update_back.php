<?php
require_once "../common/db_func.php";
require_once "../common/comm_func.php";

session_start();


$title = post('title');
$author = post('author');
$content = post('content');
$id = get('id');
$uid = $_COOKIE['uid'];

filterSql($uid);
// 查询是否为管理员
$sql = "select * from users where id = '$uid'";

$user = QueryOne($dbconfig, $sql);

$isAdmin = $user['is_manager'];

if ($isAdmin) {
//$sql = "insert into messages values(null,'$uid','$title','$author','$content',now())";
// 是否为管理员
    $sql = "update messages set title='$title',content='$content' where id='$id'";
}
//echo $sql;
//die();
// 非管理员
else {
    $sql = "update messages set title='$title',content='$content' where id='$id' and uid = '$uid'";
}
$res = Execute($dbconfig, $sql);
if ($res) {
    alertMsg('修改成功', '../front/list.php');
} else {
    alertMsg('修改失败', '../front/update.php');
}
