<?php
require_once '../common/db_func.php';
require_once '../common/comm_func.php';

$uname = $_COOKIE['uname'];
// 获取参数
$pageNum = get('pageNum');

if ($pageNum === "") {
    $pageNum = 1;
}
$pageSize = 5;

if (empty($uname)) {
    alertMsg('请先登录', '../front/login.php');
}

// 查询message的数量
$sql = "select count(*) from messages";

$count = QueryOne($dbconfig, $sql);

$count = $count['count(*)'];

if (intval($count) < ($pageSize * ($pageNum - 1))) {
    $current_count = ceil($count / $pageSize);
    alertMsg("超出范围", "../front/list.php?pageNum=$current_count");
}


// 查询是否为管理员
$sql = "select * from users where uname = '$uname'";

$user = QueryOne($dbconfig, $sql);

$isAdmin = $user['is_manager'];

//$sql = "select * from messages";


$sql = "select * from messages limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;

$res = QueryAll($dbconfig, $sql);




