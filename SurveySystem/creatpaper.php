<?php
    header('content-type=text/html;charset=utf-8');
    require 'mysqli_connect.php';

    $userID = $_REQUEST['userID'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>问卷调查系统——新建问卷</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/build.css"/>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style type="text/css">
    	body{
            background: url('img/back3.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% auto;
            vertical-align: middle;
        }
        .con{
            /* background-color: dimgray; */
            background: rgba(105,105,105, 0.6) !important;
            /* filter: alpha(opacity=80); */
           /*  border-radius: 20px; */
            color: white;
            margin: 20px;
            padding: 30px;
            /* padding-left: 100px; */
            line-height: 30px;
            font-family: 'Microsoft YeHei';
           /*  box-shadow: 0 0 2 2px; */
           height: 1000px;

        }
        #goIndex{
            text-decoration: none;
            font-weight: bolder;
            font-size: 20px;
            color: white;
            font-family: 'Microsoft YeHei';
        }
        .sp i{color: red;}
        .sp{
            font-size: 18px;
            font-family: 'Microsoft YeHei';
            font-weight: bold;
            text-align: right;
            width: 200px;
            line-height: 45px;
            display: inline-block;
        }
        input[type="text"],
        input[type="password"] {
            line-height: 30px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid;
            border-color: white;
            padding-left: 10px;
            font-size: 14px;
            color: dimgray;
        }
        #btn-addque{
            margin: 10px auto;
            width: 100%;
            padding-left: 375px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        /* #btn-addque ul,#btn-addque ul li{width: 60px;} */
    </style>
    <script type="text/javascript">
        // function addSin (){
        //     var div_que = document.createElement('div');
        //     var spanTitle = document.createElement('span');
        //     var inpTitle = document.createElement('input');
        $(document).ready(function() {
            $('#addSin').click(function(event) {
                
            });
            $('#addMul').click(function(event) {
                
            });
            $('#addSub').click(function(event) {
                
            });
        });
        // }
    </script>

</head>
<body>
	<div style="margin-left: 50px; margin-top: 30px;margin-right: 50px;">
        <a href="index.html" target="_blank" id="goIndex" class="text-left">
            <span class="glyphicon glyphicon-menu-left"></span>
            返回首页
        </a>
        <a href="goLogin.html" id="quit" class="text-right" style="float: right; color: blue;">[注销]</a>
    </div>
    <div class="con container"  style="width: 900px; margin: 0px auto; margin-bottom: 50px;">
    	<h3 class="text-center" style="font-family: '黑体';margin-top: 0px;margin-bottom: 20px;">新建问卷</h3>
        <form action="#" method="post" id="form-newpaper">
            <div id="div-newTitle">
                <label for="newtitle"><span class="sp"><i>* </i>问卷名字：</span></label>
                <input type="text" id="newtitle" name="newtitle" style="width: 500px;">
            </div>
            <div id="btn-addque" class="btn-group text-center">
              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              添加题目 <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" style="margin-left: 375px;">
                <li id="addSin"><a >单选题</a></li>
                <li id="addMul"><a >多选题</a></li>
                <li role="separator" class="divider"></li>
                <li id="addSub"><a >主观题</a></li>
              </ul>
            </div>
            <div id="quelist"></div>
        </form>
    </div>
</body>
</html>
