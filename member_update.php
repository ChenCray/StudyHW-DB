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
<h1>修改會員</h1>
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
?>
</div>


<div id="section">
<h2>會員資料</h2>

<p>

<?php
$mysqlhost="localhost";
$mysqluser="id5145958_root";
$mysqlpasswd="123456";
$mysqldb="id5145958_wine";

//sql連線
$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpasswd, $mysqldb);
//檢查是否連線成功
if (mysqli_connect_errno()) {
		printf("<p>failed", mysqli_connect_error());
		$this->mysqli = FALSE;
		exit();
	}
else{
	//printf("<p>success!</p>");
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	mysqli_set_charset($mysqli,"utf8");	
	$query = "Select * from member WHERE id = '$_SESSION[id]'";
	$result = mysqli_query($mysqli, $query) or die("Query failed : " . mysql_error());
	$mysqli->close();
	$line = mysqli_fetch_assoc($result);
	echo'
	<form id="member_update" name="member_update" method=post action="member_update_action.php"> 
	姓名:&nbsp;&nbsp;
	<input type="text" name="name" value="'.$line["name"].'"/>
	<br/><br/>
	電話:&nbsp;&nbsp;
	<input type="text" name="phone" value="'.$line["phone"].'"/>
	<br/><br/>
	信箱:&nbsp;&nbsp;
	<input type="text" name="email" value="'.$line["email"].'"/>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="button" id="button" value="修改" />
	</form>';
}
?>




</p>
</div>

<div id="footer">
Copyright 
</div>

</body>
</html>
