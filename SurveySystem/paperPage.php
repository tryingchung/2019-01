<?php
    header('content-type=text/html;charset=utf-8');
    require 'mysqli_connect.php';

    $surveyID  = $_REQUEST['surveyID'];

     $sql = sprintf("SELECT * FROM survey WHERE SurveyID = '%s'",$surveyID);

    // $sql = sprintf("SELECT * FROM question WHERE SurveyID = '%s'",$surveyID);

    //获取问卷信息
    $rr = $mysqli->query($sql);

    $sur = array();
    if ($rr && $rr->num_rows>0) {
        $row = $rr->fetch_array();
        $sur['title'] = $row['SurveyTitle'];//问卷名字
        $sur['time'] = $row['creatTime'];//创建时间
        $sur['user'] = $row['UserID'];//创建者
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $sur['title']; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/build.css"/>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background: url('img/back11.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% auto;
            vertical-align: middle;
        }
        .con{
            background-color: white;
            background: rgba(255, 255, 255, 0.8) !important;
            /* filter: alpha(opacity=80); */
           /*  border-radius: 20px; */
            color: black;
            margin: 20px;
            padding: 30px;
            /* padding-left: 100px; */
            line-height: 30px;
            font-family: 'Microsoft YeHei';			
        }
        #goIndex{
            text-decoration: none;
            font-weight: bolder;
            font-size: 20px;
            color: white;
            font-family: 'Microsoft YeHei';
        }
        #sp-user,#sp-time{
        	color: dimgray;
        	font-size: 14px;
        }
        .queTit{
        	font-size: 16px;
        	font-family: 'Microsoft YeHei';
        }
        .op-css, .sp-op{
        	font-size: 14px;
        	font-family: 'Microsoft YeHei';
        	font-weight: normal;
        }
        input[type="radio"],input[type="checkbox"]{
        	font-size: 16px;
        	font-family: 'Microsoft YeHei';
        	margin-left: 50px;
        	/* box-shadow: 0 0 2px 2px white;
        	border-radius: 20px; */
        }

    </style>
</head>
<body>
    <div style="margin-left: 50px; margin-top: 30px;margin-right: 50px;">
        <a href="index.html" target="_blank" id="goIndex" class="text-left">
            <span class="glyphicon glyphicon-menu-left"></span>
            返回首页
        </a>
    </div>
    <div class="con container" style="width: 900px; margin: 0px auto; margin-bottom: 30px;">
		<h3 class="text-center" style="font-family: '黑体';margin-top: 0px;margin-bottom: 10px;"><?php echo $sur['title']; ?></h3>
        <div  style="padding-left: 100px;">
        	<span id="sp-user"><?php echo $sur['user']; ?></span>
        	&nbsp;&nbsp;&nbsp;
        	<span id="sp-time">创建时间：<?php echo $sur['time']; ?></span>
        </div>
        <form action="" method="post" id="paper-form">
        	<div id="myQue" style="padding-left: 100px;">
        <?php
        	$sql2 = sprintf("SELECT * FROM question WHERE SurveyID = '%s'",$surveyID);

        	$rr2 = $mysqli->query($sql2);
        	if ($rr2 && $rr2->num_rows>0) {
        		for ($i=1; $i<=$rr2->num_rows; $i++) { 
        			$que = $rr2->fetch_array();
        			//先判断题型，单选|多选|主观
        			if ($que['QueTye']=='Sin') {//单选题
        				echo '<p class="queTit">',$i,'. ',$que['QueTitle'],'</p>';
        				echo '<p class="op-css">';
        				$sql3 = sprintf("SELECT * FROM `options` WHERE QueID = '%s'",$que['QueID']);
        				$rr3 = $mysqli->query($sql3);
        				if ($rr3 && $rr3->num_rows>0) {
        					for ($j=1; $j<=$rr3->num_rows; $j++) {
        						$op = $rr3->fetch_array();
        						echo '<input type="radio" id="Sin',$i,$j,'"  name="Sin',$i,'" value="',$op['OptionID'],'">';
        						echo '<label for="Sin',$i,$j,'"><span class="sp-op">',$op['Options'],'</span></label>';
        					}
        				}
        				echo '</p>';
        			}elseif ($que['QueTye']=='Mul') {//多选题
        				echo '<p class="queTit">',$i,'. ',$que['QueTitle'],'</p>';
        				echo '<p class="op-css">';
        				$sql3 = sprintf("SELECT * FROM `options` WHERE QueID = '%s'",$que['QueID']);
        				$rr3 = $mysqli->query($sql3);
        				if ($rr3 && $rr3->num_rows>0) {
        					for ($j=1; $j<=$rr3->num_rows; $j++) {
        						$op = $rr3->fetch_array();
        						echo '<input type="checkbox" id="Mul',$i,$j,'" name="Mul',$i,'[]" value="',$op['OptionID'],'">';
        						echo '<label for="Mul',$i,$j,'"><span class="sp-op">',$op['Options'],'</span></label><br>';
        					}
        				}
        				echo '</p>';
        			}else{//主观题
        				echo '<p class="queTit">',$i,'. ',$que['QueTitle'],'</p>';
        				echo '<p class="op-css">';
        				echo '<textarea name="Sub',$i,'" id="Sub',$i,'" cols="50" rows="3" style="font-size:12px;padding:2px 10px;line-height:15px;margin-left:50px;"></textarea>';
        				echo '</p>';
        			}
        		}
        	}
        ?></div>
          <div class="text-center" style="padding-top: 20px;">
          	<button type="submit" class="text-center btn btn-primary">提交</button>
          </div>
        </form>
    </div>
</body>
</html>
<!-- <input type="radio" value=""> -->
