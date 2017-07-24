<?php 
include("includes/mysqliConnect.php");

if(isset( $_SESSION['UserID'])) {
	// Delete the buffer.
	ob_end_clean(); 
	header("Location:ManagePortfolios.php");
	exit();
}

//// get admin email addredd from database 
$query2="SELECT AdminEmail FROM tbladmin limit 1";
$result2=@mysqli_query($dbc, $query2);
$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrative Control Panel</title>
<script type="text/javascript" src="jQueryUI/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="jQueryUI/js/jquery.colorbox.js"></script>
<link href="admin_style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="colorbox.css" />
<style type="text/css">
  	#field, label { float: left; font-family: Arial, Helvetica, sans-serif; font-size: small; color:#CC3300 }
  	label {  width: 28em; }
	br { clear: both; }
	
	input.submit { float: none; }
	input.error { border: 1px solid red; width: auto; }
	label.error {
		background: url('http://dev.jquery.com/view/trunk/plugins/validate/demo/images/unchecked.gif') no-repeat;
		padding-left: 16px;
		margin-left: .3em;
	}
	label.valid {
		background: url('http://dev.jquery.com/view/trunk/plugins/validate/demo/images/checked.gif') no-repeat;
		display: block;
		width: 16px;
		height: 16px;
	}
</style>


<script type="text/javascript">
$(document).ready(function(){
	$("#ForgotLink").colorbox({inline:true, width:"45%", height:"45%"});
	$("#RegisterLink").colorbox({inline:true, width:"45%", height:"67%"});
	$("#RegisterLink2").colorbox({inline:true, width:"45%", height:"67%"});
});

</script>



<style type="text/css">
.menuboxeach{
	float:left; 
	background:#8FC5A6; 
	padding:4px 8px;
	margin-right:3px;
}
.menuboxeach a{
	text-decoration:none;
	color:#000;

}
.menuboxeach a:hover{
	color:#fff;

}
.btn1{
	border:none;
	background:none;
	cursor:pointer;
}

/*Jquery validator css*/


.submitForm label { width: 10em; float: left; }
.submitForm label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
.submitForm p { clear: both; }
.submitForm em { font-weight: bold; padding-right: 1em; vertical-align: top; color:#CC0000 }

</style>

</head>

<body>


<?php
	
	/*** Active Account ***/
	$x = $y = FALSE;
	
	// Validate $_GET['x'] and $_GET['y']:
	
	if (isset($_GET['x']) ) {
		$x = $_GET['x'];
	}
	if (isset($_GET['y'])) {
		$y = $_GET['y'];
	}

	// If $x and $y aren't correct, redirect the user.
	if ($x && $y) {
		$query = "UPDATE tbluser SET VarifyCode=NULL WHERE RegisterEmail='".$_GET['x']."' LIMIT 1";
		$result = mysqli_query ($dbc, $query);
		$msg="Your account is activated , you may login now";
	}

?>

<?php 

/*** User Login ***/

if( $_REQUEST['Login']=='ok' and $_REQUEST['Email']!='' and $_REQUEST['password']!='' ) {

	$query= "SELECT UserID, RegisterFirstName, RegisterLastName, RegisterEmail FROM tbluser WHERE( RegisterEmail='".$_REQUEST['Email']."' AND Password=SHA1('".$_REQUEST['password']."')) AND VarifyCode IS NULL LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	
	
	if( mysqli_num_rows( $result ) == 1 ) {
	
		$row=@mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		$_SESSION['UserID'] = $row['UserID'];
		$_SESSION['Email'] = $row['RegisterEmail'];
		$_SESSION['FirstName'] = $row['RegisterFirstName'];
		$_SESSION['LastName'] = $row['RegisterLastName'];
		
		
		// Delete buffer register
		ob_end_clean();
		
		// Redirect user to ManagePortfolios pang
		header('Location:ManagePortfolios.php');
		
		// Free up the result 
		mysqli_free_result( $result );
		
		// Close the database connection
		mysqli_close( $dbc );
		
		exit();
	
		
		
	} else {
	
		$msg="Username and password combination does not exist. Please check your username and password and try again. If you have forgotten your password, please click on the link Forgot Password and follow instructions.";
	}
	

}



/*** Forgot Password ***/

if($_REQUEST['Email']!='' and $_REQUEST['forgotEmail']=='ok') {
	
	$query = "SELECT UserID, RegisterFirstName, RegisterLastName FROM tbluser WHERE RegisterEmail='".$_REQUEST['Email']."'  LIMIT 1 ";
	$result = mysqli_query ($dbc, $query);
		
		// Retrieve the user ID:
		
		if (mysqli_num_rows($result) == 1) { 
		
			$row = mysqli_fetch_array ($result, MYSQLI_ASSOC); 
			$uid=$row['UserID'];
			$FirstName=$row['RegisterFirstName'];
			$LastName=$row['RegisterLastName'];
			
		} else { 
		
			// No database match made.
			
			$msg= 'The submitted email address does not match those on file!';
		}
	
	if ($uid) { 	
		// Create a new, random password:
		$p = substr ( md5(uniqid(rand(), true)), 3, 10);
		
		// Update the database:
		$query = "UPDATE tbluser SET Password=SHA1('$p') WHERE UserID=$uid LIMIT 1";
		$result = mysqli_query ($dbc, $query) ;
		
		if(mysqli_affected_rows($dbc) == 1) { // If it ran OK.
		
			$to = $_REQUEST['Email'];
			$subject = "Your temporary password.";
			
			$message = "
			<html>
			<head>
			<title>Digital Portfolio Login</title>
			</head>
			<body>
			<p>Dear <b> $FirstName $LastName </b></p>
			<p>Here is your temporary password:</p>
			<table>
			<tr>
			<th>Password:</th>
			
			<td>$p</td>
			
			</tr>
			</table>
			</body>
			</html>
			";
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			
			// More headers
			$headers.="From:<{$row2['AdminEmail']}>" . "\r\n";	
			
			@mail($to,$subject,$message,$headers);
			
			$msg='Your password has been changed. You will receive the new temporary password at the email address.';
			//$msg.=$message;
			
		} else { // If it did not run OK.
		
			$msg = 'Your password could not be changed due to a system error. We apologize for any inconvenience.'; 
		}
		
		mysqli_close($dbc);

	} 


} // End of the main Submit conditional.
	
	

/** User Registration ***/

if($_REQUEST['Register']=='ok' and $_REQUEST['FirstName']!='' and $_REQUEST['LastName']!='' and $_REQUEST['Email']!='' and $_REQUEST['password']!='' and $_REQUEST['repassword']!='' ) {
	
	// Check exist email id
	$UniqueEmailID="SELECT RegisterEmail FROM tbluser WHERE RegisterEmail='".$_REQUEST['Email']."' LIMIT 1";
	$ResultUniqueEmailID=@mysqli_query($dbc,$UniqueEmailID );
	if(@mysqli_num_rows($ResultUniqueEmailID)==0) {
	
		// Create the activation code:
		$VarifyCode = md5(uniqid(rand(), true));
		
		$query =" INSERT INTO `tbluser` (`RegisterFirstName`,`RegisterLastName`,`RegisterEmail`,`Password`, `VarifyCode`, `RegisterDate`, `IsActive`) VALUES 
										('".$_REQUEST['FirstName']."', '".$_REQUEST['LastName']."', '".$_REQUEST['Email']."', SHA1('".$_REQUEST['password']."') , '$VarifyCode', NOW(), 1 )";
		$result=@mysqli_query($dbc, $query);
		$GenerateNewUserID=mysqli_insert_id($dbc);
		
		if( @mysqli_affected_rows($dbc)==1) {
			
			$to = $_REQUEST['Email'];
			
			$subject = "Digital Portfolio Registration confirmation";
			
			$message = "
			<html>
			<head>
			<title>Digital Portfolio rgister confirm message</title>
			</head>
			<body>
			<p>Dear : ".$_REQUEST['FirstName']." ".$_REQUEST['LastName']."</p>

			<p>Before we can activate your account, we need to verify your email address.
			Please click on the following link.</p>

			<p><a href='".$HostName."index.php?x=".$_REQUEST['Email']."&y=".$VarifyCode."'> ".$HostName."index.php?x=".$_REQUEST['Email']."&y=".$VarifyCode."'</a></p>
			<p><b>Your user id is:</b>  ".$GenerateNewUserID."</p>
			<p>Thank you</p>
			
			<p>Sincerely,</p>

			The Education Management Team
		
			</body>
			</html>
			";
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			
			// More headers
			//$headers .= 'From:<admin@themexsoft.com>' . "\r\n";
			
			$headers.="From:<{$row2['AdminEmail']}>" . "\r\n";
			
			@mail($to,$subject,$message,$headers);
		
			$msg="A mail has been sent to your email address with a confirmation link";
			
			//$msg.=$message;
			
			
		} else {
		
			//$msg = "You could not be registered due to a system error. We apologize for any inconvenience.";
		}
		
	} else {
		$msg='Email id already exist in the system. Please try with another Email id';
	}

}

?>			
<div style="margin:auto; width:950px; min-height:700px;">
	<div>
		<img src="Home_files/header.jpg" height="108" width="945" />
	</div>
	
	<div class="menuBoxBack" style=" width:950px;background:url('Home_files/homeMenuBck.png');">		
		<div class="menuEachBoxoutside">
			<div class="menuEachBox">
			   <a class="" href="index.php"><img width="32" src="Home_files/u47_original.png"></a>
			</div>
			<p class="menuTextTitle"><span class="menuTextTitle">HOME</span></p>
		</div>
		

		<div style="float:right; width:349px; padding:24px 10px 0px 0px; position:relative;"> 
			<div style="float:right; margin-right:10px; ">
		
				<img style="cursor:pointer" id="showr" height="40" src="Home_files/loginButton.png"><br><span class="menuTextTitle" style="margin-left:4px;">LOGIN</span>

			</div>
			 
			<!--User Login Form-->
			<div id="loginForm" style="border:4px solid #333333; border-radius:6px; display:none; padding:0px 0px 10px 12px; width:327px; background:#FFFFFF; position:absolute; z-index:12; margin-top:57px; ">
			
			  <h3 style="color:#666666">Login</h3>
			   
			   <form action="" method="post" onsubmit=" return LoginFormValidation() ">
				   <table cellpadding="3" cellspacing="3">
					   <tr>
						   <td><span style="font-size:12px; color:#666666;">Email Address:</span></td>
						   <td>
								<input type="text" name="Email" id="LoginEmail" style="width:192px; border:1px solid #cccccc; border-radius:5px;"/>
						   </td>
					   </tr>
					   <tr>
						<td><span style="font-size:12px; color:#666666;">Password :</span></td>
						<td>
							<input type="password" name="password" id="LoginPassword" style="width:192px; border:1px solid #cccccc; border-radius:5px;"/>
						</td>
						</tr>
					   
				   </table>
				  
				  <input type="submit" value="Login" style="float:right; margin-right:80px; border:1px solid #cccccc; color:#999999; padding:3px; background:none; border-radius:5px;"/>
				  <input type="hidden" name="Login" value="ok" />
				  <div style="clear:both"></div><br />
				</form>
			  
			   <div style="font-size:10px; float:left; width:110px;">
				 <a id="ForgotLink" href="#ForgotForm">Forgot password?</a>
			   </div>
			   <div style="float:left; width:190px; font-size:10px;">Not yet registered? <a id="RegisterLink2" href="#RegisterForm">click here to signUp</a></div>
			  
			  <div style="clear:both"></div>
			   
			   <div style="position:absolute; top:-16px; right:-16px;">
			   <input type="image" id="hidr" src="Home_files/windowClose.png" />
			   </div>
			
			</div>
			
			<script type="text/javascript">
				$("#showr").click(function () {
				  $("#loginForm").slideDown();
				 
				});
				
				$("#hidr").click(function () {
				  $("#loginForm").slideUp();
				});
			</script>
			
			 <!--User Login Form end-->
			
			<div style="clear:both"></div>
		</div>
		
		<div style="clear:both"></div>
	</div>
	
	<div class="divSeparatorTop" style="width:950px;"></div>
	
	<div style="width:950px; min-height:600px; background:#FFFFFF; background:url('Home_files/homeback.png') repeat-x; border:2px solid #CCCCCC">
		
		<?php
		if($msg){
		
			echo '<div style="width:900px; margin:auto;"><p style="color:#ff0000; text-align:center">'.$msg.'</p></div>';
		}
		
		?>
		<script type="text/javascript">
			/*
			function validateForm(){
				var fnameok=0;
				var lnameok=0;
				var emailok=0;
				
				
			  if($('#FirstName').val()==''){
				$('#fnamemsg').css('display','block');
			  } else {
				$('#fnamemsg').css('display','none');
				 fnameok=1;				
			  }
			  
			  if($('#LastName').val()==''){
				$('#lnamemsg').css('display','block');
			  } else {
				$('#lnamemsg').css('display','none');
				lnameok=1;					
			  }
			 
			 if($('#Emaill').val()==''){
				$('#emailmsgg').css('display','block');
			  } else {
				$('#emailmsgg').css('display','none');
				emailok=1;					
			  }
			  
			  if(fnameok==1 && lnameok==1 && emailok==1){
			     return true;
			  }else{
				return false;
			  }
			  
			
			}
			*/
			
			</script>
		
		<div style="width:408px; margin:180px 0px 0px 530px; height:151px; background:url('Home_files/RegisterInfoback.png');">
			<div style="margin:20px 0px 0px 130px;"><br />

				<b>Why Register?</b>
				<p style="color:#666666; font-size:12px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	 
			
				<a id="RegisterLink" href="#RegisterForm" style="font-size:11px;">Register</a>
				
				<div style='display:none'>
					<div id='RegisterForm' style='padding:10px;'>
						<form action="" method="post" id="Regform" onsubmit="return RegistrationFormValidation()">
							<table cellpadding="5" cellspacing="4">
								<tr><td><span style="font-size:12px; color:#666666;">First Name :</span></td>
									<td>
										<input type="text" name="FirstName" id="RegisterFirstName" class="required" style="width:270px; border:1px solid #cccccc; border-radius:5px; height:25px;"/>
									</td>
								</tr>
								<tr><td><span style="font-size:12px; color:#666666;">Last Name :</span></td>
									<td>
										<input type="text" name="LastName" id="RegisterLastName" class="required" style="width:270px; border:1px solid #cccccc; border-radius:5px; height:25px;"/>
									</td>
								</tr>
								<tr><td><span style="font-size:12px; color:#666666;">Email :</span></td>
									<td>
										<input type="text" name="Email" id="RegisterEmail"   class="required" style="width:270px; border:1px solid #cccccc; border-radius:5px; height:25px;"/>
									</td>
								</tr>
								<tr><td><span style="font-size:12px; color:#666666;">Password :</span></td>
									<td>
										<input type="password"  name="password" id="RegisterPassword" class="required password"  style="width:270px; border:1px solid #cccccc; border-radius:5px; height:25px;"/>
									</td>
								</tr>
								<tr>
									<td><span style="font-size:12px; color:#666666;">Confirm Password :</span></td>
									<td>
										<input type="password"  name="repassword" id="RegisterRePassword" class="required confirm password"  style="width:270px; border:1px solid #cccccc; border-radius:5px; height:25px;"/>
									</td>
								</tr>
							
							</table>
						
						
							<script type="text/javascript">

								/*$("#Regform").validate({
								  rules: {
									email: "required",
									remail: {
									  equalTo: "#email"
									}
								  }
								});*/
				
					
							</script>
						
							<div style="margin:4px 0px 10px 0px; border-top:1px solid #cccccc; width:100%;"></div>
							
							<input type="submit" value="Sign up" style="float:right;" class="btnClass12"/><br />
							
							<input type="hidden" name="Register" value="ok" />
						</form>
					
						<p style="font-size:11px; font-style:italic; color:#666666">Once you Sign up, you will receive a link in your email. Click on that link and complete the registration </p>
				   
					   
					</div>
				</div>
				
				<div style='display:none'>
					<div id='ForgotForm' style='padding:10px; background:#fff;'>
						<form action="" method="post" id="FrtForm" onsubmit="return ForgetPasswordFormValidation()">
							<table cellpadding="4" cellspacing="3">
								<tr><td><span style="font-size:12px; color:#666666;">Your Email :</span></td>
									<td>
										<input type="text" name="Email" id="ForgotEmail" class="required" style="width:270px; border:1px solid #cccccc; border-radius:5px; height:25px;" />
									</td>
								
								</tr>
								<tr><td><span style="font-size:12px; color:#666666;">Retype Email :</span></td>
									<td>
										<input type="text" name="ReEmail" id="ForgotReEmail" class="required" style="width:270px; border:1px solid #cccccc; border-radius:5px; height:25px;"/>
									</td>
								</tr>
							</table>
							<input type="hidden" name="forgotEmail" value="ok" />
							
							<script type="text/javascript">

								/*$("#FrtForm").validate({
								  rules: {
									femail: "required",
									fremail: {
									  equalTo: "#femail"
									}
								  }
								});*/
				
					
							</script>
							
							<div style="margin:4px 0px 10px 0px; border-top:1px solid #cccccc; width:100%;"></div>
							
							<input type="submit" value="Submit" style="float:right; margin-right:27px; border:1px solid #cccccc; color:#999999; padding:4px; background:none; border-radius:5px;"/><br />
							
						</form>
					
						<p style="font-size:11px; font-style:italic; color:#666666">Upon Submit, you will receive an email with your password</p>
						
					</div>
				</div>

			</div>	
		</div>

	</div>
	

</div>

<script type="text/javascript" src="jQueryUI/js/Custom.js"></script>
</body>
</html>
