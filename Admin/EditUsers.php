<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');

// Data Update Query for Training 
$query2="SELECT * FROM tbluser WHERE UserID={$_REQUEST['SubmitID']} limit 1";
$result2=@mysqli_query($dbc, $query2);
$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC) ;

//print_r($row2);

?>

<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit Education Form  -->
<form id="EditUserForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="RegisterFirstName" >First name : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" type="text" name="RegisterFirstName" id="EditRegisterFirstName" size="25" value="<?php echo $row2['RegisterFirstName']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="RegisterLastName">Last name :</label>
		</div>	
		<div class="AddDatan">
			<input class="InputBox" type="text" name="RegisterLastName" id="EditRegisterLastName"  size="25" value="<?php echo $row2['RegisterLastName']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="RegisterEmail">Email address :</label>
		</div>	
		<div class="AddDatan">
			<input class="InputBox" type="text" name="RegisterEmail" id="EditRegisterEmail" size="25" value="<?php echo $row2['RegisterEmail']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Password">Password :</label>
		</div>	
		<div class="AddDatan">
			<input class="InputBox" type="password" name="Password" id="EditPassword" size="25" value="<?php echo $row2['Password']; ?>" />
		</div>
	</div>
	<input type="hidden" name="SubmitID" value="<?=$_REQUEST['SubmitID'];?>" />
</form>
