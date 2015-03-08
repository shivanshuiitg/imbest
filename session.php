<?php
	mysql_connect('localhost','root','');
	mysql_select_db('management_project');
	session_start();
	$user_logged = $_SESSION['username'];   
	if($query = mysql_query('SELECT `name` ,`username` FROM `users` WHERE `username` = "'.$user_logged.'"')){
			if(mysql_num_rows($query)==1){
			$row = mysql_fetch_assoc($query);
			$username_logged = $row['username'];
			$name_logged = $row['name'];
		
			}
	}
	
	if(!isset($_SESSION['username'])){
		header('Location: index.php');
	}  
	
?>