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
    height:400px;
    width:100px;
    float:left;
    padding:5px;	      
}
#section {
    width:70%px;
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
<!--新增酒品-->
<form id="backstage_new" name="backstage_new" method=post action="new_information_action.php"> 
isbn:
<input type="text" name="isbn"/>
Name:
<input type="text" name="wine"/>
price:
<input type="text" name="price"/>
alc:
<input type="text" name="alc"/>
ml:
<input type="text" name="ml"/>
pic:
<input type="text" name="pic"/>
<input type="submit" name="update" id="update" value="新增" />
<br>
</form>

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
	echo'<table border="1"><tr><td>品項</td><td>價格</td><td>alc%</td><td>ml</td><<th>修改</th><th>刪除</th></tr>';
	while ($line = mysqli_fetch_assoc($result)) {
		print("<tr><td>".$line["wine"]."</td>");
		print("<td>".$line["price"]."</td>");
		print("<td>".$line["alc"]."</td>");
		print("<td>".$line["ml"]."</td>");

		//更新酒品資訊
		echo'<td><form id="backstage_update" name="backstage_update" method=post action="backstage_information_update.php">';
		echo'<input type="hidden" name="isbn" value="'.$line["isbn"].'"/>';
		echo'<input type="hidden" name="wine" value="'.$line["wine"].'"/>';
		echo'<input type="hidden" name="price" value="'.$line["price"].'"/>';
		echo'<input type="hidden" name="alc" value="'.$line["alc"].'"/>';
		echo'<input type="hidden" name="ml" value="'.$line["ml"].'"/>';		
		echo'<input type="hidden" name="pic" value="'.$line["pic"].'"/>';
		echo'<input type="submit" name="update" id="update" value="修改" /></form></td>';
		echo'<td><form id="backstage_delete" name="backstage_delete" method=post action="information_update.php">';
		echo'<input type="hidden" name="isbn" value="'.$line["isbn"].'"/>';
		echo'<input type="hidden" name="update_or_delete" value="2"/>';
		echo'<input type="submit" name="delete" id="delete" value="刪除" /></form></td></tr>';

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
