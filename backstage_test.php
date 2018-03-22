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
</div>

<div id="nav">
<a href="index.php">首頁</a> <br>
<a href="information.php">產品資訊</a><br>
<a href="login.php">會員登入</a><br>
<a href="backstage.php">後台管理</a><br>
<a href="new_member.php">新增會員</a><br>
<a href="logout.php">登出</a><br>
</div>

<div id="section">
<h2>後台管理</h2>
<p>

<?php
$wine2='';
if($_POST['wine'] != NULL)
	$wine2=$_POST['wine'];
?>

<form id="backstage" name="backstage" method=post action="information_update.php"> 
Name:
<input type="text" name="wine" value=$_POST['wine'] />
price:
<input type="text" name="price"/>
alc:
<input type="text" name="alc"/>
ml:
<input type="text" name="ml"/>
pic:
<input type="text" name="pic"/>
<br>

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
	$query = "Select * from item";
	$result = mysqli_query($mysqli, $query) or die("Query failed : " . mysql_error());
	$mysqli->close();
	while ($line = mysqli_fetch_assoc($result)) {
		print("<td>".$line["wine"]."</td>");
		echo'<input type="hidden" name="isbn" value="'.$line["isbn"].'"/>';
		echo'<input type="submit" name="update" id="update" value="修改" /><br/>';
	}
}
?>
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
