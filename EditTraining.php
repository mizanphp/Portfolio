<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

// Data Update Query for Training 
$query2="SELECT * FROM tbltraining WHERE TrainingID={$_REQUEST['TrainingID']} limit 1";
$result2=@mysqli_query($dbc, $query2);
$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC) ;

//print_r($row2);

?>


<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit Work History Form  -->

<form id="EditTrainingForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Title"> Title :</label>
		</div>	
		
		<div class="AddDatan">
			<input class="InputBox" type="text" name="Title" id="EditTrainingTitle" size="25" value="<?php echo $row2['Title']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln" style="height:50px;">
			<label for="ExampleOfLink">Training Link: http://</label>
		</div>	
		<div class="AddDatan" style="height:70px;">
			<input class="InputBox" type="text" name="ExampleOfLink" id="EditTrainingCompanyLink" size="25" value="<?php echo $row2['ExampleOfLink']; ?>" />
			<div id="AllowedLink">
				<strong style="color:#C00;">Exm: </strong>
				<span>www.themexdemo.com</span>
			</div>
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="From">From :</label>
		</div>	
		<input class="SmallBox" type="text" name="From" size="15" value="<?php echo $row2['Fromm']; ?>"  id="DatePickerFromEditTraining" />
		<div class="Current">
			<input type="checkbox" name="Current" id="EditTrainingCurrent" Value="till present" <?php if( $row2['Current']!='' ) { echo 'checked="checked"'; } ?> /> Current
		</div>
		<div class="Too">To:</div>
		<input class="SmallBox" type="text" name="Too" size="15"  value="<?php echo $row2['Too']; ?>" id="DatePickerToEditTraining"/>
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px;" >
			<textarea name="Description" id="EditorEditTraining" cols="63" rows="12" style="height:190px; width:505px; float:left; "><?php echo $row2['Description']; ?></textarea>
			<input type="hidden" name="SubmitTrainingID" size="25" value="<?php echo $row2['TrainingID']; ?>"/>
		</div>	
	</div>	
	</form>
	
<script type="text/javascript">
	$(function()
	{
	  $('#EditorEditTraining').wysiwyg();
	  
	});
	
	// Edit
	$('#DatePickerFromEditTraining').datepicker({
		inline: true
	});
	
	$('#DatePickerToEditTraining').datepicker({
		inline: true
	});
</script>