<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

// Get specific ProfileID 
if( isset( $_GET['PID'] ) && is_numeric( $_GET['PID'] ) ) {
	$_GET['PID'];
	
	$QueryName="SELECT FirstName, MiddleName, LastName FROM tbluserinfo WHERE ProfileID={$_GET['PID']} LIMIT 1";
	$ResultName=@mysqli_query($dbc, $QueryName);
	if(@mysqli_num_rows($ResultName)==1) {
		$WelcomeTo=@mysqli_fetch_array($ResultName, MYSQLI_ASSOC) ;
		$name ='<span> '.$WelcomeTo['FirstName'].'  '.$WelcomeTo['MiddleName'].' '.$WelcomeTo['LastName'].'</span>' ;
	}
	
} else {
	// Delete the buffer
	ob_end_clean();
	header('location:ManagePortfolios.php');
	exit();
}

if( $_REQUEST['Guest']==1 ) {
	include('includes/GuestInfo.php');
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Preview portfolio</title>
<link href="./stylesheet/StylePortfolio.css" rel="stylesheet" type="text/css" media="screen" />
<link href="./jQueryUI/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jQueryUI/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="./jQueryUI/js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="./jQueryUI/js/flowplayer-3.2.6.min.js"></script>
<link href="./stylesheet/jquery.wysiwyg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jQueryUI/js/jquery.wysiwyg.js"></script>
<!-- Document viewer -->
<link href="documentViewer/css/style.css" rel="stylesheet" >
<!--<link href="stylesheet/demo.css" rel="stylesheet">-->
<script type="text/javascript" src="documentViewer/libs/yepnope.1.5.3-min.js"></script>
<script type="text/javascript" src="documentViewer/ttw-document-viewer.min.js"></script>
<script type="text/javascript" src="jQueryUI/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="jQueryUI/js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="colorbox.css" />

</head>
<?php
// Data Retrive Query for user profile	
$query=" SELECT * FROM tbluserinfo WHERE ProfileID={$_GET['PID']} LIMIT 1 ";
$result=@mysqli_query($dbc, $query);

if(@mysqli_num_rows($result)==1) {
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC);	
}

?>


<!-- Forward link -->
<div id="DialogForwordLink" title="Forward link">
	<div id="DialogForwordLinkContent">
	</div>
</div>

<!-- View course details  -->
<div id="DialogViewCoureDetails" title="View Course Details" style="clear:both;">
	<div id="DialogViewCoureDetailsContent">
	</div>
</div>


<!-- View document & video A style custom profile  -->
<div id="DialogViewDocADesc" title="View Description" style="clear:both;">
	<div id="DialogViewDocADescContent">
	</div>
</div>

<!-- View document & video B style custom profile  -->
<div id="DialogViewDocBDesc" title="View Description" style="clear:both;">
	<div id="DialogViewDocBDescContent">
	</div>
</div>

<!--////////// provide feedback ////////-->
<!--///////// provide feedback ////////-->

<!-- provide feedback work history  -->
<div id="DialogProvideFeedBackWorkHistory" title="Provide feedback">
	<div id="ProvideFeedBackWorkHistoryContent">
	
	</div>
</div>
<!-- provide feedback training  -->
<div id="DialogProvideFeedBackTraining" title="Provide feedback">
	<div id="ProvideFeedBackTrainingContent">
	</div>
</div>
<!-- provide feedback education  -->
<div id="DialogProvideFeedBackEducation" title="Provide feedback">
	<div id="ProvideFeedBackEducationContent">
	</div>
</div>

<!--/////// start custom profile ///////-->
<!-- provide feedback template1  -->
<div id="DialogProvideFeedBackTemplate1" title="Provide feedback">
	<div id="ProvideFeedBackTemplate1Content">
	</div>
</div>
<!-- provide feedback template2  -->
<div id="DialogProvideFeedBackTemplate2" title="Provide feedback">
	<div id="ProvideFeedBackTemplate2Content">
	</div>
</div>
<!-- provide feedback template3  -->
<div id="DialogProvideFeedBackTemplate3" title="Provide feedback">
	<div id="ProvideFeedBackTemplate3Content">
	</div>
</div>
<!-- provide feedback template4  -->
<div id="DialogProvideFeedBackTemplate4" title="Provide feedback">
	<div id="ProvideFeedBackTemplate4Content">
	</div>
</div>

<!--///////// end of provide feedback ////////-->


<!--////// review feedback start ////////-->
<!-- review feedback -->
<div id="DialogReviewFeedBack" title="Review feedback">
	<div id="DialogReviewFeedBackContent">
	</div>
</div>


<!--////// recommend start ////////-->
<!-- recommend -->
<div id="DialogRecommend" title="Recommend">
	<div id="DialogRecommendContent">
	</div>
</div>


<!-- view recommend -->
<div id="DialogViewRecommend" title="View recommendation">
	<div id="DialogViewRecommendContent">
	</div>
</div>

<!-- Send email -->
<div id="DialogSendEmail" title="Send E-mail" style="clear:both;">
	<form id="SendEmailForm">
		<div style="padding:5px; clear:both;" >
			<div class="AddLabeln">
				<label for="From"> To :</label>
			</div>	
			<div class="AddDatan">
				<input readonly class="InputBox" type="text" name="To" value="<?=$row['Email'];?>" size="25" id="MailEmailAddress"/>
			</div>
		</div>
		<div style="padding:5px; clear:both;">
			<div class="AddLabeln">
				<label for="Subject">Subject :</label>
			</div>	
			<div class="AddDatan">
				<input class="InputBox" type="text" name="Subject" size="25" id="MailEmailSubject"/>
			</div>
		</div>
		<div style="padding:5px; clear:both; width:600px;">
			<div class="AddLabeln">
				<label for="Message"> Message :</label>
			</div>
			<div style="float:left; margin-left:13px; width:450px;" >
				<textarea name="Message" id="EditorSendEmail" cols="55" rows="8" style="height:190px; width:360px; float:left;" ></textarea>
			</div>	
		</div>	
	</form>
</div>
<body>
	<!-- Main Container and Page Body -->
	<div id="MainContainer">
		<div id="ContainerBody">
			<!-- Header -->
			<div id="header">
				<div style=" float:left; height:109px; width:109px; margin:10px; ">
					<img src="images/logo.png" height="109" width="109"/>
				</div>
				<div id="UserName">
					<?=$name;?>
				</div>
			</div>
			<!-- Page summary heading -->	
			<div id="SummaryHeading">
				<div id="FeaturedMedia">
					<span>FEATURED MEDIA</span>
				</div>
				<div id="summary">
					<span>SUMMARY</span>
				</div>
				<?php
				if( $_GET['MyProfile']==1) {
				?>
					<div id="ForwardLink" onclick="ForwordLink(<?=$_GET['PID'];?>,'<?=preview;?>','<?=$row['Email'];?>')" onmouseout="this.style.color='#444'" onmouseover="this.style.color='#000'">
						<span>Forward link</span>
					</div>
				<?} ?><!--end of the condition -->
				

				<div style="clear:both;"></div>
			</div>
			<!-- Side bar and summary -->
			<div id="SideAndSummary" >
				<!-- Side bar -->
				<div id="SideBar">
					<div style="height:190px; width:240px;">
						<div id="photo">
							<?php
							/////////// Show activated image and video ///////////
							/////////// Show activated image and video ///////////
							
							$queryIV="SELECT IsActiveShowPhoto, IsActiveShowVideo FROM tblprofile WHERE (ProfileID={$_GET['PID']} ) LIMIT 1";
							$resultIV=@mysqli_query($dbc, $queryIV);
							
							if(@mysqli_num_rows($result)==1 ) {
							
								$rowIV=@mysqli_fetch_array($resultIV, MYSQLI_ASSOC);
							
								echo'<div class="ShowImageVideo" id="ForImagePreview" style="display:block;">';
									// Select Image
									if( $rowIV['IsActiveShowPhoto']==1 ) {
								
										$queryUser=" SELECT Photo FROM tblphoto WHERE (ProfileID='{$_GET['PID']}' AND IsActive=1) ";
										$resultUser=@mysqli_query($dbc, $queryUser);
										$totalrow=mysqli_num_rows($resultUser);
										if($totalrow>0) {
										$lpl=1;
											while ($rowUser=@mysqli_fetch_array( $resultUser, MYSQLI_ASSOC ) ) {
												$image=$rowUser['Photo'];
												
												if($lpl==$totalrow){
													$style=" style='display:block;' ";
												}else{
													$style=" style='display:none;' ";
												}
												
												echo '<img id="imMain'.$lpl.'" src="UploadedImages/'.$image.'" '.$style.' height="160" width="150" alt="Add your Picture" />';
												$lpl++;
											}
											
										} else {
											echo'<img src="images/HumanImage.png" height="160" width="150"/>';
										} 
									
									}
									
								echo'</div>';
								echo'<a name="video" > </a>';
								echo'<div class="ShowImageVideo" id="ForVideoPreview" style="display:none;">';
									// Select Video
									if( $rowIV['IsActiveShowVideo']==1 ) {
					
										$queryV="SELECT Video FROM tblvideo WHERE (ProfileID='{$_GET['PID']}' AND IsActive=1) ";
										$resultV=@mysqli_query($dbc, $queryV);
										$TotalRow=@mysqli_num_rows($resultV);
										if($TotalRow>0 ) {
											$count=1;
											while( $rowV=@mysqli_fetch_array($resultV, MYSQLI_ASSOC)) {
												$Video=$rowV['Video'];
												
												if($count==$totalrow){
													$style=" style='display:block;' ";
												}else{
													$style=" style='display:none;' ";
												}
												
												echo'
													<div id="VideoMain'.$count.'" '.$style.'>
														<a href="UploadedVideos/'.$Video.'" style="display:block; height:160px; width:150px; margin:auto;" id="player'.$count.'"></a> 
													</div>
												';
												echo'
												<script>
												  flowplayer("player'.$count.'", "flowplayer/flowplayer-3.2.7.swf", {
													  clip: {
														  autoPlay:false,
														  autoBuffering: true
													  }
												  });
												</script>
												';
												
												$count++;
											}//the end of while loop 
											
											
										} else {
											echo'<img src="images/inactive_video.png" height="160" width="150" />';
										}
									}else {
										echo'Video is not active';
									}
									
								echo'</div>';
								
								
							} else {
								// Inactive both
							}
							?>
							
							<div style="float:right; width:35px; height:195px;">
								<?php
								///// photo and video button will show order by activation ////
									
									if($rowIV['IsActiveShowPhoto']==1) {
										echo'
											<div id="ImagePreview" class="IMG"  onclick="ShowImagePreview();">
												<img src="images/PhotoIndicator1.PNG"  height="95"  width="35"/>
											</div>';
									}
									
									if($rowIV['IsActiveShowVideo']==1) {
										echo'<div id="VideoPreview" class="VDO"  onclick="ShowVideoPreview();" >
											<img src="images/VideoIndicator.PNG"  height="95" width="22">
											</div>';
									}
								?>
							</div>
						</div>
					</div>
					<div id="SideBarShadows">
						<!-- shadow -->
					</div>
					<!-- Image thumbnail button -->
					<?php
					
					if($rowIV['IsActiveShowPhoto']==1) {
					
						echo'<div class="SortGallery" style="display:block;" id="ButtonImagePreview">';
						
							$QueryPhoto=" SELECT Photo FROM tblphoto WHERE (ProfileID='{$_GET['PID']}' AND IsActive=1)";
							$ResultPhoto=@mysqli_query($dbc, $QueryPhoto);
							$TotalPhotoThumnail=@mysqli_num_rows($ResultPhoto);
	
								if($TotalPhotoThumnail>4) {
									$DisplayImageArrow='display:block';
								} else {
									$DisplayImageArrow='display:none';
								}
								
								
								echo'
									<div class="arrow" style="padding-right:2px; padding-left:2px;'.$DisplayImageArrow.'">
										<img disabled="disabled" src="images/Previus.png" width="14" height="15" id="prevPageButon" onclick="previousbox()"/>								
									</div>
									';
								echo'<div id="showdiv1"  style="width:167px; float:left; display:block;">';
								
								$divbox=2;
								if($TotalPhotoThumnail>0) {
									$lpl2=1;
									while($AllPhoto=@mysqli_fetch_array($ResultPhoto, MYSQLI_ASSOC )) {
										
										$image=$AllPhoto['Photo'];
										
										echo'
											<div class="GalleryElement">
												<img style="cursor:pointer;" onclick="ImgBoxShow('.$lpl2.')" id="ShortImg'.$lpl2.'" src="UploadedImages/'.$image.'" height="40" width="35" alt="Your photo" />
											</div>
										';
										
										if($lpl2%4==0){
											echo '
												<div style="clear:both">
												</div>
											</div>
											<div style="width:167px; display:none; float:left;" id="showdiv'.$divbox.'">';
											$divbox++;
										}
									
										$lpl2++;
										
									}// end of whill
									
								} else {
									echo'Activated photo is not available';
								}
								?>
								<input type="hidden" id="nowView" value="1" />
								<input type="hidden" id="totalPage" value="<?php echo $divbox-1;?>" />
								<?php
								
								echo'</div>';
								// photo thumnail next button 
								echo'<div class="arrow" style="text-align:right;'.$DisplayImageArrow.'">
										<img src="images/Next.png" width="14" height="14" id="nextPageButon" onclick="nextBox()"/>	
									</div>
									<div style="clear:both"></div>';
							
							
						?>
							<div style="clear:both;"></div>
						</div>
					
					<!-- View uploaded photo -->
					<script type="text/javascript">
						function ImgBoxShow(id){
							for(var k=1; k<<?php echo $lpl2;?>;k++){
								if(k==id){
								 $('#imMain'+k).css("display","block");
								}else{
								 $('#imMain'+k).css("display","none");
								}
							}
						}
					</script>
					
					
					<?php
					
					}// end of photo condition
					
					if($rowIV['IsActiveShowVideo']==1) {
					echo'<div class="SortGallery" style="display:none;" id="ButtonVideoPreview">';
						
						$queryVDOSmall=" SELECT Video FROM tblvideo WHERE (ProfileID='{$_GET['PID']}' AND IsActive=1) ";
						$resultVDOSmall=@mysqli_query($dbc, $queryVDOSmall);
						$TotalVideoThumnail=@mysqli_num_rows($resultVDOSmall);
						
						if($TotalVideoThumnail>4) {
							$DisplayVideoArrow='display:block';
						} else {
							$DisplayVideoArrow='display:none';
						}
						
						// video thumnail previous button 
						echo'
							<div class="arrow" style="padding-right:2px; padding-left:2px;'.$DisplayVideoArrow.'">
								<img disabled="disabled" src="images/Previus.png" width="14" height="15" id="prevPageButonVDO" onclick="previousboxVDO()"/>								
							</div>
							';
						echo'<div id="showdivVDO1"  style="width:167px; float:left; display:block;">';
						
						if($TotalVideoThumnail>0) {
							$divboxVDO=2;
							$countSmall=1;
							while( $rowVDOSmall=@mysqli_fetch_array( $resultVDOSmall, MYSQLI_ASSOC )) {
							
								$VDOSmall=$rowVDOSmall['Video'];
								
								echo'
								<div class="GalleryElement" onclick="VDOBoxShow('.$countSmall.')" id="ShortImg'.$countSmall.'">
									<img src="images/video.png" height="26" width="27"/>
									<span style="font-size:10px; font-weight:bold;">Video'.$countSmall.'</span>
								</div>
								';
								
								if($countSmall%4==0){
									echo '
										<div style="clear:both">
										</div>
									</div>
									<div style="width:167px; display:none; float:left;" id="showdivVDO'.$divboxVDO.'">';
									$divboxVDO++;
								}
								
								$countSmall++;
								
							} // end of while 
							
							?>
							<input type="hidden" id="nowViewVDO" value="1" />
							<input type="hidden" id="totalPageVDO" value="<?php echo $divboxVDO-1;?>" />
							<?php
			
						} else {
							echo'Activated video is not available';
						}
						
						echo'</div>';
						
						// video thumnail next button 
						echo'<div class="arrow" style="text-align:right;'.$DisplayVideoArrow.'">
								<img src="images/Next.png" width="14" height="14" id="nextPageButonVDO" onclick="nextBoxVDO()"/>	
							</div>
						<div style="clear:both"></div>';
						
						?>
						<div style="clear:both;"></div>
					</div>
				
					<script>
						//View uploaded photo 
						function VDOBoxShow(id){
							//alert(id);
							for(var k=1; k<<?php echo $countSmall;?>;k++){
								if(k==id){
								 $('#VideoMain'+k).css("display","block");
								}else{
								 $('#VideoMain'+k).css("display","none");
								}
							}
						}
		
					</script>
					
					<?php 
					} // end of video condition
					?>
					
					
					<div id="ShortAddress">
						<div style="width:198px; min-height:60px; clear:both;">
							<?php
								echo '
								<span>'.$row['FirstName'].' '.$row['MiddleName'].' '.$row['LastName'].'</span><br/>
								<span>'.$row['AddressLine1'].' , '.$row['City'].' , '.$row['ZipPostal'].'</span><br/>
								<span>'.$row['StateProvince'].' '.$row['Country'].'</span><br/>
								'; 
							?>
							
						</div>
						<div style="float:left; height:40px; width:150px;">
							<?php
								echo '
								<span>'.$row['Phone'].'</span><br/>
								<span>'.$row['Email'].'</span><br/>
								'; 
							?>
						</div>
						<div style="float:left; height:40px; width:30px; margin-left:10px;">
							<img style="cursor:pointer;" src="images/mail.PNG" onclick="SendEmail();"/>
						</div>
					</div>
					<div id="SideBarShadows">
						<!-- shadow -->
					</div>
					<div id="menus">
						<div id="menu">
							<div id="navigation">
								<ul>
									<li><a href="#MyProfile">MY PROFILE</a></li>
									<li><a href="">DOCUMENTS</a></li>	
									<li><a href="#video" onclick="ShowVideoPreview()">VIDEO</a></li>
									
									<?php
									$TemplateName=" SELECT Name FROM tblcustomarea WHERE (ProfileID ={$_GET['PID']} AND IsActive=1) ";
										$AllTemplateName=@mysqli_query($dbc, $TemplateName);
											
										if( @mysqli_num_rows($AllTemplateName)>0 ) {
											while( $Name=@mysqli_fetch_array($AllTemplateName, MYSQLI_ASSOC) ) {
											
												?>
												<li>
													<a href="#<?=$Name['Name'];?>" title="<?=$Name['Name'];?>">
														<?php 
															$string=strlen($Name['Name']);
															if($string>=15) {
															echo substr($Name['Name'],0,15);
															echo'...';
															} else {
																echo $Name['Name'];
															}
														?>
													</a>
													
												</li>
												<?php
											}
										
										}
									?>
								
								</ul>				
							</div>						
						</div>
						<div id="SecondMenu">
							<div id="navigation">
								<ul>
									<?php
										if($_GET['MyProfile']=='1'){
											echo'<li>
												<span onclick="ReviewFeedBack('.$_GET['PID'].')">
													REVIEW FEEDBACK
												</span>
											</li>';
										}
									?>
									<li><span onclick="SendEmail();">SEND ME MAIL</span></li>	
								</ul>
							</div>
						</div>
						<div id="ThirdMenu">
							<div id="navigation">
								<ul>
									<li><span>DOWNLOAD</span></li>
									<li><span onClick="window.close();">EXIT</span></li>	
								</ul>
							</div>
						</div>
						
					</div>
				</div>				
				<!-- Summary -->
				<div id="SummaryDesc">
					<div id="SummaryOnly">
						<span>
							<?php echo $row['Summary']; ?>
						<span>
					</div>
					<div id="SummaryShadow">
						<!-- Shadow -->
					</div>
					<div id="MyProfile">
						<h2>My Profile</h2>
					</div>
				
					<!-- Preview work history -->
					<?php
					$query="SELECT IsActiveWorkHistory FROM tblprofile WHERE ( ProfileID={$_GET['PID']} AND IsActiveWorkHistory=1	)  LIMIT 1";
					$result=@mysqli_query($dbc, $query);
					
					if(@mysqli_num_rows($result)==1) {
					?>	
						<a name="MyProfile"></a>
						<div style="min-height:160px; width:611px;">
							<div id="ProfileIndecator">
								<img src="images/indicator.PNG" />
							</div>
							<div id="WorkHistory">
								<div id="TitleAndPagenation">
									<div id="title" >
										<span>WORK HISTORY</span>
									</div>
									<?php
										if( $_GET['ReqFor']=='feedback') {
											echo'<div id="ButtonProvideFeedBack" onclick="ProvideFeedBackWorkHistory('.$_GET['PID'].')" >
												<span> Provide feedback</span>
											</div>';
										}
									?>
								</div>
								
								<?php
								// If active, show activated record
								$query="SELECT * FROM tblworkhistory WHERE ( ProfileID={$_GET['PID']} AND IsActive=1)";
								$result=@mysqli_query($dbc, $query);
								
								if(@mysqli_num_rows($result)>0) {
								
									while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
									?>
										<div id="DisplayRecord">	
											<div id="TitleAndDate">
												<div id="HeadLine" >
													<span><?=$row['Empolyer'];?></span>
												</div>
												<div style="float:right; width:200px;">
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
					
					<?php
					}// Work history is not active 
					?>
					
					
					<!-- Preview training and certificate -->
					<?php
					// Check tbltraining active inactive status
					$query="SELECT IsActiveWorkHistory FROM tblprofile WHERE ( ProfileID={$_GET['PID']} AND IsActiveTraining=1	)  LIMIT 1";
					$result=@mysqli_query($dbc, $query);
					
					if(@mysqli_num_rows($result)==1) {
					?>
						
						<div style="min-height:160px; width:611px;">
							<div id="ProfileIndecator">
								<img src="images/indicator.PNG" />
							</div>
							<div id="WorkHistory">
								<div id="TitleAndPagenation">
									<div id="title" >
										<span>TRAINING AND CERTIFICATE</span>
									</div>
									<?php
										if( $_GET['ReqFor']=='feedback' ) {
											echo'<div id="ButtonProvideFeedBack" onclick="ProvideFeedBackTraining('.$_GET['PID'].')">
												<span> Provide feedback</span>
											</div>';
										}
									?>
								</div>
								
								<?php
								// If active, show activated record
								$query="SELECT * FROM tbltraining WHERE ( ProfileID={$_GET['PID']} AND IsActive=1)";
								$result=@mysqli_query($dbc, $query);
								
								if(@mysqli_num_rows($result)>0) {
								
									while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
									?>
										<div id="DisplayRecord">	
											<div id="TitleAndDate">
												<div id="HeadLine" >
													<span style="color:#0099FF;"><?=$row['Title'];?></span>
												</div>
												<div style="float:right; width:200px;">
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
					<?php
					} // Work training is not active
					?>
					
					
					<?php
					// Check tbleducation active inactive status
					$query="SELECT IsActiveEducation FROM tblprofile WHERE ( ProfileID={$_GET['PID']} AND IsActiveEducation=1	)  LIMIT 1";
					$result=@mysqli_query($dbc, $query);
					
					if(@mysqli_num_rows($result)==1) {
					?>
						<!-- Preview work history -->
						<div style="min-height:160px; width:611px;">
							<div id="ProfileIndecator" >
								<img src="images/indicator.PNG" />
							</div>
							<div id="WorkHistory">
								<div id="TitleAndPagenation">
									<div id="title" >
										<span>EDUCATIONAL BACKGROUND</span>
									</div>
									<?php
										if($_GET['ReqFor']=='feedback' ) {
											echo'<div id="ButtonProvideFeedBack" onclick="ProvideFeedBackEducation('.$_GET['PID'].')">
												<span> Provide feedback</span>
											</div>';
										}
									?>
								</div>
								
								<?php
								// If active, show activated record
								$query="SELECT * FROM tbleducation WHERE ( ProfileID={$_GET['PID']} AND IsActive=1)";
								$result=@mysqli_query($dbc, $query);
								
								if(@mysqli_num_rows($result)>0) {
								
									while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
									?>
										<div id="DisplayRecord">	
											<div id="TitleAndDate">
												<div id="HeadLine" >
													<span style="color:#FF6600;"><?=$row['Title'];?></span>
												</div>
												<div style="float:right; width:200px;">
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
												<div class="ButtonHideShow" id="ButtonHideShow<?=$row['EducationID'];?>">
													<div style="float:left; width:130px; height:22px; padding-top:1px; padding-left:3px;">
														View Course Details
													</div>
													<div style="float:left; height:20px; width:16px; margin-top:1px; background:url(images/up.png) no-repeat; ">  
														<img src="images/down.png" id="Indecator<?=$row['EducationID'];?>" />
													</div>
												</div>
											</div>
											<?
											$JS.='
												$("#ButtonHideShow'.$row['EducationID'].'").click(function(){
													$("#Display'.$row['EducationID'].'").slideToggle("slow");
													$("#Indecator'.$row['EducationID'].'").slideToggle("slow");
												});
											';
											?>
											<div id="Display<?=$row['EducationID'];?>" class="Display">
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
																	<?php echo substr($row1['Description'],0,60);?>
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
					<?php
					} // Education is not active
					?>
					
					
					<!-- Start Custom profile preview -->
					
					<!-- Preview template 1 -->
					<?php
					// Data Retrive quety for Custom Profile preview 			
					$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_GET['PID']} AND IsActive=1 AND Template=1 )";
					$ResultCus=@mysqli_query($dbc, $QueryCus);
						
						if( @mysqli_num_rows($ResultCus)>0 ) {
							echo'<div style="min-height:160px; width:611px;">';
							while( $RowCus=mysqli_fetch_array($ResultCus, MYSQLI_ASSOC) ) {
								?>
								<div id="MyCustomProfile">
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
									
									<?php
										if($_GET['ReqFor']=='feedback') {
											echo'<div id="ButtonProvideFeedBackCustom" onclick="ProvideFeedBackTemplate1('.$_GET['PID'].')" >
												<span> Provide feedback</span>
											</div>';
										}
									?>
								</div>
								
								<div id="WorkHistory" style="margin-left:25px;">
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
													<div style="float:right; width:200px; color:#990000;">
														<span>Form: <?=$row['Form'];?>,</span>
														<span>To: <?=$row['Too'];?></span>
													</div>
												</div>
												
												<div id="TitleAndDate">
													<div id="HeadLine" style="color:#444; font-size:12px;">
														<span><?=$row['SubTitle'];?></span>
													</div>
												</div>
												
												<div style="clear:both; min-height:20px; margin-top:13px;">
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
							
						} // End of the custom template 1 condition
						
					?> 
					
					<!-- Preview template 2 -->
					<?php
					// Data Retrive quety for Custom Profile preview			
					$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_GET['PID']} AND IsActive=1 AND Template=2 )";
					$ResultCus=@mysqli_query($dbc, $QueryCus);
						
						if( @mysqli_num_rows($ResultCus)>0 ) {
						
						while( $RowCus=mysqli_fetch_array( $ResultCus, MYSQL_ASSOC ) ) {
						
						?>
						
						<div id="MyCustomProfile">
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
							
							<?php
								if($_GET['ReqFor']=='feedback') {
									echo'<div id="ButtonProvideFeedBackCustom" onclick="ProvideFeedBackTemplate2('.$_GET['PID'].')" >
										<span> Provide feedback</span>
									</div>';
								}
							?>
						</div>
						<div id="WorkHistory" style="margin-left:25px;">
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
											<!--
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
											-->
											
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
						} // Template 2 is not active
					?>
					
					<!-- Template 3 -->
					<!-- Preview template 3 -->
					<?php
					// Data Retrive quety for Custom Profile preview			
					$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_GET['PID']} AND IsActive=1 AND Template=3 )";
					$ResultCus=@mysqli_query($dbc, $QueryCus);
						
						if( @mysqli_num_rows($ResultCus)>0 ) {
						
						while( $RowCus=mysqli_fetch_array( $ResultCus, MYSQL_ASSOC ) ) {
						
						?>
						
						<div id="MyCustomProfile">
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
							
							<?php
								if($_GET['ReqFor']=='feedback') {
									echo'<div id="ButtonProvideFeedBackCustom" onclick="ProvideFeedBackTemplate3('.$_GET['PID'].')" >
										<span> Provide feedback</span>
									</div>';
								}
							?>
						</div>
						<div id="WorkHistory" style="margin-left:25px;">
							<div class="Display" style="display:block; margin-top:20px;" >
							
								<div id="CourseHeading">
									<div id="HeadingField" style=" width:108px;  ">Name</div>
									<div id="HeadingField" style=" width:268px; ">Description</div>
									<div id="HeadingField" style=" width:78px;">Type</div>
									<div id="HeadingField" style=" width:68px; border:none; ">Date</div>
								</div>
								<?php 
								$query=" SELECT * FROM tblcadocumentvideob WHERE CustomareaID={$RowCus['CustomareaID']} AND IsActive=1 ORDER BY DocumentVideoBID ASC ";
								$result=@mysqli_query( $dbc, $query );
									if( @mysqli_num_rows( $result ) >0 ) {
										
										while( $row1=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
										?>
										<div id="CourseDetailFields">
											<div id="RecordField" style=" width:104px; margin-right:4px;  "><?php echo $row1['Name']; ?></div>
											<div id="RecordField" style=" width:250px; margin-right:4px; padding-left:4px; text-align:left; ">
												<?php echo substr($row1['Description'],0,80);?>
												&nbsp 
												<span id="ViewMore" onclick="ViewDocBDesc(<?=$row1['DocumentVideoBID'];?>);"> 
													<i>View details...</i> 
												</span>
											</div>
											
											<!-- start document view section ---->
											<!-- start document view section ---->
											<?
												$jsTemplate3.='
												$("#DocumentLink'.$row1['DocumentVideoBID'].' ").colorbox({inline:true, width:"88%", height:"95%"});
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
												
												id="RecordField" style=" width:74px; padding-top:10px; margin-right:4px;"> 
											
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
								
														$ClickDocument='id="DocumentLink'.$row1['DocumentVideoBID'].'" href="#document-preview"';
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
											
											
											<!--- old document view button 
											<div id="RecordField" style=" width:74px; padding-top:10px; margin-right:4px;">
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
											-->
											
											<div id="RecordField" style=" width:58px; padding-top:10px; font-size:10px;"><?=$row1['Date']?></div>
											
										</div>
											
										<?php
										
										} // the end of while condition
										
									} else {
										//echo'<p> You have not add your course details yet.</p>';
									}															
							
								?>																				
							
							</div>
							<!--
							<div class="Display" style="display:block; margin-top:0px; min-height:400px;">
								
								<p>Document viewer</p>
							
							</div>
							-->
						
						</div>
						
						<?php
						}// The end of while 
						} // Template 2 is not active
					?>
					

					<!-- Preview template 4 -->
					<?php
					// Data Retrive quety for Custom Profile preview			
					$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_GET['PID']} AND IsActive=1 AND Template=4 )";
					$ResultCus=@mysqli_query($dbc, $QueryCus);
						
						if( @mysqli_num_rows($ResultCus)>0 ) {
							echo'<div style="min-height:160px; width:611px;">';
							while( $RowCus=mysqli_fetch_array($ResultCus, MYSQLI_ASSOC) ) {
								?>
								
								<div id="MyCustomProfile">
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
								
									<?php
										if($_GET['ReqFor']=='feedback') {
											echo'<div id="ButtonProvideFeedBackCustom" onclick="ProvideFeedBackTemplate4('.$_GET['PID'].')" >
												<span> Provide feedback</span>
											</div>';
										}
									?>
								</div>
								
								<div id="WorkHistory" style="margin-left:25px;">
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
									$query="SELECT * FROM tblcaclassic WHERE ( CustomareaID={$RowCus['CustomareaID']} AND IsActive=1)";
									$result=@mysqli_query($dbc, $query);
									
									if(@mysqli_num_rows($result)>0) {
									
										while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
										?>
											<div id="DisplayRecord">	
												<div id="TitleAndDate" style="padding-bottom:8px;">
													<div id="HeadLine" >
														<span><?=$row['Title'];?></span>
													</div>
													<div style="float:right; width:170px; color:#990000;">
														<span><?=$row['Duration'];?></span>
													</div>
												</div>
												
												<div style="clear:both;">
													<p>
														<?=$row['Description'];?>
													</p>
												</div>
											</div>
										<?php
										} // The end of while loop
									
									}
				
									?>
									
								</div>
							
							<?php
							} // End of the while loop
							echo'</div>'; // End of the custom template 4
							
						} // End of the custom template 4 condition
						
					?> 

				</div><!-- End of the summary -->
				
			</div><!-- End of the side with summary -->
			
			
			<!-- Footer -->
			<div id="footer">
				<p>Powered by Education Management Solutions Inc. Copyright @ 2012 All Rights Reserved.</p>
			</div>
			<div id="RecommendArea">
				<?php
					if($_GET['ReqFor']=='recommend') {
						echo'<div id="RecommendButton" onclick="recommend('.$_GET['PID'].')">
							Recommend &nbsp; | &nbsp;  
							<img style="height:12px; padding-top:2px; "src="images/Good-mark.png" height="13" width="14" title="Recommend" />
						</div>';
					}
				?>
				<div id="RecommendButton" onclick="ViewRecommend(<?=$_GET['PID'];?>,'<?=$_GET['MyProfile'];?>')">View Recommend</div>
			</div>
		</div>
	</div>
	
	<!-- Document View -->
	<script type="text/javascript">					
		/* document view button */
		$(document).ready(function(){
			<?=$js?> 
			<?=$jsTemplate3?> 
		});
	</script>
	
	<div style="display:none;">
		<div style="width:486px; text-align:left;" id="document-preview">
		</div>
	</div>
	
	
	
<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>
</body>
</html>
