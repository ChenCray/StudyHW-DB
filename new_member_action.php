<?php
$mysqlhost="localhost";
$mysqluser="root";
$mysqlpasswd="";
$mysqldb="wine";

$name_action=$_POST['name'];
$phone_action=$_POST['phone'];
$email_action=$_POST['email'];
$pw_action=$_POST['pw'];
$pw2_action=$_POST['pw2'];

if(empty($name_action)){
	echo "<script>alert('NAME IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=new_member.php>';
}

else if(empty($phone_action)){
	echo "<script>alert('PHONE IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=new_member.php>';
}
	
else if(empty($email_action)){
	echo "<script>alert('EMAIL IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=new_member.php>';
}
else if(empty($pw_action)){
	echo "<script>alert('PASSWORD IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=new_member.php>';
}
else if(empty($pw2_action)){
	echo "<script>alert('CHECK PASSWORD IS EMPTY');</script>";
	echo '<meta http-equiv=refresh content=0;url=new_member.php>';
}

else if(!empty($name_action) && !empty($phone_action) && !empty($email_action) && !empty($pw_action) && !empty($pw2_action)){
//sql連線
	$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpasswd, $mysqldb);
	mysqli_query($mysqli, "SET NAMES 'utf8'");
	mysqli_set_charset($mysqli,"utf8");
	$sql = "INSERT INTO member(id, name, phone, email, pw, admin) 
			VALUES('', '$_POST[name]', '$_POST[phone]', '$_POST[email]', PASSWORD('$_POST[pw]'), '');";
	mysqli_query($mysqli,$sql)or die ("fail".mysql_error());//檢查是否連線成功
	mysqli_close($mysqli);
	header("location:login.php");
}

?>