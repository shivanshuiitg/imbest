<?php
	mysql_connect('localhost','root','');
	mysql_select_db('management_project');
	include('session.php');
	 date_default_timezone_set('Asia/Delhi'); 
	$time = time();
	$current_time = date('j M , D   H:m:s',$time); 
	session_start();
	$username = $_SESSION['username'];
?>
<html>
	<head>
		<title><?php echo $name_logged ;?></title>
		<link rel="stylesheet" type="text/css" href="profile_support.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui.structure.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui.theme.css">
		<link rel="stylesheet" type="text/css" href="js/jquery-ui.theme.min.css">
		<script type="text/javascript">
	window.onload=function(){
	var tfrow = document.getElementById('tfhover').rows.length;
	var tbRow=[];
	for (var i=1;i<tfrow;i++) {
		tbRow[i]=document.getElementById('tfhover').rows[i];
		tbRow[i].onmouseover = function(){
		  this.style.backgroundColor = '#ffffff';
		};
		tbRow[i].onmouseout = function() {
		  this.style.backgroundColor = '#d4e3e5';
		};
	}
};
</script>
		
		
	</head>
	<body>
		<div id="header"><h3 id="h_3">Project Management System</h3></div>
	<div id="reg_sign"> 
		<h5 id="h_5">Project Management</h5>
		<span class="Three-Dee" id="welcome_user"><?php echo "Welcome ".$name_logged; ?></span>
		<span id="logout_user"><?php  echo "<a href='logout.php'><img src='logout_button.png' style='width:40px;height:40px'></a>" ;?></span>
	</div>
	<div id="option">
		<a href="#" id="dashboard_button" class="link"><strong>Dashboard</strong></a>
		<a href="#" id="projects_button" class="link"><strong>Projects</strong></a>
		<a href="#" id="tasks_button" class="link"><strong>Tasks</strong></a>
		<a href="#" id="notes_button" class="link"><strong>Notes</strong></a>
		<span id="time"><?php echo $current_time;?></span>
	<div>
	<div id="content">
	<!-- ******************************** DASHBOARD START     ******************************* -->
		<div id="dashboard">
			<div id="notes_dash">
					
					<span id="your_note">Notes:</span>
					<br>
					<?php 
						
						if($query3 = mysql_query('SELECT * FROM `notes` WHERE `username`="'.$username.'" ')){
								$row_num = mysql_num_rows($query3);
								if($row_num==0){
									echo "No Notes Found";
								}else{
									while($row1=mysql_fetch_assoc($query3)){
										$title = $row1['title'];
										$notes = $row1['notes'];
										$post_date = $row1['posted_on'];
										$date1 = date('j M Y , H:i', $post_date);
					?>
				<!--			<div>
								<span style="font-weight:bold"><?php echo $title; ?></span>
								<p id="notees"><?php echo $notes;?></p>
								
							</div>
						<br>
					
					
					
					  -->
					
					<?php 
									}
								}
						}
					?>
					
			</div>
			       <!--************************** Project on dashboard *******************************************-->
				   
				   <br><br><hr>
			<span id="your_projects">Projects</span><br/></br>
			
			<?php 
				
				$query = mysql_query('SELECT * FROM `projects` WHERE `username` = "'.$username.'" ORDER BY `project_id`');
				
				if($query){
					$num_row = mysql_num_rows($query);
					if($num_row==0){
						echo "No Projects Found";
					}else{
			?>
			<table id="tfhover" class="tftable" border="1">
			<tr><th>Company Name</th><th>Project Name</th><th>Project Type</th><th>Status</th><th>Start Date</th><th>End Date</th><th>Posted on</th><th>Update Status</th><th>Attachments</th><th>Actions</th></tr>
			<?php 
				while($row = mysql_fetch_assoc($query)){
					$company_name = $row['project_company'];
					$project_name = $row['project_name'];
					$project_type = $row['project_type'];
					$start_date = $row['start_date'];
					$end_date = $row['end_date'];
					$project_description = $row['project_description'];
					$status = $row['status'];
					$timestamp = $row['timestamp'];
					$posted_on = date('j M Y , H:i',$timestamp)
			?>
			<tr><td><?php echo $company_name ;?></td><td><?php echo $project_name; ?></td><td><?php echo $project_type;?></td><td><?php echo $status; ?></td><td><?php echo $start_date; ?></td><td><?php echo $end_date; ?></td><td><?php echo $posted_on; ?></td><td>Row:1 Cell:8</td><td>Row:1 Cell:9</td><td>Row:1 Cell:10</td></tr>
			
			<?php 
						}
					}
				}else{
					echo "error";
				}  
			?>
			
			</table>
			<!--****************************Dashboard project ends ***************************************************-->
			
			
			
			
			
			
			
			
		</div>
	<!--  ******************************************** DASHBOARD ENDS ************************************************-->
	
	
	<!-- *********************************************PROJECT SECTION STARTS ****************************************-->
		<div id="projects">
			<input type="button" class="link" id="add_project" style="position:absolute;left: 15px" value="add project"></input>
			
			<input type="button" class="link" style="position:absolute;left:500px;" id="on_going" value="ongoing projects"></input>
			<input type="button" class="link" id="completed_going" style="position:absolute;left:800px;" value="completed projects"></input>
			
			<div id="new_project_form" title="New Project" style="display:none;background-color:grey;">
				<ul>
					<li><a href="#general">General</a></li>
					<li><a href="#team">Team</a></li>
					<li><a href="#attachment">Attachments</a></li>
				</ul>
				<div id="general">
				
					Company Name:	<input type="text" id="company_name" required/><br/><br/>
					Type:		<select id="type">
									<option value="Support">Support</option>
									<option value="Internal">Internal</option>
									<option value="New Site">New Site</option>
									</select><br/><br/>
					Status:		<select id="status">
									<option value="Open">Open</option>
									<option value="On Hold">On Hold</option>
									<option value="Closed">Close</option>
									<option value="Cancelled">Cancelled</option>
								</select></br/><br/>
					Project Name:<input type="text" id="project_name" required /><br/><br/>
					Live URL:	<input type="text" id="live_url"/><br/><br/>
					Start Date: <input type="text" id="start_date" required/><br/><br/>
					Tentative End Date: <input type="text" id="end_date" required/><br/><br/>
					Project Description:<textarea id="project_description" cols="22" rows="4"></textarea>
					<br/><br/><br/><br/><br/>
					
					<span id="shiv"></span><br><br>
					<input type="submit" id="save" value="Save"/>
					
				
				</div>
				<div id="team">
					<strong>We are working on this section , we will get back soon !!!</strong>
				</div>
			<div id="attachment">
			
			
			
				
				
			</div>
				</div>
		</div>
		
	<!-- ************************** PROJECT SECTION ENDS ******************************************************** -->
	<!-- **********************************************TASK SECTION STARTS ************************************** -->
		<div id="tasks">
			<strong>Tasks</strong>
		</div>
	<!-- ********************************************* TASK SECTION ENDS ****************************************** -->
	<!-- ********************************************** NOTES SECTION STARTS ************************************** -->
		<div id="notes">
			<input type="button" class="link" value="Add Notes" id="add_note" />
			<div id="add_task_form" style="display:none;background-color:grey" title="Add Notes">
				<ul>
					<li><a href="#add_notes">Notes</a></li>
				</ul>
					<div id="add_notes">
						Title: <input type="text" id="note_title"/><br/>
						Notes:<br/>
						<textarea id="note" cols="60" rows="10"> </textarea>
						<span id="note_stat"></span>
					</div>
					<input type="button" id="save_note" value="Save Note" />
			</div>
		</div>
	<!-- *************************************************NOTES SECTION ENDS **************************************** -->
	</div>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/jquery_support.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	
	 
	</body>
</html>