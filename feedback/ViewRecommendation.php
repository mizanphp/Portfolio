<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>
<!-- Preview work history -->
<div style="min-height:160px; width:611px; text-align:left">
	<div id="ProfileIndecator" >
		<!--<img src="images/indicator.PNG" />-->
	</div>
	<div id="WorkHistoryFeedback" style="width:542px; padding-right:10px;">
		<?php
		if($_REQUEST['MyProfile']==1){
			$ShowStatus='';
		} else {
			$ShowStatus='AND IsActive=1';
		}
		?>
		
		
		<?php
		// If active, show activated record
		$query="SELECT * FROM tblrecommend INNER JOIN tblguestinfo ON tblrecommend.GuestID=tblguestinfo.GuestID WHERE (ProfileID={$_REQUEST['SubmitID']} $ShowStatus) ORDER BY RecommendID DESC ";
		$result=@mysqli_query($dbc, $query);
		
		if(@mysqli_num_rows($result)>0) {
			$MessageBG = '#F1F8FC';
			$NameBG = '#D7EFFF';
			while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
			$MessageBG = ($MessageBG=='#F1F8FC' ? '#F6F6F6' : '#F1F8FC');
			$NameBG = ($NameBG=='#D7EFFF' ? '#ABABAB' : '#D7EFFF');
			?>
				<div id="DisplayRecord" style="min-height:70px; border:none;">
					<div id="RecommendMessage" style="Background:<?=$MessageBG;?>">
						<p>
							<?=$row['message'];?>
						</p>
					</div>
					<div id="RecommenderName" style="Background:<?=$NameBG;?>">
						<div id="RecommenderField" style="width:80px;"> 
							<?php
							
								// check active status 
								
								if($row['IsActive']==1 ) {
									$ViewRecommendationStatus="checked='checked'";
								} else {
									$ViewRecommendationStatus='';
								}
								
								
								if($_REQUEST['MyProfile']==1){
									echo'<span style="color:#FF6600;">
									<input type="checkbox" '.$ViewRecommendationStatus.' id="ViewRecommendationCheckBox'.$row['RecommendID'].'" onclick="ViewRecommendationIsActive('.$row['RecommendID'].')" />
									Show</span>';
								}
							?>
						</div>
						<div id="RecommenderField"><strong><?=$row['GuestName'];?></strong></div>
						<div id="RecommenderField" style="width:140px; text-align:right; margin-left:10px;"><?=$row['RecommendDate'];?></div>
					</div>
				</div>
				
				
			<?php
			} // The end of while loop
		
		} else {
			echo'<p>Recommendation is not available </p>';
		}
		
		?>
		
	</div> 
</div>