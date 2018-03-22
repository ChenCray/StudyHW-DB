<?php
session_start();
?>
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
    width:500px;
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
<h1>酒類資訊--消費紀錄</h1>
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
<h2>消費紀錄</h2>
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
	if(isset($_SESSION['admin']) && $_SESSION['admin'] == '1'){
		$query = "Select * from bill";
		$result = mysqli_query($mysqli, $query) or die("Query failed : " . mysql_error());
		$mysqli->close();
		echo'<table rules="all" frame="box" ><tr><td>日期</td><td>消費編號</td>
		<td>產品編號</td><td>數量</td><td>總金額</td><th>刪除</th></tr>';
		while ($line = mysqli_fetch_assoc($result)) {
			print("<tr><td>".$line["date"]."</td>\n");
			print("<td>".$line["record"]."</td>\n");
			print("<td>".$line["i_isbn"]."</td>\n");
			print("<td>".$line["number"]."</td>\n");
			print("<td>".$line["total"]."</td>\n");
			echo'<td><form id="bill_delete" name="bill_delete" method=post action="bill_delete.php">';
			echo'<input type="hidden" name="record" value="'.$line["record"].'"/>';
			echo'<input type="submit" name="update" id="update" value="刪除" /></form></td></tr>';
		}		
		echo'</table>';
	}
	
	else{
		$query = "Select * from bill WHERE m_id = '$_SESSION[id]'";
		$result = mysqli_query($mysqli, $query) or die("Query failed : " . mysql_error());
		$mysqli->close();
		print('<table rules="all" frame="box" ><tr><td>日期</td><td>消費編號</td>
		<td>產品編號</td><td>數量</td><td>總金額</td></tr>');
		while ($line = mysqli_fetch_assoc($result)) {
			print("<td>".$line["date"]."</td>\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
			print("<td>".$line["record"]."</td>\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
			print("<td>".$line["i_isbn"]."</td>\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
			print("<td>".$line["number"]."</td>\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
			print("<td>".$line["total"]."</td>");
		}
		echo '</table>';
	}
}
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
