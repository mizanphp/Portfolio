<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>
<?php
// Check tbleducation active inactive status
$query="SELECT IsActiveEducation FROM tblprofile WHERE ( ProfileID={$_REQUEST['SubmitID']} AND IsActiveEducation=1	)  LIMIT 1";
$result=@mysqli_query($dbc, $query);

if(@mysqli_num_rows($result)==1) {
?>
	<!-- Preview work history -->
	<div style="min-height:160px; width:611px; text-align:left">
		<div id="ProfileIndecator" >
			<!--<img src="images/indicator.PNG" />-->
		</div>
		<div id="WorkHistoryFeedback">
			<div id="TitleAndPagenation">
				<div id="title" >
					<span>EDUCATIONAL BACKGROUND</span>
				</div>
			</div>
			
			<?php
			// If active, show activated record
			$query="SELECT * FROM tbleducation WHERE ( ProfileID={$_REQUEST['SubmitID']} AND IsActive=1)";
			$result=@mysqli_query($dbc, $query);
			
			if(@mysqli_num_rows($result)>0) {
			
				while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
				?>
					<div id="DisplayRecord">	
						<div id="TitleAndDate">
							<div id="HeadLine" >
								<span style="color:#FF6600;"><?=$row['Title'];?></span>
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
							<p><?=$row['Subject'];?></p>
						</div>
						<div>
							<p>
								<?=$row['Description'];?>
							</p>
						</div>
						
						
						
						<!-- Two Button for course details -->
						<div style="height:40px; width:280px;" >
							<div class="ButtonHideShow" id="ButtonHideShowFeedback<?=$row['EducationID'];?>">
								<div style="float:left; width:130px; height:22px; padding-top:1px; padding-left:3px;">
									<span style="font-size:11px;">View Course Details</span>
								</div>
								<div style="float:left; height:20px; width:16px; margin-top:1px; background:url(images/up.png) no-repeat; ">  
									<img src="images/down.png" id="IndecatorFeedback<?=$row['EducationID'];?>" />
								</div>
							</div>
						</div>
						<?
						$JS.='
							$("#ButtonHideShowFeedback'.$row['EducationID'].'").click(function(){
								$("#DisplayFeedback'.$row['EducationID'].'").slideToggle("slow");
								$("#IndecatorFeed'.$row['EducationID'].'").slideToggle("slow");
							});
						';
						?>
						<div id="DisplayFeedback<?=$row['EducationID'];?>" class="Display">
							<div id="CourseHeading">
								<div id="HeadingField" style=" width:108px;  ">Name</div>
								<div id="HeadingField" style=" width:268px; ">Description</div>
								<div id="HeadingField" style=" width:78px; ">Term</div>
								<div id="HeadingField" style=" width:68px; border:none; ">Grade</div>
							</div>
							<?php 
							$query1=" SELECT * FROM tblcourse WHERE ( EducationID={$row['EducationID']} AND IsActive=1)";
							$result1=@mysqli_query($dbc, $query1);
							
								if( @mysqli_num_rows($result1)>0 ) {
									
									while( $row1=@mysqli_fetch_array($result1, MYSQLI_ASSOC) ) {
									
										if( $row1['IsActive']==1) {
											$CourseIs="checked=\"checked\"";
										} else {
											$CourseIs="";
										}
									
									?>
										
										<div id="CourseDetailFields">
											<div id="RecordField" style=" width:104px; margin-right:4px;  "><?php echo $row1['CourseName']; ?></div>
											<div id="RecordField" style=" width:250px; margin-right:4px; padding-left:4px; text-align:left; ">
												<?php echo substr($row1['Description'],0,80);?>
												&nbsp 
												<span id="ViewMore" onclick="ViewCourDetails(<?=$row1['CourseID'];?>);"> 
													<i>View details...</i> 
												</span>
											</div>
											<div id="RecordField" style=" width:69px; margin-right:4px; padding-top:10px;"><?php echo $row1['Term']; ?></div>
											<div id="RecordField" style=" width:62px; padding-right:4px; "><?php echo $row1['Grade']; ?></div>
										</div>
										
							
									
									<?php
									
									} // the end of while condition
									
								} else {
									//echo'<p> You have not add your course details yet.</p>';
								}															
						
							?>																				
						
						</div>
					</div>
				<?php
				} // The end of while loop
			
			}
			
			?>
			
			<script type="text/javascript">
					
				/* Education Course details button */

				$(document).ready(function(){
				
					<?=$JS?>
					  
				});
					
			</script>
		</div> 
	</div><!-- the end of education -->
	
	<!-- blank space between education and editor --> 
	<div style="clear:both; height:15px;"></div>
	
	<div style="min-height:160px; width:611px; text-align:left;">
		<div id="ProfileIndecator">
			<!--<img src="images/indicator.PNG" />-->
		</div>
		<form id="ProvideFeedBackEducationForm">
			<div id="WorkHistoryFeedback">
				<textarea name="message" id="EditorFeedbackEducation" cols="63" rows="12" style="height:190px; width:527px; border:0px; float:left; "></textarea>				
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
		  $('#EditorFeedbackEducation').wysiwyg();
		  
		});
	</script>
	

<?php
} // Education is not active
?>