<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');
?>
<div id="ViewHistoryContainer">
	<div id="ViewHistory">
		<div id="ViewHistoryHeaders"><div id="HistoryHeaderTest">Viewer Name</div></div>
		<div id="ViewHistoryHeaders"><div id="HistoryHeaderTest">Email Address</div></div>
		<div id="ViewHistoryHeaders" style="width:200px;"><div id="HistoryHeaderTest">Message</div></div>
		<div id="ViewHistoryHeaders" style="width:160px;"><div id="HistoryHeaderTest">Phone</div></div>
		<div id="ViewHistoryHeaders" style="width:130px; border:none;"><div id="HistoryHeaderTest">View Date</div></div>
	</div>
	<?php
	$SelectGuestInfo="SELECT * FROM tblguestinfo WHERE (ProfileIDID={$_REQUEST['SubmitID']}) ORDER BY GuestID DESC";
	$ResultGuestInfo=@mysqli_query($dbc, $SelectGuestInfo);
	if( @mysqli_num_rows($ResultGuestInfo)>0 ) {
	
		while( $RowGuestInfo=@mysqli_fetch_array($ResultGuestInfo, MYSQL_ASSOC) ) {
		?>
		<div id="ViewHistoryRecords" style="border-top:none;">
			<div id="ViewHistoryData"><?=$RowGuestInfo['GuestName'];?></div>
			<div id="ViewHistoryData"><?=$RowGuestInfo['GuestEmail'];?></div>
			<div id="ViewHistoryData" style="width:195px; padding-left:5px; text-align:left;">
			<?php
				// 20 Charecters will display
				$Message = substr($RowGuestInfo['GuestMessage'] ,0 , 15 ); 
				echo $Message;																												
			?>
			&nbsp 
			<span id="ViewMore" onclick="ViewGuestMessageDetails(<?=$RowGuestInfo['GuestID'];?>);"> 
				<i>View</i> 
			</span>
			
			</div>
			<div id="ViewHistoryData" style="width:160px;"><?=$RowGuestInfo['GuestPhone'];?></div>
			<div id="ViewHistoryData" style="width:130px; border:none;"><?=$RowGuestInfo['Date'];?></div>
		</div>
		
		<?php
		}// The end of while
		
	} else {
		echo'<p style="text-align:center;"> History is empty !</p>';
	}
	
	?>
</div>