<form id="NewProfileForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="ProfileNewName">Profile Name :</label>
		</div>	
		
		<div class="AddDatan">
			<input class="InputBox" type="text" name="ProfileNewName" id="ProfileNewName" size="25" required="required"/>
		</div>
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px;" >
			<textarea name="Description" id="EditorNewProfile" cols="63" rows="12" style="height:100px; width:505px; float:left; "></textarea>
			<!--<input type="hidden" name="GetProfileID" value="<?=$_REQUEST['GetProfileID']; ?>" />-->
			<input type="hidden" name="SubmitID" value="<?=$_REQUEST['SubmitID'];?>" />
		</div>	
	</div>
</form>

<script type="text/javascript">
// New Profile Editor
	$(function()
	{
	  $('#EditorNewProfile').wysiwyg();
	  
	});
</script>