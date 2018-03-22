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
<h1>酒類資訊--產品資訊</h1>
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
echo'<a href="blood_alc.php">酒精濃度估算</a><br>';
?>
</div>

<div id="section">
<h2>產品資訊</h2>
<p>
<?php
$mysqlhost="localhost";
$mysqluser="root";
$mysqlpasswd="";
$mysqldb="wine";

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
	$query = "Select * from item";
	$result = mysqli_query($mysqli, $query) or die("Query failed : " . mysql_error());
	$mysqli->close();
	echo '<table border="1" rules="none" frame="void">';
	$count=1;
	while ($line = mysqli_fetch_assoc($result)) {
		if($count%2 == 1)
			echo'<tr>';
		echo'<td><img src="'.$line["pic"].'"></td>';
		print("<td>
		<table border='1' width='100%' cellpadding='5'  rules='all' frame='box'>
		<tr><td height='50%' >品名</td>
		<td height='50%' width='100%'>"
		.$line["wine"].
		"</td></tr>
		<tr><td>價格</td><td>"
		.$line["price"].
		"</td></tr>
		</table>
		</td>\n");
		if($count%2 != 1)
			echo'</tr>';
		$count++;
	}
	echo '</table>';
	

	
}
	
	//$mysqli->close();
?>
</p>
<p>

</p>
</div>

<div id="footer">
Copyright 
</div>

</body>
</html>
