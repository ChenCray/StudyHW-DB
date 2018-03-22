
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
    width:350px;
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
<h1>酒類資訊</h1>
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
<h2>Wine</h2>
<p>
考古物最早歷史可追溯到公元前10,000年前的新石器時代的美索不達米亞。
大約在9000年前的新石器時代已經用糧食和水果釀酒，
在古代埃及和兩河流域同時代也已經開始用水果和大麥釀造果酒和啤酒。

酒作為標準飲食，也用於醫療用途、放鬆和產生快感、娛樂、催情等其它的社交用途，
早自史前就被世界各地的人們廣泛飲用。
</p>
<p>

東漢許慎在《說文解字》說：「酒、就也。所以就人性之善惡也，從水酉，以酉目為之，酉說聲，一曰造也。」
酒精從史前時期就有廣泛紀錄，作為標準飲食和醫療，因為它的弛緩劑和欣快作用也做為消遣目的，
比如春藥。酒也有宗教色彩的神秘用途，像是希臘羅馬宗教在欲死欲仙的酒神祭拜儀式（也稱Bacchus或Dionysus）
認為喝酒可以和神一起狂歡；在基督徒聖餐和猶太教逾越節中也使用酒。
</p>
</div>

<div id="footer">
Copyright
</div>

</body>
</html>
