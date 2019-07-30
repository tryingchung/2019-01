<?php
    header('content-type=text/html;charset=utf-8');
    require 'mysqli_connect.php';

    $keyword = $_REQUEST['keyword'];

    $sql = 'SELECT * FROM survey WHERE SurveyID LIKE "%'.$keyword.'%" OR SurveyTitle LIKE "%'.$keyword.'%"';

    $res = $mysqli->query($sql);

    $sur = array();
    if ($res && $res->num_rows>0) {
    	for ($i=0; $i < $res->num_rows; $i++) { 
    		$r = $res->fetch_array();
    		$row = array();
    		$row['SurveyID'] = $r['SurveyID'];
    		$row['SurveyTitle'] = $r['SurveyTitle'];
    		$row['creatTime'] = $r['creatTime'];
    		$row['Deadline'] = $r['Deadline'];

    		$sur[$i] = $row;
    	}
    }
    echo json_encode($sur);
?>