<?php 
	mysql_connect('localhost','root','') or die("Could Not connect to host");
	mysql_select_db('management_project') or die('Could Not connect to database');
	$stuff = $_POST['stuff'];
	
	
		if($stuff == "UN"){
			$username = $_POST['username'];
			if($query = mysql_query('SELECT `username` FROM `users` WHERE `username` = "'.$username.'" ORDER BY `id`')){
				$rows = mysql_num_rows($query);
				if($rows==1){
					echo "<span style='color:red;font-weight:bold'>Username already exist, Try some another !!</span>";
				}else if($rows==0){
					echo "<span style='color:green;font-weight:bold'>You can use this username</span>";
				}
				}
			}else if($stuff == "EM"){
				$email = $_POST['email'];
				if($query = mysql_query('SELECT `email` FROM `users` WHERE `email` = "'.$email.'" ORDER BY `id`')){
					$rows = mysql_num_rows($query);
					if($rows==1){
						echo "<span style='color:red;font-weight:bold'>This Email is already Registered, Try some another !! </span> ";
					}else if($rows==0){
						echo "<span style='color:green;font-weight:bold'>You can use this email</span>";
					}
				}
			}
		
?>