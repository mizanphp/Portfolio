<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
if(isset( $_SESSION['AdminID'] ) ) {

	// Delete the buffer.
	ob_end_clean(); 
	header("Location:ManageUsers.php");
	exit(); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>eProfile | Administrator Login</title>
<link href="../stylesheet/style.css" rel="stylesheet" type="text/css" media="screen" />
<body>
<?php
/////// Admin login ///////

if( $_REQUEST['AdminLogin']=='ok' && $_REQUEST['AdminName']!='' && $_REQUEST['AdminPassword']!=''  ) {

	$query= "SELECT AdminID, AdminName, AdminPassword FROM tbladmin WHERE( AdminName='".$_REQUEST['AdminName']."' AND AdminPassword=SHA1('".$_REQUEST['AdminPassword']."')) LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	
	if( mysqli_num_rows( $result ) == 1 ) {
	
		$row=@mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		$_SESSION['AdminID'] = $row['AdminID'];
		$_SESSION['AdminName'] = $row['AdminName'];
		
		
		// Delete buffer register
		ob_end_clean();
		
		// Redirect user to ManagePortfolios pang
		header('Location:ManageUsers.php');
		
		// Free up the result 
		mysqli_free_result( $result );
		
		// Close the database connection
		mysqli_close( $dbc );
		
		exit();

	} else {
	
		$msg='Username and password combination does not exist.';
	}
	
}

?>


<div id="AdminBody">
	<div id="AdminPanel" style="height:370px;">
		<div id="AdminHead">Administrator Login</div>
		<div id="AdminErrorMsg">
		<?php
			if(isset($msg) ) {
				echo $msg;
			}
		?>
		</div>
		<form id="AdminForm" action="" method="post"> 
		  <fieldset>
			<legend><strong>Administrator Login</strong></legend>
				<table border="0" cellpadding="6" cellspacing="6">
					<tr>
						<td style="text-align:right;"><b><div style="width:100px;">User name :</div></b></td>
						<td><input type="text" style="padding:3px;" size="30" name="AdminName" id="AdminName"></td>
					</tr>
					<tr>
						<td style="text-align:right;"><b>Password :</b></td>
						<td><input type="password" style="padding:3px;" size="30" name="AdminPassword" id="AdminPassword"></td>
					</tr>
					<tr style="height:50px; margin-top:15px;">
						<td>&nbsp;</td>
						<td><input type="submit" name="submit" value="Login" /></td>
						<input type="hidden" name="AdminLogin" value="ok"/>
					</tr>
				</table>
		  </fieldset>
		</form> 
	</div>
</div>
</body>
</html>