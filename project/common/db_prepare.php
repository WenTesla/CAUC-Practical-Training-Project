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

function QueryOne($dbconfig, $sql)
{
//    filterSql($sql);
    $res = Execute($dbconfig, $sql);

    $rs = mysqli_fetch_assoc($res);
    return $rs;
}


/**
 * 获取单条数据
 * @param $selfCon
 * @param $query
 * @param $params
 * @return array
 */
function _getData($selfCon, $query, $params)
{
    //开始查询
    $stmt = $selfCon->prepare($query);
    //回调函数传入参数
    call_user_func_array(array($stmt, 'bind_param'), _refValues($params));   //绑定参数
    //执行查询
    $stmt->execute();
    //获取数据
    $result = $stmt->get_result()->fetch_array();
    //关闭连接
    $stmt->close();
    //返回
    return $result;
}