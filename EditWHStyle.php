<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

// Data Update Query for Training 
$query=" SELECT * FROM tblcaworkhistorystyle WHERE WorkHistoryStyleID={$_REQUEST['WorkHistoryStyleID']} LIMIT 1 ";
	
	$result=@mysqli_query($dbc, $query);
	
	$row=@mysqli_fetch_array( $result, MYSQLI_ASSOC );
	
//print_r($row);

?>

<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit WHStyle Form  -->
<form id="EditWHStyleForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Title"> Title :</label>
		</div>	
		
		<div class="AddDatan">
			<input class="InputBox" type="text" name="Title" id="EditWorkHistoryStyleTitle" size="25" value="<?php echo $row['Title']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="SubTitle" >Sub Title : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" type="text" name="SubTitle" id="EditWorkHistoryStyleSubTitle" size="25" value="<?php echo $row['SubTitle']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Form">From :</label>
		</div>	
		<input class="SmallBox" style="width:168px;" type="text" name="Form" size="15" value="<?php echo $row['Form']; ?>" id="DatePickerFromEditTemplate1" />
		<div class="Too">To:</div>
		<input class="SmallBox" style="width:168px;" type="text" name="Too" size="15"  value="<?php echo $row['Too']; ?>" id="DatePickerToEditTemplate1"/>
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px;" >
			<textarea name="Description" id="EditorEditWHStyle" cols="63" rows="12" style="height:190px; width:505px; float:left; "><?php echo $row['Title']; ?></textarea>
			<input type="hidden" name="WorkHistoryStyleID" value="<?php echo $_REQUEST['WorkHistoryStyleID']; ?>" />
		
		</div>	
	</div>	
		
</form>
<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorEditWHStyle').wysiwyg();
	  
	});
	
	// Edit
	$('#DatePickerFromEditTemplate1').datepicker({
		inline: true
	});
	
	$('#DatePickerToEditTemplate1').datepicker({
		inline: true
	});
</script>
