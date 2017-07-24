<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>
<!-- Preview training and certificate -->
<?php
// Check tbltraining active inactive status
$query="SELECT IsActiveWorkHistory FROM tblprofile WHERE ( ProfileID={$_REQUEST['SubmitID']} AND IsActiveTraining=1	)  LIMIT 1";
$result=@mysqli_query($dbc, $query);

if(@mysqli_num_rows($result)==1) {
?>
	
	<div style="min-height:160px; width:611px; text-align:left;">
		<div id="ProfileIndecator">
			<!--<img src="images/indicator.PNG" />-->
		</div>
		<div id="WorkHistoryFeedback">
			<div id="TitleAndPagenation">
				<div id="title" >
					<span>TRAINING AND CERTIFICATE</span>
				</div>
			</div>
			
			<?php
			// If active, show activated record
			$query="SELECT * FROM tbltraining WHERE ( ProfileID={$_REQUEST['SubmitID']} AND IsActive=1)";
			$result=@mysqli_query($dbc, $query);
			
			if(@mysqli_num_rows($result)>0) {
			
				while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
				?>
					<div id="DisplayRecord">	
						<div id="TitleAndDate">
							<div id="HeadLine" >
								<span style="color:#0099FF;"><?=$row['Title'];?></span>
							</div>
							<div style="float:right; width:200px; font-size:10px;">
								<span>From: <?=$row['Fromm'];?>,</span>
								<?php 
									if( $row['Current']!='') {
										echo $row['Current'];
									} else {
										echo"To: {$row['Too']}";
									}
								?>
							</div>
						</div>
						<div>
							<p>
								<?=$row['Description'];?>
							</p>
						</div>
						<div>
							<p><a href="ViewPortfolio.php?PID=<?=$_GET['PID'];?>"> CLICK TO VIEW</a> &nbsp; &nbsp; <a href="ViewPortfolio.php?PID=<?=$_GET['PID'];?>"><img src="images/ClickToView.PNG" border="0" /></a> </p>
						</div>
						
					</div>
				<?php
				} // The end of while loop
			
			}
		
			?>
			
		</div>
	</div>
	
	<!-- blank space between training and editor --> 
	<div style="clear:both; height:15px;"></div>
	
	<div style="min-height:160px; width:611px; text-align:left;">
		<div id="ProfileIndecator">
			<!--<img src="images/indicator.PNG" />-->
		</div>
		<form id="ProvideFeedBackTrainingForm" >
			<div id="WorkHistoryFeedback">
				<textarea name="message" id="EditorFeedbackTraining" cols="63" rows="12" style="height:190px; width:527px; border:0px; float:left; "></textarea>				
				<input type="hidden" name="SubmitID" value="<?php echo $_REQUEST['SubmitID']; ?>" />
			</div>
		</form>
	</div>
	
	<!-- blank space under editor --> 
	<div style="clear:both; height:15px;"></div>
	
	
	<script type="text/javascript">
	// feed back work history 
		$(function()
		{
		  $('#EditorFeedbackTraining').wysiwyg();
		  
		});
	</script>
	
	
<?php
} // Work training is not active
?>