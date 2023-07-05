<?php
session_start();

$token = sha1(rand(1, 10000) . time());

$_SESSION['token'] = $token;




