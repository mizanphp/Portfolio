<?php
include('includes/mysqliConnect.php');
//echo $_REQUEST['DocumentVideoAID'];
$query="SELECT Description FROM tblcadocumentvideoa WHERE DocumentVideoAID={$_REQUEST['SubmitID']} LIMIT 1";
$result=@mysqli_query($dbc, $query);

if( @mysqli_num_rows($result)==1 ) {
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC );
	echo'<div id="ViewCourseDesc"> '.$row['Description'].'</div>';
} else {
	echo'<p>Description is not found</p>';
}
?>