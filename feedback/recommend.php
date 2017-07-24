<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>
<!-- blank space between work history and editor --> 
<div style="clear:both; height:15px;"></div>
<div style="min-height:160px; width:611px; text-align:left;">
	<div id="ProfileIndecator">
		<!--<img src="images/indicator.PNG" />-->
	</div>
	<form id="RecommendForm">
		<div id="WorkHistoryFeedback">
			<textarea name="message" id="EditorRecommend" cols="63" rows="16" style="height:220px; width:527px; border:0px; float:left; "></textarea>				
			<input type="hidden" name="SubmitID" value="<?php echo $_REQUEST['SubmitID']; ?>" />
			<input type="hidden" name="SubmitGuestID" value="<?php echo $_SESSION['GuestID']; ?>" />
		</div>
	</form>
</div>

<!-- blank space under editor --> 
<div style="clear:both; height:15px;"></div>

<script type="text/javascript">
// feed back work history 
	$(function()
	{
	  $('#EditorRecommend').wysiwyg();
	  
	});
</script>
