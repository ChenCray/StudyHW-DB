<?php
session_start();
//要用isset...
/*
if(isset($_SESSION['name']))
	echo'Hi,'.$_SESSION['name'];*/
?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
<h1>會員登入</h1>
<?php
//要用isset...

if(isset($_SESSION['name']))
	echo'Hi,'.$_SESSION['name'];
?>
</div>

<div id="nav">
<a href="index.php">首頁</a> <br>
<a href="information.php">產品資訊</a><br>
<a href="login.php">會員登入</a><br>
<a href="blood_alc.php">酒精濃度估算</a><br>
</div>

<div id="section">
<h2>登入</h2>
<form class="login" id="login" name="login" method=post action="login_action.php">
  
  <fieldset>
    
  	<legend class="legend">Login</legend>
    
    <div class="input">
    	<input type="email" name="email" placeholder="Email" required />
      <span><i class="fa fa-envelope-o"></i></span>
    </div>
    
    <div class="input">
    	<input type="password" name="pw" placeholder="Password" required />
      <span><i class="fa fa-lock"></i></span>
    </div>
    
    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
    
  </fieldset>
  
  <div class="feedback">
	<a href="new_member.php">註冊</a><br>	
  </div>
  
</form>
</div>

<div id="footer">
Copyright 
</div>

</body>
</html>
