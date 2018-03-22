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
    width:8%;
    float:left;
    padding:1%;	      
}
#section {
    width:78%;
    float:left;	
    text-align:center;
    padding:1%;	 	 
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
<h1>會員資料--後台管理</h1>
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
<a href="backstage.php">後台管理</a><br>
<a href="backstage_member.php">會員資料</a><br>
<a href="bill.php">消費紀錄</a><br>
<a href="member_update.php">修改會員</a><br>
<a href="logout.php">登出</a><br>
<a href="blood_alc.php">酒精濃度估算</a><br>;
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
	$query = "Select * from member ORDER BY id";
	$result = mysqli_query($mysqli, $query) or die("Query failed : " . mysql_error());
	$mysqli->close();
	echo'<table border="1" rules="all" frame="box" align="center">';
	echo'<tr><td>編號</td><td>名稱</td><td>電話</td><td>Email</td><th>刪除</th></tr>';
	while ($line = mysqli_fetch_assoc($result)) {
		print("<tr><td>".$line["id"]."</td>\n");
		print("<td>".$line["name"]."</td>\n");
		print("<td>".$line["phone"]."</td>\n");
		print("<td>".$line["email"]."</td>\n");
		echo'<td><form id="member_delete" name="member_delete" method=post action="member_delete.php">';
		echo'<input type="hidden" name="id" value="'.$line["id"].'"/>';
		echo'<input type="submit" name="update" id="update" value="刪除" /></form></td></tr>';
	}
	echo'</table>';
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
