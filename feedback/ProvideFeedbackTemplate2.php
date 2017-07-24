<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>
<!-- Preview template 2 -->
<?php
// Data Retrive quety for Custom Profile preview			
$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_REQUEST['SubmitID']} AND IsActive=1 AND Template=2 )";
$ResultCus=@mysqli_query($dbc, $QueryCus);

	if( @mysqli_num_rows($ResultCus)>0 ) {
	while( $RowCus=mysqli_fetch_array( $ResultCus, MYSQL_ASSOC ) ) {
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
		<div class="Display" style="display:block; margin-top:20px;" >
		
			<div id="CourseHeading">
				<div id="HeadingField" style=" width:108px;  ">Name</div>
				<div id="HeadingField" style=" width:336px; ">Description</div>
				<div id="HeadingField" style=" width:78px; border:none; ">Type</div>
			</div>
			<?php 
			$query=" SELECT * FROM tblcadocumentvideoa WHERE CustomareaID={$RowCus['CustomareaID']} AND IsActive=1 ORDER BY DocumentVideoAID ASC";
			$result=@mysqli_query( $dbc, $query );
				if( @mysqli_num_rows( $result ) >0 ) {
					
					while( $row1=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
					?>
					<div id="CourseDetailFields">
						<div id="RecordField" style=" width:104px; margin-right:4px;  "><?php echo $row1['Name']; ?></div>
						<div id="RecordField" style=" width:316px; margin-right:4px; padding-left:4px; text-align:left; ">
							<?php echo substr($row1['Description'],0,80);?>
							&nbsp 
							<span id="ViewMore" onclick="ViewDocADesc(<?=$row1['DocumentVideoAID'];?>);"> 
								<i>View details...</i> 
							</span> 
						</div>
						<!-- start document view section ---->
						<!-- start document view section ---->
					
						<?
						/*
							$js.='
							$("#DocumentLink'.$row1['DocumentVideoAID'].' ").colorbox({inline:true, width:"88%", height:"95%"});
							';
						?>
					
						<!--<div class="text-code" data-path="http://localhost/anewsite/UploadedDocument/<?=$row['DocType'];?>" id="RecordField" style=" width:143px; margin-right:4px; padding-top:10px;" >-->
						<?php
						$UploadedFile= $row1['DocType'];	
						list($file, $extention)= explode(".", $UploadedFile);
						
						// start span tag order by extention
						if( ($extention=='doc') or ($extention=='docx') or ($extention=='txt') ) {
							echo'<span>';
						} else {
							echo'<span class="document-list">';
						}
						
						?>
						<!-- document div start -->
						<div
							<?php
						
								if( ($extention=='doc') or ($extention=='docx') or ($extention=='txt') ) {
									$viewer='';
								} else{
									$viewer='class="text-code" data-path='.$GetPath.$row1['DocType'];
									echo $viewer;
								}
							
							?>
							
							id="RecordField" style=" width:78px; padding-top:10px;"> 
						
						<?php
							// doc and docx extention
							if( ($extention=='doc') or ($extention=='docx') ) {
						
								echo'<a href="'.$GetPath.$row1['DocType'].'" >
									<img src="images/doc.png" height="32" width="32" />
								</a>';
						
							} elseif(($extention=='txt')) {
								echo'<a href="'.$GetPath.$row1['DocType'].'" target="_blank">
									<img src="images/text.png" height="32" width="32" />
								</a>';
							} else {
									
								echo'<span style="display:block; cursor:pointer;"';
			
									$ClickDocument='id="DocumentLink'.$row1['DocumentVideoAID'].'" href="#document-preview"';
									echo $ClickDocument;
									
								echo'>';

									if( $extention=='pdf' ) {
										echo'<img src="images/pdf.png" height="32" width="32" /> ';
									}
								
							}
							?>
							</span>
						
						</div><!-- end of document div -->
						</span>
						<!-- end document view for template 2 -->
						<!-- end document view for template 2 -->
						*/?>
						
						
						<div id="RecordField" style=" width:78px; padding-top:10px;">
						<?php
							
							$UploadedFile= $row1['DocType'];
							
							list($file, $extention)= explode(".", $UploadedFile);
							
							if( $extention=='png' ) {
								
								echo'<img src="images/image.png" height="32" width="32" /> ';
							
							} elseif( $extention=='doc' ) {
							
								echo'<img src="images/doc.png" height="32" width="32" /> ';
								
							} elseif( $extention=='docx' ) {
							
								echo'<img src="images/doc.png" height="32" width="32" /> ';
								
							} elseif( $extention=='pdf' ) {
							
								echo'<img src="images/pdf.png" height="32" width="32" /> ';
								
							} elseif( $extention=='txt' ) {
							
								echo'<img src="images/text.png" height="32" width="32" /> ';
							}
						
						?>
						</div>
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
	}// The end of while 
	
	?>
	<!-- blank space --> 
	<div style="clear:both; height:15px;"></div>
	
	<div style="min-height:160px; width:611px; text-align:left;">
		<div id="ProfileIndecator">
			<!--<img src="images/indicator.PNG" />-->
		</div>
		<form id="ProvideFeedBackTemplate2Form">
			<div id="WorkHistoryFeedback">
				<textarea name="message" id="EditorFeedbackTemplate2" cols="63" rows="12" style="height:190px; width:527px; border:0px; float:left; "></textarea>				
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
		  $('#EditorFeedbackTemplate2').wysiwyg();
		  
		});
	</script>

	<?php
	} // Template 2 is not active
?>