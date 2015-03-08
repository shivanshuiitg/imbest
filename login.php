<?php


	if(isset($_POST['submit'])){
		
		// Connection to database
	mysql_connect('localhost','root','') or die("Could Not connect to host");
	mysql_select_db('management_project') or die('Could Not connect to database');
		// getting the variables
		session_start();
		if(!empty($_POST['u_name']) && !empty($_POST['pass'])){
			$username = $_POST['u_name'];
			$password = md5($_POST['pass']); 
			
			if($query = mysql_query('SELECT `username`,`password` FROM `users` WHERE `username` = "'.$username.'" AND `password`="'.$password.'"')){
				if(mysql_num_rows($query)==1){
				$row = mysql_fetch_assoc($query);
				$username_db = $row['username'];
				$password_db = $row['password'];
					if($username == $username_db && $password == $password_db){
						$_SESSION['username']=$username_db;  
					if(isset($_SESSION['username'])){
							header('Location:profile.php');
						}	
					}
				}else{
					header('Location:index.php');
				}
			
		    }else{
				header('Location:index.php');
			}  
		}
	}
?>