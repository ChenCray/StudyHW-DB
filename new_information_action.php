<?php
$mysqlhost="localhost";
$mysqluser="id5145958_root";
$mysqlpasswd="123456";
$mysqldb="id5145958_wine";


if($_POST[isbn] == NULL){
	echo "<script>alert('ISBN IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=backstage.php>';
}

else if($_POST[wine] == NULL){
	echo "<script>alert('WINE IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=backstage.php>';
}
	
else if($_POST[price] == NULL){
	echo "<script>alert('PRICE IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=backstage.php>';
}
else if($_POST[alc] == NULL){
	echo "<script>alert('ALC IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=backstage.php>';
}
else if($_POST[ml] == NULL){
	echo "<script>alert('ML IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=backstage.php>';
}
else if($_POST[pic] == NULL){
	echo "<script>alert('PIC IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=backstage.php>';
}

else if($_POST[isbn] != NULL && $_POST[wine] != NULL && $_POST[price] != NULL && $_POST[alc] != NULL && $_POST[ml] != NULL && $_POST[alc] != NULL){
//sql連線
	$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpasswd, $mysqldb);
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	mysqli_set_charset($mysqli,"utf8");
	$sql = "INSERT INTO item(isbn, wine, price, alc, ml, pic) 
			VALUES('$_POST[isbn]', '$_POST[wine]', '$_POST[price]', '$_POST[alc]', '$_POST[ml]', '$_POST[pic]');";
	mysqli_query($mysqli,$sql)or die ("fail".mysql_error());//檢查是否連線成功
	mysqli_close($mysqli);
	header("location:backstage.php");
}

?>