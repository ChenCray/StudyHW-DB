<?php
session_start();
$mysqlhost="localhost";
$mysqluser="id5145958_root";
$mysqlpasswd="123456";
$mysqldb="id5145958_wine";

/*
$email=$_POST['email'];
$password=$_POST['pw'];
email & password 是空的，因為已經被使用
*/

if($email='' || $password='')			//理論上不用判斷，因為login那邊已經不允許空值
{
    echo'debug';
	header('Location:login.php');
}
else{
	//sql連線
	$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpasswd, $mysqldb);
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	mysqli_set_charset($mysqli,"utf8");
	$sql = "SELECT * FROM member WHERE email = '$_POST[email]' AND pw = '$_POST[pw]';";
	$name = mysqli_query($mysqli,$sql)or die ("fail".mysql_error());//檢查是否連線成功
	$line = mysqli_fetch_assoc($name);
	mysqli_close($mysqli);
	//printf("<p>%s</p>",$line["name"]);
	
	if($line == NULL){
	    //printf("<p>fail!</p>");
		header('Location:login.php');
	}
	else{
		$_SESSION['id'] = $line["id"];
		$_SESSION['admin'] = $line["admin"];
		$_SESSION['name'] = $line["name"];
		header('Location:index.php');
	}
}
	
?>