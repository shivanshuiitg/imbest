<?php 
	session_start();
	include('database.php');
	$note = $_POST['note'];
	$title = $_POST['title'];
	$username = $_SESSION['username'];
	$time_stamp = time();
	if($query = mysql_query('INSERT INTO `notes` (`notes_id`,`notes`,`posted_on`,`username`,`title`) VALUES ("NULL","'.$note.'","'.$time_stamp.'","'.$username.'","'.$title.'")')){
		echo "SUCCESS";
		
	}else{
		echo "ERROR";
	}

?>