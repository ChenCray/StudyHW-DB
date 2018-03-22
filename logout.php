<?php
session_start();
unset($_SESSION['name']);		//清空name
session_destroy();				//全部session清空
header('Location:index.php');
?>