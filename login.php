<?php
	session_start();
	if($_POST['username'] != '' && $log == 'true')
	{
		$_SESSION["username"] = $_POST['username'];
		$_SESSION["password"] = md5($_POST['password']);					
	}
?>