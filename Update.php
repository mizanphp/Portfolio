<?php
// Connect to the data base
require_once('includes/mysqliConnect.php');

function GetUserID($dbc,$PID){
	$query="SELECT UserID FROM tblprofile WHERE ProfileID=".$PID." LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC);
	$UID=$row['UserID'];
	return $UID;
}

/// save personal info
if($_REQUEST["Action"]=="PersonalInfo") {
	// All fields of user form
	$FirstName=$_REQUEST["FirstName"];
	$MiddleName=$_REQUEST["MiddleName"];
	$LastName=$_REQUEST["LastName"];
	$Email=$_REQUEST["Email"];
	$AddressLine1=$_REQUEST["AddressLine1"];
	$City=$_REQUEST["City"];
	$StateProvince=$_REQUEST["StateProvince"];
	$ZipPostal=$_REQUEST["ZipPostal"];
	$Country=$_REQUEST["Country"];
	$Phone=$_REQUEST["Phone"];
	$Fax=$_REQUEST["Fax"];
	$Mobile=$_REQUEST["Mobile"];

	// Data Update Query for profile
	$query=" Update tbluserinfo SET FirstName='$FirstName', MiddleName='$MiddleName', LastName='$LastName', Email='$Email', AddressLine1='$AddressLine1', City='$City', StateProvince='$StateProvince', ZipPostal='$ZipPostal', Country='$Country', Phone='$Phone', Fax='$Fax', Mobile='$Mobile' WHERE ProfileID={$_REQUEST['GetProfileID']} ";
	$result=@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}

/// save Summery info
if($_REQUEST["Action"]=="Summery") {
	$Summary=$_REQUEST["Summary"];
	
	// Data Update Query for profile summary
	$query=" UPDATE tbluserinfo SET Summary='$Summary' WHERE ProfileID={$_REQUEST['GetProfileID']}";
	$result=@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}

/// Add Work History
if($_REQUEST["Action"]=="AddWorkHistory"){
	$query=" INSERT INTO tblworkhistory(ProfileID, UserID, Empolyer, Title, ExampleOfLink, Fromm, Current, Too,Description)
								VALUES (".$_REQUEST['ProfileID'].", ".GetUserID($dbc, $_REQUEST['ProfileID']).", '".$_REQUEST['Empolyer']."' , '".$_REQUEST['Title']."' , '".$_REQUEST['ExampleOfLink']."' , '".$_REQUEST['From']."' , '".$_REQUEST['Current']."' , '".$_REQUEST['Too']."' , '".$_REQUEST['Description']."')";  
	$result=@mysqli_query($dbc, $query);
	//echo'Information has been Successfully Added';
}


/// Send email
if($_REQUEST["Action"]=="SendEmail"){

	//$To=$_REQUEST['To'];
	$MultipleEmail=explode(";",$_REQUEST['To']);
	$Subject=$_REQUEST['Subject'];
	$Message=$_REQUEST['Message'];
	
	// Always set content-type when sending HTML email
	
	foreach($MultipleEmail as $To){
		@mail($To,$Subject,$Message);
	}
	
	echo'Email has been successfully sent';

}

/// Forward link
if($_REQUEST["Action"]=="ForwardLink"){

	//$_REQUEST['From'];
	
	$chk=strpos($_REQUEST['To'],",");
	if($chk){
		$MultipleEmail=explode(",",$_REQUEST['To']);
	}else{
		$MultipleEmail=explode(";",$_REQUEST['To']);
	}

	$Subject=$_REQUEST['Subject'];
	/////// if send link request for feedback or recommend //////
	if( ($_REQUEST['RequestFor']=='feedback') OR ($_REQUEST['RequestFor']=='recommend') ) {
		$Message = "
			<html>
			<head>
			<title>Digital Portfolio Link</title>
			</head>
			<body>
			<p><b>
				Profile Link :
				<a href=".$_REQUEST['Link']."&RequestFor=".$_REQUEST['RequestFor'].">
					".$_REQUEST['Link']."&RequestFor=".$_REQUEST['RequestFor']."
				</a>
			</b></p>
			<p>".$_REQUEST['Message']."</p>
			</body>
			</html>
			";
	}else{
		$Message = "
			<html>
			<head>
			<title>Digital Portfolio Link</title>
			</head>
			<body>
			<p><b>Profile Link :<a href=".$_REQUEST['Link'].">".$_REQUEST['Link']."</a></b></p>
			<p>".$_REQUEST['Message']."</p>
			</body>
			</html>
		";
	}
	
	// Always set content-type when sending HTML email
	$From=$_REQUEST['From'];
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	
	// More headers
	$headers .= 'From: <'.$From.'>' . "\r\n";
	foreach($MultipleEmail as $To){
		@mail($To,$Subject,$Message,$headers);
	}
	
	echo'Email has been successfully sent';
}

/// Edit Work History
if($_REQUEST["Action"]=="EditWorkHistory"){
	$query=" UPDATE tblworkhistory SET Empolyer='".$_REQUEST['Empolyer']."' , Title='".$_REQUEST['Title']."', ExampleOfLink='".$_REQUEST['ExampleOfLink']."' , Fromm='".$_REQUEST['From']."' , Current='".$_REQUEST['Current']."' , Too='".$_REQUEST['Too']."' , Description='".$_REQUEST['Description']."'  WHERE WorkHistoryID={$_REQUEST['SubmitWorkHistoryID']}";
	$result=@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}

/// tblworkhistory rows active inactive
if($_REQUEST["Action"]=="ActiveWorkHistory") {
	$query="UPDATE tblworkhistory SET IsActive={$_REQUEST["Value"]} WHERE WorkHistoryID={$_REQUEST['ThisWorkHistoryID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
}

/// Delete Work History
if($_REQUEST["Action"]=="DeleteWorkHistory") {
	$query="DELETE  FROM tblworkhistory WHERE WorkHistoryID={$_REQUEST['SubmitID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Success';
	}	
}

/// Add Training and certificates
if($_REQUEST["Action"]=="AddTraining"){
	$query=" INSERT INTO tbltraining(ProfileID, UserID, Title, ExampleOfLink, Fromm, Current, Too,Description)
							VALUES ('".$_REQUEST['ProfileID']."', ".GetUserID($dbc, $_REQUEST['ProfileID']).", '".$_REQUEST['Title']."' , '".$_REQUEST['ExampleOfLink']."' , '".$_REQUEST['From']."' , '".$_REQUEST['Current']."' , '".$_REQUEST['Too']."' , '".$_REQUEST['Description']."')";  
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
		echo'The information hass been Successfully Added ';
	}
}

/// Edit Training and Cirtificat
if($_REQUEST["Action"]=="EditTraining"){
	$query=" UPDATE tbltraining SET Title='".$_REQUEST['Title']."', ExampleOfLink='".$_REQUEST['ExampleOfLink']."' , Fromm='".$_REQUEST['From']."' , Current='".$_REQUEST['Current']."' , Too='".$_REQUEST['Too']."' , Description='".$_REQUEST['Description']."'  WHERE TrainingID={$_REQUEST['SubmitTrainingID']}";
	$result=@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}

/// Active Training
if($_REQUEST["Action"]=="ActiveTraining") {
	$query="UPDATE tbltraining SET IsActive={$_REQUEST["Value"]} WHERE TrainingID={$_REQUEST['ThisTrainingID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);	
}

/// Delete Training
if($_REQUEST["Action"]=="DeleteTraining") {
	
	$query="DELETE  FROM tbltraining WHERE TrainingID={$_REQUEST['SubmitID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Success';
	}	
}



/// Add Education
if($_REQUEST["Action"]=="AddEducation"){
	$query=" INSERT INTO tbleducation(ProfileID, UserID, Title, Subject, Fromm, Current, Too,Description)
								VALUES ('".$_REQUEST['ProfileID']."', ".GetUserID($dbc, $_REQUEST['ProfileID']).", '".$_REQUEST['Title']."' , '".$_REQUEST['Subject']."' , '".$_REQUEST['From']."' , '".$_REQUEST['Current']."' , '".$_REQUEST['Too']."' , '".$_REQUEST['Description']."')";  
	$result=@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Information has been Successfully Added';
	}
}

/// Edit Education
if($_REQUEST["Action"]=="EditEducation"){
	$query=" UPDATE tbleducation SET Subject='".$_REQUEST['Subject']."' , Title='".$_REQUEST['Title']."', Fromm='".$_REQUEST['From']."' , Current='".$_REQUEST['Current']."' , Too='".$_REQUEST['Too']."' , Description='".$_REQUEST['Description']."'  WHERE EducationID={$_REQUEST['SubmitEducationID']}";
	$result=@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}

/// Active Education
if($_REQUEST["Action"]=="ActiveEducation") {
	$query="UPDATE tbleducation SET IsActive={$_REQUEST["Value"]} WHERE EducationID={$_REQUEST['ThisEducationID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);	
}

/// Active Course
if($_REQUEST["Action"]=="ActiveCourse") {
	$query="UPDATE tblcourse SET IsActive={$_REQUEST["Value"]} WHERE CourseID={$_REQUEST['ThisCourseID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);	
}

/// Delete Education
if($_REQUEST["Action"]=="DeleteEducation") {
	
	$query="DELETE  FROM tbleducation WHERE EducationID={$_REQUEST['SubmitID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
	
		echo'Success';
	
	}	
}

/// Add Course details
if($_REQUEST["Action"]=="AddCourseDetails"){
	
	// All fields of edit Education form
	$CourseName=$_REQUEST["CourseName"];
	$Term=$_REQUEST["Term"];
	$Grade=$_REQUEST["Grade"];
	$Description= strip_tags($_REQUEST["Description"]);
	$EducationID=$_REQUEST["SubmitEducationID"];
	
	$query=" INSERT INTO tblcourse (EducationID, CourseName, Term, Grade, Description ) VALUES ('$EducationID','$CourseName', '$Term' , '$Grade', '$Description' )";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
		echo'The information hass been Successfully Added';
	}

}

/// Edit Course details
if($_REQUEST["Action"]=="EditCourse"){
	
	// All fields of edit Education form
	$CourseName=$_REQUEST["CourseName"];
	$Term=$_REQUEST["Term"];
	$Grade=$_REQUEST["Grade"];
	$Description= strip_tags($_REQUEST["Description"] );
	
	$query=" UPDATE tblcourse SET CourseName='$CourseName', Term='$Term' , Grade='$Grade', Description='$Description' WHERE CourseID={$_REQUEST['SubmitCourseID']}";
	$result=@mysqli_query($dbc, $query);
	echo'The information hass been Successfully Updated';
}


/// Delete Course
if($_REQUEST["Action"]=="DeleteCourse") {
	$query="DELETE  FROM tblcourse WHERE CourseID={$_REQUEST['SubmitID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
	
		echo'Success';
	}	
}


/// Edit Profile Name 
if($_REQUEST["Action"]=="EditProfileName"){

	// Data Update Query for profile Name
	$query=" Update tblprofile SET ProfileName='".$_REQUEST['ProfileNewName']."' WHERE ( UserID={$_REQUEST['UserID']}  AND ProfileID={$_REQUEST['ProfileID']}) LIMIT 1 ";
	@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}

	/***************************
		Copy Profile Process
	****************************/

if($_REQUEST["Action"]=="CopyProfile") {

	// Data retrive from tblprofile
	$query="SELECT * FROM tblprofile WHERE (ProfileID={$_REQUEST['GetProfileID']} AND UserID=".GetUserID($dbc, $_REQUEST['GetProfileID'])." ) LIMIT 1 ";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_num_rows($result)==1 ) {
	
		$row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ;
		
		// Data insert into tblprofile
		$query="INSERT INTO tblprofile(UserID, ProfileName, ProfileSummary, IsActiveShowPhoto, IsActiveShowVideo, IsActiveShowBoths, IsActiveWorkHistory, IsActiveTraining,IsActiveEducation)
								VALUES(".GetUserID($dbc, $_REQUEST['GetProfileID']).", '".$_REQUEST['ProfileNewName']."', '".$_REQUEST['ProfileSummary']."', '".$row['IsActiveShowPhoto']."', '".$row['IsActiveShowVideo']."', '".$row['IsActiveShowBoths']."', '".$row['IsActiveWorkHistory']."', '".$row['IsActiveTraining']."', '".$row['IsActiveEducation']."' )";   
		$result=@mysqli_query($dbc, $query);
		if(@mysqli_affected_rows($dbc)==1) {
			echo'Profile has been successfully copied';
		}
		
		// Inserted row
		$ProfileID=@mysqli_insert_id($dbc);
	}
	
	// Data Retrive Query for user information	
	$query=" SELECT * FROM tbluserinfo WHERE ProfileID={$_REQUEST['GetProfileID']} LIMIT 1 ";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_num_rows($result)==1) {
		$row=@mysqli_fetch_array($result, MYSQLI_ASSOC);
		$query="INSERT INTO tbluserinfo (ProfileID,FirstName,MiddleName,LastName,Email,AddressLine1,City,StateProvince,ZipPostal,Country,Phone,Fax,Mobile,Summary,IsActive,RegisterDate) 
								VALUES('$ProfileID','".$row['FirstName']."','".$row['MiddleName']."','".$row['LastName']."','".$row['Email']."','".$row['AddressLine1']."','".$row['City']."','".$row['StateProvince']."','".$row['ZipPostal']."','".$row['Country']."','".$row['Phone']."','".$row['Fax']."','".$row['Mobile']."','".$row['Summary']."','".$row['IsActive']."','".$row['RegisterDate']."')";
		@mysqli_query($dbc, $query);
	}
	
	//tblphoto
	$query=" SELECT * FROM tblphoto WHERE ProfileID={$_REQUEST['GetProfileID']}";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_num_rows($result)>0) {
		while($row=@mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$query="INSERT INTO tblphoto (ProfileID,Photo,IsActive) 
									VALUES('$ProfileID','".$row['Photo']."','".$row['IsActive']."')";
			@mysqli_query($dbc, $query);
		}
	}
	
	//tblvideo
	$query=" SELECT * FROM tblvideo WHERE ProfileID={$_REQUEST['GetProfileID']}";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_num_rows($result)>0) {
		while($row=@mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$query="INSERT INTO tblvideo (ProfileID,Video,IsActive) 
									VALUES('$ProfileID','".$row['Video']."','".$row['IsActive']."')";
			@mysqli_query($dbc, $query);
		}
	}
	
	
	// Retrive and insert information three tables

	// tblworkhistory 
	$query=" SELECT * FROM tblworkhistory WHERE ( ProfileID={$_REQUEST['GetProfileID']} AND UserID=".GetUserID($dbc, $_REQUEST['GetProfileID'])." ) ORDER BY WorkHistoryID ASC";
	$result=@mysqli_query($dbc, $query);	
	if( @mysqli_num_rows($result)>0 ) {
	
		while ( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC ) ) {
			$query1=" INSERT INTO tblworkhistory(ProfileID, UserID, Empolyer, Title, ExampleOfLink, Fromm, Current, Too,Description, IsActive) 
										VALUES ('$ProfileID', ".GetUserID($dbc, $ProfileID).", '".$row['Empolyer']."' , '".$row['Title']."' , '".$row['ExampleOfLink']."' , '".$row['Fromm']."' , '".$row['Current']."' , '".$row['Too']."' , '".$row['Description']."', '".$row['IsActive']."')";  
			@mysqli_query($dbc, $query1);
			
		}
	}
	

	// tbltraining
	$query=" SELECT * FROM tbltraining WHERE ( ProfileID={$_REQUEST['GetProfileID']} AND ".GetUserID($dbc, $_REQUEST['GetProfileID'])." ) ORDER BY TrainingID ASC";
	$result=@mysqli_query($dbc, $query);
	if( @mysqli_num_rows($result)>0 ) {
	
		while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
			$query1=" INSERT INTO tbltraining(ProfileID, UserID, Title, ExampleOfLink, Fromm, Current, Too,Description, IsActive) 
										VALUES ('$ProfileID', ".GetUserID($dbc, $ProfileID).", '".$row['Title']."' , '".$row['ExampleOfLink']."' , '".$row['Fromm']."' , '".$row['Current']."' , '".$row['Too']."' , '".$row['Description']."', '".$row['IsActive']."')";  
			@mysqli_query($dbc, $query1);
		}
		
	}
	
	
	
	// tbleducation 
	$query=" SELECT * FROM tbleducation WHERE ( ProfileID={$_REQUEST['GetProfileID']} AND UserID=".GetUserID($dbc, $_REQUEST['GetProfileID'])." ) ORDER BY EducationID ASC";
	$result=@mysqli_query($dbc, $query);	
	if( @mysqli_num_rows($result)>0 ) {
	
		while( $row=@mysqli_fetch_array($result, MYSQLI_ASSOC ) ) {
			$query1=" INSERT INTO tbleducation(ProfileID, UserID, Title, Subject, Fromm, Current, Too, Description, IsActive) 
										VALUES ('$ProfileID', ".GetUserID($dbc, $ProfileID).", '".$row['Title']."' , '".$row['Subject']."' , '".$row['Fromm']."' , '".$row['Current']."' , '".$row['Too']."' , '".$row['Description']."', '".$row['IsActive']."')";  
			@mysqli_query($dbc, $query1);
			$NewEducationID=@mysqli_insert_id($dbc);
			
			// Copy Course details
			$queryC=" SELECT * FROM tblcourse WHERE EducationID={$row['EducationID']} ";
			$resultC=@mysqli_query($dbc, $queryC);
			if(@mysqli_num_rows($resultC)>0) {
				while( $rowC=mysqli_fetch_array( $resultC, MYSQLI_ASSOC ) ) {
					$query=" INSERT INTO tblcourse (EducationID, CourseName, Term, Grade, Description ) 
											VALUES ('$NewEducationID','".$rowC['CourseName']."', '".$rowC['Term']."', '".$rowC['Grade']."', '".$rowC['Description']."' )";
					@mysqli_query($dbc, $query);
				}
			}
			
		}
	
	}
	
	///////// Copy custom profile/template 
	// Retrive data for custom profile names
	$queary=" SELECT * FROM tblcustomarea WHERE (ProfileID ={$_REQUEST['GetProfileID']}) ";
	$result=@mysqli_query($dbc, $queary);	
	if( @mysqli_num_rows($result)>0 ) {
	
		while( $rowCustomArea=@mysqli_fetch_array($result, MYSQLI_ASSOC) )  {
		
			$queryCus="INSERT INTO tblcustomarea (ProfileID, Name, Template, IsActive)
									VALUES('$ProfileID', '".$rowCustomArea['Name']."', '".$rowCustomArea['Template']."', '".$rowCustomArea['IsActive']."') ";
			@mysqli_query($dbc, $queryCus);
			
			// Get new CustomareaID
			$CusID=mysqli_insert_id($dbc);

			
			////// Copy template 1
			// Data retrive Query under custom profile work history style/ Template 1
			$query1="SELECT * FROM tblcaworkhistorystyle WHERE ( CustomareaID={$rowCustomArea['CustomareaID']} AND ProfileID={$_REQUEST['GetProfileID']}) ORDER BY WorkHistoryStyleID ASC";
			$result1=@mysqli_query($dbc, $query1);
			if(@mysqli_num_rows($result1)>0) {

				while( $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC) ) {
					$query2=" INSERT INTO tblcaworkhistorystyle(CustomareaID, ProfileID, Title,SubTitle, Form, Too, Description, IsActive ) 
														 VALUES('$CusID', '$ProfileID', '".$row1['Title']."', '".$row1['SubTitle']."', '".$row1['Form']."', '".$row1['Too']."', '".$row1['Description']."', '".$row1['IsActive']."')";
					@mysqli_query($dbc, $query2);
					
				}
			}
			
			////// End copy template 1 /////////
			
			
			
			//////// Copy template 2
			// Data retrive Query under custom profile DocA style/ Template 2
			$query1="SELECT * FROM tblcadocumentvideoa WHERE ( CustomareaID={$rowCustomArea['CustomareaID']} AND ProfileID={$_REQUEST['GetProfileID']}) ORDER BY DocumentVideoAID ASC ";
			$result1=@mysqli_query($dbc, $query1);
			if(@mysqli_num_rows($result1)>0) {

				while( $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC) ) {
				
					$query2=" INSERT INTO tblcadocumentvideoa(CustomareaID, ProfileID, Name, Description, DocType, IsActive )
														VALUES('$CusID', '$ProfileID', '".$row1['Name']."', '".$row1['Description']."', '".$row1['DocType']."', '".$row1['IsActive']."')";
					@mysqli_query($dbc, $query2);
					
				
				}
			}
		
			////// End copy template 2 /////////
			
			
			
			//////// Copy template 3
			// Data retrive Query under custom profile DocB style/ Template 3
			$query1="SELECT * FROM tblcadocumentvideob WHERE ( CustomareaID={$rowCustomArea['CustomareaID']} AND ProfileID={$_REQUEST['GetProfileID']}) ORDER BY DocumentVideoBID ASC ";
			$result1=@mysqli_query($dbc, $query1);
			if(@mysqli_num_rows($result1)>0) {

				while( $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC) ) {
				
					$query2=" INSERT INTO tblcadocumentvideob(CustomareaID, ProfileID, Name, Date, DocType, Description, IsActive ) 
													VALUES('$CusID', '$ProfileID', '".$row1['Name']."', '".$row1['Date']."', '".$row1['DocType']."', '".$row1['Description']."', '".$row1['IsActive']."')";
					@mysqli_query($dbc, $query2);
				}
			}
			
			
			////// End copy template 3 ///////
		
			////// Copy template 4
			// Data retrive Query under custom profile Clasic style/ Template 4
			$query1="SELECT * FROM tblcaclassic WHERE ( CustomareaID={$rowCustomArea['CustomareaID']} AND ProfileID={$_REQUEST['GetProfileID']}) ORDER BY ClassicID ASC";
			$result1=@mysqli_query($dbc, $query1);
			if(@mysqli_num_rows($result1)>0) {

				while( $row1=mysqli_fetch_array($result1, MYSQLI_ASSOC) ) {
				
					$query2=" INSERT INTO tblcaclassic(CustomareaID, ProfileID, Title, Description, Duration, IsActive )
												VALUES('$CusID', '$ProfileID', '".$row1['Title']."', '".$row1['Description']."', '".$row1['Duration']."', '".$row1['IsActive']."')";
					@mysqli_query($dbc, $query2);
				}
			}
			
			////// End copy template 4 ///////
			
		} 
	}
	
} ///////////// The end of copy process /////////////

// New Profile
if($_REQUEST['Action']=="NewProfile") {

	$ProfileName= $_REQUEST['ProfileNewName'];
	$ProfileSummary= $_REQUEST['ProfileSummary'];
	
	$query="INSERT INTO tblprofile (UserID, ProfileName, ProfileSummary) VALUES({$_REQUEST['SubmitID']}, '$ProfileName', '$ProfileSummary' ) ";
	$result=@mysqli_query($dbc, $query);
	
	$GetCreatedProfileID=@mysqli_insert_id($dbc);
	if( @mysqli_affected_rows($dbc)==1 ) {
	
		// Insert new profile id into tbluserinfo
		$query="INSERT INTO tbluserinfo (ProfileID)VALUES('".$GetCreatedProfileID."')";
		$result=@mysqli_query($dbc,$query);
		if(@mysqli_affected_rows($dbc)==1) {
			echo'New profile has been Successfully created';
		} else {
			echo'Profile could not be created properly';
		}
		
	}

}

/////// Administrator area ////////

// Delete registered user
if($_REQUEST["Action"]=="DeleteUser") {
	$query="DELETE  FROM tbluser WHERE UserID={$_REQUEST['SubmitID']} LIMIT 1";
	@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
		
		// Select profile id
		$SelectProfileID="SELECT ProfileID FROM tblprofile WHERE UserID={$_REQUEST['SubmitID']}";
		$ProfileIDResult=@mysqli_query($dbc, $SelectProfileID);
		
		while($ProfileID=@mysqli_fetch_array($ProfileIDResult, MYSQLI_ASSOC) ) {
		
			// Delete profile 
			$DeleteProfile="DELETE FROM tblprofile WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteProfile);
			
			// Delete userinfo
			$DeleteUserInfo="DELETE FROM tbluserinfo WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteUserInfo);
			
			/////// get all uploded photo from tblphoto /////////////
			$QSelectPhoto="SELECT Photo FROM tblphoto WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			$RPhoto=@mysqli_query($dbc,$QSelectPhoto);
			if(@mysqli_num_rows($RPhoto)>0 ) {
			
				while($RowPhoto=@mysqli_fetch_array($RPhoto, MYSQLI_ASSOC) ) {
					// delete photo from uploaded directory
					unlink($GetRootPathPhoto.$RowPhoto['Photo']);
				}
				
				// Delete photo
				$DeletePhoto="DELETE FROM tblphoto WHERE ProfileID='".$ProfileID['ProfileID']."' ";
				@mysqli_query($dbc, $DeletePhoto);
			}
			
			
			
			/////// get all uploded video from tblvideo /////////////
			$QSelectVideo="SELECT Video FROM tblvideo WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			$RVideo=@mysqli_query($dbc,$QSelectVideo);
			if(@mysqli_num_rows($RVideo)>0 ) {
			
				while($RowVideo=@mysqli_fetch_array($RVideo, MYSQLI_ASSOC) ) {
					// delete photo from uploaded directory
					unlink($GetRootPathVideo.$RowVideo['Video']);
				}
				
				// Delete video
				$DeleteVideo="DELETE FROM tblvideo WHERE ProfileID='".$ProfileID['ProfileID']."' ";
				@mysqli_query($dbc, $DeleteVideo);
			}
			
			
			
			// Delete feedback
			$DeleteFeedback="DELETE FROM tblprovidefeedback WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteFeedback);
			
			// Delete recommend
			$DeleteRecommend="DELETE FROM tblrecommend WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteRecommend);
			
			// Delete work history
			$DeleteWorkHistory="DELETE FROM tblworkhistory WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteWorkHistory);
			
			// Delete training and certificate
			$DeleteTraining="DELETE FROM tbltraining WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteTraining);
			
			
			// Select education id
			$SelectEducationID="SELECT EducationID FROM tbleducation WHERE UserID={$_REQUEST['SubmitID']}";
			$EducationIDResult=@mysqli_query($dbc, $SelectEducationID);
			
			// Delete educational background
			$DeleteEducation="DELETE FROM tbleducation WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteEducation);
			
			while($EducationID=@mysqli_fetch_array($EducationIDResult, MYSQLI_ASSOC) ) {
				// Delete course
				$DeleteCourse="DELETE FROM tblcourse WHERE EducationID='".$EducationID['EducationID']."' ";
				@mysqli_query($dbc, $DeleteCourse);
			}
			
			// Delete custom area 
			$DeleteCustomarea="DELETE FROM tblcustomarea WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteCustomarea);
			
			///// Delete all custom profile //////
			// Delete template 1
			$DeleteTemplate1="DELETE FROM tblcaworkhistorystyle WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteTemplate1);
			
			/////// get all uploded document from tblcadocumentvideoa /////////////
			$QSelectDocA="SELECT DocType FROM tblcadocumentvideoa WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			$RDocA=@mysqli_query($dbc,$QSelectDocA);
			if(@mysqli_num_rows($RDocA)>0 ) {
			
				while($RowDocA=@mysqli_fetch_array($RDocA, MYSQLI_ASSOC) ) {
					// delete docA from uploaded directory
					unlink($GetRootPath.$RowDocA['DocType']);
				}
				
				// Delete template 2
				$DeleteTemplate2="DELETE FROM tblcadocumentvideoa WHERE ProfileID='".$ProfileID['ProfileID']."' ";
				@mysqli_query($dbc, $DeleteTemplate2);
			}
			
			/////// get all uploded document from tblcadocumentvideob /////////////
			$QSelectDocB="SELECT DocType FROM tblcadocumentvideob WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			$RDocB=@mysqli_query($dbc,$QSelectDocB);
			if(@mysqli_num_rows($RDocB)>0 ) {
			
				while($RowDocB=@mysqli_fetch_array($RDocB, MYSQLI_ASSOC) ) {
					// delete docB from uploaded directory
					unlink($GetRootPath.$RowDocB['DocType']);
				}
			}
			
			// Delete template 3
			$DeleteTemplate3="DELETE FROM tblcadocumentvideob WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteTemplate3);
			
			// Delete template 4
			$DeleteTemplate4="DELETE FROM tblcaclassic WHERE ProfileID='".$ProfileID['ProfileID']."' ";
			@mysqli_query($dbc, $DeleteTemplate4);
			
		}
		
		echo'Success';
	}
}


// Edit registered user 
if($_REQUEST["Action"]=="EditUser") {

	//check unique email address
	$QueryEmail="SELECT RegisterEmail FROM tbluser WHERE RegisterEmail='".$_REQUEST['RegisterEmail']."' LIMIT 1";
	$ResultEmail=@mysqli_query($dbc, $QueryEmail);
	if( @mysqli_num_rows($ResultEmail)==0) { 
		$query="UPDATE tbluser SET RegisterFirstName='".$_REQUEST['RegisterFirstName']."', RegisterLastName='".$_REQUEST['RegisterLastName']."', RegisterEmail='".$_REQUEST['RegisterEmail']."', Password=SHA1('".$_REQUEST['Password']."') WHERE UserID={$_REQUEST['SubmitID']} LIMIT 1";
		@mysqli_query($dbc, $query);
		
		if(@mysqli_affected_rows($dbc)==1) {
			echo'Success';
		}
	
	} else {
		echo'Duplicate email address';
	}
}

// Edit admin information
if($_REQUEST["Action"]=="EditAdminInfo") {
	$query="UPDATE tbladmin SET AdminName='".$_REQUEST['AdminName']."', AdminEmail='".$_REQUEST['AdminEmail']."', AdminPassword=SHA1('".$_REQUEST['AdminPassword']."') WHERE AdminID={$_SESSION['AdminID']} LIMIT 1";
	@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Success';
	}
}

///// end admin area



//// Delete profile //////////
//// Delete profile //////////

// Delete Profile
if($_REQUEST["Action"]=="DeleteProfile") {
	
	//Delete form tblprofile
	$query="DELETE  FROM tblprofile WHERE ProfileID={$_REQUEST['SubmitID']} LIMIT 1";
	@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
			
		// Delete userinfo
		$DeleteUserInfo="DELETE FROM tbluserinfo WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $DeleteUserInfo);
		
		// Delete photo
		$DeletePhoto="DELETE FROM tblphoto WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $DeletePhoto);
		
		// Delete video
		$DeleteVideo="DELETE FROM tblvideo WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $DeleteVideo);
		
		// Delete feedback
		$DeleteFeedback="DELETE FROM tblprovidefeedback WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $DeleteFeedback);
		
		// Delete recommend
		$DeleteRecommend="DELETE FROM tblrecommend WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $DeleteRecommend);
		
		//Delete form tblworkhistory
		$query1="DELETE FROM tblworkhistory WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $query1);
		
		//Delete form tblptraining
		$query2="DELETE FROM tbltraining WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $query2);
		
		// Select education id
		$SelectEducationID="SELECT EducationID FROM tbleducation WHERE ProfileID={$_REQUEST['SubmitID']}";
		$EducationIDResult=@mysqli_query($dbc, $SelectEducationID);
		
		//Delete form tbleducation
		$query3="DELETE FROM tbleducation WHERE ProfileID={$_REQUEST['SubmitID']} ";
		@mysqli_query($dbc, $query3);
		
		while($EducationID=@mysqli_fetch_array($EducationIDResult, MYSQLI_ASSOC) ) {
			// Delete course
			$DeleteCourse="DELETE FROM tblcourse WHERE EducationID='".$EducationID['EducationID']."' ";
			@mysqli_query($dbc, $DeleteCourse);
		}
		
		///// Delete all custom profile //////
		// Delete custom area 
		$DeleteCustomarea="DELETE FROM tblcustomarea WHERE ProfileID={$_REQUEST['SubmitID']} ";
		@mysqli_query($dbc, $DeleteCustomarea);
			
		// Delete template 1
		$DeleteTemplate1="DELETE FROM tblcaworkhistorystyle WHERE ProfileID={$_REQUEST['SubmitID']} ";
		@mysqli_query($dbc, $DeleteTemplate1);
		
		// Delete template 2
		$DeleteTemplate2="DELETE FROM tblcadocumentvideoa WHERE ProfileID={$_REQUEST['SubmitID']} ";
		@mysqli_query($dbc, $DeleteTemplate2);
		
		// Delete template 3
		$DeleteTemplate3="DELETE FROM tblcadocumentvideob WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $DeleteTemplate3);
		
		// Delete template 4
		$DeleteTemplate4="DELETE FROM tblcaclassic WHERE ProfileID={$_REQUEST['SubmitID']}";
		@mysqli_query($dbc, $DeleteTemplate4);
		
		echo'Success';
	}

}

/// Three tables active inactive query
/// tblworkhistory active inactive
if($_REQUEST["Action"]=="ActiveWorkHistoryTbl") {
	$query="UPDATE tblprofile SET IsActiveWorkHistory={$_REQUEST["Value"]} WHERE (ProfileID={$_REQUEST['GetProfileID']} ) LIMIT 1 ";
	@mysqli_query($dbc, $query);
}

/// tbltraining active inactive
if($_REQUEST["Action"]=="ActiveTrainingTbl") {
	$query="UPDATE tblprofile SET IsActiveTraining={$_REQUEST["Value"]} WHERE (ProfileID={$_REQUEST['GetProfileID']} ) LIMIT 1 ";
	@mysqli_query($dbc, $query);	
}

/// tbleducation active inactive
if($_REQUEST["Action"]=="ActiveEducationTbl") {
	$query="UPDATE tblprofile SET IsActiveEducation={$_REQUEST["Value"]} WHERE (ProfileID={$_REQUEST['GetProfileID']} ) LIMIT 1 ";
	$result=@mysqli_query($dbc, $query);
}

/* Three status of profile Show both, Show image, Show video active inactive process	*/
/// Show both active inactive
if($_REQUEST["Action"]=="ActiveShowBoth") {	
	$query="UPDATE tblprofile SET IsActiveShowBoths={$_REQUEST["Value"]}, IsActiveShowPhoto={$_REQUEST["Value"]}, IsActiveShowVideo={$_REQUEST["Value"]} WHERE (ProfileID={$_REQUEST['GetProfileID']} ) LIMIT 1 ";
	@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Your request has granted';
	}
}


/// Photo active inactive
if($_REQUEST["Action"]=="ActiveShowPhoto") {
	$query="UPDATE tblprofile SET IsActiveShowPhoto={$_REQUEST["Value"]} WHERE (ProfileID={$_REQUEST['GetProfileID']} ) LIMIT 1 ";
	@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Your request has granted';
	}	
	
	// IsActiveShowBoths value change depend on ActiveShowPhoto
	$query="SELECT IsActiveShowVideo FROM tblprofile WHERE ProfileID={$_REQUEST['GetProfileID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	if( $row['IsActiveShowVideo']==$_REQUEST['Value'] ) {
		$query="UPDATE tblprofile SET IsActiveShowBoths={$_REQUEST['Value']} WHERE ProfileID={$_REQUEST['GetProfileID']} LIMIT 1 ";
		@mysqli_query($dbc, $query);
	}
}

/// Video active inactive
if($_REQUEST["Action"]=="ActiveShowVideo") {
	$query="UPDATE tblprofile SET IsActiveShowVideo={$_REQUEST["Value"]} WHERE (ProfileID={$_REQUEST['GetProfileID']} ) LIMIT 1 ";
	@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Your request has granted';
	}	
	
	// IsActiveShowBoths value change depend on ActiveShowVideo
	$query="SELECT IsActiveShowVideo FROM tblprofile WHERE ProfileID={$_REQUEST['GetProfileID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	$row=@mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	if( $row['IsActiveShowVideo']==$_REQUEST['Value'] ) {
		$query="UPDATE tblprofile SET IsActiveShowBoths={$_REQUEST['Value']} WHERE ProfileID={$_REQUEST['GetProfileID']} LIMIT 1 ";
		@mysqli_query($dbc, $query);
	}
}


/////// Area ///////

/// My profile activation ///
/// tblworkhistory, tbltraining, tbleducation active inactive
if($_REQUEST["Action"]=="ActiveMyProfile") {
	$query="UPDATE tblprofile SET IsActiveWorkHistory={$_REQUEST["Value"]},IsActiveTraining={$_REQUEST["Value"]},IsActiveEducation={$_REQUEST["Value"]} WHERE ProfileID={$_REQUEST['GetProfileID']}  LIMIT 1 ";
	@mysqli_query($dbc, $query);
}

/// Photo thumbnail active inactive
if($_REQUEST["Action"]=="ActivePhotoThumbnail") {
	$query="UPDATE tblphoto SET IsActive={$_REQUEST["Value"]} WHERE ProfileID={$_REQUEST['GetProfileID']}";
	@mysqli_query($dbc, $query);
}

/// Video thumbnail active inactive
if($_REQUEST["Action"]=="ActiveVideoThumbnail") {
	$query="UPDATE tblvideo SET IsActive={$_REQUEST["Value"]} WHERE ProfileID={$_REQUEST['GetProfileID']}";
	@mysqli_query($dbc, $query);
}


/// area check box //
if($_REQUEST["Action"]=="ActiveArea") {
	$query="UPDATE tblprofile SET IsActiveWorkHistory={$_REQUEST["Value"]},IsActiveTraining={$_REQUEST["Value"]},IsActiveEducation={$_REQUEST["Value"]} WHERE ProfileID={$_REQUEST['GetProfileID']}  LIMIT 1 ";
	@mysqli_query($dbc, $query);
	
	$query="UPDATE tblvideo SET IsActive={$_REQUEST["Value"]} WHERE ProfileID={$_REQUEST['GetProfileID']}";
	@mysqli_query($dbc, $query);
	
	$query="UPDATE tblphoto SET IsActive={$_REQUEST["Value"]} WHERE ProfileID={$_REQUEST['GetProfileID']}";
	@mysqli_query($dbc, $query);
}



// ************* Custom area start *************///
// Add custom Profile 
if($_REQUEST['Action']=="AddAddCustomArea") {

	$Name= $_REQUEST['Name'];
	$Template= $_REQUEST['Template'];
	$ProfileID=$_REQUEST['ProfileID'];
	$query="INSERT INTO tblcustomarea (ProfileID, Name, Template, IsActive) VALUES('$ProfileID', '$Name', '$Template', 1 ) ";
	$result=@mysqli_query($dbc, $query);
	
	if( @mysqli_affected_rows($dbc)==1 ) {
		echo'New profile template has been created Successfully';
	}
	
}

/// Edit custom template name
if($_REQUEST["Action"]=="EditTemplateName"){

	$Name=$_REQUEST["NewTemplateName"];
	// Data Update Query for edit template name
	$query=" UPDATE tblcustomarea SET Name='$Name' WHERE CustomareaID={$_REQUEST['CustomareaID']} LIMIT 1 ";
	$result=@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}

/// Add Custom profile work history style
if($_REQUEST["Action"]=="AddWHStyle"){
	
	$Description= $_REQUEST['Description'];
	$query=" INSERT INTO tblcaworkhistorystyle(CustomareaID,ProfileID, Title,SubTitle, Form, Too, Description, IsActive ) VALUES('".$_REQUEST['CustomareaID']."','".$_REQUEST['ProfileID']."', '".$_REQUEST['Title']."', '".$_REQUEST['SubTitle']."', '".$_REQUEST['Form']."', '".$_REQUEST['Too']."', '$Description', 1 )";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Information has been Successfully Added';
	}
}

/// Edit Custom profile work history style
if($_REQUEST["Action"]=="EditWHStyle"){
	$query=" UPDATE tblcaworkhistorystyle SET Title='{$_REQUEST['Title']}', SubTitle='{$_REQUEST['SubTitle']}', Form='{$_REQUEST['Form']}', Too='{$_REQUEST['Too']}', Description='{$_REQUEST['Description']}' WHERE WorkHistoryStyleID='{$_REQUEST['WorkHistoryStyleID']}' LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}

/// Delete Custom profile work history style
if($_REQUEST["Action"]=="DeleteWHStyle") {
	
	$query="DELETE  FROM tblcaworkhistorystyle WHERE WorkHistoryStyleID={$_REQUEST['SubmitID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Success';
	}	
}

/// tblcaworkhistorystyle rows active inactive
if($_REQUEST["Action"]=="ActiveWHStyle") {
	$query="UPDATE tblcaworkhistorystyle SET IsActive={$_REQUEST["Value"]} WHERE WorkHistoryStyleID={$_REQUEST['ThisWHStyleID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
}

/// All Templates active inactive
if($_REQUEST["Action"]=="ActivetAllTemplate") {

	$query="UPDATE tblcustomarea SET IsActive={$_REQUEST["Value"]} WHERE ProfileID={$_REQUEST['GetProfileID']}";
	$result=@mysqli_query($dbc, $query);
	if( @mysqli_affected_rows( $dbc )>0 ) {
		echo'Your request has granted';	
	} else {
		echo'Sorry!, Your request is not granted , At first create your custom profile';
	}	
}

/// Dedicated template active inactive
if($_REQUEST["Action"]=="ActiveOneTemplate") {

	$query="UPDATE tblcustomarea SET IsActive={$_REQUEST["Value"]} WHERE CustomareaID={$_REQUEST['GetCustomareaID']} LIMIT 1";
	@mysqli_query($dbc, $query);
	if( @mysqli_affected_rows( $dbc )== 1 ) {
		echo'Your request has granted';	
	}	
}

/// All Template active inactive
if($_REQUEST["Action"]=="ActiveAllTemplate") {
	
	$query="UPDATE tblcustomarea SET IsActive={$_REQUEST["Value"]} WHERE ProfileID={$_REQUEST['GetProfileID']}";
	@mysqli_query($dbc, $query);	
	echo'Your request has granted';	
}

/// Add Custom profile Classic style
if($_REQUEST["Action"]=="AddClassic"){
	
	$query=" INSERT INTO tblcaclassic(CustomareaID,ProfileID, Title, Duration, Description ) VALUES('".$_REQUEST['CustomareaID']."','".$_REQUEST['ProfileID']."', '".$_REQUEST['Title']."' , '".$_REQUEST['Date']."', '".$_REQUEST['Description']."' )";
	@mysqli_query($dbc, $query);
	echo'Information has been Successfully Added';
}


/// Edit Custom profile Classic style
if($_REQUEST["Action"]=="EditClassic"){
	$query=" UPDATE tblcaclassic SET Title='{$_REQUEST['Title']}', Duration='{$_REQUEST['Date']}',  Description='{$_REQUEST['Description']}' WHERE ClassicID='{$_REQUEST['ClassicID']}' LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	echo'Information has been Successfully updated';
}


/// Delete Custom profile Classic style
if($_REQUEST["Action"]=="DeleteClassic") {
	$query="DELETE  FROM tblcaclassic WHERE ClassicID={$_REQUEST['SubmitID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Success';
	}	
}

/// tblcaclassic rows active inactive
if($_REQUEST["Action"]=="ActiveClassic") {
	$query="UPDATE tblcaclassic SET IsActive={$_REQUEST["Value"]} WHERE ClassicID={$_REQUEST['ThisClassicID']} LIMIT 1";
	@mysqli_query($dbc, $query);
}

/// tblcaclassic active inactive
if($_REQUEST["Action"]=="ActiveClassicTbl") {
	$query="UPDATE tblcustomarea SET IsActive={$_REQUEST["Value"]} WHERE CustomareaID={$_REQUEST['GetCustomareaID']} LIMIT 1";
	@mysqli_query($dbc, $query);	
}

/// Add Custom profile document and video A style
if($_REQUEST["Action"]=="AddDocA"){

	$Description= strip_tags( $_REQUEST['Description'] );
	$path = "UploadedDocument/";

	$valid_formats = array("doc","docx","txt","pdf");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	
		$name = $_FILES['filename']['name'];
		$size = $_FILES['filename']['size'];
		
		if(strlen($name)) {
			list($txt, $ext) = explode(".", $name);
			if(in_array($ext,$valid_formats)) {
		   
				$actual_document_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
				$tmp = $_FILES['filename']['tmp_name'];
				if(move_uploaded_file($tmp, $path.$actual_document_name)) {
				
					$query=" INSERT INTO tblcadocumentvideoa (CustomareaID,ProfileID, Name, Description, DocType) VALUES ('".$_REQUEST["CustomareaID"]."','".$_REQUEST["ProfileID"]."', '".$_REQUEST["Name"]."', '$Description', '$actual_document_name' )";
					$result=@mysqli_query($dbc, $query);
					
				} else {
					echo "failed";
				}
				
			} else {
				echo "Invalid file format.."; 
			}
			
		} else {
			echo "Please select Document..!";
		}

	}

} // End main condition

/// Edit Custom profile document and video A style
if($_REQUEST["Action"]=="EditDocA") {

	$Description= strip_tags( $_REQUEST['Description'] );
	$path = "UploadedDocument/";

	$valid_formats = array("doc","docx","txt","pdf");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	
		$name = $_FILES['filename']['name'];
		$size = $_FILES['filename']['size'];
		
		if(strlen($name)) {
			list($txt, $ext) = explode(".", $name);
			if(in_array($ext,$valid_formats)) {
		   
				$actual_document_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
				$tmp = $_FILES['filename']['tmp_name'];
				if(move_uploaded_file($tmp, $path.$actual_document_name)) {
					$query=" UPDATE tblcadocumentvideoa SET Name='".$_REQUEST['Name']."', Description='$Description', DocType='$actual_document_name' WHERE DocumentVideoAID='".$_REQUEST['DocAID']."' LIMIT 1";
					@mysqli_query($dbc, $query);
				
				} else {
					echo "failed";
				}
				
			} else {
				echo "Invalid file format..";   
			}
			
		} else {
			echo "Please select Document..!";
		}	 	
	}

} // End main condition

/// Delete Custom profile Document & Video A style
if($_REQUEST["Action"]=="DeleteDocA") {	
	$query="DELETE  FROM tblcadocumentvideoa WHERE DocumentVideoAID={$_REQUEST['SubmitID']} LIMIT 1";	
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Success';
	}
}

/// Custom profile Document & Video A style active inactive
if($_REQUEST["Action"]=="ActiveDocA") {
	$query="UPDATE tblcadocumentvideoa SET IsActive={$_REQUEST["Value"]} WHERE DocumentVideoAID={$_REQUEST['ThisDocAID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);	
}

/// Add Custom profile document and video B style
if($_REQUEST["Action"]=="AddDocB"){
	$Description= strip_tags( $_REQUEST['Description'] );
	$path = "UploadedDocument/";

	$valid_formats = array("doc","docx", "txt","pdf");
	
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	
		$name = $_FILES['filename']['name'];
		$size = $_FILES['filename']['size'];				   
		if(strlen($name)) {
			list($txt, $ext) = explode(".", $name);
			if(in_array($ext,$valid_formats)) {
		   
				$actual_document_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
				$tmp = $_FILES['filename']['tmp_name'];
				
				if(move_uploaded_file($tmp, $path.$actual_document_name)) {															
					$query=" INSERT INTO tblcadocumentvideob (CustomareaID, ProfileID, Name, Date, DocType, Description) VALUES ('".$_REQUEST["CustomareaID"]."', '".$_REQUEST["ProfileID"]."', '".$_REQUEST["Name"]."', '".$_REQUEST["Date"]."', '$actual_document_name','$Description' )";										
					$result=@mysqli_query($dbc, $query);

					if(@mysqli_affected_rows($dbc)==1) {
					
						echo'The information hass been Successfully Added';
					}																					
				} 
				else
				echo "failed";										   
			}
			else
			echo "Invalid file format..";   
		}
		else
		echo "Please select Document..!";
	   	
		//echo $info;  						
	}

} // End main condition

/// Edit Custom profile document and video B style
if($_REQUEST["Action"]=="EditDocB") {
	$Description= strip_tags( $_REQUEST['Description'] );
	$path = "UploadedDocument/";
	$valid_formats = array("doc","docx","txt","pdf");
	
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	
		$name = $_FILES['filename']['name'];
		$size = $_FILES['filename']['size'];
		if(strlen($name)) {
				list($txt, $ext) = explode(".", $name);
				if(in_array($ext,$valid_formats)) {
			   
						$actual_document_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						$tmp = $_FILES['filename']['tmp_name'];
						if(move_uploaded_file($tmp, $path.$actual_document_name)) {
								
							$query=" UPDATE tblcadocumentvideob SET Name='".$_REQUEST['Name']."', Description='$Description', DocType='$actual_document_name', Date='".$_REQUEST['Date']."' WHERE DocumentVideoBID='".$_REQUEST['DocBID']."' LIMIT 1";
							$result=@mysqli_query($dbc, $query);
								if(@mysqli_affected_rows($dbc)==1) {
									echo'The information hass been Successfully Added';
								}
								
						} else {
							echo "failed"; 
						}
						
				} else {
					echo "Invalid file format.."; 
				}
				
		} else {
			echo "Please select Document..!";
		}
	   
		//echo $info;  	
	}
} // End main condition

/// Delete Custom profile Document & Video B style
if($_REQUEST["Action"]=="DeleteDocB") {
	$query="DELETE  FROM tblcadocumentvideob WHERE DocumentVideoBID={$_REQUEST['SubmitID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
	if(@mysqli_affected_rows($dbc)==1) {
		echo'Success';
	}	
}

/// Custom profile Document & Video Bstyle active inactive
if($_REQUEST["Action"]=="ActiveDocB") {
	$query="UPDATE tblcadocumentvideob SET IsActive={$_REQUEST["Value"]} WHERE DocumentVideoBID={$_REQUEST['ThisDocBID']} LIMIT 1";
	$result=@mysqli_query($dbc, $query);
}

/// Delete Template
if($_REQUEST["Action"]=="DeleteTemplate") {
	$query="DELETE  FROM tblcustomarea WHERE CustomareaID={$_REQUEST['SubmitCustomareaID']} LIMIT 1";
	@mysqli_query($dbc, $query);
	
	if(@mysqli_affected_rows($dbc)==1) {
		// Delete From tblcaworkhistorystyle
		$query1="DELETE  FROM tblcaworkhistorystyle WHERE CustomareaID={$_REQUEST['SubmitCustomareaID']}";
		@mysqli_query($dbc, $query1);
		
		/////// get all uploded document from tblcadocumentvideoa /////////////
		$QSelectDocA="SELECT DocType FROM tblcadocumentvideoa WHERE CustomareaID={$_REQUEST['SubmitCustomareaID']}";
		$RDocA=@mysqli_query($dbc,$QSelectDocA);
		if(@mysqli_num_rows($RDocA)>0 ) {
		
			while($RowDocA=@mysqli_fetch_array($RDocA, MYSQLI_ASSOC) ) {
				// delete docA from uploaded directory
				unlink($GetRootPath.$RowDocA['DocType']);
			}
		}
		
		// Delete From tblcadocumentvideoa
		$query2="DELETE  FROM tblcadocumentvideoa WHERE CustomareaID={$_REQUEST['SubmitCustomareaID']}";
		@mysqli_query($dbc, $query2);
		
		/////// get all uploded document from tblcadocumentvideob /////////////
		$QSelectDocB="SELECT DocType FROM tblcadocumentvideob WHERE CustomareaID={$_REQUEST['SubmitCustomareaID']}";
		$RDocB=@mysqli_query($dbc,$QSelectDocB);
		if(@mysqli_num_rows($RDocB)>0 ) {
		
			while($RowDocB=@mysqli_fetch_array($RDocB, MYSQLI_ASSOC) ) {
				// delete docB from uploaded directory
				unlink($GetRootPath.$RowDocB['DocType']);
			}
		}
		
		// Delete From tblcadocumentvideob
		$query3="DELETE  FROM tblcadocumentvideob WHERE CustomareaID={$_REQUEST['SubmitCustomareaID']}";
		@mysqli_query($dbc, $query3);
		
		// Delete From tblcaclassic
		$query4="DELETE  FROM tblcaclassic WHERE CustomareaID={$_REQUEST['SubmitCustomareaID']}";
		@mysqli_query($dbc, $query4);
		
		echo'Success';
	
	}	
}

//// Change password //////////
if($_REQUEST['Action']=='ChangePassword') {
	$Confirmation="SELECT RegisterEmail, Password FROM tbluser WHERE( RegisterEmail='".$_REQUEST['RegisterEmail']."' AND Password=SHA1('".$_REQUEST['Password']."') ) LIMIT 1 ";
	$ConfirmationResult=@mysqli_query($dbc, $Confirmation);
	if(@mysqli_num_rows($ConfirmationResult)==1) {
		
		$query="UPDATE tbluser SET Password=SHA1('".$_REQUEST['NewPassword']."') WHERE (UserID='".$_REQUEST['SubmitID']."' AND RegisterEmail='".$_REQUEST['RegisterEmail']."' ) LIMIT 1";
		@mysqli_query($dbc, $query);
		if(@mysqli_affected_rows($dbc)==1) {
			echo'Your password has been changed';
		}
		
	} else {
		echo'Your current password dose\'t match those on file, Please try again';
	}
}

//// Delete photo //////////
if($_REQUEST['Action']=='DeletePhoto') {
	$query="DELETE FROM tblphoto WHERE PhotoID='".$_REQUEST['SubmitID']."' LIMIT 1 ";
	@mysqli_query($dbc, $query);
	echo'Success';
}

//// Delete video //////////
if($_REQUEST['Action']=='DeleteVideo') {
	$query="DELETE FROM tblvideo WHERE VideoID='".$_REQUEST['SubmitID']."' LIMIT 1 ";
	@mysqli_query($dbc, $query);
	echo'Success';
}

/// Active thumb nail image
if($_REQUEST["Action"]=="ActiveThumbNailImage") {
	$query="UPDATE tblphoto SET IsActive={$_REQUEST["Value"]} WHERE PhotoID={$_REQUEST['GetID']} LIMIT 1";
	@mysqli_query($dbc, $query);	
}

/// Active thumb nail video
if($_REQUEST["Action"]=="ActiveThumbNailVideo") {
	$query="UPDATE tblvideo SET IsActive={$_REQUEST["Value"]} WHERE VideoID={$_REQUEST['GetID']} LIMIT 1";
	@mysqli_query($dbc, $query);	
}

///////// feed back preview portfolio page ////////////

///// my profile
// insert work history feedback 
if($_REQUEST['Action']=="ProvideFeedBackWorkHistory" ) {
	@mysqli_query($dbc, "INSERT INTO tblprovidefeedback (ProfileID, GuestID, message, date )
	VALUES ('".$_REQUEST['SubmitID']."', '".$_SESSION['GuestID']."', '".$_REQUEST['message']."', NOW() )" );
}
// insert training feedback 
if($_REQUEST['Action']=="ProvideFeedBackTraining" ) {
	@mysqli_query($dbc, "INSERT INTO tblprovidefeedback (ProfileID, GuestID, message , date)
	VALUES ('".$_REQUEST['SubmitID']."', '".$_SESSION['GuestID']."','".$_REQUEST['message']."', NOW() )" );
}
// insert education feedback 
if($_REQUEST['Action']=="ProvideFeedBackEducation" ) {
	@mysqli_query($dbc, "INSERT INTO tblprovidefeedback (ProfileID, GuestID, message, date )
	VALUES ('".$_REQUEST['SubmitID']."', '".$_SESSION['GuestID']."','".$_REQUEST['message']."' , NOW())" );
}


// custom profile 
// template1
if($_REQUEST['Action']=="ProvideFeedBackTemplate1" ) {
	@mysqli_query($dbc, "INSERT INTO tblprovidefeedback (ProfileID, GuestID, message, date )
	VALUES ('".$_REQUEST['SubmitID']."', '".$_SESSION['GuestID']."','".$_REQUEST['message']."' , NOW())" );
}
// template2
if($_REQUEST['Action']=="ProvideFeedBackTemplate2" ) {
	@mysqli_query($dbc, "INSERT INTO tblprovidefeedback (ProfileID, GuestID, message, date )
	VALUES ('".$_REQUEST['SubmitID']."', '".$_SESSION['GuestID']."','".$_REQUEST['message']."' , NOW())" );
}
// template3
if($_REQUEST['Action']=="ProvideFeedBackTemplate3" ) {
	@mysqli_query($dbc, "INSERT INTO tblprovidefeedback (ProfileID, GuestID, message, date )
	VALUES ('".$_REQUEST['SubmitID']."', '".$_SESSION['GuestID']."','".$_REQUEST['message']."' , NOW())" );
}
// template4
if($_REQUEST['Action']=="ProvideFeedBackTemplate4" ) {
	@mysqli_query($dbc, "INSERT INTO tblprovidefeedback (ProfileID, GuestID, message, date )
	VALUES ('".$_REQUEST['SubmitID']."', '".$_SESSION['GuestID']."','".$_REQUEST['message']."' , NOW())" );
}


////////// active review feedback ////////
/// tblworkhistory rows active inactive
if($_REQUEST["Action"]=="ActiveViewRecommendation") {
	$query="UPDATE tblrecommend SET IsActive={$_REQUEST["Value"]} WHERE RecommendID={$_REQUEST['SubmitID']} LIMIT 1";
	@mysqli_query($dbc, $query);
}



//////// recommend ////////

// insert recommend
if($_REQUEST['Action']=="recommend" ) {
	@mysqli_query($dbc, "INSERT INTO tblrecommend (ProfileID, GuestID, message, RecommendDate )
	VALUES ('".$_REQUEST['SubmitID']."','".$_REQUEST['SubmitGuestID']."','".$_REQUEST['message']."' , NOW())" );
}

?>