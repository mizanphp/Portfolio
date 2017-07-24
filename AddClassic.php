
<!-- Add Custom profile Classic style Form -->
<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->
<form id="AddClassicForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Title" >Title : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" style="width:210px; float:left; margin-left:15px;" type="text" name="Title" id="AddClassicTitle" size="25" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Date" >Date : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" style="width:210px; float:left; margin-left:15px;" type="text" name="Date" size="25"  id="DatePickerDateAddTemplate4"/>
		</div>
	</div>
	
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px;" >
			<textarea name="Description" id="EditorAddClassic" cols="63" rows="12" style="height:190px; width:505px; float:left; "></textarea>				
			<input type="hidden" name="CustomareaID" value="<?php echo $_REQUEST['CustomareaID']; ?>" />
			<input type="hidden" name="ProfileID" value="<?php echo $_REQUEST['ProfileID']; ?>" />
		</div>	
	</div>	
</form>

<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorAddClassic').wysiwyg();
	  
	});
	
	// Add
	$('#DatePickerDateAddTemplate4').datepicker({
		inline: true
	});
</script>