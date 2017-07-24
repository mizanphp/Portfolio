<?php
include('includes/mysqliConnect.php');

$query="SELECT Description FROM tblcadocumentvideob WHERE DocumentVideoBID={$_REQUEST['SubmitID']} LIMIT 1";
$result=@mysqli_query($dbc, $query);

if( @mysqli_num_rows($result)==1 ) {
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC );
	echo'<div id="ViewCourseDesc">'.$row['Description'].'</div>';
} else {
	echo'<p>Description is not found bbb</p>';
}
?>