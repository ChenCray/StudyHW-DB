<!DOCTYPE html>
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
<h1>酒類資訊--後台管理</h1>
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
<a href="backstage.php">後台管理</a><br>
<a href="backstage_member.php">會員資料</a><br>
<a href="bill.php">消費紀錄</a><br>
<a href="member_update.php">修改會員</a><br>
<a href="logout.php">登出</a><br>
</div>

<div id="section">
<h2>後台管理</h2>
<p>

<form id="backstage" name="backstage" method=post action="information_update.php"> 
<?php
echo'<table border="0">';
echo'<input type="hidden" name="isbn" value="'.$_POST["isbn"].'"/>';
echo'<tr><td>Name:</td><td><input type="text" name="wine" value="'.$_POST["wine"].'"/></td><tr/>';
echo'<tr><td>price:</td><td><input type="text" name="price" value="'.$_POST["price"].'"/></td><tr/>';
echo'<tr><td>alc:</td><td><input type="text" name="alc" value="'.$_POST["alc"].'"/></td><tr/>';
echo'<tr><td>ml:</td><td><input type="text" name="ml" value="'.$_POST["ml"].'"/></td><tr/>';
echo'<tr><td>pic:</td><td><input type="text" name="pic" value="'.$_POST["pic"].'"/></td><tr/>';
echo'</table>';
?>
<input type="hidden" name="update_or_delete" value="1"/>
<input type="submit" name="update" id="update" value="完成" />

</form>

</p>
<p>
</p>
</div>

<div id="footer">
Copyright
</div>

</body>
</html>
