
<!-- Add work history style -->
<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->
<form id="AddWHStyleForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Title"> Title :</label>
		</div>	
		<div class="AddDatan">
			<input class="InputBox" type="text" name="Title" id="AddWorkHistoryStyleTitle" size="25" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="SubTitle" >Sub Title : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" type="text" name="SubTitle" id="AddWorkHistoryStyleSubTitle" size="25" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Form">From :</label>
		</div>	
		<input class="SmallBox" style="width:168px;" type="text" name="Form" size="15" id="DatePickerFromAddTemplate1" /> 
		<div class="Too">To:</div>
		<input class="SmallBox" style="width:168px;" type="text" name="Too" size="15" id="DatePickerToAddTemplate1"/>
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px;" >
			<textarea name="Description" id="EditorAddWHStyle" cols="63" rows="12" style="height:190px; width:505px; float:left; "></textarea>
			<input type="hidden" name="CustomareaID" value="<?php echo $_REQUEST['CustomareaID']; ?>" />
			<input type="hidden" name="ProfileID" value="<?php echo $_REQUEST['ProfileID']; ?>" />
		</div>	
	</div>	
</form>

<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorAddWHStyle').wysiwyg();
	  
	});
	
	$('#DatePickerFromAddTemplate1').datepicker({
	inline: true
	});
	
	$('#DatePickerToAddTemplate1').datepicker({
	inline: true
	});
</script>