<?php
// Connect to the data base
require_once('../includes/mysqliConnect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Digital Prifile | Manage Portfolios</title>
<link href="../stylesheet/style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="../jQueryUI/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css" />	
<link href="../stylesheet/jquery.wysiwyg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jQueryUI/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../jQueryUI/js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="../jQueryUI/js/jquery.wysiwyg.js"></script>
<style type="text/css">
.ButtonBG{
	float:left;
	height:65px;
	width:200px;
	margin-left:5px;
	Padding-top:8px;
</style>
</head>

<?php 
if(!isset( $_SESSION['AdminID'] ) ) {

	// Delete the buffer.
	ob_end_clean(); 
	header("Location:index.php");
	exit(); 

} else {
	$name ='<span> '.$_SESSION['AdminName'].'</span>' ;
	
}

?>


<!-- Edit user -->
<div id="DialogEditUser" title="Edit registered user" >
	<div id="DialogEditUserContent">
	</div>
</div>

<!-- Edit admin information -->
<div id="DialogEditAdminInfo" title="Edit administrator information">
	<div id="DialogEditAdminInfoContent">
	</div>
</div>


<body>
<!-- Main Container and Page Body-->
<div id="MainContainer">
  <div id="ContainerBody">
	<!-- Page header -->
	<div id="header">
		<div style="height:61px; width:1034px; padding:8px; ">	
			<div id="PortfolioName">
				<div class="ManagePortfolios">
					<span>Manage User</span>
				</div>
			</div>
			<div id="welcome" >
				<div>
				<?php
					// Data Update Query for admin info
					$query2="SELECT AdminName FROM tbladmin WHERE AdminID={$_SESSION['AdminID']} limit 1";
					$result2=@mysqli_query($dbc, $query2);
					$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC) ;
				?>
					<span><b>Welcome: </b><?=$row2['AdminName'];?></span> 
					<div style="margin-top:5px; margin-right:20px; height:30px; font-size:11px; font-weight:bold; font-family:Arial;">
						<a href="logout.php" style="color:#888;" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#888'">Logout</a>
						| <span onclick="EditAdminInfo()" style="color:#888; cursor:pointer;" onmouseover="this.style.color='#000'" onmouseout="this.style.color='#888'">
							Edit Admin Info
						</span>
					</div> 
				</div>
			</div>
			<!--<div id="EditAdmin">Edit Admin</div>-->
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
			<div style="float:left;" class="button" onclick="ViewAllUser();" >
				<span>View All</span>
			</div>
			<!--
			<div style="float:right;" class="button" id="NewProfile">
				<span>NEW</span>
			</div>
			-->
		</div>
	</div>
	<!-- All Portfolio List -->
	<div id="PortfolioWithPagination">
		
		<?php
		
		if($_POST){
			$SearchSQL="WHERE RegisterFirstName like '%{$_REQUEST["SearchTerms"]}%' OR RegisterLastName like '%{$_REQUEST["SearchTerms"]}%' OR RegisterEmail like '%{$_REQUEST["SearchTerms"]}%' ";
		} else {
			$SearchSQL="";
		}	
		/// Data retrive query from Profile table
		$queryp="SELECT * FROM tbluser {$SearchSQL} ORDER BY (RegisterFirstName) ";
		$resultp=@mysqli_query($dbc, $queryp);
		
		if( @mysqli_num_rows($resultp)>0 ) {
		
			$bg = '#F8F8F8';
		
			while( $rowp=@mysqli_fetch_array($resultp, MYSQLI_ASSOC) ) {
			
				$bg = ($bg=='#F8F8F8' ? '#FFFFFF' : '#F8F8F8');
			
		?>
				
				<div id="PortfolioList" style="background:<?php echo $bg ; ?>">
					<div style="float:left; text-align:left; width:520px;">
						<div class="PortfolioName"><span ><?=$rowp['RegisterFirstName'];?> <?=$rowp['RegisterLastName'];?></span></div>
						<div class="PortfolioDescription"><span ><?=$rowp['RegisterEmail'];?></span></div>
						<div class="PortfolioViewDetail"><span><?=$rowp['RegisterDate'];?></span></div>
					</div>
					<div style="float:right; height:80px; width:400px;">
						<!--
						<div id="ButtonManageProfile"  style="width:150px; background:silver;">
							
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
							<a href="ViewPortfolio.php?PID=<?=$rowp['ProfileID'];?>">
								<img src="../images/edit.png" height="23" border="0" alt="Copy Profile"/>
								<div style="height:4px; width:22px; margin:0 auto;"></div>
								<span>Edit</span>
							</a>	
							</div>
						<div class="ButtonBG"><?=$rowp['RegisterDate'];?></div>
						</div>
						-->
						<div style="float:right; height:80px; width:90px;" >
							<div id="ButtonBGDelete" title="Delete user" style="cursor:pointer" onclick="DeleteUser(<?php echo $rowp['UserID'];?>);">
								<span>
									<img src="../images/Delete1.png" height="18" width="18" border="0" alt="Delete user" />
									<div style="height:7px;"></div>
									<span>Delete</span>
								</span>
							</div>
						</div>
						<div style="float:right; height:80px; width:150px;">
							<div id="ButtonBGDelete" title="Edit user" style="cursor:pointer;" onclick="EditUser(<?php echo $rowp['UserID'];?>);">
								<span>
									<img src="../images/edit.png" height="20" width="20" border="0" alt="Edit user" />
									<div style="height:7px;"></div>
									<span>Edit</span>
								</span>
							</div>
						</div>
						<div style="float:right; height:80px; width:150px;">
							<div id="ButtonBGDelete" title="View profile" style="cursor:pointer;" onclick="ViewUserProfile('<?php $converter = new Encryption; echo $encoded = $converter->encode($rowp['UserID']);?>');">
								<span>
									<img src="../images/ClickToView.PNG" height="26" width="26" border="0" alt="View profile" />
									<div style="height:2px;"></div>
									<span>Profile</span>
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
				<span id="ShortMessage">Registered user could not found</span>
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
<script type="text/javascript" src="../jQueryUI/js/Custom.js"></script>
</body>
</html>