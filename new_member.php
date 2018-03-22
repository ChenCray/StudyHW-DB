<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:100px;
    float:left;
    padding:5px;	      
}
#section {
    width:350px;
    float:left;
    padding:10px;	 	 
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
</style>
</head>
<body>

<div id="header">
<h1>新增會員</h1>
<?php
session_start();
//要用isset...
if(isset($_SESSION['name']))
	echo'Hi,'.$_SESSION['name'];
?>
</div>


<div id="nav">
<a href="index.php">首頁</a> <br>
<a href="information.php">產品資訊</a><br>
<?php
if(isset($_SESSION['admin']) && $_SESSION['admin'] == '1'){
	echo'<a href="backstage.php">後台管理</a><br>';
	echo'<a href="backstage_member.php">會員資料</a><br>';
}
if(isset($_SESSION['name'])){
	echo'<a href="bill.php">消費紀錄</a><br>';
	echo'<a href="member_update.php">修改會員</a><br>';
	echo'<a href="logout.php">登出</a><br>';
}
else
	echo'<a href="login.php">會員登入</a><br>';
?>
</div>


<div id="section">
<h2>會員資料</h2>

<p>

<form id="form1" name="form1" method=post action="new_member_action.php"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名:&nbsp;&nbsp;
<input type="text" name="name"/>
<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;電話:&nbsp;&nbsp;
<input type="text" name="phone"/>
<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;信箱:&nbsp;&nbsp;
<input type="text" name="email"/>
<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密碼:&nbsp;&nbsp;
<input type="password" name="pw"/>
<br/><br/>
&nbsp;確認密碼:&nbsp;&nbsp;
<input type="password" name="pw2"/>
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="button" id="button" value="新增" />
</form>




</p>
</div>

<div id="footer">
Copyright 
</div>

</body>
</html>
