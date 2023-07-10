<?php
require_once "../common/db_func.php";
require_once "../common/comm_func.php";
require_once "../common/db_config.php";
$uname = $_COOKIE['uname'];
$img = $_COOKIE['img'];
$uid = $_COOKIE['uid'];
//此id为用户查看的留言id
//$id = get('id');
$id = $_GET['id'];
if (empty($uname)) {
    alertMsg("请先登录！", '../front/login.php');
}
filterSql($id);
$sql = "select * from messages where id=$id ";

$res = QueryOne($dbconfig, $sql);

