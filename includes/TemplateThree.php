<div id="WorkHistory">
	<div style="height:35px; width:740px; margin:auto; ">
		<div style="float:left; width:625px; text-align:right; margin-top:5px;">
			<p style="color:#FF9900; font-size:12px; text-align:right;">Click New to add a document</p>
		</div>
		<div style="float:left; width:35px; margin-top:5px;">
			 <img src="images/back1.png" />
		</div>
		<div onclick="AddDocB(<?php echo $RowCus['CustomareaID']; ?>,<?php echo $_GET['PID']; ?>);" style="float:right; width:75px; margin-top:2px;">
			<div class="New">New</div>
		</div>
	</div>
	<div class="Display" style="display:block; margin:auto;">
		<div id="CourseHeading">
			<div id="HeadingField" style=" width:108px; ">Name</div>
			<div id="HeadingField" style=" width:368px; ">Description</div>
			<div id="HeadingField" style=" width:78px; ">Type</div>
			<div id="HeadingField" style=" width:68px; ">Date</div>
			<div  style=" width:111px; height:30px; padding-top:5px; float:left;">Action</div>
		</div>
		
		<?php
			$query=" SELECT * FROM tblcadocumentvideob WHERE CustomareaID={$RowCus['CustomareaID']} ORDER BY DocumentVideoBID ASC";
			$result=@mysqli_query( $dbc, $query );
			
			if( @mysqli_num_rows( $result ) >0 ) {
			
				while( $row=@mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
				?>
					
					<div id="CourseDetailFields">
						<div id="RecordField" style=" width:103px; margin-right:4px;"><?php echo $row['Name']; ?></div>
						<div id="RecordField" style=" width:362px; margin-right:4px;">
							<p id="CustomDesc" >
								<?php									
									// 136 Charecters will be display
									$Description = substr($row['Description'] ,0 , 136 ); 
									echo $Description;								
								?>
								&nbsp 
								<span id="ViewMore" onclick="ViewDocBDesc(<?=$row['DocumentVideoBID'];?>);"> 
									<i>View detai...</i> 
								</span>
							
							</p>
						</div>
						<?
							$js.='
							$("#DocumentLink'.$row['DocumentVideoBID'].' ").colorbox({inline:true, width:"88%", height:"95%"});
							';
						?>
						
						<!-- templete three documrsts start -->
						<?php
						$UploadedFile= $row['DocType'];	
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
									$viewer='class="text-code" data-path='.$GetPath.$row['DocType'];
									echo $viewer;
								}
							
							?>
							
							id="RecordField" style=" width:73px; margin-right:4px; padding-top:10px;"> 
						
						<?php
							// doc and docx extention
							if( ($extention=='doc') or ($extention=='docx') ) {
						
								echo'<a href="'.$GetPath.$row['DocType'].'" >
									<img src="images/doc.png" height="32" width="32" />
								</a>';
						
							} elseif(($extention=='txt')) {
								echo'<a href="'.$GetPath.$row['DocType'].'" target="_blank">
									<img src="images/text.png" height="32" width="32" />
								</a>';
							} else {
									
								echo'<span style="display:block; cursor:pointer;"';
			
									$ClickDocument='id="DocumentLink'.$row['DocumentVideoBID'].'" href="#document-preview"';
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
						
						
						
						
						
						<!--
						<span class="document-list">
						<!--<div class="text-code" data-path="http://localhost/anewsite/UploadedDocument/<?=$row['DocType'];?>" id="RecordField" style=" width:73px; margin-right:4px; padding-top:10px;">
						
						<div class="text-code" data-path="<?php echo $GetPath.$row['DocType'];?>" id="RecordField" style=" width:73px; margin-right:4px; padding-top:10px;">
							<span id="DocumentLink<?=$row['DocumentVideoBID'];?>" href="#document-preview">
								<?php
									
									$UploadedFile= $row['DocType'];
									list($file, $extention)= explode(".", $UploadedFile);
									echo'<span style="cursor:pointer">';
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
										} elseif( $extention=='flv' ) {								
											echo'<img src="images/video.png" height="32" width="32" /> ';
										} elseif( $extention=='mp4' ) {								
											echo'<img src="images/video.png" height="32" width="32" /> ';
										}
									echo'</span>';
								
								?>
							</span>

						</div>
						</span>
						-->
						<div id="RecordField" style=" width:60px; padding-right:4px; font-size:10px; "><?php echo $row['Date']; ?></div>
						
						
						<div id="CustomArea" >
							<div style="float:left; height:31px; width:40px; margin-left:5px; ">
								<div id="CourseDetailBg" onclick="EditDocB(<?php echo $row['DocumentVideoBID']; ?> );">
									<img src="images/EditCourDe.png" height="16" width="16" alt="Edit Course"/>
								</div>
							</div>
		
							<div style="float:left; height:31px; width:33px;">
								<div id="CourseDetailBg" onclick="DeleteDocB(<?=$row['DocumentVideoBID'];?>,'<?=$row['DocType'];?>');" >
									<img src="images/DelCourDe.png" height="16" width="16" alt="Delete Course" />
								</div>
							</div>
								
							<!-- Row active inactive status -->
								<?php 
								
								if($row['IsActive']==1)
									$DocBtbl="checked=\"checked\"";
								else	
									$DocBtbl="";
								?>

								
							<div style=" float:left; height:31px; width:26px;">
								<input type="checkbox" <?php echo $DocBtbl; ?> id="DocBCheckboxID<?php echo $row['DocumentVideoBID'];?>" onclick="IsActiveDocB(<?php echo $row['DocumentVideoBID']; ?>);" />
								<span class="switch1" style="color:#444; ">Show</span>
							</div>
			
						</div>
					</div>
					
				
				
				<?php
				} // The end of while loop
				
			} else {
				echo'<p> Add your custom profile</p>';
			}
		
		?>
		
		
		
	</div>
	
	
	<!-- Document View -->
	<!-- Document View -->
	<script type="text/javascript">					
		/* Education Course details button */
		$(document).ready(function(){
			<?=$js?> 
		});
	</script>
	
	<div style="display:none;">
		<div style="width:490px; text-align:left;" id="document-preview">
		</div>
	</div>
	<div style="height:30px;"> &nbsp; </div>

</div>