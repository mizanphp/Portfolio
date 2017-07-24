<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Digital Prifile | Manage Portfolios</title>
<link href="./stylesheet/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="./jQueryUI/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css" />	
<script type="text/javascript" src="./jQueryUI/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="./jQueryUI/js/jquery-ui-1.8.17.custom.min.js"></script>
<link href="./stylesheet/jquery.wysiwyg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jQueryUI/js/jquery.wysiwyg.js"></script>

<!-- Document viewer -->
<script type="text/javascript" src="documentViewer/libs/yepnope.1.5.3-min.js"></script>
<script type="text/javascript" src="documentViewer/ttw-document-viewer.min.js"></script>
<script type="text/javascript" src="jQueryUI/js/jquery.tools.min.js"></script>
</head>

<?php 
if(!isset( $_SESSION['UserID'])) {
	
	if($_REQUEST['adminentertouser']!=''){
		$converter=new Encryption;
		$UserID=$converter->decode($_REQUEST['adminentertouser']);
		
		$QquryName="SELECT RegisterFirstName, RegisterLastName FROM tbluser WHERE UserID='$UserID' LIMIT 1";
		$ResultName=@mysqli_query($dbc, $QquryName);
		if(@mysqli_num_rows($ResultName)==1) {
			$Welcome=@mysqli_fetch_array($ResultName, MYSQLI_ASSOC);
			$name ='<span> '.$Welcome['RegisterFirstName'].'  '.$Welcome['RegisterLastName'].'</span>' ;
		}
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


?>


<!-- Copy Profile Form -->
<div id="DialogCopyProfile" title="Copy Profile">
	<div id="DialogCopyProfileContent">
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

<!-- Create new portfolio -->
<div id="DialogNewProfile" title="New Profile">
	<div id="DialogNewProfileContent">
	</div>
</div>

<!-- Change password -->
<div id="DialogChangePassword" title="Change password">
	<form id="ChangePasswordForm">
		<div style="padding:5px;">
			<div class="AddLabeln" style="width:160px;">
				<label for="EmailAddress">Register email address :</label>
			</div>	
			<div class="AddDatan" style="width:330px;">
				<input readonly class="InputBox" style="width:280px;" type="text" name="RegisterEmail" id="ChangePasswordEmailAddress" size="25" value="<?=$_SESSION['Email'];?>" />
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln" style="width:160px;">
				<label for="Password">Current password :</label>
			</div>	
			<div class="AddDatan" style="width:280px;">
				<input class="InputBox" style="width:230px;" type="password" name="Password" id="ChangePasswordPassword" size="25" required="required" maxlength="41"/>
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln" style="width:160px;">
				<label for="NewPassword">New password :</label>
			</div>	
			<div class="AddDatan" style="width:280px;">
				<input class="InputBox" style="width:230px;" type="password" name="NewPassword" id="ChangePasswordNewPassword" size="25" required="required" maxlength="41"/>
			</div>
		</div>
		<div style="padding:5px;">
			<div class="AddLabeln" style="width:160px;">
				<label for="ConfirmPassword">Confirm password :</label>
			</div>	
			<div class="AddDatan" style="width:280px;">
				<input class="InputBox" style="width:230px;" type="password" name="ConfirmPassword" id="ChangePasswordConfirmPassword" size="25" required="required" maxlength="41"/>
			</div>
		</div>
		<input type="hidden" name="SubmitID" value="<?=$UserID;?>" />
	</form>
</div>

<body>
<!-- Main Container and Page Body-->
<div id="MainContainer" style="min-height:800px;">
  <div id="ContainerBody" style="min-height:800px;">
	<!-- Page header -->
	<div id="header">
		<div style="height:61px; width:1034px; padding:8px; ">	
			<div id="PortfolioName">
				<div class="ManagePortfolios">
					<span>Manage Portfolios</span>
				</div>
			</div>
			
			<div id="welcome">
				<div>
					<span><b>Welcome: </b><?=$name?></span> 
					<div style="margin:5px 5px 0px 0px; height:50px; font-size:11px; font-weight:bold; font-family:Arial;">
						<a href="logout.php" style="color:#888;" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#888'">Logout</a>
						 | <span style="cursor:pointer; color:#888;" id="ChangePassword" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#888'">Change password</span>
					</div> 
				</div>
			</div>
		</div>	
	</div>
	
	<!-- Search -->
	<div id="search">
	
		<div id="SearchWithBox">
			<form action="" method="Post">
				<div Id="SearchText">
					<label>Search</label>
				</div>
				
				<div style="float:left; margin-top:3px; width:445px; ">
					<input value="<?=$_REQUEST["SearchTerms"]?>" class="SearchBox" type="text" name="SearchTerms"  size="75" required="required"/>
				</div>
				<div style="float:right; width:150px; margin-right:15px; ">
				
					<input class="SubmitButton" type="submit" name="submit" value="FIND"/>
					<input type="hidden" name="submitted" value="TRUE" />
					
				</div>
			</form>
		</div>
		<div style="float:right; height:46px; width:265px; margin-top:13px; margin-right:10px;">
		
			<div style="float:left;" class="button" onclick="ViewAll('<?=$_SERVER['REQUEST_URI'];?>');" >
				<span>View All</span>
			</div>
			<div style="float:right;" class="button" onClick="NewProfile(<?=$UserID;?>);">
				<span>NEW</span>
			</div>
		</div>
	</div>
	<!-- All Portfolio List -->
	<div id="PortfolioWithPagination">
		
		<?php
		
		if($_POST){
		
			$SearchSQL=" AND ProfileName like '%{$_REQUEST["SearchTerms"]}%' OR ProfileSummary like '%{$_REQUEST["SearchTerms"]}%' ";
		
		} else {
			$SearchSQL="";
		}	
		
		
		/// Data retrive query from Profile table
		
		$queryp="SELECT * FROM tblprofile WHERE  UserID=".$UserID." {$SearchSQL} ORDER BY ProfileID DESC ";
		$resultp=@mysqli_query($dbc, $queryp);
		
		if( @mysqli_num_rows($resultp)>0 ) {
		
			$bg = '#F8F8F8';
		
			while( $rowp=@mysqli_fetch_array($resultp, MYSQLI_ASSOC) ) {
			
				$bg = ($bg=='#F8F8F8' ? '#FFFFFF' : '#F8F8F8');
			
		?>
				
				<div id="PortfolioList" style="background:<?php echo $bg ; ?>">
					<div style="float:left; text-align:left; width:520px;">
						<div class="PortfolioName"><span ><?php echo $rowp['ProfileName']; ?></span></div>
						<div class="PortfolioDescription"><span ><?php echo $rowp['ProfileSummary']; ?> </span></div>
						<div class="PortfolioViewDetail"><span><a href="PreviewPortfolio.php?PID=<?=$rowp['ProfileID'].'&MyProfile=1';?>" target="_blank">Click to view detail..</a></span></div>
					</div>
					<div style="float:right; height:80px; width:400px; ">
						<div id="ButtonManageProfile">
							<div id="ButtonBG" title="View History" onclick="ShowHistory(<?=$rowp['ProfileID'];?>);">
								<img src="images/history.png" border="0" alt="View History"/>
								<br/> <span>History</span>
							</div>
							<div id="ButtonBG" title="Copy Profile">
								<span onclick="CopyProfile(<?php echo $rowp['ProfileID'] ; ?>);" style="cursor:pointer;">
									<img src="images/Copy.png" border="0" alt="Copy Profile" />
									<br/> <span>Copy</span>
								</span>
							</div>
							<div id="ButtonBG" title="Edit Profile">
								<a href="ViewPortfolio.php?PID=<?=$rowp['ProfileID'];?>&AUID=<?=$_REQUEST['adminentertouser'];?>">
									<img src="images/edit.png" height="23" border="0" alt="Copy Profile"/>
									<div style="height:6px; width:22px; margin:0 auto;"></div>
									<span>Edit</span>
								</a>	
							</div>
						</div>
						
						<div style="float:Right; height:80px; width:150px;">
							<div id="ButtonBGDelete" title="Delete Profile">
								<span style="cursor:pointer" onclick="DeleteProfile(<?php echo $rowp['ProfileID'];?>);">
									<img src="images/Delete1.png" height="18" border="0" alt="Delete Profile" />
									<div style="height:7px;"></div>
									<span>Delete</span>
								</span>
							</div>
						
						</div>
					
					</div>

				</div>
			
			
		<?php
		
			} // End while loop
			
			// Free up the resources.
			mysqli_free_result( $resultp ); 
			
		} else {
			echo'
			<div id="PortfolioList">
				<span id="ShortMessage">The record is not found</span>
			<div>';
		}
			
			
		
		?>
			
			<!--
			<div style="float:right; width:45px;">
				<span>Page</span>
			</div>
			-->
	</div>
	

<?php

	// Close database connection
	mysqli_close( $dbc );
?>
  </div>
</div>
<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>
</body>
</html>