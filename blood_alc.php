<?php
session_start();
?>
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
    width:1000px;
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
<h1>血液酒精濃度</h1>
<?php
//session_start();
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
echo'<a href="blood_alc.php">酒精濃度估算</a><br>';
?>
</div>


<div id="section">
<h2>血液酒精濃度</h2>

<p>
<table border="0">
<form id="form1" name="form1" method=post action="blood_action.php"> 
<tr>
<td>酒精攝取量(g):&nbsp;&nbsp;</td>
<td><input type="text" name="SD"/></td>
</tr>
<tr></tr><tr></tr><tr></tr>
<tr>
<td>體重(kg):&nbsp;&nbsp;</td>
<td><input type="text" name="WT"/></td>
</tr>
<tr>
<td>飲酒後時間(hr):&nbsp;&nbsp;</td>
<td><input type="text" name="DP"/></td>
</tr>
<tr>
<td>性別:&nbsp;&nbsp;</td>
<td><input type="radio" name="SEX" value="female">女&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="SEX" value="male">男</td>

<td>&nbsp;&nbsp;<input type="submit" name="button" id="button" value="計算" /></td>
</tr>
</form>
</table>



</p>
</div>

<div id="footer">
Copyright 
</div>

</body>
</html>
