<?php
require_once "../common/db_func.php";
require_once "../common/comm_func.php";

$title = post('title');
$author = post('author');
$content = post('content');
$uid = $_COOKIE['uid'];
//var_dump($title);
//var_dump($author);
//die;
//$sql = "insert into messages values(null,'$uid','$title','$author','$content',now())";
$sql = "update messages set title='$title',content='$content' where uid='$uid'";

$res = Execute($dbconfig, $sql);
if ($res) {
    alertMsg('修改成功', '../front/list.php');
} else {
    alertMsg('修改失败', '../front/update.php');
}
