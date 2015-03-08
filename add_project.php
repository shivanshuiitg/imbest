<?php 
	include('database.php');
	session_start();
	
		$username = $_SESSION['username'];
		$time_stamp = time();
		
		$company_name = $_POST['company_name'];
		$type = $_POST['type'];
		$status = $_POST['status'];
		$project_name = $_POST['project_name'];
		$live_url = $_POST['live_url'];
		$start_date = ($_POST['start_date']);
		$end_date = ($_POST['end_date']);
		$project_description = $_POST['project_description'];
		$query1 = mysql_query('SELECT `project_name` FROM `projects` WHERE `project_name`="'.$project_name.'" AND `username`="'.$username.'"');
		$row = mysql_num_rows($query1);
		
		if($row == 0){
		$query ='INSERT INTO `projects` (`project_id`,`username`,`project_name`, `project_company` ,`project_type`,`live_url`,`start_date`,`end_date`,`project_description`,`timestamp`,`status`) VALUES ("NULL" , "'.$username.'" , "'.$project_name.'" , "'.$company_name.'" , "'.$type.'","'.$live_url.'","'.$start_date.'","'.$end_date.'","'.$project_description.'","'.$time_stamp.'","'.$status.'")';
		if(mysql_query($query)){
			echo "TRUE";
		}
		}else if($row !=0){
			echo "FALSE";
		}
?>