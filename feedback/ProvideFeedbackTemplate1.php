<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>

<!-- Preview template 1 -->
<?php
// Data Retrive quety for Custom Profile preview 			
$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_REQUEST['SubmitID']} AND IsActive=1 AND Template=1 )";
$ResultCus=@mysqli_query($dbc, $QueryCus);
	
	if( @mysqli_num_rows($ResultCus)>0 ) {
		echo'<div style="min-height:160px; width:611px;">';
		while( $RowCus=mysqli_fetch_array($ResultCus, MYSQLI_ASSOC) ) {
			?>
			<div id="MyCustomProfileFeedback">
				<div id="titleCustom">
					<a name="<?=$RowCus['Name']?>" ></a>
					<h2>
					<?php 
						$string=strlen($RowCus['Name']);
						if($string>=42) {
						echo substr($RowCus['Name'],0,42);
						echo'...';
						} else {
							echo $RowCus['Name'];
						}
					?>
					</h2>
				</div>
			</div>
			
			<div id="WorkHistoryFeedback" style="margin-left:25px;">
				<div id="TitleAndPagenation">
					<div id="title" >
						<span>&nbsp;</span>
					</div>
					<div style="float:right; height:30px; width:170px;">
						<span> &nbsp;</span>
					</div>
				</div>
				
				<?php
				// If active, show activated record
				$query="SELECT * FROM tblcaworkhistorystyle WHERE ( CustomareaID={$RowCus['CustomareaID']} AND IsActive=1)";
				$result=@mysqli_query($dbc, $query);
				
				if(@mysqli_num_rows($result)>0) {
				
					while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
					?>
						<div id="DisplayRecord">	
							<div id="TitleAndDate" style="padding-bottom:8px;">
								<div id="HeadLine" >
									<span><?=$row['Title'];?></span>
								</div>
								<div style="float:right; width:200px; color:#990000; font-size:9px;">
									<span>Form: <?=$row['Form'];?>,</span>
									<span>To: <?=$row['Too'];?></span>
								</div>
							</div>
							
							<div id="TitleAndDate">
								<div id="HeadLine" style="color:#444; font-size:12px;">
									<span><?=$row['SubTitle'];?></span>
								</div>
							</div>
							
							<div style="clear:both; min-height:30px; margin-top:15px;">
								<span>
									<?=$row['Description'];?>
								</span>
							</div>
						</div>
					<?php
					} // The end of while loop
				
				}

				?>
				
			</div>
		
		<?php
		} // End of the while loop
		echo'</div>'; // End of the custom template 1
		
		
		
	?>	
	<!-- blank space --> 
	<div style="clear:both; height:15px;"></div>
	
	<div style="min-height:160px; width:611px; text-align:left;">
		<div id="ProfileIndecator">
			<!--<img src="images/indicator.PNG" />-->
		</div>
		<form id="ProvideFeedBackTemplate1Form">
			<div id="WorkHistoryFeedback">
				<textarea name="message" id="EditorFeedbackTemplate1" cols="63" rows="12" style="height:190px; width:527px; border:0px; float:left; "></textarea>				
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
		  $('#EditorFeedbackTemplate1').wysiwyg();
		  
		});
	</script>

		
		
	<?php	
	} // End of the custom template 1 condition
	
?> 