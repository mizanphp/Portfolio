<?php
include('includes/mysqliConnect.php');
$query="SELECT Description FROM tblcourse WHERE CourseID={$_REQUEST['CourseID']} LIMIT 1";
$result=@mysqli_query($dbc, $query);

if( @mysqli_num_rows($result)==1 ) {
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC );
	echo'<div id="ViewCourseDesc">'.$row['Description'].'</div>';
} else {
	echo'<p>Course Description is not found</p>';
}
?>