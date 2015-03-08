<?php 
	session_start();
	
		if(session_destroy()){
		header('Location: http://localhost/management_project/index.php');
		
		}
		
	


?>