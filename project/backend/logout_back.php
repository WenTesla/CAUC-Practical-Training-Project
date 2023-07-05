<?php

require '../common/comm_func.php';

setcookie('uname', '', time() - 1, '/');
setcookie('img', '', time() - 1, '/');
setcookie('uid', '', time() - 1, '/');

alertMsg('退出成功!', '../front/login.php');
