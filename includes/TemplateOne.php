<div id="ProfileHeader">
	<div style="float:left; margin-left:10px; ">
	<!--
		<span class="TextTheWorkHistory">Custom profile as work history style</span>
		&nbsp; &nbsp; 
	
		<input type="checkbox" <?php //echo $status; ?> id="tblWHStyleCheckBox<?php //echo $RowCu['CustomareaID']; ?>" onclick="tblWHStyleIsActive(<?php //echo $RowCu['CustomareaID']; ?> );" />
		<span class="switch1" >Show </span>
	-->
	</div>
	<div style="float:right; margin-right:10px ">
		<span  onclick="AddWHStyle(<?php echo $RowCus['CustomareaID']; ?>,<?php echo $_GET['PID']; ?>);" style="font-size:13px; font-weight:bold; cursor:pointer">
			Add <img src="images/AddSign.png" height="18" width="18"/>
		</span>
	</div>
</div>
<div id="ProfileBorder"></div>

<?php
// Data retrive Query for custom profile work history style
$query1="SELECT * FROM tblcaworkhistorystyle WHERE( CustomareaID={$RowCus['CustomareaID']} AND ProfileID={$_GET['PID']}) ORDER BY WorkHistoryStyleID ASC";

$result1=@mysqli_query($dbc, $query1);

	if(@mysqli_num_rows($result1)>0) {

		 while( $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC) ) { 
		 
			if($row1['IsActive']==1)
				$WHStyleIschecked="checked=\"checked\"";
			else	
				$WHStyleIschecked="";
			
			echo"
			<div class=\"DisplayRecords\">
				<div style=\"height:30px;\">
					<div id=\"WorkHistoryTitle\">
						 <a href=\"#\"> {$row1['Title']}</a>  &nbsp; &nbsp;
						 
						<span>
							<input type=\"checkbox\" {$WHStyleIschecked}  id=\"WHStyleCheckboxID{$row1['WorkHistoryStyleID']}\" onclick=\"IsActiveWHStyle({$row1['WorkHistoryStyleID']});\" \>
						</span>
						 
						 <span class=\"switch1\" > Show </span>
					</div>
					<div id=\"WorkHistoryEdit\">
						<div style=\"float:left;\">
							<span style=\"cursor:pointer\">
								<img src=\"images/edit.png\" onclick=\"EditWHStyle({$row1['WorkHistoryStyleID']});\" /> 
							</span>
						</div>
						<div style=\"float:left;\">
							&nbsp; &nbsp;
							
							<b onclick=\"DeleteWHStyle({$row1['WorkHistoryStyleID']});\" style=\"cursor:pointer;\">
								<img src=\"images/Delete1.png\" height=\"18\" width=\"18\" />
							</b>
							
						</div>
					</div>
				</div>
				<div style=\"height:30px;\">
					<div id=\"WorkHistoryPosition\">{$row1['SubTitle']}</div> 
					<div id=\"WorkHistoyDate\">From: {$row1['Form']}   To: {$row1['Too']}</div>
				</div>
				<div id=\"description\"> {$row1['Description']} </div>
				
			</div>
			";
		}

		
	} else {
	
		echo'<p style="text-align:center;">Add your custom profile</p>';
	}
?>
		
		