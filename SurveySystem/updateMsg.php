<?php
    header('content-type=text/html;charset=utf-8');
    require 'mysqli_connect.php';

    $Msg = array();
    $Msg['name'] = $_REQUEST['newName'];
    $Msg['phone'] = $_REQUEST['newPhone'];
    $Msg['gender'] = $_REQUEST['newGender'];
    $Msg['real'] = $_REQUEST['newReal'];

    $userID = $_REQUEST['userid'];

    $sqll = sprintf("UPDATE `user` SET UserName = '%s',telphone = '%s',gender = '%s',realname = '%s' WHERE UserID = '%s'",$Msg['name'],$Msg['phone'],$Msg['gender'],$Msg['real'],$userID);

    $res = $mysqli->query($sqll);
    $lastestMsg = array();
     if ($mysqli->affected_rows == 1) {
    	$ssql = sprintf("SELECT * FROM `user` WHERE UserID='%s'",$userID);
    	$rr = $mysqli->query($ssql);
    	if ($rr && $rr->num_rows>0) {
    		$rw = $rr->fetch_array();
    		$lastestMsg['name'] = $rw['UserName'];
    		$lastestMsg['phone'] = $rw['telphone'];
    		$lastestMsg['gender'] = $rw['gender'];
    		$lastestMsg['real'] = $rw['realname'];
    	}
     }
    echo json_encode($lastestMsg);
?>