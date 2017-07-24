
<!--<script type="text/javascript" src="./jQueryUI/js/Custom.js"></script>-->

<!-- Edit Course Form  -->
<form id="AddCourseDetailsForm">
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="CourseName" >Course Name : </label>
		</div>
		<div class="AddDatan">
			<input class="InputBox" type="text" name="CourseName" id="AddCourseCourseName" size="25" />
		</div>
	</div>
	<div style="padding:5px;">
		<div class="AddLabeln">
			<label for="Term">Term :</label>
		</div>	
		<input class="SmallBox" style="width:153px;" type="text" name="Term" id="AddCourseCourseTerm" size="15" />
		<div class="Too" style="width:46px;">Grade :</div>
		<input class="SmallBox" style="width:153px;" type="text" name="Grade" id="AddCourseCourseGrade" size="15" />
	</div>
	<div style="padding:5px; clear:both; width:690px;">
		<div class="AddLabeln">
			<label for="Description"> Description :</label>
		</div>
		<div style="float:left; margin-left:15px; width:505px;" >
			<textarea name="Description" id="EditorAddCourse" cols="63" rows="12" style="height:190px; width:505px; float:left; "></textarea>
			<input type="hidden" name="SubmitEducationID" size="25" value="<?php echo $_REQUEST['EducationID']; ?>"/>
		</div>	
	</div>	
</form>

<script type="text/javascript">
// Add Custom profile Work history style
	$(function()
	{
	  $('#EditorAddCourse').wysiwyg();
	  
	});
</script>
