<div id="ProfileHeader">
	<div style="float:left; margin-left:10px; ">
	<!--
		<span class="TextTheWorkHistory">Custom Profile Classic</span>
		&nbsp; &nbsp; 
		<input type="checkbox" <?php //echo $status; ?> id="tblClassicCheckBox<?php //echo $RowCu['CustomareaID']; ?>" onclick="tblClassicIsActive(<?php //echo $RowCu['CustomareaID']; ?> );" />
		<span class="switch1" >Show </span>
	-->
	</div>
	<div style="float:right; margin-right:10px ">
		<span  onclick="AddClassic(<?php echo $RowCus['CustomareaID']; ?>,<?php echo $_GET['PID']; ?>);" style="font-size:13px; font-weight:bold; cursor:pointer">Add <img src="images/AddSign.png" height="18" width="18"/></span>
	</div>
</div>
<div id="ProfileBorder"></div>



<?php

// Data retrive Query for Custom profile classic style
$query1="SELECT * FROM tblcaclassic WHERE CustomareaID={$RowCus['CustomareaID']} ORDER BY ClassicID ASC ";

$result1=@mysqli_query($dbc, $query1);

	if(@mysqli_num_rows($result1)>0) {

		 while( $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC) ){ 
		 
			if($row1['IsActive']==1)
				$ClassicIschecked="checked=\"checked\"";
			else	
				$ClassicIschecked="";
			
			echo"
			<div class=\"DisplayRecords\">
				<div style=\"height:30px;\">
					<div id=\"WorkHistoryTitle\">
						 <a href=\"#\"> {$row1['Title']}</a>  &nbsp; &nbsp;
						 
						<span>
							<input type=\"checkbox\" {$ClassicIschecked}  id=\"ClassicCheckboxID{$row1['ClassicID']}\" onclick=\"IsActiveClassic({$row1['ClassicID']});\" \>
						</span>
						 
						 <span class=\"switch1\" > Show </span>
					</div>
					<div id=\"WorkHistoryEdit\">
						<div style=\"float:left;\">
							<span style=\"cursor:pointer\">
								<img src=\"images/edit.png\" onclick=\"EditClassic({$row1['ClassicID']});\" /> 
							</span>
						</div>
						<div style=\"float:left;\">
							&nbsp; &nbsp;
							
							<b onclick=\"DeleteClassic({$row1['ClassicID']});\" style=\"cursor:pointer;\">
								<img src=\"images/Delete1.png\" height=\"18\" width=\"18\" />
							</b>
							
						</div>
					</div>
				</div>
				
				<div style=\" width:738; margin-right:20px; text-align:right; color:#990000;\">{$row1['Duration']}</div>
				
				<div id=\"description\"> {$row1['Description']} </div>
				
			</div>
			";
		}

			
	} else {
		
		echo'<p style="text-align:center;">Add your custom profile</p>';
	}
?>

