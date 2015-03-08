$(document).ready(function(){
		$('#signin').click(function(){
				$('#registeration_form').hide();
				$('#signin_form').fadeIn(800);
		});
		$('#register').click(function(){
				$('#signin_form').hide();
				$('#registeration_form').fadeIn(800);
		});
		$('#password').keyup(function(){
			var pass = $(this).val();
			length = pass.length;
			if(length == 0){
				$('#password_strength').html('');
			}
			else if(length > 0 && length <= 5){
				$('#password_strength').html('<span style="color: red; font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;Weak</span>');
			}else if(length > 5 && length <=11){
				$('#password_strength').html('<span style="color: #F7D358; font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;Moderate</span>');
			}else{
				$('#password_strength').html('<span style="color: green; font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;Strong</span>');
			}
		}).keydown(function(){
			var pass = $(this).val();
			length = pass.length;
			if(length == 0){
				$('#password_strength').html('');
			}
			else if(length <= 5 && length > 0){
				$('#password_strength').html('<span style="color: red; font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;Weak</span>');
			}else if(length > 5 && length <=11){
				$('#password_strength').html('<span style="color: #F7D358; font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;Moderate</span>');
			}else{
				$('#password_strength').html('<span style="color: green; font-weight: bold">&nbsp;&nbsp;&nbsp;&nbsp;Strong</span>');
			}
			
		});
		$('#password1').keyup(function(){
			var pass1 = $(this).val();
			var pass = $('#password').val();
			if(pass == pass1){
				$('#confirm').html('<span style="color: green ; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;Password Matched!!</span>');
			}else if(pass1 == ''){
				$('#confirm').html('');
			}else{
				$('#confirm').html('<span style="color: red ; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;Password Not Matched!!</span>');
			}
		});
		$('#username').keyup(function(){
				var username = $(this).val();
				$.post('check.php',{stuff:"UN" , username: username }, function(data){
							$('#stat').html(data);
						});  
			
		}).blur(function(){
			
			$('#stat').html("");
		});
		$('#email').keyup(function(){
			var email = $(this).val();
			$.post('check.php',{stuff:"EM", email:email},function(data){
							$('#stat').html(data);
			})
			}).blur(function(){
				
				$('#stat').html("");
			});
		$('#reg').click(function(){
			var fname = $('#fname').val();
			var sname = $('#sname').val();
			var email = $('#email').val();
			var username = $('#username').val();
			var password = $('#password').val();
			var password1 = $('#password1').val();
					
			if(fname=="" || email=="" || username=="" || password=="" || password1==""|| password!=password1){
				$("#stat").html('<span style="color:red;font-weight:bold" >Please Fill In all the Details Correctly</span>');
			}else{
				var name = fname + " " + sname;
				var string = "OK";
				$.post('register.php',{name : name , email:email , username:username , password:password},function(data){
						$("#stat").html(data);
				}); 
			}
			
			
			
			
		});
		
		
			$('#login_user').keyup(function(){
				var username = $(this).val();
					if(username.length != 0){
				$.post('check_user.php',{username:username},function(data){
					$('#login_stat').html(data);
				});
					}
				
			}).blur(function(){
				
				$('#login_stat').html("");
			});
			
/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++  */			
			// controlling profile.php   
			$('#projects').hide();
			$('#notes').hide();
			$('#tasks').hide();  
			
			$('#projects_button').click(function(){
				$('#notes').hide();
				$('#tasks').hide();
				$('#dashboard').hide();  
				$('#projects').fadeIn(800);
				
			});
			$('#tasks_button').click(function(){
				$('#notes').hide();
				$('#projects').hide();
				$('#dashboard').hide();
				$('#tasks').fadeIn(800);
				
			});
			$('#notes_button').click(function(){
				$('#projects').hide();
				$('#dashboard').hide();
				$('#tasks').hide();
				$('#notes').fadeIn(800);
				
			});
			$('#dashboard_button').click(function(){
				$('#projects').hide();
				$('#tasks').hide();
				$('#notes').hide();
				$('#dashboard').fadeIn(800);
				
			});
			$('#general').find('*').css('position','absolute').css('left','300px');
			$('#start_date').datepicker({
				dateFormat: 'DD, d MM, yy'
			});
			$('#end_date').datepicker({
				dateFormat :'DD, d MM, yy'
			});
			$('#add_project').click(function(){
				$('#new_project_form').css('display','').tabs();
				$('#new_project_form').dialog({
					minHeight: 600,
					minWidth: 700,
					resizable: false,
					modal: true,
				});
				});
			$('#save').click(function(){
						$('#save').removeAttr('disabled');
						$('#status').removeAttr('disabled');
						$('#project_name').removeAttr('disabled');
						$('#live_url').removeAttr('disabled');
						$('#start_date').removeAttr('disabled');
						$('#end_date').removeAttr('disabled');
						$('#project_description').removeAttr('disabled');
						$('#company_name').removeAttr('disabled');
						$('#type').removeAttr('disabled');  
						
				var project_description = $('#project_description').val();
				var company_name = $('#company_name').val();
				var type = $('#type').val();
				var status = $('#status').val();
				var project_name = $('#project_name').val();
				var live_url = $('#live_url').val();
				var start_date = $('#start_date').val();
				var end_date = $('#end_date').val();
			if(company_name=="" || type=="" || status =="" || project_name=="" || start_date=="" || end_date==""){
				
				$('#shiv').html('<span style="color:red;font-weight:bold">Please Fill in all the details before saving!! </span>');
				
			}else{
				
				
				$.post('add_project.php',{company_name:company_name,type:type,status:status,project_name:project_name,live_url:live_url,start_date:start_date,end_date:end_date,project_description:project_description},function(data){
					if(data=="TRUE"){
						$('#save').attr('disabled','disabled');
						$('#status').attr('disabled','disabled');
						$('#project_name').attr('disabled','disabled');
						$('#live_url').attr('disabled','disabled');
						$('#start_date').attr('disabled','disabled');
						$('#end_date').attr('disabled','disabled');
						$('#project_description').attr('disabled','disabled');
						$('#type').attr('disabled','disabled');
						$('#company_name').attr('disabled','disabled');
						$('#shiv').html('<span style="color:green;font-weight:bold">Project Successfully Added !!!</span>').delay(3000);
						location.reload(true);
						//$('#tfhover tr').last().after('<tr><td>['+company_name+']</td><td>'project_name'</td><td>'type'</td><td>'status'</td><td>'start_date'</td><td>'end_date'</td><td>Posted_on</td><td>Row:1 Cell:8</td><td>Row:1 Cell:9</td><td>Row:1 Cell:10</td></tr>');
					}else if(data=="FALSE"){
						
						$('#shiv').html('<span style="color:red;font-weight:bold">This Project Already Exist , Please Choose Some Other name</span>');
						
					}
				});
					
				
			}
				
				});
			
			
			
		$('#add_note').click(function(){
				$('#add_task_form').css('display','').tabs();
				$('#add_task_form').dialog({
					modal: true,
					minWidth: 700,
					minHeight: 600,
					maxHeight: 600,
					minWidth: 700 ,
					resizable: false,
					
				});
			
		});	
			
		$('#save_note').click(function(){
			$('#note_title').removeAttr('disabled');
			$('#note').removeAttr('disabled');
			$('#save_note').removeAttr('disabled');
			 var title = $('#note_title').val();
			 var note = $('#note').val();
			 if(title=="" || note==""){
				 $('#note_stat').html('<span style="color: red; font-weight:bold">Please Fill in all details!!</span>');
			 }else{
				 $.post('save_note.php',{title:title,note:note},function(data){
					 if(data=="SUCCESS"){
						 $('#note_title').attr('disabled','disabled');
						 $('#note').attr('disabled','disabled');
						 $('#save_note').attr('disabled','disabled');
						 $('#note_stat').html('<span style="color:green;font-weight:bold">Note Successfully added!!</span>');
						 location.reload(true);
					 }else if(data=="ERROR"){
						 $('#note_stat').html('<span style="color: red;font-weight:bold">Some error occured!!</span>');
					 }
				});
				 
				 
			 }
			
		});
			
			
	
			
			
		
		
		
			
			
		
			
		
	
	
	
});