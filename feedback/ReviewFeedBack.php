<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>
<!-- Preview work history -->
<div style="min-height:160px; width:611px; text-align:left">
	<div id="ProfileIndecator" >
		<!--<img src="images/indicator.PNG" />-->
	</div>
	<div id="WorkHistoryFeedback">
		<?php
		// If active, show activated record
		$query="SELECT * FROM tblprovidefeedback INNER JOIN tblguestinfo ON tblprovidefeedback.GuestID=tblguestinfo.GuestID WHERE ProfileID={$_REQUEST['SubmitID']} ORDER BY providefeedbackID DESC ";
		$result=@mysqli_query($dbc, $query);
		
		if(@mysqli_num_rows($result)>0) {
		
			while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
			?>
				<div id="DisplayRecord" style="min-height:60px;">	
					<div id="TitleAndDate">
						<div id="HeadLine" style="width:340px;">
							<span><?=$row['GuestName'];?></span>
						</div>
						<div style="float:left; width:166px; font-size:10px;">
							<span><?=$row['date'];?></span>
						</div>
						<div style="clear:both;"> </div>
					</div>
					<div style="height:20px; font-size:12px; font-weight:bold;">
						<span><?=$row['GuestEmail'];?></span>
					</div>
					<div>
						<p>
							<?=$row['message'];?>
						</p>
					</div>
					
				</div>
			<?php
			} // The end of while loop
		
		} else {
			echo'<p>Feedback is not available</p>';
		}
		
		?>
		
	</div> 
</div>