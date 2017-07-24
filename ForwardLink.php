<?php
// Connect to the data base
//require_once('includes/mysqliConnect.php');
//$ForwardLink="http://".$_SERVER['HTTP_HOST']."/anewsite/PreviewPortfolio.php?PID=".$_GET['SubmitID']."&Guest=1";
$ForwardLink="http://".$_SERVER['HTTP_HOST']."/mizan/eProfile/PreviewPortfolio.php?PID=".$_GET['SubmitID']."&Guest=1";

?>
<form id="DialogForwordLinkForm">
	<div style="padding:5px; clear:both;">
		<div class="AddLabeln">
			<label for="Link">Link :</label>
		</div>	
		<div class="AddDatan" style="width:450px;">
			<input  readonly id="ForwardLinkLink" class="InputBox" style="width:400px;" type="text" name="Link" size="25" value="<?=$ForwardLink;?>"  />
		</div>
	</div>
	
	<div style="padding:5px; clear:both;">
		<div class="AddLabeln" style="height:50px;">
			<label for="To">Email Address :</label>
		</div>
		<div class="AddDatan" style="height:70px; width:450px;">
			<input id="ForwardLinkTo" class="InputBox" style="width:400px;" type="text" name="To" size="25" />
			<div id="AllowedLink">
				<strong style="color:#C00;">Allow: </strong>
				<span>Multiple email address separated by comma/semicolon</span>
			</div>
		</div>
	</div>
	
	<div style="padding:5px; clear:both;">
		<div class="AddLabeln">
			<label for="Subject">Subject :</label>
		</div>
		<div class="AddDatan" style="width:450px;">
			<input id="ForwardLinkSubject" class="InputBox" type="text" style="width:400px;" name="Subject" size="25" />
		</div>
	</div>
	<div style="padding:5px; height:270px; clear:both;">
		<div class="AddLabeln">
			<label for="Message">Message :</label>
		</div>	
		<div class="AddDatan" style="width:450px;">
			<div style="float:left; margin-left:15px; width:505px;" >
				<textarea name="Message" id="EditorForwardLink" cols="63" rows="12" style="height:190px; width:505px; float:left; "></textarea>
			</div>	
		</div>
	</div>
	<input type="hidden" name="From" value="<?=$_REQUEST['Email'];?>" />
	<?php

		if($_REQUEST['Preview']=='preview'){
				
			echo'
			<div style="padding:5px; clear:both;">
				<div class="AddLabeln">
					<label for="Subject">&nbsp;</label>
				</div>
				<div class="AddDatan" style="width:450px; margin-left:30px;">
					<div id="RequestToGuest">Provide feedback <input type="radio" name="RequestFor" value="feedback" checked="checked"/></div>
					<div id="RequestToGuest">Provide recommendation <input type="radio" name="RequestFor" value="recommend"/></div>
				</div>
			</div>
			';
		}
	?>
	
	
	
	
</form>
<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorForwardLink').wysiwyg();
	  
	});
</script>
