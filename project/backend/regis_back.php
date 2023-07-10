<?php

require_once '../common/db_func.php';
require_once '../common/comm_func.php';

$uname = post('uname');
$upass = post('upass');
$rpass = post('rpass');
$sex = post('sex');
$img = isset($_FILES['img']) ? $_FILES['img'] : '';

filterSql($uname, $upass, $rpass, $sex, $img);
// 判空
if (empty($uname) || empty($upass) || empty($rpass)) {
    alertMsg('参数为空', '../front/register.php');
    return;
}

if ($upass !== $rpass) {
    alertMsg('两次密码不一致', '../front/register.php');
    return;
}
// 查询是否存在用户
$sql = "select * from users where uname = '$uname' ";
$res = QueryAll($dbconfig, $sql);
if ($res) {
    alertMsg('当前用户名已存在,请更换用户名', '../front/register.php');
    return;
}

// 上传头像
if ($img['error'] === 0) {
    // 检查用户上传的漏洞
    $allow_type = array('image/jpeg', 'image/png', 'image/gif');
    $maxsize = 1024 * 1024;
    if ($img['size'] > $maxsize){
        alertMsg('文件太大，请选中小文件', '../front/register.php');
        return;
    }
    if (!in_array($img['type'], $allow_type) ) {
        alertMsg('禁止上传该文件类型', '../front/register.php');
        return;
    } else {

        $ext = pathinfo($img['name'], PATHINFO_EXTENSION);
        $fileName = time() . rand(10000, 99999) . uniqid() . '.' . $ext;
        $folder = date('Y/m/d');
        $folderPath = "../backend/uploads/{$folder}";
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }
        $filePath = $folderPath . '/' . $fileName; //文件路径
        if (!move_uploaded_file($img['tmp_name'], $filePath)) {
            echo "上传失败!";
            die;
        }
    }
}
$upass = hash('sha256', $upass);
//$sql = "insert into users values (null,'$uname','$upass','$sex','$filePath',now())";
// 检测sql

filterSql($uname);
filterSql($upass);
filterSql($sex);
filterSql($img);

$sql = "INSERT INTO users(id, uname, upass, sex, img, create_time) VALUES (null,'$uname','$upass','$sex','$filePath',now()) ";

$res = Execute($dbconfig, $sql);
if ($res) {
    alertMsg('注册成功！', '../front/login.php');
} else {
    alertMsg('注册失败', '../front/register.php');
}
