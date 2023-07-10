<?php
require_once 'db_config.php';


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

function QueryOne($dbconfig, $sql, ...$args)
{
    
    $connect = DbConnect($dbconfig);
    $stmt = mysqli_prepare($connect, $sql);
    var_dump($args);
    // 绑定参数
    for ($i = 0; $i < count($args); $i++) {
        $stmt->bind_param('s', $args[$i + 1]);
    }
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
}