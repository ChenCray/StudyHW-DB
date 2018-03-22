<?php
$mysqlhost="localhost";
$mysqluser="root";
$mysqlpasswd="";
$mysqldb="wine";

//sql連線
$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpasswd, $mysqldb);
mysqli_query($mysqli, "SET NAMES 'utf8'");
mysqli_set_charset($mysqli,"utf8");
$sql2 = "DELETE FROM member WHERE id='$_POST[id]'";
mysqli_query($mysqli, $sql2) or die("failed2".mysql_error());
$mysqli->close();
header('Location:backstage_member.php');
?>