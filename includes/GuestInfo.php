<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eProfile | Guest Intormation</title>
<link href="./stylesheet/StylePortfolio.css" rel="stylesheet" type="text/css" media="screen" />
<link href="./jQueryUI/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jQueryUI/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>
<script type="text/javascript" src="./jQueryUI/js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="./jQueryUI/js/flowplayer-3.2.6.min.js"></script>

<link href="./stylesheet/jquery.wysiwyg.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./jQueryUI/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="documentViewer/libs/yepnope.1.5.3-min.js"></script>
<script type="text/javascript" src="documentViewer/ttw-document-viewer.min.js"></script>
<script type="text/javascript" src="jQueryUI/js/jquery.tools.min.js"></script>

</head>
<body>
<div style="height:700px; width:900px; margin:auto;">
	<div style="height:460px; width:600px; margin:auto;">
		<div id="GuestInfoForm">
		<div id="GuestInfoFormHeader"> 
			<div id="TextGuestInfo">
				<span>Guest Information</span>
			</div>
		</div>
		
		<?php
		if($_REQUEST['GuestInfo']='Ok' and $_REQUEST['GuestName']!='' and $_REQUEST['GuestEmail']!='' and $_REQUEST['GuestPhone']!='' and $_REQUEST['GuestMessage']!='') {
			
			$query="INSERT INTO tblguestinfo (ProfileIDID,GuestName,GuestEmail,GuestPhone,GuestMessage,Date) VALUES
					('".$_REQUEST['GetProfileID']."','".$_REQUEST['GuestName']."','".$_REQUEST['GuestEmail']."','".$_REQUEST['GuestPhone']."','".$_REQUEST['GuestMessage']."', NOW())";
			
			@mysqli_query($dbc, $query);
			if(mysqli_affected_rows($dbc)==1) {
				
				// Inserted id / GuestID
				$GuestID=@mysqli_insert_id($dbc);
				$_SESSION['GuestID']=$GuestID;
				
				header("location:PreviewPortfolio.php?PID={$_GET['PID']}&ReqFor={$_GET['RequestFor']}");
			} else {
				echo'<p>Please fill out each field currectly</p>';
			}
		}
		?>
			
			<form action="" method="post" onsubmit="return GuestInfoFormValidation()">
				<div style="padding:5px; clear:both;" >
					<div class="AddLabeln">
						<label for="GuestName">Name :</label>
					</div>	
					
					<div class="AddDatan">
						<input class="InputBox" type="text" name="GuestName" size="25" id="GuestName"/>
					</div>
				</div>
				<div style="padding:5px; clear:both;">
					<div class="AddLabeln">
						<label for="GuestEmail">Email Address :</label>
					</div>	
					<div class="AddDatan">
						<input class="InputBox" type="text" name="GuestEmail" size="25" id="GuestEmail"/>
					</div>
				</div>
				<div style="padding:5px; clear:both;" >
					<div class="AddLabeln">
						<label for="GuestPhone">Phone :</label>
					</div>	
					
					<div class="AddDatan">
						<input class="InputBox" type="text" name="GuestPhone" size="25" id="GuestPhone"/>
					</div>
				</div>
				<div style="padding:5px; clear:both; width:600px; height:130px;">
					<div class="AddLabeln">
						<label for="GuestMessage"> Message :</label>
					</div>
					<div style="float:left; margin-left:13px; width:450px;" >
						<textarea name="GuestMessage" id="GuestMessage" cols="55" rows="8" style="height:110px; width:390px; float:left;" ></textarea>
					</div>	
				</div>
				<div style="height:40px; margin-top:95px; width:370px;"> 
					<input type="submit" name="submit" value="View now"/> 
					<input type="hidden" name="GuestInfo" value="Ok" />
					<input type="hidden" name="GetProfileID" value="<?=$_GET['PID'];?>" />
				</div>
			</form>
		</div>
	</div>
	
	
	<script type="text/javascript">
	// Guest info Editor
	$(function()
	{
	  $('#GuestMessage').wysiwyg();
	  
	});
	</script>
</div>
</body>
</html>