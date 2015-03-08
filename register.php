<?php 	
		session_start();
			
		//**************************************************** Getting the value of variables from index.php
		if(isset($_POST['register'])){
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$sname = $_POST['sname'];
		$name = $fname.' '.$sname;
		$username = $_POST['username'];
		$password = $_POST['password'];
		//***************************************************** Security of data    
		$name = mysql_real_escape_string(htmlentities($name));
		$email = mysql_real_escape_string(htmlentities($email));
		$username = mysql_real_escape_string(htmlentities($username));
		$password = md5($password);
		//**************************************************** Inserting into data base for registration 
		mysql_connect('localhost','root','');
		mysql_select_db('management_project');
		
		$query ='INSERT INTO `users` (`id`,`username`,`password`, `name` ,`email`) VALUES ("NULL" , "'.$username.'" , "'.$password.'" , "'.$name.'" , "'.$email.'")';
		
		 if( mysql_query($query)){
			 $_SESSION['username'] = $username;
			 if(isset($_SESSION['username'])){
			 header("Location: profile.php?user_id=$username");
			 }
			}else{
				header('Location: index.php');
			}
		 }
		
?>