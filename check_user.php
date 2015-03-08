<?php 
	mysql_connect('localhost','root','') or die("Could Not connect to host");
	mysql_select_db('management_project') or die('Could Not connect to database');
	$username = $_POST['username'];
			if($query = mysql_query('SELECT `username` FROM `users` WHERE `username` = "'.$username.'" ORDER BY `id`')){
				$rows = mysql_num_rows($query);
				if($rows==0){
					echo "<span style='color:red;font-weight:bold'>This Username is not registered , First Sign up!!</span>";
				}
			}






?>