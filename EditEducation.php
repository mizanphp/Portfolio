<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

// Data Update Query for Training 
$query2="SELECT * FROM tbleducation WHERE EducationID={$_REQUEST['EducationID']} limit 1";
$result2=@mysqli_query($dbc, $query2);
$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC) ;

//print_r($row2);

?>

<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit Education Form  -->
	<form id="EditEducationForm">
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="Subject" >Subject : </label>
			</div>
			<div class="AddDatan">
				<input class="InputBox" type="text" name="Subject" size="25" value="<?php echo $row2['Subject']; ?>" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="Title"> Title :</label>
			</div>	
			
			<div class="AddDatan">
				<input class="InputBox" type="text" name="Title" size="25" value="<?php echo $row2['Title']; ?>" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="From">From :</label>
			</div>	
			<input class="SmallBox" type="text" name="From" size="15" value="<?php echo $row2['Fromm']; ?>" id="DatePickerFromEditEducation" />
			<div class="Current">
				<input type="checkbox" name="Current" Value="till present" <?php if( $row2['Current']!='' ) { echo 'checked="checked"'; } ?>/> Current
			</div>
			<div class="Too">To:</div>
			<input class="SmallBox" type="text" name="Too" size="15" value="<?php echo $row2['Too']; ?>"  id="DatePickerToEditEducation"/>
		</div>
		<div style="padding:5px; clear:both; width:690px;">
			<div class="AddLabeln">
				<label for="Description"> Description :</label>
			</div>
			<div style="float:left; margin-left:15px; width:505px;" >
				<textarea name="Description" id="EditorEditEducation" cols="63" rows="12" style="height:190px; width:505px; float:left; "><?php echo $row2['Description']; ?></textarea>
				<input type="hidden" name="SubmitEducationID" size="25" value="<?php echo $row2['EducationID']; ?>"/>
			</div>	
		</div>
	</form>
	
<script type="text/javascript">
	$(function()
	{
	  $('#EditorEditEducation').wysiwyg();
	  
	});
	// Edit
	$('#DatePickerFromEditEducation').datepicker({
		inline: true
	});
	
	$('#DatePickerToEditEducation').datepicker({
		inline: true
	});
</script>