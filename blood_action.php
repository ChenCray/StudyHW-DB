<?php
session_start();
?>
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
<h1>血液酒精濃度</h1>
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
<?php
if(isset($_SESSION['admin']) && $_SESSION['admin'] == '1'){
	echo'<a href="backstage.php">後台管理</a><br>';
	echo'<a href="backstage_member.php">會員資料</a><br>';
}
if(isset($_SESSION['name'])){
	echo'<a href="bill.php">消費紀錄</a><br>';
	echo'<a href="member_update.php">修改會員</a><br>';
	echo'<a href="logout.php">登出</a><br>';
}
else
	echo'<a href="login.php">會員登入</a><br>';
echo'<a href="blood_alc.php">酒精濃度估算</a><br>';
?>
</div>


<div id="section">
<h2>計算結果</h2>

<p>

<?php
$SD_cal=$_POST['SD'];
$WT_cal=$_POST['WT'];
$DP_cal=$_POST['DP'];
switch($_POST['SEX']){
	case "female":
		$BW_cal=0.49;
		$MR_cal=0.017;
		break;
	case "male":
		$BW_cal=0.58;
		$MR_cal=0.015; 
		break;
}

	
$EBAC= ((0.806*$SD_cal*1.2/10)/($BW_cal*$WT_cal))-($MR_cal*$DP_cal);
$EBAC=round($EBAC,4);
echo "血液中的酒精濃度為".$EBAC."<br/>";
$remain_time=0;
while($EBAC>0.01){
	$remain_time=$remain_time+0.1;
	$EBAC = $EBAC-($MR_cal*0.1);
}
echo "再".$remain_time."個小時就會完全退酒";
//echo $EBAC;


?>
</p>
</div>

<div id="footer">
Copyright 
</div>

</body>
</html>
