<?php
session_start();
$mysqlhost="localhost";
$mysqluser="root";
$mysqlpasswd="";
$mysqldb="wine";

/*
$email=$_POST['email'];
$password=$_POST['pw'];
email & password 是空的，因為已經被使用
*/

if($email='' || $password='')			//理論上不用判斷，因為login那邊已經不允許空值
	header('Location:login.php');
else{
	//sql連線
	$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpasswd, $mysqldb);
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	mysqli_set_charset($mysqli,"utf8");
	$sql = "SELECT * FROM member WHERE email = '$_POST[email]' AND pw = password('$_POST[pw]');";
	$name = mysqli_query($mysqli,$sql)or die ("fail".mysql_error());//檢查是否連線成功
	mysqli_close($mysqli);
	$line = mysqli_fetch_assoc($name);
	
	if($line == NULL)
		header('Location:login.php');
	else{
		$_SESSION['id'] = $line["id"];
		$_SESSION['admin'] = $line["admin"];
		$_SESSION['name'] = $line["name"];
		header('Location:index.php');
	}
}
	
?>