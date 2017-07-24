<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

// Data Update Query for Training 
$query=" SELECT * FROM tblcadocumentvideoa WHERE DocumentVideoAID={$_REQUEST['DocAID']} LIMIT 1 ";
	
	$result=@mysqli_query($dbc, $query);
	
	$row=@mysqli_fetch_array( $result, MYSQLI_ASSOC );
	
//print_r($row);

?>

<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit Custom Profile Document & VideoA Form  -->
<form id="EditDocAForm" method="post" action="Update.php?Action=EditDocA" enctype="multipart/form-data">
		<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Name" >Name : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" style="width:210px; float:left; margin-left:15px;" type="text" name="Name" id="EditDocAName" size="25" value="<?php echo $row['Name']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="filename"> Document :</label>
		</div>	
		
		<div class="AddDatan">
			<input style="float:left; margin-left:15px;" type="File" name="filename" id="EditDocAFileName" height="50" size="37" value="<?php echo $row['DocType']; ?>" />
			<div id="AllowedDocumentFormat">
				<strong style="color:#C00;">Allow: </strong>
				<span>DOC, DOCX, TXT, PDF</span>
			</div>
		</div>
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln" style="margin-top:20px;">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px; margin-top:20px;"  >
			<textarea name="Description" id="EditorEditDocA" cols="63" rows="12" style="height:190px; width:505px; float:left; "> <?php echo $row['Description']; ?></textarea>				
			<input type="hidden" name="DocAID" value="<?php echo $_REQUEST['DocAID']; ?>" />
		</div>	
	</div>	
</form>

<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorEditDocA').wysiwyg();
	  
	});
</script>
