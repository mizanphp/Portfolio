
<!-- Add Custom profile document and video B style  -->
<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->
<form id="AddDocBForm" method="post" action="Update.php?Action=AddDocB" enctype="multipart/form-data">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Name" >Name : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" style="width:210px; float:left; margin-left:15px;" type="text" name="Name" id="AddDocBName" size="25" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Date" >Date : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" style="width:210px; float:left; margin-left:15px;" type="text" name="Date" size="25" id="DatePickerDateAddTemplate3" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="filename"> Document :</label>
		</div>	
		
		<div class="AddDatan">
			<input style="float:left; margin-left:15px;" type="File" name="filename" id="AddDocBFileName" height="50" size="37" />
			<div id="AllowedDocumentFormat">
				<strong style="color:#C00;">Allow: </strong>
				<span>DOC,DOCX, TXT, PDF</span>
			</div>
		</div>
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln" style="margin-top:20px;">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px; margin-top:20px;" >
			<textarea name="Description" id="EditorAddDocB" cols="63" rows="12" style="height:190px; width:505px; float:left; "></textarea>				
			<input type="hidden" name="CustomareaID" value="<?php echo $_REQUEST['CustomareaID']; ?>" />
			<input type="hidden" name="ProfileID" value="<?php echo $_REQUEST['ProfileID']; ?>" />
		</div>	
	</div>
</form>


<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorAddDocB').wysiwyg();
	  
	});
	
	// Add
	$('#DatePickerDateAddTemplate3').datepicker({
		inline: true
	});
</script>