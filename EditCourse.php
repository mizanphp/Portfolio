<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

// Data Update Query for Course
$query2="SELECT CourseID, CourseName, Description, Term, Grade FROM tblcourse WHERE CourseID={$_REQUEST['CourseID']} limit 1";
$result2=@mysqli_query($dbc, $query2);
$row2=@mysqli_fetch_array($result2, MYSQLI_ASSOC) ;

//print_r($row2);

?>

<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit Course Form  -->
<form id="EditCourseForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="CourseName" >Course Name : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" type="text" name="CourseName" id="EditCourseCourseName" size="25" value="<?php echo $row2['CourseName']; ?>" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Term">Term :</label>
		</div>	
		<input class="SmallBox" style="width:153px;" type="text" name="Term" id="EditCourseCourseTerm" size="15" value="<?php echo $row2['Term']; ?>" />
		<div class="Too" style="width:46px;">Grade :</div>
		<input class="SmallBox" style="width:153px;" type="text" name="Grade" id="EditCourseCourseGrade" size="15" value="<?php echo $row2['Grade']; ?>" />
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px;" >
			<textarea name="Description" id="EditorEditCourse" cols="63" rows="12" style="height:190px; width:505px; float:left; "><? echo $row2['Description']; ?></textarea>
			<input type="hidden" name="SubmitCourseID" size="25" value="<?php echo $row2['CourseID']; ?>"/>
		</div>	
	</div>		
</form>


<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorEditCourse').wysiwyg();
	  
	});
</script>
