<?php
/**
 * Created by PhpStorm.
 * User: MISS
 * Date: 2019/1/10
 * Time: 16:29
 */
/*
 * 登录表单的操作
 * JSON：{reg：0|1 0代表成功，1代表失败；msg：null|array()}
 * 1.获取用户ID和密码 判断是否存在此用户
 * 1.1 存在且正确 登录成功 返回用户信息
 * 1.2 登录失败 alter("请检查账号和密码是否输入正确")
 *
 * */
    header('content-type=text/html;charset=utf-8');
    require 'mysqli_connect.php';

    // $userid = $_POST['user'];
    // $userpswd = $_POST['pswd'];

    if(isset($_POST['user'])){
       $userid = $_POST['user'];
       $userpswd = $_POST['pswd'];
    }else{
       $userid = $_COOKIE['user'];
       $userpswd = $_COOKIE['pswd'];
    }
    //去除两头空格
    $userid = trim($userid);
    $userpswd = trim($userpswd);

    $sql = sprintf("SELECT * FROM `user` WHERE UserID='%s' AND `Password`='%s'",$userid,$userpswd);
    $res = $mysqli->query($sql);

    $LoginData = array();
    $userMsg = array();

    if ($res && $res->num_rows>0){
        $LoginData['reg'] = 0;
    }else {
        $LoginData['reg'] = 1;
    }

    if ($LoginData['reg']==1) {//失败
        $LoginData['msg'] = null;
        // echo "用户ID或密码输入不正确，请重新登录。";
        // echo '2秒后将自动跳转到登录页面，若无反应请点击<a href="goLogin.html">这里</a>';
        // sleep(1);
        // header("Location:goLogin.html");
        echo 1;
    }else{//成功
        $row = $res->fetch_array();
        $userMsg['userID'] = $row['UserID'];
        $userMsg['username'] = $row['UserName'];
        $userMsg['userGender'] = $row['gender'];
        $userMsg['telPhone'] = $row['telphone'];
        $userMsg['realName'] = $row['realname'];
        $LoginData['msg'] = $userMsg;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <meta charset="UTF-8">
    <title>个人中心——登录</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/build.css"/>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background: url('img/back1.jpg');
			background-repeat: no-repeat;
		    background-attachment: fixed;
            background-size: 100% auto;
            vertical-align: middle;
        }
        .con{
            background-color: white;
            background: rgba(255, 255, 255, 0.2) !important;
            filter: alpha(opacity=30); 
            border-radius: 20px;
            color: white;
            margin: 20px;
            padding: 30px;
            line-height: 30px;
            font-family: 'Microsoft YeHei';
        }
        #tab-Msg{
            font-size: 20px;
            font-weight: bolder;
            /* text-align: center; */
        }
        .labelMsg{
            text-align: right;
            width: 200px;
            line-height: 45px;
            display: inline-block;
        }
        #ul-tabs li{
            font-size: 18px;
            font-family: 'Microsoft YeHei';
        }
       /*  #ul-tabs li a{
            color: black;
        } */
        input[type="text"],
        input[type="password"] {
            line-height: 30px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid;
            border-color: white;
            padding-left: 10px;
            font-size: 14px;
            color: black;
            font-weight: normal;
        }
        #quit{
            text-decoration: none;
            font-weight: bolder;
            font-size: 20px;
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
        }
        #mytable a{
            color: #fcc;
            font-size: 16px;
            font-weight: bolder;
        }
        #mytable a:hover{
            color: #fcc;
            text-decoration: none;
            text-shadow: 0px 0px 1px white;
        }
        #mytable tr th{font-size: 18px;}
        #mytable tr,#mytable tr th,#mytable tr td{
            text-align: center;
            padding: 10px;
        }
        #new{
            color:blue;
            float:right;
            padding:0 50px;
            font-size:20px;
            font-weight:bolder;
            font-family: 'Microsoft YeHei';
        }
        #mybtn{
            margin-top: 50px;
        }
        /* #mytable tr:first-child{
            font-size: 14px;
        } */
        #ul-help a{color: #fcc; font-family: '宋体';}
        #ul-help a:hover{color: #fcc; font-family: '宋体';}
        #newName,#newPhone,#newGender,#newReal{
            display: none;
        }
    </style>
    <script type="text/javascript">
        // document.getElementById("btn-edit").onclick = function() {
        //     document.getElementById("myName").style.display = 'none';
        //     document.getElementById("myPhone").style.display = 'none';
        //     document.getElementById("myGender").style.display = 'none';
        //     document.getElementById("myReal").style.display = 'none';

        //     // document.getElementById("newName").style.display = 'inline-block';


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
    <div class="con container" style="margin: 10px auto;">
        <div class="div-tab" >  
                <!-- 标签页 -->
                <ul id="ul-tabs" class="nav nav-pills nav-stacked pull-left text-center" style="width: 200px; height: 500px;margin-top: 50px;padding-left: 20px;">
                    <li role="presentation" class="active"><a href="#tab-Msg" data-toggle="tab">账号信息</a></li>
                   <!--  <li class="divider"></li> -->
                    <li role="presentation"><a href="#tab-mypapers" data-toggle="tab">我的问卷</a></li>
                    <li role="presentation"><a href="#tab-help" data-toggle="tab">帮助</a></li>
                </ul>
                <!-- 标签对应板块 -->
                <div id="div-tabsContent" class="tab-content">
                    <!-- ============我的账号信息==================================================================== -->
                    <div class="tab-pane fade in active" id="tab-Msg" style="padding: 20px 150px;">
                        <h2 class="text-center" style="font-family: '黑体';">我的账号信息</h2> 
                        <form action="" method="post" id="update-form">
                            <div style="padding: 20px 200px;font-family: '宋体';">
                                <p>
                                    <label>
                                        <span class="labelMsg" >我的用户ID：</span>
                                    </label>
                                    <span id="myID"><?php echo $userMsg['userID']; ?></span>
                                        
                                </p>
                                <p>
                                    <label>
                                        <span class="labelMsg">我的用户名：</span>
                                    </label>
                                    <span id="myName"><?php echo $userMsg['username']; ?></span>
                                    <input type="text" name="newName" id="newName" placeholder="请输入新的用户名" value="<?php echo $userMsg['username']; ?>">                                
                                </p>
                                <p>
                                    <label>
                                        <span class="labelMsg">我的手机号：</span>
                                    </label>
                                    <span id="myPhone"><?php echo $userMsg['telPhone']; ?></span>
                                    <input type="text" name="newPhone" id="newPhone" placeholder="请输入新的手机号" value="<?php echo $userMsg['telPhone']; ?>">
                                </p>
                                <p>
                                    <label>
                                        <span class="labelMsg">性别：</span>
                                    </label>
                                    <span id="myGender"><?php echo $userMsg['userGender']; ?></span>
                                    <input type="text" name="newGender" id="newGender" placeholder="男 or 女" value="<?php echo $userMsg['userGender']; ?>">
                                </p>
                                <p >
                                    <label>
                                        <span class="labelMsg">真实姓名：</span>
                                    </label>
                                    <span id="myReal"><?php echo $userMsg['realName']; ?></span>
                                    <input type="text" name="newReal" id="newReal" placeholder="请输入真实姓名" value="<?php echo $userMsg['realName']; ?>">
                                </p> 
                                <p class="text-center" id="mybtn"><button type="button" id="btn-edit" class="btn btn-info">修改</button>
                                   <button type="button" id="btn-save" class="btn btn-info">保存</button></p>   
                            </div>
                         </form>                  
                    </div>
                    <!-- ===============我的问卷====================================================================== -->
                    <div class="tab-pane fade" id="tab-mypapers" style="padding: 20px 300px;">
                        <h2 class="text-center" style="font-family: '黑体';">我的问卷</h2> 
                        <div id="mypaper" class="text-center">
                            <?php
                                $sql2 = sprintf("SELECT * FROM survey WHERE UserID='%s'",$userMsg['userID']);

                                $resSurvey = $mysqli->query($sql2);
                                if ($resSurvey && $resSurvey->num_rows>0) {
                                    # code...
                                    echo '<table id="mytable" class="text-center">';
                                    echo    '<tr>
                                                <th>问卷编号</th>
                                                <th>问卷名字</th>
                                                <th>提交数</th>
                                                <th>创建时间</th>
                                                <th>截止日期</th>
                                            </tr>';
                                    for ($i=0; $i<$resSurvey->num_rows; $i++) { 
                                        # code...
                                        $survey = $resSurvey->fetch_array();
                                        echo '<tr>
                                                <td><a href="paperPage.php?surveyID=',$survey['SurveyID'],'" target="_blank">',$survey['SurveyID'],'</a></td>
                                                <td><a href="paperPage.php?surveyID=',$survey['SurveyID'],'" target="_blank">',$survey['SurveyTitle'],'</a></td>
                                                <td>',$survey['SubmissionNum'],'</td>
                                                <td>',$survey['creatTime'],'</td>
                                                <td>',$survey['Deadline'],'</td>
                                              </tr>';
                                    }
                                    echo '</table>';
                                    echo '<a href="creatpaper.php?userID=',$userMsg['userID'],'" id="new">[新建问卷]</a>';
                                }else{
                                    echo '<h3 style="padding-left:100px; text-align:left;">您还未创建过问卷，<a href="creatpaper.php?userID=',$userMsg['userID'],'" style="color:#fcc;">立即创建</a></h3>';
                                }
                            ?>
                        </div>
                    </div>
                    <!-- ==========帮助=========================================================== -->
                    <div class="tab-pane fade" id="tab-help" style="padding: 20px 300px;">
                        <h3 class="text-left" style="font-family: '黑体';">常见问题：</h3>
                        <div>
                            <ul id="ul-help">
                                <li><a href="#">【使用】如何新建问卷？</a></li>
                                <li><a href="#">【使用】如何参与调查？</a></li>
                                <li><a href="#">【账号】忘记密码怎么办？</a></li>
                                <li><a href="#">【账号】如何更改密码啊？</a></li>
                                <a href="#">... ...</a>
                            </ul><a href="" target="_blank"></a>
                        </div>
                    </div>              
                </div>
                <script>
                    $(function () {
                        $('#ul-tabs li:eq(0) a').tab('show');
                        
                        $('#btn-edit').bind('click', function() {
                            $("#myName").empty();
                            $("#myPhone").empty();
                            $("#myGender").empty();
                            $("#myReal").empty();

                            $('#newName').appendTo('#myName');
                            $('#newPhone').appendTo('#myPhone');
                            $('#newGender').appendTo('#myGender');
                            $('#newReal').appendTo('#myReal');

                            $('#newName').show();
                            $('#newPhone').show();
                            $('#newGender').show();
                            $('#newReal').show();
                        });

                        $('#btn-save').bind('click', function() {
                          var xhr = new XMLHttpRequest();
                          xhr.onload = function(){
                            if (xhr.readyState == 4 && xhr.status == 200){
                                var obj = JSON.parse(xhr.responseText);
                                // var obj = xhr.responseText;
                                showMsg(obj);                                
                            } 
                          };
                          var up_form = document.getElementById("update-form");
                          var dataMsg = new FormData(up_form);
                          var ud = <?php echo '"',$userMsg['userID'],'"'; ?>;
                          xhr.open("POST", "updateMsg.php?userid="+ud, true);
                          xhr.send(dataMsg);
                        });
                        function showMsg (obj) {
                            $("#myName").empty();
                            $("#myPhone").empty();
                            $("#myGender").empty();
                            $("#myReal").empty();

                            $("#myName").html(obj.name);
                            $("#myPhone").html(obj.phone);
                            $("#myGender").html(obj.gender);
                            $("#myReal").html(obj.real);
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</body>
</html>
