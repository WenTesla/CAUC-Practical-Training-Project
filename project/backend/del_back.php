<?php
require_once '../common/db_func.php';
require_once '../common/comm_func.php';

$id = get('id');
$uid = $_COOKIE['uid'];
// 判空
if (empty($id) || empty($uid)) {
    alertMsg('参数为空', '../front/register.php');
}

filterSql($uid,$id);
// 查询是否为管理员
$sql = "select * from users where id = '$uid'";

$user = QueryOne($dbconfig, $sql);

$isAdmin = $user['is_manager'];

if (!$isAdmin) {
    alertMsg('只有管理员能删除留言', '../front/list.php');
}

// delete from messages where id = ?
$sql = "delete from messages where id = $id";

$res = Execute($dbconfig, $sql);

if (!$res) {
    alertMsg('删除失败', '../front/list.php');
} else {
    alertMsg('删除成功', '../front/list.php');
}