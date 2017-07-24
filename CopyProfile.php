<?php
	// Connect to the data base
	require_once('includes/mysqliConnect.php');
?>
<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->
<!-- Copy Portfolio -->
<div id="DialogCopyProfile" title="Copy Profile">
	<form id="CopyProfileForm">
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="ProfileNewName"> Profile Name :</label>
			</div>	
			<div class="AddDatan">
				<input class="InputBox" type="text" name="ProfileNewName" size="25" id="CopyProfileNewName"/>
			</div>
		</div>
		<div style="padding:5px; clear:both; width:690px;">
			<div class="AddLabeln">
				<label for="ProfileSummary"> Description :</label>
			</div>
			<div style="float:left; margin-left:15px; width:505px;" >
				<textarea name="ProfileSummary" id="EditorCopyProfile" cols="63" rows="12" style="height:40px; width:505px; float:left; "></textarea>
				<input type="hidden" name="GetProfileID" value="<?php echo $_REQUEST['GetProfileID']; ?>" />
				<!--<input type="hidden" name="UserID" value="<?php echo $_REQUEST['UserID']; ?>" />-->
			</div>	
		</div>
	</form>
</div>

<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorCopyProfile').wysiwyg();
	  
	});
</script>