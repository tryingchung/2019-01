<?php
    header('content-type=text/html;charset=utf-8');
    require 'mysqli_connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>调查中心</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/build.css"/>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background: url('img/back11.jpg');
/* 			background-repeat: no-repeat; */
		    background-attachment: fixed;
            background-size: 100% auto;
            vertical-align: middle;
        }
        .con{
            /* background-color: white; */
            background: rgba(255,255,255, 0.5) !important;
            border-radius: 20px;
            color: brown;
            margin: 20px;
            padding: 30px;
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
        #mypaper{
            padding: 5px;
            font-family: '宋体';
            width: 800px;
            /* margin-left: 150px; */
            margin: 50px 100px;

        }
        #mytable a,#res a{
            color: brown;
            font-size: 16px;
            font-weight: bolder;
        }
        #mytable a:hover,#res a:hover{
            color: brown;
            text-decoration: none;
            text-shadow: 0px 0px 3px white;
        }
        #mytable tr th,#res tr th{font-size: 18px;}
        #mytable tr,#mytable tr th,#mytable tr td,
        #res tr,#res tr th,#res tr td{
            text-align: center;
            padding: 10px;
        }
        #div-search{
            height: 500px;
            display: none;
        }
        #showall,#search{
            color: white;
            font-size: 16px;
            text-decoration: none;
            float: right;
        }
        #showall:hover,#search:hover{
            color: white;
            text-shadow: 0 0 2px white;
            text-decoration: none;
        }
        #div-res{display: none; padding-right: 0;width: 700px;}
        input[type="text"]{
            color: black;
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
    <div id="div-search" class="con container" style="width: 900px; margin: 0 auto;margin-bottom: 500px;">
        <div id="div-keys" class="text-center">
            <input type="text" id="keyword" name="keyword" style="width: 400px;">
            <button type="button" id="btn-search" class="btn btn-info">搜索</button>
            <a href="#allpaper" id="showall">显示全部问卷</a>
        </div>
        <div id="div-res" class="con text-center">
            <table id="res">
                <!-- <tr>
                    <th>问卷编号</th>
                    <th>问卷名字</th>
                    <th>创建时间</th>
                    <th>截止日期</th>
                </tr> -->
            </table>
        </div>
    </div>
    <div id="allpaper" class="con container" style="width: 900px; margin: 0px auto; margin-bottom: 150px;">
        <div>
            <h2 class="text-center" style="font-family: '黑体';margin-top: 0px;margin-bottom: 0px;">调查中心</h2>
            <a href="#div-search" id="search">搜索</a>
        </div>
		
		<div id="mypaper" class="text-center">
            <table id="mytable" class="text-center">
                <tr>
                    <th>问卷编号</th>
                    <th>问卷名字</th>
                    <th>创建时间</th>
                    <th>截止日期</th>
                </tr>
    			<?php

                    $records = 5;//每页3个
                    $page = 1;//要显示的页码
                    // $isTrue =
                    if (isset($_GET['page'])=== true) {
                        $page = $_GET['page'];
                    }
                    $nStart = ($page-1)*$records;//计算起始记录，0开始。

                    $sql = sprintf("SELECT * FROM survey LIMIT %d,%d",$nStart,$records);
                    $resSurvey = $mysqli->query($sql);

                    if ($resSurvey && $resSurvey->num_rows>0) {
                        while ($survey = $resSurvey->fetch_array()) {
                        	
                        	echo '<tr>
    								<td><a href="paperPage.php?surveyID=',$survey['SurveyID'],'" target="_blank">',$survey['SurveyID'],'</a></td>
    								<td><a href="paperPage.php?surveyID=',$survey['SurveyID'],'" target="_blank">',$survey['SurveyTitle'],'</a></td>
    								<td>',$survey['creatTime'],'</td>
    								<td>',$survey['Deadline'],'</td>
    							</tr>';
                        }
                    }
                 ?>
            </table>
            <?php
               echo '<div style="float:right;padding-right:200px;">';
               if ($page>1) {
                  echo '<a href="paperlist.php?page=',$page-1,'" id="pre">前一页</a>';
               }               
               echo "&nbsp;&nbsp;&nbsp;";
               if ($page<2) {
                   echo '<a href="paperlist.php?page=',$page+1,'" id="next">后一页</a>';
               }
               
               echo '</div>';

            ?>
		</div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').bind('click', function() {
                $('#div-search').show();
            });
            $("#btn-search").bind('click', function() {
                $("#div-res").show();
                var xhr = new XMLHttpRequest();
                xhr.onload = function(){
                    if (xhr.readyState == 4 && xhr.status == 200){
                        var obj = JSON.parse(xhr.responseText);
                        showRes(obj);
                        // alert(xhr.responseText);
                    }
                };
                var key = $("#keyword").val();
                xhr.open("GET", "search.php?keyword="+key,true);
                xhr.send();
            });
            function showRes (obj) {
                $('#res').empty();
                var trr = $("<tr></tr>");
                $("<th></th>").html("问卷编号").appendTo(trr);
                $("<th></th>").html("问卷名字").appendTo(trr);
                $("<th></th>").html("创建时间").appendTo(trr);
                $("<th></th>").html("截止日期").appendTo(trr);
                trr.appendTo($('#res'));
                for(var i=0;i<obj.length;i++){
                    var tr = $("<tr></tr>");
                    $("<td></td>").html('<a href="paperPage.php?surveyID='+obj[i].SurveyID+'">'+obj[i].SurveyID+'</a>').appendTo(tr);
                    $("<td></td>").html('<a href="paperPage.php?surveyID='+obj[i].SurveyID+'">'+obj[i].SurveyTitle+'</a>').appendTo(tr);
                    $("<td></td>").html(obj[i].creatTime).appendTo(tr);
                    $("<td></td>").html(obj[i].Deadline).appendTo(tr);
                    tr.appendTo($('#res'));
                }
            }
        });
    </script>

</body>
</html>