<?php
	session_start();
	
	unset($_SESSION["admin_id"]);
	setcookie("admin_id","0",time()-12);
	header("location:login.php");
?>	