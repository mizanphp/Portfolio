<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

// Data Update Query for Training 
$query=" SELECT * FROM tblcaclassic WHERE ClassicID={$_REQUEST['ClassicID']} LIMIT 1 ";
	$result=@mysqli_query($dbc, $query);
	$row=@mysqli_fetch_array( $result, MYSQLI_ASSOC );
	
//print_r($row);

?>

<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit WHStyle Form  -->
<form id="EditClassicForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Title" >Title : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" style="width:210px; float:left; margin-left:15px;" type="text" name="Title" id="EditClassicTitle" size="25"  value="<?php echo $row['Title']; ?> "/>
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Date" >Date : </label>
		</div>
		<div class="AddDatan">
			<input  class="InputBox" style="width:210px; float:left; margin-left:15px;" type="text" name="Date" size="25" value="<?php echo $row['Duration']; ?> " id="DatePickerDateEditTemplate4"/>
		</div>
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px;">
			<textarea name="Description" id="EditorEditClassic" cols="63" rows="12" style="height:190px; width:505px; float:left; "><?php echo $row['Description']; ?></textarea>				
			<input type="hidden" name="ClassicID" value="<?php echo $_REQUEST['ClassicID']; ?>" />
		</div>	
	</div>
	<input type="hidden" name="ClassicID" value="<?php echo $_REQUEST['ClassicID']; ?>" />
</form>

<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorEditClassic').wysiwyg();
	  
	});
	
	// Edit
	$('#DatePickerDateEditTemplate4').datepicker({
		inline: true
	});
</script>
