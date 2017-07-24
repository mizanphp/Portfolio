<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');

// Data Update Query for admin info
$query2="SELECT * FROM tbladmin WHERE AdminID={$_SESSION['AdminID']} limit 1";
$result2=@mysqli_query($dbc, $query2);
$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC) ;

//print_r($row2);

?>

<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit admin info Form  -->
<form id="EditAdminInfoForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="AdminName" >Admin name : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" type="text" name="AdminName" id="AdminName" size="25" value="<?php echo $row2['AdminName']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="AdminEmail">Email address :</label>
		</div>	
		<div class="AddDatan">
			<input class="InputBox" type="text" name="AdminEmail" id="AdminEmail" size="25" value="<?php echo $row2['AdminEmail']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="AdminPassword">Password :</label>
		</div>	
		<div class="AddDatan">
			<input class="InputBox" type="password" name="AdminPassword" id="AdminPassword" size="25" value="<?php echo $row2['AdminPassword']; ?>"/>
		</div>
	</div>
	<!--
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="AdminNewPassword">New password :</label>
		</div>	
		<div class="AddDatan">
			<input class="InputBox" type="password" name="AdminNewPassword" id="AdminNewPassword" size="25" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="AdminConfirmPassword">Confirm password :</label>
		</div>	
		<div class="AddDatan">
			<input class="InputBox" type="password" name="AdminConfirmPassword" id="AdminConfirmPassword" size="25"/>
		</div>
	</div>
	-->
	
	<!--<input type="hidden" name="SubmitID" value="<?=$_REQUEST['SubmitID'];?>" />-->
	
</form>
