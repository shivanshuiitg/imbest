<?php 
	session_start(); // Including Login page
	
		// if user is already logged in then redirect to profile.php 
		if(isset($_SESSION['username'])){
			header('Location: profile.php');
		}
	
?>
<html>
	<head>
	<title>Project Management System</title>
	
	<link rel="stylesheet" type="text/css" href="css/css_support.css">
	</head>
	<body>
	<div id="header"><h3 id="h_3">Project Management System</h3></div>
	<div id="reg_sign"> 
		<h5 id="h_5">Project Management</h5>
		<span id="signin"><a href="#">Sign in</a></span>
		<span id="register"><a href="#">Register</a></span>
	</div>
    <div id="signin_form">
		<span id="login">Login Page!</span>
		<div id="form1">
			<span id="login_stat"></span>
		<form method="POST" action="login.php">
			<input type="text" id="login_user" name="u_name" class="inputs" placeholder="Username&ast;" required /><br/>
			<input type="password" class="inputs" name="pass" placeholder="Password&ast;" required/><br/>
			<input type="submit" class="css_button" name="submit" value="Login!"/><br/><br/>
		</form>	
		</div>
	</div>
	<div id="registeration_form">
		<span id="registeration">Registeration Page!</span>
		<div id="form2">
					<span id="stat"></span>
			<form method="POST" action="register.php">
					<input type="text" class="inputs" id="fname" name="fname" placeholder="First Name&ast;" required /><br/>
					<input type="text" class="inputs" id="sname" name="sname" placeholder="Last Name" /><br/>
					<input type="text" class="inputs" id="username" name="username" placeholder="UserName&ast;" required/><span id="username_status"></span><br/>
					<input type="text" class="inputs" id="email" name="email" placeholder="Email&ast;" required/><span id="email_status"></span><br/>
					<input type="password" class="inputs" name="password" placeholder="Password&ast;" id="password" required/><span id="password_strength">&nbsp;&nbsp;&nbsp;</span><br/>
					<input type="password" class="inputs" name="password1" placeholder="Confirm Password&ast;" id="password1" required/><span id="confirm"></span><br>
					<input type="submit" class="css_button" name="register" id="reg" value="Register!"/><br/>
					
			</form>
		</div>
		
	</div>
	
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/jquery_support.js"></script>

	</body>
</html>


