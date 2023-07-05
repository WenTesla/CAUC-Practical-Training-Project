<?php
require "../common/db_config.php";

function DbConnect($dbconfig)
{
    $link = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['db']);
    return $link;
}

function Error($link)
{
    if (mysqli_errno($link)) {
        echo "错误编号:" . mysqli_errno($link) . "</br>";
        echo "错误信息:" . mysqli_error($link) . "</br>";
        die;
    }
}

function Execute($dbconfig, $sql)
{
//    filterSql($sql);
    $link = DbConnect($dbconfig);
    $res = mysqli_query($link, $sql);
    Error($link);
    return $res;
}

function QueryOne($dbconfig, $sql)
{
//    filterSql($sql);
    $res = Execute($dbconfig, $sql);
    $rs = mysqli_fetch_assoc($res);
    return $rs;
}

function QueryAll($dbconfig, $sql)
{
//    filterSql($sql);
    $res = Execute($dbconfig, $sql);
    $rs = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $rs;
}

function QueryCount($dbconfig, $sql)
{
//    $sql = filterSql($sql);
    $res = Execute($dbconfig, $sql);
    $rs = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $rs;
}

//// 函数抵御SQL注入攻击，将特殊字符去掉
//function filterSql($str)
//{
//    $arr = ['"', "'", "<", ">", "=", "(", ")"];
//    foreach ($arr as $v) {
//        $str = str_replace($v, '', $str);
//    }
//    return $str;
//}

function filterSql($str)
{
    if (preg_match('/union|and|or|order|select|delete|update/i', $str)) {
        die('参数异常，请重新输入');
    }
}