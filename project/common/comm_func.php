<?php

function get($name)
{
    return isset($_GET[$name]) ? $_GET[$name] : '';
}

function post($name)
{

    return isset($_POST[$name]) ? $_POST[$name] : '';
}

function alertMsg($msg, $url)
{
    echo "<script>alert('$msg');location.href='$url';</script>";
}

function jumpToUrl($url)
{
    echo "<script>location.href='$url';</script>";
}