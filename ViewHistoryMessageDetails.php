<?php
include('includes/mysqliConnect.php');
//echo $_REQUEST['SubmitID'];
$query="SELECT GuestMessage FROM tblguestinfo WHERE GuestID={$_REQUEST['SubmitID']} LIMIT 1";
$result=@mysqli_query($dbc, $query);

if( @mysqli_num_rows($result)==1 ) {
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC );
	echo'<div id="ViewCourseDesc"> '.$row['GuestMessage'].'</div>';
} else {
	echo'<p>Description is not found</p>';
}
?>