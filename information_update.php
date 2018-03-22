<?php
$mysqlhost="localhost";
$mysqluser="root";
$mysqlpasswd="";
$mysqldb="wine";

//$wine 已經被使用
$wine_update=$_POST['wine'];
$price_update=$_POST['price'];
$alc_update=$_POST['alc'];
$ml_update=$_POST['ml'];
$pic_update=$_POST['pic'];

//sql連線
$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpasswd, $mysqldb);
mysqli_query($mysqli, "SET NAMES 'utf8'");
mysqli_set_charset($mysqli,"utf8");

if($_POST['update_or_delete'] == "1"){
	$sql = "SELECT * FROM item WHERE isbn='$_POST[isbn]'";
	$item=mysqli_query($mysqli, $sql) or die("failed".mysql_error());

	$line = mysqli_fetch_assoc($item);
	if($wine_update == '')
		$wine_update = $line["wine"];
	if($price_update == '')
		$price_update = $line["price"];
	if($alc_update =='')
		$alc_update = $line["alc"];
	if($ml_update == '')
		$ml_update = $line["ml"];
	if($pic_update == '')
		$pic_update = $line["pic"];
	$sql2 = "UPDATE item SET wine='$wine_update', price='$price_update', alc='$alc_update', ml='$ml_update', pic='$pic_update'  WHERE isbn='$_POST[isbn]'";
}
else if ($_POST['update_or_delete'] == "2")
	$sql2 = "DELETE FROM item WHERE isbn='$_POST[isbn]'";

mysqli_query($mysqli, $sql2) or die("failed2".mysql_error());
$mysqli->close();
header('Location:backstage.php');
?>