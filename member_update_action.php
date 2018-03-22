<?php
$mysqlhost="localhost";
$mysqluser="id5145958_root";
$mysqlpasswd="123456";
$mysqldb="id5145958_wine";
session_start();

if($_POST[name] == NULL){
	echo "<script>alert('NAME IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=member_update.php>';
}

else if($_POST[phone] == NULL){
	echo "<script>alert('PHONE IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=member_update.php>';
}
	
else if($_POST[email] == NULL){
	echo "<script>alert('EMAIL IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=member_update.php>';
}

else if($_POST[name] != NULL && $_POST[phone] != NULL && $_POST[email] != NULL){
//sql連線
	$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpasswd, $mysqldb);
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	mysqli_set_charset($mysqli,"utf8");
	$sql = "UPDATE member SET name='$_POST[name]', phone='$_POST[phone]', email='$_POST[email]'  WHERE id='$_SESSION[id]'";
	mysqli_query($mysqli,$sql)or die ("fail".mysql_error());//檢查是否連線成功
	mysqli_close($mysqli);
	header("location:member_update.php");
}
?>