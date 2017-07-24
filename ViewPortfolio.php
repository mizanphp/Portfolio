<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

if(!isset( $_SESSION['UserID'])) {
	
	if($_GET['AUID']!=''){
		$converter=new Encryption;
		$UserID=$converter->decode($_GET['AUID']);
	
   	}else{
		// Delete the buffer.
		ob_end_clean(); 
		header("Location:index.php");
		exit();
	}
} else {
	$UserID=$_SESSION['UserID'];
	$name ='<span> '.$_SESSION['FirstName'].'  '.$_SESSION['LastName'].'</span>' ;
}


// Get specific ProfileID 
if( isset( $_GET['PID'] ) && is_numeric( $_GET['PID'] ) ) {
	$_GET['PID'];
} else {
	// Delete the buffer
	ob_end_clean();
	header('location:ManagePortfolios.php');
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Digital Profile</title>
<link href="./stylesheet/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="./jQueryUI/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css" />	
<link href="./stylesheet/jquery.wysiwyg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jQueryUI/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="./jQueryUI/js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="./jQueryUI/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="./jQueryUI/js/flowplayer-3.2.6.min.js"></script>
<!-- Document viewer -->
<link href="documentViewer/css/style.css" rel="stylesheet" >
<!--<link href="stylesheet/demo.css" rel="stylesheet">-->
<script type="text/javascript" src="documentViewer/libs/yepnope.1.5.3-min.js"></script>
<script type="text/javascript" src="documentViewer/ttw-document-viewer.min.js"></script>
<script type="text/javascript" src="jQueryUI/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="jQueryUI/js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="colorbox.css" />
</head>
<body>
<?php
// Data Retrive Query for user profile	
$query=" SELECT * FROM tbluserinfo WHERE ProfileID={$_GET['PID']} LIMIT 1 ";
$result=@mysqli_query($dbc, $query);

if(@mysqli_num_rows($result)==1) {
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC);
} else {
	
	//echo'<p>Requested data is not available</p>';
}

?>


<!-- Edit Profile Form  -->
<div id="dialog" title="Update Personal Information">
	<form id="PersonalInfoForm">
		<div style="padding:5px;">
			<div class="label">
				<label for="FirstName" >First Name : </label>
			</div>
			<div class="data">
				<input type="text" name="FirstName"  value="<?php echo $row['FirstName']; ?>" size="25" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="MiddleName" >Middle Name : </label>
			</div>
			<div class="data">
				<input type="text" name="MiddleName"  value="<?php echo $row['MiddleName']; ?>" size="25" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="LastName"> Last Name :</label>
			</div>	
			<div class="data">
				<input type="text" name="LastName"  value="<?php echo $row['LastName']; ?>" size="25" />
			</div>
		</div>
		<div style="padding:5px;">
			<div style="height:110px">
				<div class="label">
					<label for="Email" >Email Address :</label>
				</div>
				<div class="data">
					<input type="text" id="PersonalInfoEmailAddress" name="Email" value="<?php echo $row['Email']; ?>" size="30" />
				</div>
			</div>
			<div class="border"></div> 
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="Address">Address :</label>
			</div>
			<div class="data">
				<input type="text" name="AddressLine1" value="<?php echo $row['AddressLine1']; ?>" size="30" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="City">City :</label>
			</div>
			<div class="data">
				<input type="text" name="City" value="<?php echo $row['City']; ?>" size="20" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="StateProvince">State/Province :</label>
			</div>
			<div class="data">
				<input type="text" name="StateProvince" value="<?php echo $row['StateProvince']; ?>" size="20" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="ZipPostal">Zip/Postal : </label>
			</div>
			<div class="data">
				<input type="text" name="ZipPostal" value="<?php echo $row['ZipPostal']; ?>" size="20" />
			</div>
		</div>
		<div style="padding:5px;">
			<div style="height:135px;">
				<div class="label">
					<label for="Country">Country :</label>
				</div>	
				<div class="data">
					<input type="text" name="Country" value="<?php echo $row['Country']; ?>" size="20" />
				</div>
			</div>
			<div class="border"></div>
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="Phone">Phone :</label>
			</div>
			<div class="data">			
				<input type="text" name="Phone" value="<?php echo $row['Phone']; ?>" size="20" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="Fax">Fax :</label> 
			</div>
			<div class="data">
				<input type="text" name="Fax" value="<?php echo $row['Fax']; ?>" size="20" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="label">
				<label for="Mobile">Mobile :</label>
			</div>
			<div class="data">
				<input type="text" name="Mobile" value="<?php echo $row['Mobile']; ?>" size="20" />
			</div>
		</div>
		<input type="hidden" name="GetProfileID" value="<?=$_GET['PID'];?>"/>
	</form>
</div>

<!-- Edit Summary Form  -->
<div id="dialogSummery" title="Update Summary">
	<form id="SummeryForm">
		<textarea name="Summary" id="EditorEditSummary" cols="63" rows="12" style="width:600px; height:190px;"><?php echo $row['Summary']; ?></textarea>
		<input type="hidden" name="GetProfileID" value="<?=$_GET['PID'];?>"/>
	</form>
</div>


<!-- Add Work History Form  -->
<div id="DialogAddWorkHistory" title="Add Work History">
	<form id="AddWorkHistoryForm">
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="Empolyer" >Position : </label>
			</div>
			<div class="AddDatan">
				<input class="InputBox" type="text" name="Empolyer" size="25" id="AddWorkHistoryEmpolyer"/>
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="Title"> Company Name :</label>
			</div>	
			<div class="AddDatan">
				<input class="InputBox" type="text" name="Title" size="25" id="AddWorkHistoryCompanyName"/>
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln" style="height:50px;">
				<label for="ExampleOfLink">Company Link: http://</label>
			</div>	
			<div class="AddDatan" style="height:70px;">
				<input class="InputBox" type="text" name="ExampleOfLink" size="25" id="AddWorkHistoryWebPageLink"/>
				<div id="AllowedLink">
					<strong style="color:#C00;">Example : </strong>
					<span>www.themexdemo.com</span>
				</div>
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="From">From :</label>
			</div>	
			<input class="SmallBox" type="text" name="From" size="15" id="DatePickerFromAddWorkHistory"/>
			<div class="Current">
				<input type="checkbox" name="Current" id="AddWorkHistoryCurrent" Value="till present"/> Current
			</div>
			<div class="Too">To:</div>
			<input class="SmallBox" type="text" name="Too" size="15" id="DatePickerToAddWorkHistory"/>
		</div>
		<div style="padding:5px; clear:both; width:690px;">
			<div class="AddLabeln">
				<label for="Description"> Description :</label>
			</div>
			<div style="float:left; margin-left:15px; width:505px;" >
				<textarea name="Description" id="EditorAddWorkHistory" cols="63" rows="12" style="height:190px; width:505px; float:left; "></textarea>
				<input type="hidden" name="ProfileID" value="<?=$_GET['PID'];?>" />
			</div>	
		</div>	
	</form>
</div>
<!-- Edit WorkHistory Form  -->
<div id="DialogEditWorkHistory" title="Edit Work History" style="clear:both;">
	<div id="DialogEditWorkHistoryContent">
	</div>
</div>

<!-- Add Training & Certificates  -->
<div id="DialogAddTraining" title="Add training and certificate">
	<form id="AddTrainingForm">
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="Title"> Title :</label>
			</div>	
			<div class="AddDatan">
				<input class="InputBox" type="text" name="Title" id="AddTrainingTitle" size="25" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln" style="height:50px;">
				<label for="ExampleOfLink">Training Link: http://</label>
			</div>	
			<div class="AddDatan" style="height:70px;">
				<input class="InputBox" type="text" name="ExampleOfLink" id="AddTrainingCompanyLink" size="25" />
				<div id="AllowedLink">
					<strong style="color:#C00;">Example : </strong>
					<span>www.themexdemo.com</span>
				</div>
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="From" >From :</label>
			</div>	
			<input class="SmallBox" type="text" name="From" size="15" id="DatePickerFromAddTraining" />
			<div class="Current">
				<input type="checkbox" name="Current" id="AddTrainingCurrent" Value="till present"/> Current
			</div>
			<div class="Too">To:</div>
			<input class="SmallBox" type="text" name="Too" size="15" id="DatePickerToAddTraining" />
		</div>
		<div style="padding:5px; clear:both; width:690px;">
			<div class="AddLabeln">
				<label for="Description"> Description :</label>
			</div>
			<div style="float:left; margin-left:15px; width:505px;" >
				<textarea name="Description" id="EditorAddTraining" cols="63" rows="12" style="height:190px; width:505px; float:left; "></textarea>
				<input type="hidden" name="ProfileID" value="<?php echo $_GET['PID']; ?>" />
			</div>	
		</div>	
	</form>
</div>
<!-- Edit Training and Certificates Form -->
<div id="DialogEditTraining" title="Edit training and certificate">
	<div id="DialogEditTrainingContent">
	</div>
</div>
<!-- Add Education Background -->
<div id="DialogAddEducation" title="Add Education Background">
	<form id="AddEducationForm">
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="Title"> Title :</label>
			</div>	
			
			<div class="AddDatan">
				<input class="InputBox" type="text" name="Title" id="AddEducationTitle" size="25" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="Subject" >Subject : </label>
			</div>
			<div class="AddDatan">
				<input class="InputBox" type="text" name="Subject" id="AddEducationSubject" size="25" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln">
				<label for="From">From :</label>
			</div>	
			<input class="SmallBox" type="text" name="From" size="15" id="DatePickerFromAddEducation"/>
			<div class="Current">
				<input type="checkbox" name="Current" id="AddEducationCurrent" Value="till present"/> Current
			</div>
			<div class="Too">To:</div>
			<input class="SmallBox" type="text" name="Too" size="15"  id="DatePickerToAddEducation"/>
		</div>
		<div style="padding:5px; clear:both; width:690px;">
			<div class="AddLabeln">
				<label for="Description"> Description :</label>
			</div>
			<div style="float:left; margin-left:15px; width:505px;" >
				<textarea name="Description" id="EditorAddEducation" cols="63" rows="12" style="height:190px; width:505px; float:left; "></textarea>
				<input type="hidden" name="ProfileID" value="<?php echo $_GET['PID']; ?>" />
			</div>	
		</div>
	</form>
</div>


<!-- Edit Education  Form -->
<div id="DialogEditEducation" title="Edit Educational Background">
	<div id="DialogEditEducationContent">
	</div>
</div>
<!-- Edit Course  Form -->
<div id="DialogEditCourse" title="Edit Course">
	<div id="DialogEditCourseContent">
	</div>
</div>
<!-- Copy Profile Form -->
<div id="DialogCopyProfile" title="Copy Profile">
	<div id="DialogCopyProfileContent">
	</div>
</div>
<!-- Add Course Details Form  -->
<div id="DialogAddCourseDetails" title="Add course details" >
	<div id="DialogAddCourseDetailsContent" >
	</div>
</div>

<?php
/// Data retrive from tblprofile
$queryp="SELECT * FROM tblprofile WHERE ( ProfileID={$_GET['PID']} AND UserID=".$UserID.") LIMIT 1";
$resultp=@mysqli_query($dbc, $queryp);
$rowp=@mysqli_fetch_array($resultp, MYSQLI_ASSOC)
	
?>


<!-- Edit Profile Name Form -->
<div id="dialogEditProfileName" title="Edit Profile Name">
	<form id="EditProfileNameForm">
		<div style="padding:5px;">
			<div class="AddLabeln" style="margin-top:4px;">
				<label for="ProfileNewName"><b> Profile name :</b></label>
			</div>	
			<div class="AddDatan" style="width:195px;">
				<input class="InputBox" style="width:195px;" type="text" name="ProfileNewName" size="30" value="<?php echo $rowp['ProfileName']; ?>" />
				<input type="hidden" name="ProfileID" value="<?=$_GET['PID'];?>" />
				<input type="hidden" name="UserID" value="<?=$UserID;?>" />
			</div>
		</div>
	</form>
</div>

<!-- Add Custom area Form  -->
<div id="DialogAddCustomArea" title="Add Custom Area">
	<form id="AddCustomAreaForm">
		<div style="width:780px; margin:auto; height:65px;">
			<div style="float:left; width:100px; margin-top:10px;" >Name:</div>
			<div style="float:left; width:500px;">
				<input type="text" name="Name" id="Name" style="padding:10px; border-radius:12px; border:1px solid #DDD; width:500px;" required="required"/>
			</div>
			<div style="clear:both; height:25px; width:700px; text-align:left; margin-top:10px; margin-left:10px; color:#888;"><i>Depending on your requirements, there are 4 templates to choose from</i></div>
		</div>
		<div style="width:905px;" >
			<fieldset>
				<legend>
				Select A Template
				</legend>
				<div>
					<div style="float:left; margin-right:5px;"><img src="images/Custom/1.JPG" /></div>
					<div style="float:left; margin-right:5px;"><img src="images/Custom/2.JPG" /></div>
					<div style="float:left; margin-right:5px;"><img src="images/Custom/3.JPG" /></div>
					<div style="float:left;"><img src="images/Custom/4.JPG" /></div>
				</div>
				<div>
					<div id="SelectTemplate" >Choice<input type="radio" name="Template" value="1" checked="checked"/></div>
					<div id="SelectTemplate" >Choice<input type="radio" name="Template" value="2" /> </div>
					<div id="SelectTemplate" >Choice<input type="radio" name="Template" value="3" /> </div>
					<div class="SelectTemplate" >Choice<input type="radio" name="Template" value="4" /> </div>
				</div>
				<input type="hidden" name="ProfileID" value="<?php echo $_GET['PID']; ?>" />
				
			</fieldset>
		</div>	
	</form>
</div>

<!-- Custom area forms -->
<!-- Edit template name form -->
<div id="DialogEditTemplateName" title="Edit Template Name">
	<div id="DialogEditTemplateNameContent">
	</div>
</div>

<!-- Custom area form for four templates-->
<!-- Add work history style -->
<div id="DialogAddWHStyle" title="Add custom profile like as work history style">
	<div id="DialogAddWHStyleContent">
	</div>
</div>
<!--Edit custom profile like as work history style-->
<div  id="DialogEditWHStyle" title="Edit custom profile">
	<div id="DialogEditWHStyleContent">
	</div>
</div>
<!-- Add Custom profile Classic style -->
<div id="DialogAddClassic" title="Add custom profile Classic style">
	<div id="DialogAddClassicContent">
	</div>
</div>
<!--Edit custom profile Classic style-->
<div  id="DialogEditClassic" title="Edit custom profile">
	<div id="DialogEditClassicContent">
	</div>
</div>
<!-- Add Custom profile document and video A style  -->
<div id="DialogAddDocA"  title="Add custom profile" >
	<div id="DialogAddDocAContent">
	</div>
</div>
<!--Edit custom profile Document & Video A style -->
<div  id="DialogEditDocA" title="Edit custom profile">
	<div id="DialogEditDocAContent">
	</div>
</div>
<!-- Add Custom profile document and video B style  -->
<div id="DialogAddDocB"  title="Add custom profile" >
	<div id="DialogAddDocBContent">
	</div>
</div>
<!--Edit custom profile Document & Video B style -->
<div  id="DialogEditDocB" title="Edit custom profil">
	<div id="DialogEditDocBContent">
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
<!-- Get link -->
<div id="DialogGetLink" title="Get link">
	<div id="DialogGetLinkContent" style="padding-top:30px; height:40px;">
	<?php 
		/*$url="http://".$_SERVER['HTTP_HOST']."/mizan/eProfile/PreviewPortfolio.php?PID=".$_GET['PID']." ";*/
		// variable GetLink come from connection page
		echo'<a href="'.$GetLink.'" target="_blank" style="color:green; font-size:14px; font-style:bold;">'.$GetLink.'</a>' ;
	?>
	</div>
</div>
<!-- Forward link -->
<div id="DialogForwordLink" title="Forward link">
	<div id="DialogForwordLinkContent">
	</div>
</div>


<!-- Show History -->
<div id="DialogShowHistory" title="View History">
	<div id="DialogShowHistoryContent">
	</div>
</div>
<!-- Shoe history message details -->
<div id="DialogViewGuestMessageDetails" title="View detail">
	<div id="ViewGuestMessageDetailsContent">
	
	</div>
</div>

<!-- Main Container and Page Body-->
<div id="MainContainer">
  <div id="ContainerBody">
	<!-- Page header -->
	<div id="header">
		<div id="portfolio">
			<div id="PortfolioName">
				<div style="text-align:left; margin-top:20px; float:left" title="<?=$rowp['ProfileName'];?>">
					<span class="PortfolioName"> 
					<?php 
						$string=strlen($rowp['ProfileName']);
						if($string>=22) {
						echo substr($rowp['ProfileName'],0,22);
						echo'...';
						} else {
							echo $rowp['ProfileName'];
						}
					?>
					</span>
				</div>
				<div class="edit">
					<span id="EditProfileNameID">
						<img src="images/edit.png" />
					</span>	
				</div>
			</div>
			
			<div id="PortfolioButton">
				<div id="ButtonBg" onclick="CopyProfile(<?=$_GET['PID'];?>,<?=$UserID;?>)">
					<br/>
					<img src="images/copy.png" height="28" width="28" /><br/>
					<span>Copy</span>
						
				</div>
				
				<div id="ButtonBg" onclick="ShowHistory(<?=$_GET['PID'];?>);">
				<br/>
					<img src="images/history.png" height="28" width="28" /><br/>
					<span>History</span>
				</div>
			</div>
		</div>
		
		<div id="OtherButton">
			<div id="LinkForword"> 
				<div id="ButtonBg" onclick="GetLink();">
				<br/>
					<span>
						<img src="images/GetLink.png" height="28" width="28" /><br/>
						<span>Get Link</span>
					</span>
				</div>
				<div id="ButtonBg" onclick="ForwordLink(<?=$_GET['PID'];?>);">
				<br/>
					<img src="images/forword.png" height="28" width="28" /><br/>
					<span>Forward</span>
				</div>
				<a href="PreviewPortfolio.php?PID=<?=$_GET['PID'].'&MyProfile=1';?>" target="_blank">
					<div id="ButtonBg">
					<br/>
						<img src="images/preview.png" height="28" width="28" border="none" alt="Preview your profile" title="Preview your profile"/><br/>
						<span>Preview</span>
					</div>
				</a>
				
			</div>
			<div id="BackButton">
				<a href="ManagePortfolios.php<?if(isset($_GET['AUID']) ){echo"?adminentertouser={$_GET['AUID']}";} ?>">
					<div id="ButtonBg" style="cursor:pointer;">
						<br/>
							<img src="images/back.png" height="28" width="28" border="0" />
						<p style="text-align:center;"><span>Back</span></p>
					</div>
				</a>
			</div>
		</div>
	</div>
	
	<?php 
		
		if( ($rowp['IsActiveShowPhoto']==1) &&($rowp['IsActiveShowVideo']==1) ) {	
			$IsActiveShowBoths="checked=\"checked\"";
		} else {
			$IsActiveShowBoths="";
		}
		
		if( $rowp['IsActiveShowPhoto']==1) {	
			$IsActiveShowPhoto="checked=\"checked\"";
		} else {
			$IsActiveShowPhoto="";
		}
		
		if( $rowp['IsActiveShowVideo']==1) {	
			$IsActiveShowVideo="checked=\"checked\"";
		} else {
			$IsActiveShowVideo="";
		}
	?>
		
	<!-- Side bar -->
	<div id="aside">
		<div id="picture">
			<div style="margin-top:7px; height:40px; width:250px;">
				<span class="FeaturedPhpto">Featured Photo / Video</span>
				<input type="checkbox" <?php echo $IsActiveShowBoths; ?>  id="ShowBothCheckBox<?php echo $_GET['PID']; ?>" onclick="ShowBothIsActive(<?php echo $_GET['PID']; ?> );" />
				<span class="switch">Show both</span>
			</div>
			<div style="height:30px; width:250px;">
				<?php 
				if($_REQUEST['vdo']==1){
					$photo='inactive';
					$vdo='active';
					$photobox='display:none;';
					$vdobox='display:block;';
					
				}else{
				    $photo='active';
					$vdo='inactive';
					$photobox='display:block;';
					$vdobox='display:none;';
				}
				?>
				<div id="photo" class="<?php echo $photo;?>" onclick="ShowImage();">
					<input type="checkbox" <?php echo $IsActiveShowPhoto; ?>  id="PhotoCheckBox<?php echo $_GET['PID']; ?>" onclick="PhotoIsActive(<?php echo $_GET['PID']; ?> );" />
					<span> &nbsp; &nbsp; Photo</span>
				</div> 
				<div id="video" class="<?php echo $vdo;?>" onclick="ShowVideo();"> 
					<input type="checkbox" <?php echo $IsActiveShowVideo; ?>  id="VideoCheckBox<?php echo $_GET['PID']; ?>" onclick="VideoIsActive(<?php echo $_GET['PID']; ?> );" />
					<span> &nbsp; &nbsp; Video </span>
				</div> 
			</div>
			<!-- View uploaded image -->
			<div id="ForImage" style="<?php echo $photobox;?>">
				<div class="image" style="display:none;" id="PreviewImage" ></div>
				<div class="image" style="display:block;" id="oldPreview">
					<?php
					$queryUser=" SELECT * FROM tblphoto WHERE ProfileID='{$_GET['PID']}' ORDER BY PhotoID DESC";
					$resultUser=@mysqli_query($dbc, $queryUser);
					$totalrow=mysqli_num_rows($resultUser);
					if($totalrow>0) {
					$lpl=1;
						while ($rowUser=@mysqli_fetch_array( $resultUser, MYSQLI_ASSOC ) ) {
							$image=$rowUser['Photo'];
							
							if($lpl==$totalrow){
								$style=" style='display:block; margin:auto;' ";
							}else{
								$style=" style='display:none; margin:auto;' ";
							}
							
							echo '<img id="imMain'.$lpl.'" src="UploadedImages/'.$image.'" '.$style.' height="180" width="150" alt="Add your Picture" />';
							$lpl++;
						}
						
					} else {
						echo'<img src="images/HumanImage.png" height="180" width="150"/>';
					} 
				
					?>
				</div>
				<?php
					if($rowp['IsActiveShowPhoto']==1){
						$StyleImage="display:block";
					} else {
						$StyleImage="display:none";
					}
				?>
				<div style="min-height:90px; width:250px; <?=$StyleImage;?>">
					<form action="ajaxImageUp.php" method="post" id="imageForm11"  enctype="multipart/form-data">
						<input type="file" name="Imagefilename" id="Imagefilename" />
						<input type="hidden" name="GetProfileID" value="<?=$_GET['PID'];?>" />
						<input type="hidden" id="ProID" value="<?=$_GET['PID'];?>" />
			
					</form>
					<div id="AllowedFileFormat">
						<strong style="color:#C00;">Allow:</strong>
						<span>JPEG, PNG, GIF, BMP</span>
					</div>
					
					
					<!-- photo thumnail start-->
					<!-- photo thumnail start-->
					
					<div class="ImageAndVideoGellary">
						<?php
						$QueryPhoto=" SELECT * FROM tblphoto WHERE ProfileID='{$_GET['PID']}' ORDER BY PhotoID DESC";
						$ResultPhoto=@mysqli_query($dbc, $QueryPhoto);
						$totalimage=mysqli_num_rows($ResultPhoto);
							
						if($totalimage>4) {
							$DisplayImageArrow='display:block';
						} else {
							$DisplayImageArrow='display:none';
						}
						?>
						
						<div class="arrow" style="padding-right:3px; padding-left:3px;<?=$DisplayImageArrow;?>">
							<img disabled="disabled" src="images/Previus.png" width="15" height="15" id="prevPageButon" onclick="previousbox()"/>								
						</div>
						
						<!--<div class="SortGellary" id="PreviewImage1" style="display:none;"></div>-->
						<div id="showdiv1"  style="width:208px; float:left; display:block;">
						<?php
							$divbox=2;
							if( @mysqli_num_rows($ResultPhoto)>0) {
								$lpl2=1;
								$AllPhotoStatus=1;
								while($AllPhoto=@mysqli_fetch_array($ResultPhoto, MYSQLI_ASSOC )) {
							
									$image=$AllPhoto['Photo'];
									
									// check for thubm nail photo
									if($AllPhoto['IsActive']==1) {
										$ThumbNailImageStatus="checked='checked'";
									} else {
										$ThumbNailImageStatus="";
									}
									
									// check all photo status
									if($AllPhoto['IsActive']==0) {
										$AllPhotoStatus=0;
									}
									
									// show all photo thumnail 
									echo'
										<div class="SortGellary">
											<img style="cursor:pointer;" onclick="ImgBoxShow('.$lpl2.')" id="ShortImg'.$lpl2.'" src="UploadedImages/'.$image.'" height="46" width="42" alt="Your photo" />
											<div id="ThumbNail">
												<input type="checkbox" '.$ThumbNailImageStatus.' id="ThumbNailImageCheckBox'.$AllPhoto['PhotoID'].'" onclick="ThumbNailImageIsActive('.$AllPhoto['PhotoID'].');" />
												<img style="cursor:pointer;" src="images/Delete.png" onclick="DeletePhoto('.$AllPhoto['PhotoID'].',\''.$image.'\')"/>
											</div>
										</div>
									';
									
									if($lpl2%4==0){
										echo '
											<div style="clear:both">
											</div>
										</div>
										<div style="width:208px; display:none; float:left;" id="showdiv'.$divbox.'">';
										$divbox++;
									}
									
									$lpl2++;
								}
							} 
							
						?>
						<input type="hidden" id="nowView" value="1" />
                        <input type="hidden" id="totalPage" value="<?php echo $divbox-1;?>" />

						</div>
						<!-- photo Next button -->
						<div class="arrow" style="text-align:right;<?=$DisplayImageArrow;?>">
							<img src="images/Next.png" width="15" height="15" id="nextPageButon" onclick="nextBox()"/>	
						</div>
						<div style="clear:both"></div>
					</div>
					<!-- photo thumnail end -->
					<!-- photo thumnail end -->
					
				</div>
			</div>	
			<!-- View uploaded photo when click on photo thumnail-->
			<script type="text/javascript">
				function ImgBoxShow(id){
					document.getElementById('oldPreview').style.display='block';
	                document.getElementById('PreviewImage').style.display='none';
					for(var k=1; k<<?php echo $lpl2;?>;k++){
						if(k==id){
						 $('#imMain'+k).css("display","block");
						}else{
						 $('#imMain'+k).css("display","none");
						}
					}
				}
				
			</script>
			<div id="ForVideo" style="<?php echo $vdobox;?>">
				<div class="image" id="preview">
					<?php
					$queryVDO=" SELECT * FROM tblvideo WHERE ProfileID='{$_GET['PID']}' ORDER BY VideoID DESC";
					$resultVDO=@mysqli_query($dbc, $queryVDO);
					$TotalRow=@mysqli_num_rows($resultVDO);
					//echo'<input type="hidden" name="TotalRow" id="TotalRow" value="'.$TotalRow.'" />';
					$count=1;
					while( $rowVDO=@mysqli_fetch_array( $resultVDO, MYSQLI_ASSOC )) {
					
						$VDO=$rowVDO['Video'];
						
						if($count==$totalrow){
							$style="style='display:block; margin:auto;'";
						}else{
							$style="style='display:none; margin:auto;'";
						}
					
						echo'
						<div id="VideoMain'.$count.'" '.$style.'>
							<div id="preview'.$count.'">
								<a href="UploadedVideos/'.$VDO.'" style="display:block; width:150px; height:180px; margin:auto;" id="player'.$count.'">
								</a>
							</div>
						</div>
						';
						
						echo'<script>
						  flowplayer("player'.$count.'", "flowplayer/flowplayer-3.2.7.swf", {
							  clip:  {
								  autoPlay:false,
								  autoBuffering: true
							  }
						  });
						</script>';
						
						$count++;
					}
					
					?>
				</div>
				<?php
					if($rowp['IsActiveShowVideo']==1){
						$StyleVideo="display:block";
					} else {
						$StyleVideo="display:none";
					}
				?>
				<div style="min-height:90px; width:250px; margin:auto; <?=$StyleVideo;?>">
					<form action="ajaxVideoUp.php" method="post" id="VideoForm11"  enctype="multipart/form-data">
						<input type="file" name="filename" id="filename" />
						<input type="hidden" name="GetProfileID" value="<?=$_GET['PID'];?>" />
					</form>
					<div id="AllowedFileFormat">
						<strong style="color:#C00;">Allow: </strong> 
						<span>FLV, MP4</span>
					</div>
					
					<div class="ImageAndVideoGellary">
						<?php
						$queryVDOSmall=" SELECT * FROM tblvideo WHERE ProfileID='{$_GET['PID']}' ORDER BY VideoID DESC";
						$resultVDOSmall=@mysqli_query($dbc, $queryVDOSmall);
						$TotalVideoRow=@mysqli_num_rows($resultVDOSmall);
						
						if( $TotalVideoRow>0 ) {
							if( $TotalVideoRow>4 ) {
								$VideoArrows='display:block';
							}else {
								$VideoArrows='display:none';
							}
						?>
							<!-- video preview button -->
							<div class="arrow" style="padding-right:3px; padding-left:3px; <?=$VideoArrows;?>">
								<img src="images/Previus.png" width="15" height="15" id="prevPageButonVDO" onclick="previousboxVDO()"/>								
							</div>
						<?php
							echo'<div id="showdivVDO1"  style="width:208px; float:left; display:block;">';
							$divboxVDO=2;
							$countSmall=1;
							$AllVideoThumbnailActive=1;
							while( $rowVDOSmall=@mysqli_fetch_array( $resultVDOSmall, MYSQLI_ASSOC )) {
								
								// check for all
								if( $rowVDOSmall['IsActive']==1) {
									$ThumbNailVideoStatus="checked='checked'";
								} else {
									$ThumbNailVideoStatus='';
								}
								
								// check for video
								if( $rowVDOSmall['IsActive']==0) {
									$AllVideoThumbnailActive=0;
								}
								
								$VDOSmall=$rowVDOSmall['Video'];
								
								echo'
								<div class="SortGellary" style="height:71px;" onclick="VDOBoxShow('.$countSmall.')" id="ShortImg'.$countSmall.'">
									<img src="images/video.png"/>
									<div><span style="font-size:12px; font-weight:bold;">Video'.$countSmall.'</span></div>
									<div id="ThumbNail" style="height:21px;">
										<input type="checkbox" '.$ThumbNailVideoStatus.' id="ThumbNailVideoCheckBox'.$rowVDOSmall['VideoID'].'" onclick="ThumbNailVideoIsActive('.$rowVDOSmall['VideoID'].');" />
										<img style="cursor:pointer;" src="images/Delete.png" onclick="DeleteVideo('.$rowVDOSmall['VideoID'].',\''.$VDOSmall.'\' );"/>
									</div>
								</div>
								';
								
								if($countSmall%4==0){
									echo '
										<div style="clear:both">
										</div>
									</div>
									<div style="width:208px; display:none; float:left;" id="showdivVDO'.$divboxVDO.'">';
									$divboxVDO++;
								}
								
								
								$countSmall++;
							}// the end of while
							
							echo'</div>';
							
							
							?>
							<input type="hidden" id="nowViewVDO" value="1" />
							<input type="hidden" id="totalPageVDO" value="<?php echo $divboxVDO-1;?>" />
							<?php
							
							echo'
								<div class="arrow" style="text-align:right;'.$VideoArrows.'">
									<img src="images/Next.png" width="15" height="15" id="nextPageButonVDO" onclick="nextBoxVDO()"/>	
								</div>
								<div style="clear:both"></div>
								';
						}// no result 
						?>
					</div>
				</div>
			</div>
		</div>
		
		<!-- View uploaded photo -->
		<script type="text/javascript">
			function VDOBoxShow(id){
				for(var k=1; k<<?php echo $countSmall;?>;k++){
					if(k==id){
					 $('#VideoMain'+k).css("display","block");
					}else{
					 $('#VideoMain'+k).css("display","none");
					}
				}
			}
		</script>
		<div id="area">
			<div id="AreaHeader">
				<span id="AreaHead" >Areas</span>
				<?php
					if($rowp['IsActiveWorkHistory']==1 && $rowp['IsActiveTraining']==1 && $rowp['IsActiveEducation']==1 ) {
						$AreaStatusProfile=1;
					}else{
						$AreaStatusProfile=0;
					}
					
					//check all photo status for area all checkbox status
					$QueryPhotoIsActive="SELECT IsActive FROM tblphoto WHERE ProfileID={$_GET['PID']} ";
					$ResultPhotoIsActive=@mysqli_query($dbc, $QueryPhotoIsActive);
						$AreaStatusPhoto=1;
						while( $ActivePhotoRow=@mysqli_fetch_array($ResultPhotoIsActive, MYSQLI_ASSOC) ) {	
							if( $ActivePhotoRow['IsActive']==0 ) {
								$AreaStatusPhoto=0;
							}
						
						}
					
					//check all video status for area all checkbox status
					$QueryVideoIsActive="SELECT IsActive FROM tblvideo WHERE ProfileID={$_GET['PID']} ";
					$ResultVideoIsActive=@mysqli_query($dbc, $QueryVideoIsActive);
						$AreaStatusVideo=1;
						while( $ActiveVideoRow=@mysqli_fetch_array($ResultVideoIsActive, MYSQLI_ASSOC) ) {	
							if( $ActiveVideoRow['IsActive']==0 ) {
								$AreaStatusVideo=0;
							}
						
						}
						
					if($AreaStatusProfile==1 &&  $AreaStatusPhoto==1 && $AreaStatusVideo==1 ) {
						$AreaStatus="checked='checked'";
					} else {
						$AreaStatus='';
					}
				
				?>
				<input type="checkbox" <?=$AreaStatus;?> id="AreaCheckBox<?=$_GET['PID'];?>" onclick="AreaIsActive(<?=$_GET['PID'];?> );" /> 
				
				<span class="switch"> Show all</span>
			</div>
			<div id="navigation" style="border-bottom:6px solid #EBCFCF;">
				<ul>
					<li>
						<span id="MenuLink">My Profile 
						<!-- check my profile active iactive status -->
						<?php
							if($rowp['IsActiveWorkHistory']==1 && $rowp['IsActiveTraining']==1 && $rowp['IsActiveEducation']==1 ) {
								$MyProfileStatus="checked='checked'";
							}else{
								$MyProfileStatus="";
							}
						?>
						<input style="float:right; margin-right:10px;" type="checkbox" <?=$MyProfileStatus;?>  id="MyProfileCheckBox<?=$_GET['PID'];?>" onclick="MyProfileIsActive(<?=$_GET['PID'];?> );"/>
						</span>
					</li>
					<li>
						<span id="MenuLink">Photo
						<?php
						
							if($AllPhotoStatus==1) {
								echo'<input checked="checked" style="float:right; margin-right:10px;" type="checkbox"   id="PhotoThumbnailCheckBox'.$_GET['PID'].'" onclick="PhotoThumbnailIsActive('.$_GET['PID'].');"/>';
							} else {
								echo'<input style="float:right; margin-right:10px;" type="checkbox"   id="PhotoThumbnailCheckBox'.$_GET['PID'].'" onclick="PhotoThumbnailIsActive('.$_GET['PID'].');"/>';
							}
						?>
						</span>
					</li>
					<li>
						<span id="MenuLink">Video 
						<?php
							if($AllVideoThumbnailActive==1) {
								echo'<input checked="checked" style="float:right; margin-right:10px;" type="checkbox"   id="VideoThumbnailCheckBox'.$_GET['PID'].'" onclick="VideoThumbnailIsActive('.$_GET['PID'].');"/>';
							} else {
								echo'<input style="float:right; margin-right:10px;" type="checkbox"   id="VideoThumbnailCheckBox'.$_GET['PID'].'" onclick="VideoThumbnailIsActive('.$_GET['PID'].');"/>';
							}
						?>
						</span>
					</li>
					<li>
						<span id="MenuLink" href="" >Documents 
						<input style="float:right; margin-right:10px;" type="checkbox" />
						</span>
					</li>
				</ul>
			</div>
			<div style="clear:both;"></div>
			
			<?php 
				// For all template/ custom profile active inactive status
				$QueryCustomtbl=" SELECT IsActive FROM tblcustomarea WHERE (ProfileID ={$_GET['PID']}) ";
				$ResultCustomtbl=@mysqli_query($dbc, $QueryCustomtbl);
						
					if( @mysqli_num_rows($ResultCustomtbl)>0 ) {
						$active=1;
						while( $RowCustomtbl=@mysqli_fetch_array( $ResultCustomtbl, MYSQLI_ASSOC ) )  {
						
							if ( $RowCustomtbl['IsActive']==0 ) {
								$active=0;
							} else{
								continue;
							}							
						}
						
						
					}
			
			?>

			<div id="navigation">
				<div id="AreaHeader" style="margin-top:8px;">
					<span style="margin-right:60px; margin-left:5px; font-size:13px;">
						<a href="#" id="AddCustomArea">Custom areas</a>
					</span>
					<?php
						if($active==0){
							echo '<input type="checkbox"  id="AllTemplateCheckBox'.$_GET['PID'].'" onclick="AllTemplateIsActive('.$_GET['PID'].' );" />';
						} else {
							echo '<input checked="checked" type="checkbox"  id="AllTemplateCheckBox'.$_GET['PID'].'" onclick="AllTemplateIsActive('.$_GET['PID'].' );"  />';
						}
					?>
					
					<span>Show all</span>
				</div>
				
				
				<ul style="background:#E6F2FF;">
				
					<?php
					
					$QueryCustom=" SELECT * FROM tblcustomarea WHERE (ProfileID ={$_GET['PID']}) ";
					$ResultCustom=@mysqli_query($dbc, $QueryCustom);
						
						if( @mysqli_num_rows($ResultCustom)>0 ) {
						
							while( $RowCustom=@mysqli_fetch_array($ResultCustom, MYSQLI_ASSOC) )  {

								if( $RowCustom['IsActive']==1) {	
								$TemplateStatus="checked=\"checked\"";
								} else {
									$TemplateStatus="";
								}
							
							?>	
								<li>
									<a id="TemplateLink" href="#<?=$RowCustom['Name'];?>" title="<?=$RowCustom['Name'];?>">
										<?php 
											$string=strlen($RowCustom['Name']);
											if($string>=20) {
											echo substr($RowCustom['Name'],0,20);
											echo'...';
											} else {
												echo $RowCustom['Name'];
											}
										?>
									</a> 
									<div id="NaviCheck" onclick="DeleteTemplate(<?php echo $RowCustom['CustomareaID']; ?>);" style="cursor:pointer;">
										<img src="images/Delete.png"  />
									</div> 
									<div id="NaviCheck">
										<input type="checkbox" <?php echo $TemplateStatus; ?> id="OneTemplateCheckBox<?php echo $RowCustom['CustomareaID']; ?>" onclick="OneTemplateIsActive(<?php echo $RowCustom['CustomareaID']; ?> );" />
									</div>
								</li>
							
							<?php
							
							} // The end of while loop
						
						} else {
							echo'<p>Create your custom profile</p>';
						}

					?>
				</ul>
				
			</div>
			<div style="clear:both;"></div>
			
		</div>
	</div>
	
	<!-- Main Container -->
	<div id="container">
	
		<!-- Profile -->
		<div id="profile">				
			<div id="name">
				<div style="text-align:left; margin-left:20px; margin-top:15px">
					<span class="TextName" ><?php echo $row['FirstName'].' '.$row['MiddleName'].' '.$row['LastName']; ?></span>
				</div>
			</div>
			<?php
			if( $row['City']!="" && $row['StateProvince']!="" && $row['ZipPostal']!="" ) {
				$address= $row['City'] .','. $row['StateProvince'] .','. $row['ZipPostal'];
			} else {
				$address="";
			}
			?>
			<div id="address">
				<p>Address: <strong><?php echo "{$row['AddressLine1']} $address"; ?></strong></p>
				<!-- <p><span style="color:#F8F8F8">Address: </span><strong><?php echo $address; ?></strong></p> -->
				<p>Country: <strong><?php echo $row['Country']; ?></strong></p>
			</div>
			<div id="contact">
				<div style="float:left; width:240px;">
					<p>Email: <strong><?php echo $row['Email']; ?></strong></p>
					<p>Phone: <strong><?php echo $row['Phone']; ?></strong></p>
					<p>Mobile: <strong><?php echo $row['Mobile']; ?></strong></p>
					<p>Fax: <strong><?php echo $row['Fax']; ?></strong></p>
				</div>
				<div style="float:right; width:30px;">
					<div id="PersonalInfoID" class="edit">
						<img src="images/edit.png" />
					</div>
				</div>
			</div>
		</div>
		
		
		<div id="summary">
			<div id="SummaryHeader">
				<div style="float:left"><span class="TextSummaryHead"> Summary</span></div>
				<div id="SummeryID" style="float:right; background:url(images/EditBg.png); height:30px; width:30px; padding-left:7px; padding-top:7px; cursor:pointer"><img src="images/edit.png"/></div>
			</div>
			<p class="TextSummary"><?php echo $row['Summary']; ?></p>
			
		</div>
		
		
		<div id="MyProfile">
			<h2 class="TextMyProfile" > <img src="images/ProfilePrefex.png" height="12" width="12"/> My Profile</h2>
		</div>
		
		<?php 
		
			if( $rowp['IsActiveWorkHistory']==1) {	
				$workHistorytbl="checked=\"checked\"";
			} else {
				$workHistorytbl="";
			}
		?>
		<script type="text/javascript">
		$(document).ready(function(){		
			$("#WorkHistoryMinimize").click(function(){
				$("#toggle_div").slideToggle("slow");
				$("#IndecatorWorkHistory").slideToggle("slow");
			});  

		});
			
		</script>
		
		<!-- Work History -->
		<div id="WorkHistory" >
			<div id="ProfileHeader">
				<!--
				<div id="WorkHistoryMinimize" style="float:left; width:40px; height:40px; background:url(images/max.png) no-repeat;">
					<img src="images/min.png" height="40" width="40" id="IndecatorWorkHistory"/>
				</div>
				-->
				<div style="float:left; margin-left:10px;">
					<span class="TextTheWorkHistory"> The work history </span>
					&nbsp; &nbsp; 
					<input type="checkbox" <?php echo $workHistorytbl; ?> id="tblworkhistoryCheckBox<?php echo $_GET['PID']; ?>" onclick="tblworkhistoryIsActive(<?php echo $_GET['PID']; ?> );" />
					<span class="switch1" >Show </span>
				</div>
				<div style="float:right; margin-right:10px "><span  id="AddWorkHistoryId" style="font-size:13px; font-weight:bold; cursor:pointer">Add <img src="images/AddSign.png" height="18" width="18"/></span></div>
			</div>
			<div id="ProfileBorder"></div>
		
			<div id="toggle_div">
				<?php

					// Data retrive Query for work history
					$query1="SELECT * FROM tblworkhistory WHERE ( ProfileID={$_GET['PID']} AND UserId=".$UserID." ) ORDER BY WorkHistoryID ASC ";

					$result1=@mysqli_query($dbc, $query1);
					
					if(@mysqli_num_rows($result1)>0) {
						 while( $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC) ){ 
						 
							if($row1['IsActive']==1)
								$WorkHistoryIschecked="checked=\"checked\"";
							else	
								$WorkHistoryIschecked="";
							
							echo"
							<div class=\"DisplayRecords\" id=\"DisplayWorkHistory\">
								<div style=\"height:35px;\">
									<div id=\"WorkHistoryTitle\">
										 <a href=\"#\"> {$row1['Empolyer']}</a>  &nbsp; &nbsp;
										 
										<span>
											<input type=\"checkbox\" {$WorkHistoryIschecked}  id=\"WorkHistoryCheckboxID{$row1['WorkHistoryID']}\" onclick=\"IsActiveWorkHistory({$row1['WorkHistoryID']});\" \>
										</span>
										 
										 <span class=\"switch1\" > Show </span>
									</div>
									<div id=\"WorkHistoryEdit\">
										<div style=\"float:left;\">
											<span style=\"cursor:pointer\">
												<img src=\"images/edit.png\" onclick=\"EditWork_History({$row1['WorkHistoryID']});\" /> 
											</span>
										</div>
										<div style=\"float:left;\">
											&nbsp; &nbsp;
											
											<b onclick=\"Delete_WorkHistory({$row1['WorkHistoryID']});\" style=\"cursor:pointer;\">
												<img src=\"images/Delete1.png\" height=\"18\" width=\"18\" />
											</b>
											
										</div>
									</div>
								</div>
								<div style=\"height:30px;\">
									<div id=\"WorkHistoryPosition\"> {$row1['Title']} </div> 
									";
									?>
									<div id="WorkHistoyDate">
									<?php
									echo" From: {$row1['Fromm']} , "; 
									if( $row1['Current']!='' ) {
										echo $row1['Current'];
									} else {
										echo"To: {$row1['Too']}";
									}
									?>
									</div>
								<?php	
								echo"
								</div>
								<div id=\"description\"> {$row1['Description']} </div>
								<div id=\"ExampleLink\" ><a href=\"http://{$row1['ExampleOfLink']}\" target=\"_blank\"> {$row1['ExampleOfLink']}</a></div>
							</div>
							";
						}

							
					} else {
						
						echo'<p style="text-align:center;">Add your work history</p>';
					}
				?>
				</div>
		</div>
		
		
		<?php 
		
			if( $rowp['IsActiveTraining']==1) {	
				$trainingtbl="checked=\"checked\"";
			} else {
				$trainingtbl="";
			}
		?>
		
		<!-- Training and cirtificate -->
		<a name="TrainingAndCertificate"> </a> 
		<div id="WorkHistory" >
			<div id="ProfileHeader">
				<div style="float:left; margin-left:10px; ">
					<span class="TextTheWorkHistory"> Training & Certificates </span>
					&nbsp; &nbsp; 
					<input type="checkbox" <?php echo $trainingtbl; ?> id="tbltrainingCheckBox<?php echo $_GET['PID']; ?>" onclick="tbltrainingIsActive(<?php echo $_GET['PID']; ?> );" />
					<span class="switch1">Show </span>
					</div>
				<div style="float:right; margin-right:10px "><span  id="AddTrainingId" style="font-size:13px; font-weight:bold; cursor:pointer">Add <img src="images/AddSign.png" height="18" width="18"/></span></div>
			</div>
			<div id="ProfileBorder"></div>
			
			
			<?php
			// Data retrive Query for training and cirtificates
			$query2="SELECT * FROM tbltraining WHERE ( ProfileID={$_GET['PID']} AND UserID=".$UserID." ) ORDER BY TrainingID ASC";

			$result2=@mysqli_query($dbc, $query2);

			if(@mysqli_num_rows($result2)>0) {
		
				while( $row=mysqli_fetch_array($result2, MYSQLI_ASSOC) ){ 
				
					if($row['IsActive']==1)
							$TrainingIschecked="checked=\"checked\"";
						else	
							$TrainingIschecked="";
				
					echo"
					<div class=\"DisplayRecords\">
						<div style=\"height:30px;\">
							<div id=\"TrainingTitle\">
								 {$row['Title']} &nbsp; &nbsp;
								 
								<span>
									<input type=\"checkbox\" {$TrainingIschecked} id=\"TrainingCheckboxID{$row['TrainingID']}\" onclick=\"IsActiveTraining({$row['TrainingID']});\" \>
								</span>
								 
								 <span class=\"switch1\" > Show </span>
							</div>
							<div id=\"WorkHistoryEdit\">
								
								<span style=\"cursor:pointer\">
									<img src=\"images/edit.png\" onclick=\"EditTraining({$row['TrainingID']});\" /> 
								</span>
								&nbsp; &nbsp;
							
								<span onclick=\"DeleteTrainingHistory({$row['TrainingID']});\" style=\"cursor:pointer;\">
									<img src=\"images/Delete1.png\" height=\"18\" width=\"18\" />
								</span>
							</div>
						</div>
						";?>
						<div id="TrainingDate">
							From: <?=$row['Fromm'];?> 
							<?php
							if( $row['Current']!='' ) {
								echo $row['Current'];
							} else {
								echo" To: {$row['Too']}";
							}
							?>
							
						</div>
						<?php
						echo"
						<div id=\"description\"> {$row['Description']} </div>
						<div id=\"ExampleLink\" ><a href=\"http://{$row['ExampleOfLink']}\" target=\"_blank\"> {$row['ExampleOfLink']}</a></div>
					</div>
					";
				}
	
			} else {
				
				echo'<p style="text-align:center;">Add your training and certificates</p>';
			}
			?>
		</div>
		
		
		
		<?php 
		
			if( $rowp['IsActiveEducation']==1) {
				$educationtbl="checked=\"checked\"";
			} else {
				$educationtbl="";
			}
		?>
		
		<!-- Educational Background -->
		<div id="WorkHistory" >
			<div id="ProfileHeader">
				<div style="float:left; margin-left:10px; ">
					<span class="TextTheWorkHistory"> The Education Background </span>
					&nbsp; &nbsp; 
					<input type="checkbox" <?php echo $educationtbl; ?> id="tbleducationCheckBox<?php echo $_GET['PID']; ?>" onclick="tbleducationIsActive(<?php echo $_GET['PID']; ?> );" />
					<span class="switch1">Show </span>
				</div>
				<div style="float:right; margin-right:10px "><span  id="AddEducationId" style="font-size:13px; font-weight:bold; cursor:pointer">Add <img src="images/AddSign.png" height="18" width="18"/></span></div>
			</div>
			<div id="ProfileBorder"></div>
				
				<?php

					// Data retrive Query for Education Background
					$query3="SELECT * FROM tbleducation WHERE ( ProfileID={$_GET['PID']} AND UserID=".$UserID." ) ORDER BY EducationID ASC";

					$result3=@mysqli_query($dbc, $query3);

					if(@mysqli_num_rows($result3)>0) {
				
						 while( $row3=mysqli_fetch_array($result3, MYSQLI_ASSOC) ){ 
						 
							if($row3['IsActive']==1)
									$EducationIschecked="checked=\"checked\"";
								else	
									$EducationIschecked="";

							?>
							<div class="DisplayRecords">
								<div style="height:30px;">
									<div id="WorkHistoryTitle">
										 <a href="#" style="color:#FF6600;"><?php echo $row3['Title'] ; ?></a>  &nbsp; &nbsp;
										 
										 <span>
											<input type="checkbox" <?php echo "$EducationIschecked"; ?> id="EducationCheckboxID<?php echo $row3['EducationID'];?>" onclick="IsActiveEducation(<?php echo $row3['EducationID']; ?>);" \>
										</span>
										 
										 <span class="switch1" > Show </span>
									</div>
									<div id="WorkHistoryEdit">
										<span style="cursor:pointer">
											<img src="images/edit.png" onclick="EditEducation(<?php echo $row3['EducationID']; ?> );" /> 
										</span>
										
										&nbsp; &nbsp;
					
										<span onclick="DeleteEducation(<?php echo $row3['EducationID']; ?>);" style="cursor:pointer;">
											<img src="images/Delete1.png" height="18" width="18" />
										</span>
				
									</div>
								</div>
								<div style="height:30px;">
									<div id="WorkHistoryPosition"><?php echo $row3['Subject']; ?></div> 
									<div id="WorkHistoyDate">From:<?php echo $row3['Fromm']; ?>, 
									<?php
									if( $row3['Current']!='' ) {
										echo $row3['Current'];
									} else {
										echo"To: {$row3['Too']}";
									}
									?>
									</div>
								</div>
								<div id="description"><?php echo $row3['Description']; ?> </div>
								<!-- Two Button for course details -->
								<div style="height:40px; width:280px;">
									<div class="ButtonHideShow" id="ButtonHideShow<?=$row3['EducationID'];?>">
										<div style="float:left; width:137px; height:22px; padding-top:3px; padding-left:3px;">
											View Course Details
										</div>
										<div style="float:left; height:20px; width:16px; margin-top:4px; background:url(images/up.png) no-repeat; ">  
											<img src="images/down.png" id="Indecator<?=$row3['EducationID'];?>" />
										</div>
									</div>
									
									<div id="AddCourse">
										<span style="cursor:pointer" onclick="AddCourseDetails(<?php echo $row3['EducationID']; ?>);">
											<img src="images/AddCourse.png"  height="16" width="16" /> 
										</span>
									</div>
								</div>
								<?
									$JS.='
										$("#ButtonHideShow'.$row3['EducationID'].'").click(function(){
											$("#Display'.$row3['EducationID'].'").slideToggle("slow");
											$("#Indecator'.$row3['EducationID'].'").slideToggle("slow");
										});
									';
								?>
								<div id="Display<?=$row3['EducationID'];?>" class="Display">
									<div id="CourseHeading">
										<div id="HeadingField" style=" width:108px;  ">Name</div>
										<div id="HeadingField" style=" width:368px; ">Description</div>
										<div id="HeadingField" style=" width:78px; ">Term</div>
										<div id="HeadingField" style=" width:68px; ">Grade</div>
										<div  style=" width:111px; height:30px; padding-top:5px; float:left;">Customize</div>
									</div>
									<?php 
									$query=" SELECT * FROM tblcourse WHERE EducationID={$row3['EducationID']} ";
									$result=@mysqli_query($dbc, $query);
									
										if( @mysqli_num_rows($result)>0 ) {
											
											while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
											
												if( $row['IsActive']==1) {
													$CourseIs="checked=\"checked\"";
												} else {
													$CourseIs="";
												}
											
											?>
											
												<div id="CourseDetailFields">
													<div id="RecordField" style=" width:103px; margin-right:4px;  "><?php echo $row['CourseName']; ?></div>
													<div id="RecordField" style=" width:362px; margin-right:4px;  ">
														<p style="text-align:left; width:355px; margin:0 3px 5px 3px; ">
															<?php 
																echo substr($row['Description'],0,100);	
															?>
															&nbsp 
															<span id="ViewMore" onclick="ViewCourDetails(<?=$row['CourseID'];?>);"> 
																<i>View detai...</i> 
															</span>
														</p>
													</div>
													<div id="RecordField" style=" width:73px; margin-right:4px; padding-top:10px;"><?php echo $row['Term']; ?></div>
													<div id="RecordField" style=" width:60px; padding-right:4px; "><?php echo $row['Grade']; ?></div>
													
													
													<div id="CustomArea" >
														<div style="float:left; height:31px; width:40px; margin-left:5px; ">
															<div id="CourseDetailBg" onclick="EditCourse(<?php echo $row['CourseID']; ?> );">
																<img src="images/EditCourDe.png" height="16" width="16" alt="Edit Course"/>
															</div>
														</div>
									
														<div style="float:left; height:31px; width:33px;">
															<div id="CourseDetailBg" onclick="DeleteCourse(<?php echo $row['CourseID']; ?>);" >
																<img src="images/DelCourDe.png" height="16" width="16" alt="Delete Course" />
															</div>
														</div>												
														<div style=" float:left; height:31px; width:28px;">
															<input type="checkbox" <?php echo "$CourseIs"; ?> id="CourseCheckboxID<?php echo $row['CourseID'];?>" onclick="IsActiveCourse(<?php echo $row['CourseID']; ?>);" \>
															<span class="switch1" style="color:#444; ">Show</span>
														</div>
										
													</div>
												</div>
											

											
											<?php
											
											} // the end of while condition
											
										} else {
											echo'<p> You have not add your course details yet.</p>';
										}
										
											
								
								?>
									
									
								
								</div>
								
							</div>
							
							
						<?php
						
						} // The end of while condition

							
					} else {
						
						echo'<p style="text-align:center;">Add your educational background</p>';
					}
				?>
				
				<script type="text/javascript">
								
					/* Education Course details button */

					$(document).ready(function(){
					
						<?=$JS?>
						  
						  
					});
						
				</script>				
		
		</div> <!-- The end of education -->

		
		<!-- Custom area start -->
		<!-- Custom area start -->
		
		
		<!-- Template 1 -->

		<?php
		// Data Retrive quety for Custom Profile			
		$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_GET['PID']} AND IsActive=1 AND Template=1 )";
		$ResultCus=@mysqli_query($dbc, $QueryCus);
			
			if( @mysqli_num_rows($ResultCus)>0 ) {
			
				while( $RowCus=@mysqli_fetch_array($ResultCus, MYSQLI_ASSOC) ) {
				?>	
					<a name="<?=$RowCus['Name']?>" ></a>
					<div id="MyProfile">
						<div style="float:left;">
							<h2 class="TextMyProfile">
								<img src="images/ProfilePrefex.png" height="12" width="12"/> 
								<?php 
									$string=strlen($RowCus['Name']);
									if($string>=85) {
									echo substr($RowCus['Name'],0,85);
									echo'...';
									} else {
										echo $RowCus['Name'];
									}
								?>
							</h2>
						</div>	
						<div onclick="EditTemplateName(<?php echo $RowCus['CustomareaID']; ?>);" style="float:right; background:url(images/EditBg.png); height:30px; width:30px; padding-left:4px; padding-top:7px; cursor:pointer">
							<img src="images/edit.png"/>
						</div>
					</div>
				
					<!-- Custom area Work history style-->
					<div id="WorkHistory">
						
						<?php 
			
							// Include Template 1 order by selection
							
							include('includes/TemplateOne.php');
							
						?>

					</div>

				<?php
				
				} // The end of mail while loop
			} 
		?>
		
		<!-- Template 2 -->

		<?php
		// Data Retrive quety for Custom Profile			
		$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_GET['PID']} AND IsActive=1 AND Template=2 )";
		$ResultCus=@mysqli_query($dbc, $QueryCus);
			
			if( @mysqli_num_rows($ResultCus)>0 ) {
			
				while( $RowCus=@mysqli_fetch_array($ResultCus, MYSQLI_ASSOC) ) {
				?>
					<a name="<?=$RowCus['Name']?>" ></a>
					<div id="MyProfile">
						<div style="float:left;">
							<h2 class="TextMyProfile" > 
								<img src="images/ProfilePrefex.png" height="12" width="12"/>
								<?php 
									$string=strlen($RowCus['Name']);
									if($string>=85) {
									echo substr($RowCus['Name'],0,85);
									echo'...';
									} else {
										echo $RowCus['Name'];
									}
								?>
							</h2>
						</div>	
						<div onclick="EditTemplateName(<?php echo $RowCus['CustomareaID']; ?>);" style="float:right; background:url(images/EditBg.png); height:30px; width:30px; padding-left:4px; padding-top:7px; cursor:pointer">
							<img src="images/edit.png"/>
						</div>
					</div>
		
					<!-- Custom area Document & Vidoe A style-->
						
						<?php 
							// Include Template 2 order by selection
							include('includes/TemplateTwo.php');
						?>
				<?php
				
				} // The end of mail while loop
			
			} 
		?>
		
		
		<!-- Template 3 -->

		<?php
		// Data Retrive quety for Custom Profile			
		$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_GET['PID']} AND IsActive=1 AND Template=3 )";
		$ResultCus=@mysqli_query($dbc, $QueryCus);
			
			if( @mysqli_num_rows($ResultCus)>0 ) {
			
				while( $RowCus=@mysqli_fetch_array($ResultCus, MYSQLI_ASSOC) ) {
				?>
					<a name="<?=$RowCus['Name']?>" ></a>
					<div id="MyProfile">
						<div style="float:left;">
							<h2 class="TextMyProfile" >
								<img src="images/ProfilePrefex.png" height="12" width="12"/> 
									<?php 
										$string=strlen($RowCus['Name']);
										if($string>=85) {
										echo substr($RowCus['Name'],0,85);
										echo'...';
										} else {
											echo $RowCus['Name'];
										}
									?>
								</h2>
						</div>	
						<div onclick="EditTemplateName(<?php echo $RowCus['CustomareaID']; ?>);" style="float:right; background:url(images/EditBg.png); height:30px; width:30px; padding-left:4px; padding-top:7px; cursor:pointer">
							<img src="images/edit.png"/>
						</div>
					</div>
					
					<!-- Custom area Document & Vidoe B style-->
						<?php 
							// Include Template 3 order by selection
							include('includes/TemplateThree.php');
							
						?>

					
					

				<?php
				
				} // The end of mail while loop
			
			} 
		?>
		

		<!-- Template 4 -->

		<?php
		// Data Retrive quety for Custom Profile			
		$QueryCus=" SELECT * FROM tblcustomarea WHERE ( ProfileID ={$_GET['PID']} AND IsActive=1 AND Template=4 )";
		$ResultCus=@mysqli_query($dbc, $QueryCus);
			
			if( @mysqli_num_rows($ResultCus)>0 ) {
			
				while( $RowCus=@mysqli_fetch_array($ResultCus, MYSQLI_ASSOC) ) {
				?>
					<a name="<?=$RowCus['Name']?>" ></a>
					<div id="MyProfile">
						<div style="float:left;">
							<h2 class="TextMyProfile" > 
								<img src="images/ProfilePrefex.png" height="12" width="12"/>
								<?php 
									$string=strlen($RowCus['Name']);
									if($string>=85) {
									echo substr($RowCus['Name'],0,85);
									echo'...';
									} else {
										echo $RowCus['Name'];
									}
								?>
							</h2>
						</div>	
						<div onclick="EditTemplateName(<?php echo $RowCus['CustomareaID']; ?>);" style="float:right; background:url(images/EditBg.png); height:30px; width:30px; padding-left:4px; padding-top:7px; cursor:pointer">
							<img src="images/edit.png"/>
						</div>
					</div>
				
				
					<!-- Custom area Work history style-->
					<div id="WorkHistory" >
						
						<?php 
							include('includes/TemplateFour.php');
						?>

					</div>
					
				<?php
				
				} // The end of main while loop
			
			} 
		?>
		
	</div> <!-- The end of container -->
	<div style="clear:both;"></div>
	

  </div>
</div>
<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>
<script type="text/javascript" src="./jQueryUI/js/jquery.form.js"></script>
</body>

</html>