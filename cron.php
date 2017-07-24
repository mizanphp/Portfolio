<?php
$dbc = @mysql_connect ('localhost', 'root', 'Password');
// Confirm the connection and select the database:
if (!$dbc OR !mysql_select_db ('digitalprofile')) {
  echo '<p>The site is currently experiencing technical difficulties. We apologize for any inconvenience.</p>';
  exit();
} 

// Select action
$query="SELECT Action FROM tblapi";
$result=@mysql_query($query);
if(@mysql_num_rows($result)>0 ) { 
	while( $row=@mysql_fetch_array($result, MYSQL_ASSOC) ) {

		//////// Select work history from tblapi and insert tblhistory ///////
		if($row['Action']=='WorkHistory' ) {
			// select workhistory form tblapi
			$WorkHistory="SELECT ApiID, ProfileID, UserID, Position, CompanyName, ExampleOfLink, Fromm, Current, Too, Description, IsActive FROM tblapi WHERE (Action='WorkHistory' AND IsRead=0) ";
			$WorkHistoryResult=@mysql_query($WorkHistory);
			if(@mysql_num_rows($WorkHistoryResult)>0) {
				while($RowWorkHistory=@mysql_fetch_array($WorkHistoryResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowWorkHistory['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert workhistory into tblworkhistory
					$InsertWorkHistory="INSERT INTO tblworkhistory (ProfileID, UserID, Empolyer, Title, ExampleOfLink, Fromm, Current, Too, Description, IsActive) 
										VALUES('".$RowWorkHistory['ProfileID']."', '".$RowWorkHistory['UserID']."', '".$RowWorkHistory['Position']."', '".$RowWorkHistory['CompanyName']."', '".$RowWorkHistory['ExampleOfLink']."', '".$RowWorkHistory['Fromm']."', '".$RowWorkHistory['Current']."', '".$RowWorkHistory['Too']."', '".$RowWorkHistory['Description']."', '".$RowWorkHistory['IsActive']."')";     
					@mysql_query($InsertWorkHistory);
				}
			}
		}


		// Select training from tblapi and insert tbltraining
		if($row['Action']=='Training') {
			// select training form tblapi
			$Trainini="SELECT ApiID, ProfileID, UserID, Title, ExampleOfLink, Fromm, Current, Too, Description, IsActive FROM tblapi WHERE (Action='Training' AND IsRead=0)";
			$TraininiResult=@mysql_query($Trainini);
			if(@mysql_num_rows($TraininiResult)>0) {
				while($RowTrainini=@mysql_fetch_array($TraininiResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowTrainini['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert trainini into tbltraining
					$InsertTrainini="INSERT INTO tbltraining (ProfileID, UserID, Title, ExampleOfLink, Fromm, Current, Too, Description, IsActive) 
										VALUES('".$RowTrainini['ProfileID']."', '".$RowTrainini['UserID']."', '".$RowTrainini['Title']."', '".$RowTrainini['ExampleOfLink']."', '".$RowTrainini['Fromm']."', '".$RowTrainini['Current']."', '".$RowTrainini['Too']."', '".$RowTrainini['Description']."', '".$RowTrainini['IsActive']."')";     
					@mysql_query($InsertTrainini);
				}
			}
		}
		
		
		// Select education from tblapi and insert tbleducation
		if($row['Action']=='Education') {
			// select education form tblapi
			$Education="SELECT ApiID, ProfileID, UserID, Title, Subject, Fromm, Current, Too, Description, IsActive FROM tblapi WHERE (Action='Education' AND IsRead=0)";
			$EducationResult=@mysql_query($Education);
			if(@mysql_num_rows($EducationResult)>0) {
				while($RowEducation=@mysql_fetch_array($EducationResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowEducation['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert education into tbleducation
					$InsertEducation="INSERT INTO tbleducation (ProfileID, UserID, Title, Subject, Fromm, Current, Too, Description, IsActive) 
										VALUES('".$RowEducation['ProfileID']."', '".$RowEducation['UserID']."', '".$RowEducation['Title']."', '".$RowEducation['Subject']."', '".$RowEducation['Fromm']."', '".$RowEducation['Current']."', '".$RowEducation['Too']."', '".$RowEducation['Description']."', '".$RowEducation['IsActive']."')";     
					@mysql_query($InsertEducation);
				}
			}
		}
		
		
		// Select course from tblapi and insert tblcourse
		if($row['Action']=='Course') {
		
			// select course form tblapi
			$Course="SELECT ApiID, EducationID , CourseName, Term, Grade, Description, IsActive FROM tblapi WHERE (Action='Course' AND IsRead=0)";
			$CourseResult=@mysql_query($Course);
			if(@mysql_num_rows($CourseResult)>0) {
			
				while($RowCourse=@mysql_fetch_array($CourseResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowCourse['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert course into tblcourse
					$InsertCourse="INSERT INTO tblcourse (EducationID , CourseName, Term, Grade, Description, IsActive) 
										VALUES('".$RowCourse['EducationID']."', '".$RowCourse['CourseName']."', '".$RowCourse['Term']."', '".$RowCourse['Grade']."', '".$RowCourse['Description']."', '".$RowCourse['IsActive']."')";     
					@mysql_query($InsertCourse);
				}
			}
		}
		
		// Select customarea from tblapi and insert tblcustomarea
		if($row['Action']=='CustomArea') {
		
			// select customarea form tblapi
			$CustomArea="SELECT ApiID, ProfileID , NameOfTemplate, NoOfTemplate, IsActive FROM tblapi WHERE (Action='CustomArea' AND IsRead=0)";
			$CustomAreaResult=@mysql_query($CustomArea);
			if(@mysql_num_rows($CustomAreaResult)>0) {
			
				while($RowCustomArea=@mysql_fetch_array($CustomAreaResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowCustomArea['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert course into tblcustomarea
					$InsertCustomArea="INSERT INTO tblcustomarea (ProfileID , Name, Template, IsActive) 
										VALUES('".$RowCustomArea['ProfileID']."', '".$RowCustomArea['NameOfTemplate']."', '".$RowCustomArea['NoOfTemplate']."','".$RowCustomArea['IsActive']."')";     
					@mysql_query($InsertCustomArea);
				}
			}
		}
		
		
		// Select template1 from tblapi and insert tblcaworkhistorystyle
		if($row['Action']=='Template1') {
		
			// select template1 form tblapi
			$template1="SELECT ApiID, ProfileID , CustomAreaID, Title, Subtitle, Fromm, Too, Description, IsActive FROM tblapi WHERE (Action='Template1' AND IsRead=0)";
			$Template1Result=@mysql_query($template1);
			if(@mysql_num_rows($Template1Result)>0) {
			
				while($RowTemplate1=@mysql_fetch_array($Template1Result, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowTemplate1['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert template1 into tblcaworkhistorystyle
					$InsertTemplate1="INSERT INTO tblcaworkhistorystyle (ProfileID , CustomAreaID, Title, SubTitle, Form, Too, Description, IsActive) 
										VALUES('".$RowTemplate1['ProfileID']."', '".$RowTemplate1['CustomAreaID']."', '".$RowTemplate1['Title']."','".$RowTemplate1['Subtitle']."' ,'".$RowTemplate1['Fromm']."','".$RowTemplate1['Too']."' ,'".$RowTemplate1['Description']."' ,'".$RowTemplate1['IsActive']."')";     
					@mysql_query($InsertTemplate1);
				}
			}
		}
		
		// Select template2 from tblapi and insert tblcadocumentvideoa
		if($row['Action']=='Template2') {
		
			// select template2 form tblapi
			$template2="SELECT ApiID, ProfileID , CustomAreaID, DocName, Doctype, Description,IsActive FROM tblapi WHERE (Action='Template2' AND IsRead=0)";
			$Template2Result=@mysql_query($template2);
			if(@mysql_num_rows($Template2Result)>0) {
			
				while($RowTemplate2=@mysql_fetch_array($Template2Result, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowTemplate2['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert template2 into tblcadocumentvideoa
					$InsertTemplate2="INSERT INTO tblcadocumentvideoa (ProfileID , CustomAreaID, Name, DocType, Description,IsActive) 
										VALUES('".$RowTemplate2['ProfileID']."', '".$RowTemplate2['CustomAreaID']."', '".$RowTemplate2['DocName']."','".$RowTemplate2['Doctype']."','".$RowTemplate2['Description']."' ,'".$RowTemplate2['IsActive']."')";     
					@mysql_query($InsertTemplate2);
				}
			}
		}
		
		// Select template3 from tblapi and insert tblcadocumentvideob
		if($row['Action']=='Template3') {
		
			// select template3 form tblapi
			$template3="SELECT ApiID, ProfileID , CustomAreaID, DocName, Doctype, Fromm, Description, IsActive FROM tblapi WHERE (Action='Template3' AND IsRead=0)";
			$Template3Result=@mysql_query($template3);
			if(@mysql_num_rows($Template3Result)>0) {
				while($RowTemplate3=@mysql_fetch_array($Template3Result, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowTemplate3['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert template3 into tblcadocumentvideob
					$InsertTemplate3="INSERT INTO tblcadocumentvideob (ProfileID , CustomAreaID, Name, Date, DocType, Description,IsActive) 
										VALUES('".$RowTemplate3['ProfileID']."', '".$RowTemplate3['CustomAreaID']."', '".$RowTemplate3['DocName']."', '".$RowTemplate3['Fromm']."','".$RowTemplate3['Doctype']."','".$RowTemplate3['Description']."' ,'".$RowTemplate3['IsActive']."')";     
					@mysql_query($InsertTemplate3);
				}
			}
		}
		
		
		// Select template4 from tblapi and insert tblcaclassic
		if($row['Action']=='Template4') {
		
			// select template4 form tblapi
			$template4="SELECT ApiID, ProfileID , CustomAreaID, Title, Fromm, Description, IsActive FROM tblapi WHERE (Action='Template4' AND IsRead=0)";
			$Template4Result=@mysql_query($template4);
			if(@mysql_num_rows($Template4Result)>0) {
				while($RowTemplate4=@mysql_fetch_array($Template4Result, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowTemplate4['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert template4 into tblcaclassic
					$InsertTemplate4="INSERT INTO tblcaclassic (ProfileID , CustomAreaID, Title, Duration, Description,IsActive) 
										VALUES('".$RowTemplate4['ProfileID']."', '".$RowTemplate4['CustomAreaID']."', '".$RowTemplate4['Title']."', '".$RowTemplate4['Fromm']."','".$RowTemplate4['Description']."' ,'".$RowTemplate4['IsActive']."')";     
					@mysql_query($InsertTemplate4);
				}
			}
		}
		
		
		// Select photo from tblapi and insert tblphoto
		if($row['Action']=='Photo') {
		
			// select photo form tblapi
			$photo="SELECT ApiID, ProfileID , Photo, IsActive FROM tblapi WHERE (Action='Photo' AND IsRead=0)";
			$PhotoResult=@mysql_query($photo);
			if(@mysql_num_rows($PhotoResult)>0) {
				while($RowPhoto=@mysql_fetch_array($PhotoResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowPhoto['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert Photo into tblphoto
					$InsertPhoto="INSERT INTO tblphoto (ProfileID ,Photo, IsActive) 
										VALUES('".$RowPhoto['ProfileID']."', '".$RowPhoto['Photo']."', '".$RowPhoto['IsActive']."')";     
					@mysql_query($InsertPhoto);
				}
			}
		}
		
		
		// Select video from tblapi and insert tblvideo
		if($row['Action']=='Video') {
		
			// select video form tblapi
			$Video="SELECT ApiID, ProfileID , Video, IsActive FROM tblapi WHERE (Action='Video' AND IsRead=0)";
			$VideoResult=@mysql_query($Video);
			if(@mysql_num_rows($VideoResult)>0) {
				while($RowVideo=@mysql_fetch_array($VideoResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowVideo['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert Video into tblvideo
					$InsertVideo="INSERT INTO tblvideo (ProfileID ,Video, IsActive) 
										VALUES('".$RowVideo['ProfileID']."', '".$RowVideo['Video']."', '".$RowVideo['IsActive']."')";     
					@mysql_query($InsertVideo);
				}
			}
		}
		
		// Select user register info from tblapi and insert tbluser
		if($row['Action']=='User') {
		
			// select user form tblapi
			$User="SELECT ApiID, RegisterFirstName, RegisterLastName, RegisterEmail, Password, VarifyCode, RegisterDate, IsActive FROM tblapi WHERE (Action='User' AND IsRead=0)";
			$UserResult=@mysql_query($User);
			if(@mysql_num_rows($UserResult)>0) {
				while($RowUser=@mysql_fetch_array($UserResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowUser['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert User into tbluser
					$InsertUser="INSERT INTO tbluser (RegisterFirstName, RegisterLastName, RegisterEmail, Password, VarifyCode, RegisterDate, IsActive) 
										VALUES('".$RowUser['RegisterFirstName']."', '".$RowUser['RegisterLastName']."', '".$RowUser['RegisterEmail']."','".$RowUser['Password']."','".$RowUser['VarifyCode']."' ,'".$RowUser['RegisterDate']."' ,'".$RowUser['IsActive']."')";     
					@mysql_query($InsertUser);
				}
			}
		}
		
		// Select user info from tblapi and insert tbluserinfo
		if($row['Action']=='UserInfo') {
		
			// select userinfo form tblapi
			$UserInfo="SELECT ApiID,ProfileID, FirstName, MiddleName, LastName, Email, AddressLine1, City, StateProvince, ZipPostal, Country, Phone, Fax, Mobile, Summary, IsActive FROM tblapi WHERE (Action='UserInfo' AND IsRead=0)";
			$UserInfoResult=@mysql_query($UserInfo);
			if(@mysql_num_rows($UserInfoResult)>0) {
				while($RowUserInfo=@mysql_fetch_array($UserInfoResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowUserInfo['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert User into tbluser
					$InsertUserInfo="INSERT INTO tbluserinfo (ProfileID, FirstName, MiddleName, LastName, Email, AddressLine1, City, StateProvince, ZipPostal, Country, Phone, Fax, Mobile, Summary, IsActive) 
										VALUES('".$RowUserInfo['ProfileID']."','".$RowUserInfo['FirstName']."', '".$RowUserInfo['MiddleName']."', '".$RowUserInfo['LastName']."', '".$RowUserInfo['Email']."','".$RowUserInfo['AddressLine1']."','".$RowUserInfo['City']."' ,'".$RowUserInfo['StateProvince']."' ,'".$RowUserInfo['ZipPostal']."','".$RowUserInfo['Country']."','".$RowUserInfo['Phone']."','".$RowUserInfo['Fax']."','".$RowUserInfo['Mobile']."','".$RowUserInfo['Summary']."','".$RowUserInfo['IsActive']."')";     
					@mysql_query($InsertUserInfo);
				}
			}
		}
		
		
		// Select user info from tblapi and insert tbluserinfo
		if($row['Action']=='UserInfo') {
		
			// select userinfo form tblapi
			$UserInfo="SELECT ApiID,ProfileID, FirstName, MiddleName, LastName, Email, AddressLine1, City, StateProvince, ZipPostal, Country, Phone, Fax, Mobile, Summary, IsActive FROM tblapi WHERE (Action='UserInfo' AND IsRead=0)";
			$UserInfoResult=@mysql_query($UserInfo);
			if(@mysql_num_rows($UserInfoResult)>0) {
				while($RowUserInfo=@mysql_fetch_array($UserInfoResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowUserInfo['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert Userinfo into tbluserinfo
					$InsertUserInfo="INSERT INTO tbluserinfo (ProfileID, FirstName, MiddleName, LastName, Email, AddressLine1, City, StateProvince, ZipPostal, Country, Phone, Fax, Mobile, Summary, IsActive) 
										VALUES('".$RowUserInfo['ProfileID']."','".$RowUserInfo['FirstName']."', '".$RowUserInfo['MiddleName']."', '".$RowUserInfo['LastName']."', '".$RowUserInfo['Email']."','".$RowUserInfo['AddressLine1']."','".$RowUserInfo['City']."' ,'".$RowUserInfo['StateProvince']."' ,'".$RowUserInfo['ZipPostal']."','".$RowUserInfo['Country']."','".$RowUserInfo['Phone']."','".$RowUserInfo['Fax']."','".$RowUserInfo['Mobile']."','".$RowUserInfo['Summary']."','".$RowUserInfo['IsActive']."')";     
					@mysql_query($InsertUserInfo);
				}
			}
		}
		
		
		// Select feedback from tblapi and insert tblprovidefeedback
		if($row['Action']=='Feedback') {
		
			// select feedback form tblapi
			$feedback="SELECT ApiID, ProfileID , GuestID, MessageRecommendAndFeedback, DateRecommendAndFeedback, IsActive FROM tblapi WHERE (Action='Feedback' AND IsRead=0)";
			$FeedbackResult=@mysql_query($feedback);
			if(@mysql_num_rows($FeedbackResult)>0) {
			
				while($RowFeedback=@mysql_fetch_array($FeedbackResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowFeedback['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert feedback into tblprovidefeedback
					$InsertFeedback="INSERT INTO tblprovidefeedback (ProfileID, GuestID, message, Date, IsActive) 
										VALUES('".$RowFeedback['ProfileID']."','".$RowFeedback['GuestID']."', '".$RowFeedback['MessageRecommendAndFeedback']."', '".$RowFeedback['DateRecommendAndFeedback']."', '".$RowFeedback['IsActive']."')";     
					@mysql_query($InsertFeedback);
				}
			}
		}
		
		
		// Select recommend from tblapi and insert tblrecommend
		if($row['Action']=='Recommend') {
		
			// select recommend form tblapi
			$recommend="SELECT ApiID, ProfileID , GuestID, MessageRecommendAndFeedback, DateRecommendAndFeedback, IsActive FROM tblapi WHERE (Action='Recommend' AND IsRead=0)";
			$RecommendResult=@mysql_query($recommend);
			if(@mysql_num_rows($RecommendResult)>0) {
				//echo mysql_num_rows($RecommendResult);
				while($RowRecommend=@mysql_fetch_array($RecommendResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowRecommend['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert recommendinto tblrecommend
					$InsertRecommend="INSERT INTO tblrecommend (ProfileID, GuestID, message, RecommendDate, IsActive) 
										VALUES('".$RowRecommend['ProfileID']."','".$RowRecommend['GuestID']."', '".$RowRecommend['MessageRecommendAndFeedback']."', '".$RowRecommend['DateRecommendAndFeedback']."', '".$RowRecommend['IsActive']."')";     
					@mysql_query($InsertRecommend);
				}
			}
		}
		
		// Select admin info from tblapi and insert tbladmin
		if($row['Action']=='Admin') {
		
			// select admininfo form tblapi
			$admin="SELECT ApiID, AdminName , AdminEmail, AdminPassword FROM tblapi WHERE (Action='Admin' AND IsRead=0)";
			$AdminResult=@mysql_query($admin);
			if(@mysql_num_rows($AdminResult)>0) {
				
				while($RowAdmin=@mysql_fetch_array($AdminResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowAdmin['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert admin info into tbladmin
					$InsertAdmin="INSERT INTO tbladmin (AdminName , AdminEmail, AdminPassword) 
										VALUES('".$RowAdmin['AdminName']."','".$RowAdmin['AdminEmail']."', '".$RowAdmin['AdminPassword']."')";     
					@mysql_query($InsertAdmin);
				}
			}
		}
		
		
		// Select profile info from tblapi and insert tblprofile
		if($row['Action']=='Profile') {
	
			// select profile info form tblapi
			$profile="SELECT ApiID, UserID, ProfileName, ProfileSummary, IsActiveShowPhoto, IsActiveShowVideo, IsActiveShowBoth, IsActiveWorkHistory, IsActiveTraining, IsActiveEducation FROM tblapi WHERE (Action='Profile' AND IsRead=0)";
			$ProfileResult=@mysql_query($profile);
			if(@mysql_num_rows($ProfileResult)>0) {
				
				while($RowProfile=@mysql_fetch_array($ProfileResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowProfile['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert profile info into tblprofile
					$InsertProfile="INSERT INTO tblprofile (UserID, ProfileName, ProfileSummary, IsActiveShowPhoto, IsActiveShowVideo, IsActiveShowBoths, IsActiveWorkHistory, IsActiveTraining, IsActiveEducation) 
										VALUES('".$RowProfile['UserID']."','".$RowProfile['ProfileName']."', '".$RowProfile['ProfileSummary']."', '".$RowProfile['IsActiveShowPhoto']."', '".$RowProfile['IsActiveShowVideo']."', '".$RowProfile['IsActiveShowBoth']."', '".$RowProfile['IsActiveWorkHistory']."', '".$RowProfile['IsActiveTraining']."', '".$RowProfile['IsActiveEducation']."')";     
					@mysql_query($InsertProfile);
				}
			}
		}
		
		// Select Guest info from tblapi and insert tblguestinfo
		if($row['Action']=='Guest') {
	
			// select guest info form tblapi
			$guest="SELECT ApiID,ProfileID, GuestName, GuestEmail, GuestPhone, GuestMessage, GuestInDate, IsActive FROM tblapi WHERE (Action='Guest' AND IsRead=0)";
			$GuestResult=@mysql_query($guest);
			if(@mysql_num_rows($GuestResult)>0) {
				
				while($RowGuest=@mysql_fetch_array($GuestResult, MYSQL_ASSOC) ) {
					// insert value 1 into IsRead
					$InsertOne="UPDATE tblapi SET IsRead=1 WHERE ApiID=".$RowGuest['ApiID']." ";
					@mysql_query($InsertOne);
					
					// insert guest info into tblguestinfo
					$InsertGuest="INSERT INTO tblguestinfo (ProfileIDID, GuestName, GuestEmail, GuestPhone, GuestMessage, Date, IsActive) 
										VALUES('".$RowGuest['ProfileID']."', '".$RowGuest['GuestName']."', '".$RowGuest['GuestEmail']."', '".$RowGuest['GuestPhone']."', '".$RowGuest['GuestMessage']."', '".$RowGuest['GuestInDate']."', '".$RowGuest['IsActive']."')";     
					@mysql_query($InsertGuest);
				}
			}
		}

		
		
		
	} // the end of while 
	
} // No action 

?>
