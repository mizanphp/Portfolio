<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

// Data Update Query for Training 
$query2="SELECT CustomareaID, Name FROM tblcustomarea WHERE CustomareaID={$_REQUEST['TemplateID']} limit 1";
$result2=@mysqli_query($dbc, $query2);
$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC) ;

//print_r($row2);


?>	
	
<form id="EditTemplateNameForm">
	<div style="padding:5px;">
		<div class="AddLabeln" style="margin-top:4px;">
			<label for="EditTemplateName"><b>Profile name :</b></label>
		</div>	
		<div class="AddDatan" style="width:195px;">
			<input class="InputBox" style="width:195px;" type="text" name="NewTemplateName" size="30" value="<?php echo $row2['Name']; ?>" />
			<input type="hidden" name="CustomareaID" value="<?php echo $_REQUEST['TemplateID']; ?>" />
		</div>
	</div>
</form>