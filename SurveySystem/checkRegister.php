<?php
    sleep(1);
    require 'mysqli_connect.php';
    
    $newUser = $_GET["user"];
    $sql = sprintf("SELECT * FROM `user` WHERE UserID='%s'",$newUser);

    $re = $mysqli->query($sql);
    if ($re && $re->num_rows>0)
        echo 0;
    else
        echo 1;
?>