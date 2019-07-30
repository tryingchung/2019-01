<?php
/**
 * Created by PhpStorm.
 * User: MISS
 * Date: 2019/1/8
 * Time: 17:26
 */
    header('content-type=text/html;charset=utf-8');
    $mysqli = new mysqli('localhost','root','admin','sursystem');
    if ($mysqli->connect_errno){
        die('连接失败：'.$mysqli->connect_error);
    }
    //        echo '连接成功';
    $mysqli->set_charset('utf8');
?>
