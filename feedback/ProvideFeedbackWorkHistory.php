<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>

<!-- Preview work history -->
<?php
$query="SELECT IsActiveWorkHistory FROM tblprofile WHERE ( ProfileID={$_REQUEST['SubmitID']} AND IsActiveWorkHistory=1	)  LIMIT 1";
$result=@mysqli_query($dbc, $query);

if(@mysqli_num_rows($result)==1) {
?>
	<div style="min-height:160px; width:611px; text-align:left;">
		<div id="ProfileIndecator">
			<!--<img src="images/indicator.PNG" />-->
		</div>
		<div id="WorkHistoryFeedback">
			<div id="TitleAndPagenation">
				<div id="title">
					<span>WORK HISTORY</span>
				</div>
			</div>
			
			<?php
			$query="SELECT * FROM tblworkhistory WHERE ( ProfileID={$_REQUEST['SubmitID']} AND IsActive=1)";
			$result=@mysqli_query($dbc, $query);
			
			if(@mysqli_num_rows($result)>0) {
			
				while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
				?>
					<div id="DisplayRecord">	
						<div id="TitleAndDate">
							<div id="HeadLine" >
								<span><?=$row['Empolyer'];?></span>
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
						<div id="position">
							<p><?=$row['Title'];?></p>
						</div>
						<div>
							<p>
								<?=$row['Description'];?>
							</p>
						</div>
						<div>
							<p>
								<a href="<?=$row['ExampleOfLink'];?>" ><?=$row['ExampleOfLink'];?></a>
							</p>
						</div>
					</div>
				<?php
				} // The end of while loop
			
			}

			?>
			
		</div>
		
	</div>	
	
	<!-- blank space between work history and editor --> 
	<div style="clear:both; height:15px;"></div>
	
	<div style="min-height:160px; width:611px; text-align:left;">
		<div id="ProfileIndecator">
			<!--<img src="images/indicator.PNG" />-->
		</div>
		<form id="ProvideFeedBackWorkHistoryForm" >
			<div id="WorkHistoryFeedback">
				<textarea name="message" id="EditorFeedbackWorkhistory" cols="63" rows="12" style="height:190px; width:527px; border:0px; float:left; "></textarea>				
				<input type="hidden" name="SubmitID" value="<?php echo $_REQUEST['SubmitID']; ?>" />
				<!--<input type="hidden" name="SubmitGuestID" value="<?php echo $_SESSION['GuestID']; ?>" />-->
			</div>
		</form>
	</div>
	
	<!-- blank space under editor --> 
	<div style="clear:both; height:15px;"></div>
	
	
	<script type="text/javascript">
	// feed back work history 
		$(function()
		{
		  $('#EditorFeedbackWorkhistory').wysiwyg();
		  
		});
	</script>

<?php
}// Work history is not active 
?>