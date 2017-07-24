$(function(){
	//  Dialog For Edit Personal Information.			
	$('#dialog').dialog({
		autoOpen: false,
		height: 560,
		width: 430,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
			var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
				if(pattern.test($('#PersonalInfoEmailAddress').val())){
					$.post("./Update.php?Action=PersonalInfo",$('#PersonalInfoForm').serialize(),function(data){
						window.location.reload();
						//alert(data);
						
					});	

					$(this).dialog("close"); 
				} else {
					alert('Invalid email address');
				}
			} 
		}
	});
	
	//  Dialog For Edit Summery			
	$('#dialogSummery').dialog({
		autoOpen: false,
		width:565,
		height:400,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				$.post("./Update.php?Action=Summery",$('#SummeryForm').serialize(),function(data){
					//alert(data);
					window.location.reload();
					
				});	
			
				$(this).dialog("close"); 
			} 
		}
	});
	
	
	// Dialog send email		
	$('#DialogSendEmail').dialog({
		autoOpen: false,
		height: 450,
		width: 650,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Send": function() {
			
				//var pattern =/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
				//var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var pattern = /^[A-Z0-9\._%-]+@[A-Z0-9\.-]+\.[A-Z]{2,4}(?:(?:[,;][A-Z0-9\._%-]+@[A-Z0-9\.-]+))?$/i	
				
				if( $('#MailEmailAddress').val()=='' ) {
					alert("Email field can't be blank !");
					$('#MailEmailAddress').focus();
					return false;
					
				} else if ( $('#MailEmailSubject').val()=='') {
					alert("Subject field can't be blank !");
					$('#MailEmailSubject').focus();
					return false;
					
				} else if ( $('#EditorSendEmail').val()=='') {
					alert("Message field can't be blank !");
					return false;
					
				}else if(pattern.test($('#MailEmailAddress').val())){
					$.post("./Update.php?Action=SendEmail",$('#SendEmailForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
					});	
				
					$(this).dialog("close");
				
				} else {
					alert("Invalid email address");
				} 
			} 
		}
	});
	
	
	// Dialog Add Work History			
	$('#DialogAddWorkHistory').dialog({
		autoOpen: false,
		height: 560,
		width: 720,
		buttons: {
			"Cancel": function() {		
				$(this).dialog("close"); 
			},

			"Save": function() { 
				if($('#AddWorkHistoryEmpolyer').val()=="" ) {
					alert("Position field can't be blank !");
					$('#AddWorkHistoryEmpolyer').focus();
					return false;
				
				}else if($('#AddWorkHistoryCompanyName').val()=="" ) {
					alert("Company name field can't be blank !");
					$('#AddWorkHistoryCompanyName').focus();
					return false;
					
				}else if($('#AddWorkHistoryWebPageLink').val()=="" ) {
					alert("Web Page Link field can't be blank !");
					$('#AddWorkHistoryWebPageLink').focus();
					return false;
					
				}else if($('#EditorAddWorkHistory').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
				}else if($('#DatePickerFromAddWorkHistory').val()=="" ) {
					alert("From field can't be blank !");
					return false;
					
				}else if(!$('#AddWorkHistoryCurrent').is(':checked')) {
					if($('#DatePickerFromAddWorkHistory').val()>=$('#DatePickerToAddWorkHistory').val() ) {
						$('#DatePickerToAddWorkHistory').val('');
						$('#DatePickerToAddWorkHistory').focus('');
						
						//alert('Invalid date entry:\r\n Arival Date is later than Departure Date \r\nPlease Fill Departure Date again.');
						alert('Your departure date in work history cannot be before the arrival date');
						return false;
					} else {
						$.post("./Update.php?Action=AddWorkHistory",$('#AddWorkHistoryForm').serialize(),function(data){
						alert(data);
						window.location.reload();
						});	
					
						$(this).dialog("close"); 
					}
					
				}else{ 
					$.post("./Update.php?Action=AddWorkHistory",$('#AddWorkHistoryForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
					});	
				
					$(this).dialog("close"); 
				}
				
			} 
		}
	});
	
	
	// Dialog Edit Work History			
	$('#DialogEditWorkHistory').dialog({
		autoOpen: false,
		height: 560,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");

			}, 
			"Save": function() {
				if($('#EditWorkHistoryEmpolyer').val()=="" ) {
					alert("Empolyer field can't be blank !");
					$('#EditWorkHistoryEmpolyer').focus();
					return false;
				
				}else if($('#EditWorkHistoryCompanyName').val()=="" ) {
					alert("Company name field can't be blank !");
					$('#EditWorkHistoryCompanyName').focus();
					return false;
					
				}else if($('#EditWorkHistoryWebPageLink').val()=="" ) {
					alert("Web Page Address field can't be blank !");
					$('#EditWorkHistoryWebPageLink').focus();
					return false;
					
				}else if($('#EditorEditWorkHistory').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
				}else if($('#DatePickerFromEditWorkHistory').val()=="" ) {
					alert("From field can't be blank !");
					return false;
				
				}else if(!$('#EditWorkHistoryCurrent').is(':checked')) {
				
					if($('#DatePickerFromEditWorkHistory').val()>=$('#DatePickerToEditWorkHistory').val() ) {
						$('#DatePickerToEditWorkHistory').val('');
					
						//alert('Invalid date entry:\r\n Arival Date is later than Departure Date \r\nPlease Fill Departure Date again.');
						alert('Your departure date in work history cannot be before the arrival date');
						return false;
					} else {
					
						$.post("./Update.php?Action=EditWorkHistory",$('#EditWorkHistoryForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						});	
						
						$(this).dialog("close");
					
					}
					
				} else {
					$.post("./Update.php?Action=EditWorkHistory",$('#EditWorkHistoryForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
					});	
					
					$(this).dialog("close"); 
				}
			} 
		}
	});
	

	// Dialog Add Training and Certificets			
	$('#DialogAddTraining').dialog({
		autoOpen: false,
		height: 540,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				if($('#AddTrainingTitle').val()=="" ) {
					alert("Title field can't be blank !");
					$('#AddTrainingTitle').focus();
					return false;
		
				}else if($('#AddTrainingCompanyLink').val()=="" ) {
					alert("Company link field can't be blank !");
					$('#AddTrainingCompanyLink').focus();
					return false;
					
				}else if($('#EditorAddTraining').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
				}else if($('#DatePickerFromAddTraining').val()=="" ) {
					alert("From field can't be blank !");
					return false;	
				
				}else if(!$('#AddTrainingCurrent').is(':checked')) {
				
					if($('#DatePickerFromAddTraining').val()>=$('#DatePickerToAddTraining').val() ) {
						$('#DatePickerToAddTraining').val('');
						$('#DatePickerToAddTraining').focus();
						
						//alert('Invalid date entry:\r\n Arival Date is later than Departure Date \r\nPlease Fill Departure Date again.');
						alert('Your departure date in training cannot be before the arrival date');
						return false;
					} else {
					
						$.post("./Update.php?Action=AddTraining",$('#AddTrainingForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						});	
					
						$(this).dialog("close"); 
					
					}
					
				} else {
					$.post("./Update.php?Action=AddTraining",$('#AddTrainingForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	
	// Dialog Edit Training	and Certificets	
	$('#DialogEditTraining').dialog({
		autoOpen: false,
		height: 540,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#EditTrainingTitle').val()=="" ) {
					alert("Title field can't be blank !");
					$('#EditTrainingTitle').focus();
					return false;
		
				}else if($('#EditTrainingCompanyLink').val()=="" ) {
					alert("Company link field can't be blank !");
					$('#EditTrainingCompanyLink').focus();
					return false;
					
				}else if($('#EditorEditTraining').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
				}else if($('#DatePickerFromEditTraining').val()=="" ) {
					alert("From field can't be blank !");
					return false;
				
				}else if(!$('#EditTrainingCurrent').is(':checked')) {
				
					if($('#DatePickerFromEditTraining').val()>=$('#DatePickerToEditTraining').val() ) {
						$('#DatePickerToEditTraining').val('');
						$('#DatePickerToEditTraining').focus();
						
						//alert('Invalid date entry:\r\n Arival Date is later than Departure Date \r\nPlease Fill Departure Date again.');
						alert('Your departure date in training cannot be before the arrival date');
						return false;
						
					} else {
					
						$.post("./Update.php?Action=EditTraining",$('#EditTrainingForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
						});	
					
						$(this).dialog("close"); 
					
					}
					
				} else {
					$.post("./Update.php?Action=EditTraining",$('#EditTrainingForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	
	// Dialog Add Educational Background			
	$('#DialogAddEducation').dialog({
		autoOpen: false,
		height: 550,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#AddEducationTitle').val()=="" ) {
					alert("Title field can't be blank !");
					$('#AddEducationTitle').focus();
					return false;
		
				}else if($('#AddEducationSubject').val()=="" ) {
					alert("Subject field can't be blank !");
					$('#AddEducationSubject').focus();
					return false;
					
				}else if($('#EditorAddEducation').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
				}else if($('#DatePickerFromAddEducation').val()=="" ) {
					alert("From field can't be blank !");
					return false;
				
				}else if(!$('#AddEducationCurrent').is(':checked')) {
				
					if($('#DatePickerFromAddEducation').val()>=$('#DatePickerToAddEducation').val() ) {
						$('#DatePickerToAddEducation').val('');
						
						//alert('Invalid date entry:\r\n Arival Date is later than Departure Date \r\nPlease Fill Departure Date again.');
						alert('Your departure date in education cannot be before the arrival date');
						return false;
						
					} else {
						$.post("./Update.php?Action=AddEducation",$('#AddEducationForm').serialize(),function(data){
							//alert(data);
							window.location.reload();
							
						});	
				
						$(this).dialog("close"); 
					
					}
					
				} else {
					$.post("./Update.php?Action=AddEducation",$('#AddEducationForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	
	// Dialog Edit Educational Background
	$('#DialogEditEducation').dialog({
		autoOpen: false,
		height: 550,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				$.post("./Update.php?Action=EditEducation",$('#EditEducationForm').serialize(),function(data){
					//alert(data);
					window.location.reload();
					
				});	
			
				$(this).dialog("close"); 
			} 
		}
	});
	
	
	
	// Dialog Edit Course details
	$('#DialogEditCourse').dialog({
		autoOpen: false,
		height: 490,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				if($('#EditCourseCourseName').val()=="" ) {
					alert("Course name field can't be blank !");
					$('#EditCourseCourseName').focus();
					return false;
		
				}else if($('#EditCourseCourseTerm').val()=="" ) {
					alert("Term field can't be blank !");
					$('#EditCourseCourseTerm').focus();
					return false;
					
				}else if($('#EditCourseCourseGrade').val()=="" ) {
					alert("Grade field can't be blank !");
					$('#EditCourseCourseGrade').focus();
					return false;
				
				}else if($('#EditorEditCourse').val()=="" ) {
					alert("Description field can't be blank !");
					$('#EditorEditCourse').focus();
					return false;
					
				} else {
					$.post("./Update.php?Action=EditCourse",$('#EditCourseForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
					});	
					
					$(this).dialog("close"); 
				}
			} 
		}
	});

	// Dialog Add Course Details
	$('#DialogAddCourseDetails').dialog({
		autoOpen: false,
		height: 490,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				if($('#AddCourseCourseName').val()=="" ) {
					alert("Course name field can't be blank !");
					$('#AddCourseCourseName').focus();
					return false;
		
				}else if($('#AddCourseCourseTerm').val()=="" ) {
					alert("Term field can't be blank !");
					$('#AddCourseCourseTerm').focus();
					return false;
					
				}else if($('#AddCourseCourseGrade').val()=="" ) {
					alert("Grade field can't be blank !");
					$('#AddCourseCourseGrade').focus();
					return false;
				
				}else if($('#EditorAddCourse').val()=="" ) {
					alert("Description field can't be blank !");
					$('#EditorAddCourse').focus();
					return false;
					
				} else {
					$.post("./Update.php?Action=AddCourseDetails",$('#AddCourseDetailsForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	

	// Dialog Copy Profile		
	$('#DialogCopyProfile').dialog({
		autoOpen: false,
		height: 450,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
			
				if( $('#CopyProfileNewName').val()=='' ) {
					alert("Profile new name can not be empty !");
					$('#CopyProfileNewName').focus();
					return false;
					
				} else if ( $('#EditorCopyProfile').val()=='') {
					alert("Profile description can not be empty !");
					return false;
					
				} else {
					$.post("./Update.php?Action=CopyProfile",$('#CopyProfileForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	
	//  Dialog For Edit Profile Name 		
	$('#dialogEditProfileName').dialog({
		autoOpen: false,
		height:185,
		width:400,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				$.post("./Update.php?Action=EditProfileName",$('#EditProfileNameForm').serialize(),function(data){
					//alert(data);
					window.location.reload();
					
				});	
			
				$(this).dialog("close"); 
			} 
		}
	});

	
	// Dialog New Profile		
	$('#DialogNewProfile').dialog({
		autoOpen: false,
		height: 450,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
			if($('#ProfileNewName').val()==''){
					alert('Name Field can\'t be blank');
					$('#ProfileNewName').focus();
				}else{
				
					$.post("./Update.php?Action=NewProfile",$('#NewProfileForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	
	
	// Dialog Add Custom area
	$('#DialogAddCustomArea').dialog({
		autoOpen: false,
		height: 670,
		width: 965,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#Name').val()==''){
					alert('Name Field can\'t be blank');
				}else{
					$.post("./Update.php?Action=AddAddCustomArea",$('#AddCustomAreaForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
					$(this).dialog("close"); 
				}
			
			} 
		}
	});
	
	
	
	
	
	//  Dialog For Edit Custom template name
	$('#DialogEditTemplateName').dialog({
		autoOpen: false,
		height:185,
		width:400,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				$.post("./Update.php?Action=EditTemplateName",$('#EditTemplateNameForm').serialize(),function(data){
					//alert(data);
					window.location.reload();
					
				});	
			
				$(this).dialog("close"); 
			} 
		}
	});
	
		
	
	// Dialog Add Custom Profile Work History style		
	$('#DialogAddWHStyle').dialog({
		autoOpen: false,
		height: 530,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				if($('#AddWorkHistoryStyleTitle').val()=="" ) {
					alert("Title field can't be blank !");
					$('#AddWorkHistoryStyleTitle').focus();
					return false;
		
				}else if($('#AddWorkHistoryStyleSubTitle').val()=="" ) {
					alert("Sub title field can't be blank !");
					$('#AddWorkHistoryStyleSubTitle').focus();
					return false;
					
				}else if($('#DatePickerFromAddTemplate1').val()=="" ) {
					alert("From field can't be blank !");
					$('#DatePickerFromAddTemplate1').focus();
					return false;
				
				}else if($('#EditorAddWHStyle').val()=="" ) {
					alert("Description field can't be blank !");
					$('#EditorAddWHStyle').focus();
					return false;
					
				}else if($('#DatePickerFromAddTemplate1').val()>=$('#DatePickerToAddTemplate1').val() ) {
					$('#DatePickerToAddTemplate1').val('');
					$('#DatePickerToAddTemplate1').focus();
					
					//alert('Invalid date entry:\r\n Arival Date is later than Departure Date \r\nPlease Fill Departure Date again.');
					alert('Your departure date in custom profile cannot be before the arrival date');
					return false;
				} else {
					$.post("./Update.php?Action=AddWHStyle",$('#AddWHStyleForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	
	
	// Dialog Edit Custom Profile Work History style		
	$('#DialogEditWHStyle').dialog({
		autoOpen: false,
		height: 530,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				if($('#EditWorkHistoryStyleTitle').val()=="" ) {
					alert("Title field can't be blank !");
					$('#EditWorkHistoryStyleTitle').focus();
					return false;
		
				}else if($('#EditWorkHistoryStyleSubTitle').val()=="" ) {
					alert("Sub title field can't be blank !");
					$('#EditWorkHistoryStyleSubTitle').focus();
					return false;
					
				}else if($('#DatePickerFromEditTemplate1').val()=="" ) {
					alert("From field can't be blank !");
					$('#DatePickerFromEditTemplate1').focus();
					return false;
				
				}else if($('#EditorEditWHStyle').val()=="" ) {
					alert("Description field can't be blank !");
					$('#EditorEditWHStyle').focus();
					return false;
					
				}else if($('#DatePickerFromEditTemplate1').val()>=$('#DatePickerToEditTemplate1').val() ) {
					$('#DatePickerToEditTemplate1').val('');
					$('#DatePickerToEditTemplate1').focus();
					
					//alert('Invalid date entry:\r\n Arival Date is later than Departure Date \r\nPlease Fill Departure Date again.');
					alert('Your departure date in custom profile cannot be before the arrival date');
					return false;
				} else {
					$.post("./Update.php?Action=EditWHStyle",$('#EditWHStyleForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});

	// Dialog Add Custom Profile Classic style		
	$('#DialogAddClassic').dialog({
		autoOpen: false,
		height: 500,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				if($('#AddClassicTitle').val()=="" ) {
					alert("Title field can't be blank !");
					$('#AddClassicTitle').focus();
					return false;
					
				}else if($('#DatePickerDateAddTemplate4').val()=="" ) {
					alert("Date field can't be blank !");
					$('#DatePickerDateAddTemplate4').focus();
					return false;
					
				}else if($('#EditorAddClassic').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
                } else {
					$.post("./Update.php?Action=AddClassic",$('#AddClassicForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	
	
	// Dialog Edit Custom Profile Work History style		
	$('#DialogEditClassic').dialog({
		autoOpen: false,
		height: 500,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#EditClassicTitle').val()=="" ) {
					alert("Title field can't be blank !");
					$('#EditClassicTitle').focus();
					return false;
					
				}else if($('#DatePickerDateEditTemplate4').val()=="" ) {
					alert("Date field can't be blank !");
					$('#DatePickerDateEditTemplate4').focus();
					return false;
					
				}else if($('#EditorEditClassic').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
                } else {
					$.post("./Update.php?Action=EditClassic",$('#EditClassicForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	

	// Dialog Add Custom Profile Document & Video A style
	$('#DialogAddDocA').dialog({
		autoOpen: false,
		height: 500,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#AddDocAName').val()=="" ) {
					alert("Name field can't be blank !");
					$('#AddDocAName').focus();
					return false;
					
				}else if($('#AddDocAFileName').val()=="" ) {
					alert("Choose file");
					$('#AddDocAFileName').focus();
					return false;
				
				}else if($('#EditorAddDocA').val()=="" ) {
					alert("Description field can't be blank !");
					$('#EditorAddDocA').focus();
					return false;
					
                } else {
					$("#AddDocAForm").ajaxForm({
					   success:showResponseAddDocA
					}).submit();
					
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	   
	function showResponseAddDocA(resp) {
		if(resp=='Invalid file format..') {
			alert(resp);
			exit();
		}
		window.location.reload();
	}
	
	
	
	// Dialog Edit Custom Profile Document & Video A style
	$('#DialogEditDocA').dialog({
		autoOpen: false,
		height: 500,
		width: 720,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
                if($('#EditDocAName').val()=="" ) {
					alert("Name field can't be blank !");
					$('#EditDocAName').focus();
					return false;
					
				}else if($('#EditDocAFileName').val()=="" ) {
					alert("Choose file");
					$('#EditDocAFileName').focus();
					return false;
				
				}else if($('#EditorEditDocA').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
                } else {
					$("#EditDocAForm").ajaxForm({
					   success:showResponseEditDocA
					}).submit();
					
					$(this).dialog("close");
				}					
				
				
			} 
		}
	});

	function showResponseEditDocA(resp) {
		if(resp=='Invalid file format..') {
			alert(resp);
			exit();
		}
		window.location.reload();
	}

	// Dialog Add Custom Profile Document & Video B style
	$('#DialogAddDocB').dialog({
		autoOpen: false,
		height: 510,
		width: 730,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#AddDocBName').val()=="" ) {
					alert("Name field can't be blank !");
					$('#AddDocBName').focus();
					return false;
					
				}else if($('#DatePickerDateAddTemplate3').val()=="" ) {
					alert("Date field can't be blank !");
					$('#DatePickerDateAddTemplate3').focus();
					return false;
					
				}else if($('#AddDocBFileName').val()=="" ) {
					alert("Choose file");
					$('#AddDocBFileName').focus();
					return false;
				
				}else if($('#EditorAddDocB').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
                } else {
                
					$("#AddDocBForm").ajaxForm({
						success:showResponseAddDocB
					}).submit();
					
					$(this).dialog("close"); 
				}
				
				
			} 
		}
	});
	
	function showResponseAddDocB(resp) {
		if(resp=='Invalid file format..') {
			alert(resp);
			exit();
		}
		window.location.reload();
	}
	
	// Dialog Edit Custom Profile Document & Video B style
	$('#DialogEditDocB').dialog({
		autoOpen: false,
		height: 510,
		width: 730,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
                if($('#EditDocBName').val()=="" ) {
					alert("Name field can't be blank !");
					$('#EditDocBName').focus();
					return false;
					
				}else if($('#DatePickerDateEditTemplate3').val()=="" ) {
					alert("Date field can't be blank !");
					$('#DatePickerDateEditTemplate3').focus();
					return false;
					
				}else if($('#EditDocBFileName').val()=="" ) {
					alert("Choose file");
					$('#EditDocBFileName').focus();
					return false;
				
				}else if($('#EditorEditDocB').val()=="" ) {
					alert("Description field can't be blank !");
					return false;
					
                } else {
					$("#EditDocBForm").ajaxForm({
					  success:showResponseEditDocB
					}).submit();
					
					$(this).dialog("close"); 
					
				}
				
				
			} 
		}
	});
	
	function showResponseEditDocB(resp) {
		if(resp=='Invalid file format..') {
			alert(resp);
			exit();
		}
		window.location.reload();
	}
	
	// View course details		
	$('#DialogViewCoureDetails').dialog({
		autoOpen: false,
		height:500,
		width:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");

			}
		}
	});
	
	// View Document & video A style custom profile
	$('#DialogViewDocADesc').dialog({
		autoOpen: false,
		height:500,
		width:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");

			}
		}
	});
	
	// View Document & video B style custom profile
	$('#DialogViewDocBDesc').dialog({
		autoOpen: false,
		height:500,
		width:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");

			}
		}
	});
	
	// Get Link
	$('#DialogGetLink').dialog({
		autoOpen: false,
		height:200,
		width:650,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");

			}
		}
	});
	
	// Forword Link
	$('#DialogForwordLink').dialog({
		autoOpen: false,
		height:595,
		width:750,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");
			},
			"Send": function() { 
			//var pattern =/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
			//var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			var pattern = /^[A-Z0-9\._%-]+@[A-Z0-9\.-]+\.[A-Z]{2,4}(?:(?:[,;][A-Z0-9\._%-]+@[A-Z0-9\.-]+))?$/i	
				
				if( $('#ForwardLinkLink').val()=='' ) {
					alert("Link field can't be blank !");
					$('#ForwardLinkLink').focus();
					return false;
					
				} else if ( $('#ForwardLinkTo').val()=='') {
					alert("Email address field can't be blank !");
					$('#ForwardLinkTo').focus();
					return false;
					
				} else if ( $('#ForwardLinkSubject').val()=='') {
					alert("Subject field can't be blank !");
					$('#ForwardLinkSubject').focus();
					return false;
					
				} else if ( $('#EditorForwardLink').val()=='') {
					alert("Message field can't be blank !");
					return false;
					
				}else if(pattern.test($('#ForwardLinkTo').val())) {
				
					$.post("./Update.php?Action=ForwardLink",$('#DialogForwordLinkForm').serialize(),function(data){
						alert(data);
						//window.location.reload();
					});	
			
					$(this).dialog("close"); 
					
				} else {
					alert("Invalid email address");
				}
				
			}
		}
	});
	
	// Show history
	$('#DialogShowHistory').dialog({
		autoOpen: false,
		height:550,
		width:950,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");
			}
		}
	});
	
	// Show history message details 
	$('#DialogViewGuestMessageDetails').dialog({
		autoOpen: false,
		height:500,
		width:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");
			}
		}
	});
	
	
	// Change password
	$('#DialogChangePassword').dialog({
		autoOpen: false,
		width:560,
		height:320,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				
				if($('#ChangePasswordEmailAddress').val()==''){
					alert('Email can not be empty');
					$('#ChangePasswordEmailAddress').focus();
					return false;
					
				}else if ($('#ChangePasswordPassword').val()==''){
					alert('Current password can not be empty');
					$('#ChangePasswordPassword').focus();
					return false;
					
				}else if ($('#ChangePasswordNewPassword').val()==''){
					alert('New password can not be empty');
					$('#ChangePasswordNewPassword').focus();
					return false;
					
				}else if ($('#ChangePasswordConfirmPassword').val()==''){
					alert('Confirm password can not be empty');
					$('#ChangePasswordConfirmPassword').focus();
					return false;
					
				}else if ($('#ChangePasswordNewPassword').val()!=$('#ChangePasswordConfirmPassword').val()){
					alert('New password did\'t match with confirm password');
					return false;
					
				}else if(pattern.test($('#ChangePasswordEmailAddress').val())){
				
					$.post("./Update.php?Action=ChangePassword",$('#ChangePasswordForm').serialize(),function(data){
						alert(data);
						//window.location.reload();
					});	
				
					$(this).dialog("close");
					
				} else {
					alert('Invalid email address');
					$('#ChangePasswordEmailAddress').focus();
					return false;
				}
			} 
		}
	
	}); 
	
	// Edit register ueser
	$('#DialogEditUser').dialog({
		autoOpen: false,
		height:350,
		width:650,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");
			},
			
			"Save": function() { 
			////****** Edit registered user  information form validation *******////
				//var pattern =/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
				var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

				if($('#EditRegisterFirstName').val()==''){
					alert('First name can not be empty');
					$('#EditRegisterFirstName').focus();
					return false;
					
				}else if ($('#EditRegisterLastName').val()==''){
					alert('Last name can not be empty');
					$('#EditRegisterLastName').focus();
					return false;
					
				}else if ($('#EditRegisterEmail').val()==''){
					alert('Email Address can not be empty');
					$('#EditRegisterEmail').focus();
					return false;
					
				}else if ($('#EditPassword').val()==''){
					alert('Password can not be empty');
					$('#EditPassword').focus();
					return false;
					
				}else if( pattern.test($('#EditRegisterEmail').val()) ) {
					$.post("../Update.php?Action=EditUser",$('#EditUserForm').serialize(),function(data){
						if(data=='Duplicate email address'){
							alert(data);
							return false;
						} else {
							window.location.reload();
							$(this).dialog("close");
						}
						
					});	
				
					 
					
				} else {
					alert('Invalid email address');
					$('#EditRegisterEmail').focus();
					return false;
				}
				
			}
		}
	});
	
	
	
	
	
	// Edit admin information
	$('#DialogEditAdminInfo').dialog({
		autoOpen: false,
		height:350,
		width:650,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close");
			},
			
			"Save": function() { 
			////****** Edit registered user  information form validation *******////
				//var pattern =/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
				//var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var pattern = /^[A-Z0-9\._%-]+@[A-Z0-9\.-]+\.[A-Z]{2,4}(?:(?:[,;][A-Z0-9\._%-]+@[A-Z0-9\.-]+))?$/i

				if($('#AdminName').val()==''){
					alert('Admin name can not be empty');
					$('#AdminName').focus();
					return false;
					
				}else if ($('#AdminEmail').val()==''){
					alert('Email address can not be empty');
					$('#AdminEmail').focus();
					return false;
					
				}else if ($('#AdminPassword').val()==''){
					alert('Password can not be empty');
					$('#AdminPassword').focus();
					return false;
						
				}else if( pattern.test($('#AdminEmail').val()) ) {
					
					$.post("../Update.php?Action=EditAdminInfo",$('#EditAdminInfoForm').serialize(),function(data){
						window.location.reload();
						$(this).dialog("close");
					});	
					
				} else {
					alert('Invalid email address');
					$('#AdminEmail').focus();
					return false;
				}
				
			}
		}
	});
	
	
		
	

	//Edit Profile
	$('#PersonalInfoID').click(function(){
		//alert('asdf');
		$('#dialog').dialog('open');
		return false;
	});
	
	// Edit Summary
	$('#SummeryID').click(function(){
		//alert('asdf');
		$('#dialogSummery').dialog('open');
		return false;
	});
	
	// Add work History
	$('#AddWorkHistoryId').click(function(){
		$('#DialogAddWorkHistory').dialog('open');

		return false;
	});
	
	/*
	// Send email
	$('#SendEmail').click(function(){
		$('#DialogSendEmail').dialog('open');
		return false;
	});
	*/
	
	// Add Training and Cirtificates
	$('#AddTrainingId').click(function(){
		$('#DialogAddTraining').dialog('open');
		return false;
	});

	// Add Educational Background
	$('#AddEducationId').click(function(){
		$('#DialogAddEducation').dialog('open');
		return false;
	});
	
	
	// Edit Profile Name
	$('#EditProfileNameID').click(function(){
		//alert('asdf');
		$('#dialogEditProfileName').dialog('open');
		return false;
	});
	
	// Add Custom area
	$('#AddCustomArea').click(function(){
		$('#DialogAddCustomArea').dialog('open');
		return false;
	});
	
	//Edit Profile
	$('#ChangePassword').click(function(){
		//alert('asdf');
		$('#DialogChangePassword').dialog('open');
		return false;
	});

});

//////// document viewer //////////
$(function() {
	var currentDocument, currentWidth = 740,
			basePath = document.URL + 'UploadedDocument/',
			$sidebar = $('#sidebar'),

			//initialize the plugin
			myDocViewer = $('#document-preview').documentViewer({
				path:'documentViewer/'
			});
			
			//alert(basePath);

	//initialize the  file extension icons (in the sidebar)
	$('.document-list').find('div').each(function(i, link) {
		var $link = $(link),
				href = $link.attr('data-path'),
				ext = /(?:\.([^.]+))?$/.exec(href)[1];

		//since the text and code files need relative paths, we do not want to append the base path
		if(!$link.hasClass('text-code'))
			$link.attr('data-path', basePath + href);

		//populate the file type icon
		$link.find('.ext').html(ext);
		
		//alert(href);
	});
	
	
	//handle document clicks in the sidebar
	$('.document-list').find('div').on('click', function(e) {
		var $document = $(this);
		/*
		//mark this document as active/highlighted
		$sidebar.find('.active').removeClass('active');
		$document.parent().addClass('active');
		*/
		//load the document
		currentDocument = $document.attr('data-path');
		myDocViewer.load(currentDocument, {width:currentWidth});
		e.preventDefault();
	});
	

	//ie 8 refuses to obey css 100% height, not worth investigating for a demo
	$sidebar.height($(window).height());

	//initialize the scrollbar in the sidebar
	$sidebar.tinyscrollbar();
	$(window).resize(function() {
		$sidebar.height($(this).height());
		$sidebar.tinyscrollbar_update();

	});

	//initialze the range input
	$("#size").rangeinput({
		step:100,
		change:function(e, value){
			currentWidth = value;

			if(currentDocument)
				myDocViewer.load(currentDocument, {width:currentWidth});
		}
	});
});

///// the end of document viewer ///////
	
// New Profile
function NewProfile(id){
	//alert(id);
	$('#DialogNewProfile').dialog('open');
	$('#DialogNewProfileContent').load('./NewProfile.php?SubmitID='+id);
	return false;
}	
	
// Edit work history
function EditWork_History(id){
	//alert('adsf');
	$('#DialogEditWorkHistory').dialog('open');
	$('#DialogEditWorkHistoryContent').load('./EditWorkHistory.php?WorkHistoryID='+id);
	
	return false;
}


// Edit Training and Cirtificates
function EditTraining(id){
	//alert('adsf');
	$('#DialogEditTraining').dialog('open');
	$('#DialogEditTrainingContent').load('./EditTraining.php?TrainingID='+id);
	
	return false;
}


// Edit Educational Background
function EditEducation(id){
	//alert('adsf');
	$('#DialogEditEducation').dialog('open');
	$('#DialogEditEducationContent').load('./EditEducation.php?EducationID='+id);
	
	return false;
}

// Copy Profile
function CopyProfile(CPID){
	//alert(CPID);
	
	$('#DialogCopyProfile').dialog('open');
	$('#DialogCopyProfileContent').load('./CopyProfile.php?GetProfileID='+CPID);
	
	return false;
}



// Edit custom profile work history style.
function EditWHStyle(id){
	//alert(id);
	$('#DialogEditWHStyle').dialog('open');
	$('#DialogEditWHStyleContent').load('./EditWHStyle.php?WorkHistoryStyleID='+id);
	
	return false;
}


// Edit custom profile Classic style.
function EditClassic(id){
	//alert(id);
	$('#DialogEditClassic').dialog('open');
	$('#DialogEditClassicContent').load('./EditClassic.php?ClassicID='+id);
	
	return false;
}

// Edit custom profile Document and Video A style
function EditDocA(id){
	//alert(id);
	$('#DialogEditDocA').dialog('open');
	$('#DialogEditDocAContent').load('./EditDocA.php?DocAID='+id);
	
	return false;
}


// Edit custom profile Document and Video B style
function EditDocB(id){
	//alert(id);
	$('#DialogEditDocB').dialog('open');
	$('#DialogEditDocBContent').load('./EditDocB.php?DocBID='+id);
	
	return false;
}


// Edit Custom template name
function EditTemplateName(id) {

	//alert(id);
	$('#DialogEditTemplateName').dialog('open');
	
	$('#DialogEditTemplateNameContent').load('./EditTemplateName.php?TemplateID='+id);
	return false;
}

// Add Custom template work History style
function AddWHStyle(CUID,PID) {
	//alert(PID);
	$('#DialogAddWHStyle').dialog('open');
	
	$('#DialogAddWHStyleContent').load('./AddWHStyle.php?CustomareaID='+CUID+'&ProfileID='+PID);
	
	return false;
	

}


// Add Custom template Classic style
function AddClassic(CUID,PID) {
	//alert(id);
	$('#DialogAddClassic').dialog('open');
	
	$('#DialogAddClassicContent').load('./AddClassic.php?CustomareaID='+CUID+'&ProfileID='+PID);
	
	return false;
	

}


// Add Custom Profile Document & Video A style
function AddDocA(CUID,PID) {
	//alert(id);
	$('#DialogAddDocA').dialog('open');
	$('#DialogAddDocAContent').load('./AddDocA.php?CustomareaID='+CUID+'&ProfileID='+PID);
	
	return false;

}	


// Add Custom Profile Document & Video B style
function AddDocB(CUID,PID) {
	//alert(id);
	$('#DialogAddDocB').dialog('open');
	$('#DialogAddDocBContent').load('./AddDocB.php?CustomareaID='+CUID+'&ProfileID='+PID);
	
	return false;

}
	


// View Course details
function ViewCourDetails(id){
	//alert(id);
	$('#DialogViewCoureDetails').dialog('open');
	$('#DialogViewCoureDetailsContent').load('./ViewCourseDetails.php?CourseID='+id);

	return false;
}

// View document & video A style custom profile
function ViewDocADesc(id){
	//alert(id);
	$('#DialogViewDocADesc').dialog('open');
	$('#DialogViewDocADescContent').load('./ViewDocADetails.php?SubmitID='+id);

	return false;
}

// View document & video B style custom profile
function ViewDocBDesc(id){
	//alert(id);
	$('#DialogViewDocBDesc').dialog('open');
	//$('#DialogViewDocBDescContent').show();
	$('#DialogViewDocBDescContent').load('./ViewDocBDetails.php?SubmitID='+id);

	return false;
}

// Get link
function GetLink(){
	//alert(id);
	$('#DialogGetLink').dialog('open');
	$('#DialogGetLinkContent').show();

	return false;
}	

// Forword link
function ForwordLink(id,preview,email){
	//alert(email);
	$('#DialogForwordLink').dialog('open');
	$('#DialogForwordLinkContent').load('./ForwardLink.php?Preview='+preview+'&Email='+email+'&SubmitID='+id);
	return false;
}

// Show history
function ShowHistory(id){
	//alert(id);
	$('#DialogShowHistory').dialog('open');
	$('#DialogShowHistoryContent').load('./ShowHistory.php?SubmitID='+id);
	return false;
}


// Show history message details
function ViewGuestMessageDetails(id){
	//alert(id);
	$('#DialogViewGuestMessageDetails').dialog('open');
	$('#ViewGuestMessageDetailsContent').load('./ViewHistoryMessageDetails.php?SubmitID='+id);
	return false;
}

// Send email
function SendEmail(){
	//alert('ads');
	$('#DialogSendEmail').dialog('open');
	return false;
}


//////// provide feedback for preview portfolio page //////////////
//////// provide feedback for preview portfolio page //////////////
///// provide feedback My profile
$(function() {

	//  Dialog feedback work history 		
	$('#DialogProvideFeedBackWorkHistory').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#EditorFeedbackWorkhistory').val()=='') {
					alert('Feedback can\'t be blank !');
				} else {
					$.post("./Update.php?Action=ProvideFeedBackWorkHistory",$('#ProvideFeedBackWorkHistoryForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	//  Dialog feedback training		
	$('#DialogProvideFeedBackTraining').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				if($('#EditorFeedbackTraining').val()=='') {
					alert('Feedback can\'t be blank !');
				} else {
					$.post("./Update.php?Action=ProvideFeedBackTraining",$('#ProvideFeedBackTrainingForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				
				}
			} 
		}
	});
	
	
	//  Dialog feedback education
	$('#DialogProvideFeedBackEducation').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() { 
				if($('#EditorFeedbackEducation').val()=='') {
					alert('Feedback can\'t be blank !');
				} else {
					$.post("./Update.php?Action=ProvideFeedBackEducation",$('#ProvideFeedBackEducationForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});

	


});


//////// provide feedback  preview portfolio page //////////
//////// provide feedback  preview portfolio page //////////


// provide feedback work history
function ProvideFeedBackWorkHistory(id){
	//alert(id);
	$('#DialogProvideFeedBackWorkHistory').dialog('open');
	$('#ProvideFeedBackWorkHistoryContent').load('feedback/ProvideFeedbackWorkHistory.php?SubmitID='+id);
	return false;
}


// provide feedback training
function ProvideFeedBackTraining(id){
	//alert(id);
	$('#DialogProvideFeedBackTraining').dialog('open');
	$('#ProvideFeedBackTrainingContent').load('feedback/ProvideFeedbackTraining.php?SubmitID='+id);
	return false;
}


// provide feedback education
function ProvideFeedBackEducation(id){
	//alert(id);
	$('#DialogProvideFeedBackEducation').dialog('open');
	$('#ProvideFeedBackEducationContent').load('feedback/ProvideFeedbackEducation.php?SubmitID='+id);
	return false;
}
////////// provide feedback custom profile ////////
///// provide feedback template1
$(function() {
	//  Dialog feedback template1	
	$('#DialogProvideFeedBackTemplate1').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#EditorFeedbackTemplate1').val()=='') {
					alert('Feedback can\'t be blank !');
				} else {
					$.post("./Update.php?Action=ProvideFeedBackTemplate1",$('#ProvideFeedBackTemplate1Form').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	//  Dialog feedback template2		
	$('#DialogProvideFeedBackTemplate2').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#EditorFeedbackTemplate2').val()=='') {
					alert('Feedback can\'t be blank !');
				} else {
					$.post("./Update.php?Action=ProvideFeedBackTemplate2",$('#ProvideFeedBackTemplate2Form').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	//  Dialog feedback template3	
	$('#DialogProvideFeedBackTemplate3').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#EditorFeedbackTemplate3').val()=='') {
					alert('Feedback can\'t be blank !');
				} else {
					$.post("./Update.php?Action=ProvideFeedBackTemplate3",$('#ProvideFeedBackTemplate3Form').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	//  Dialog feedback template 4	
	$('#DialogProvideFeedBackTemplate4').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}, 
			"Save": function() {
				if($('#EditorFeedbackTemplate4').val()=='') {
					alert('Feedback can\'t be blank !');
				} else {
					$.post("./Update.php?Action=ProvideFeedBackTemplate4",$('#ProvideFeedBackTemplate4Form').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
});

// provide feedback template1
function ProvideFeedBackTemplate1(id){
	//alert(id);
	$('#DialogProvideFeedBackTemplate1').dialog('open');
	$('#ProvideFeedBackTemplate1Content').load('feedback/ProvideFeedbackTemplate1.php?SubmitID='+id);
	return false;
}
// provide feedback template2
function ProvideFeedBackTemplate2(id){
	//alert(id);
	$('#DialogProvideFeedBackTemplate2').dialog('open');
	$('#ProvideFeedBackTemplate2Content').load('feedback/ProvideFeedbackTemplate2.php?SubmitID='+id);
	return false;
}
// provide feedback template3
function ProvideFeedBackTemplate3(id){
	//alert(id);
	$('#DialogProvideFeedBackTemplate3').dialog('open');
	$('#ProvideFeedBackTemplate3Content').load('feedback/ProvideFeedbackTemplate3.php?SubmitID='+id);
	return false;
}
// provide feedback template4
function ProvideFeedBackTemplate4(id){
	//alert(id);
	$('#DialogProvideFeedBackTemplate4').dialog('open');
	$('#ProvideFeedBackTemplate4Content').load('feedback/ProvideFeedbackTemplate4.php?SubmitID='+id);
	return false;
}
///// end of custom profile //


////// end of provide feedback ///////////



////////// start review feedback of preview portfolio page //////////////

///// review feedback ////
$(function() {

	//  Dialog review feedback 		
	$('#DialogReviewFeedBack').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}
		}
	});
	
});

// review feedback
function ReviewFeedBack(id){
	//alert(id);
	$('#DialogReviewFeedBack').dialog('open');
	$('#DialogReviewFeedBackContent').load('feedback/ReviewFeedBack.php?SubmitID='+id);
	return false;
}

///////// review feedback active inactive //////
function ViewRecommendationIsActive(ID) {
	//alert(ID);	
	if($("#ViewRecommendationCheckBox"+ID).is(":checked")){
		$.post("Update.php?Action=ActiveViewRecommendation&SubmitID="+ID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveViewRecommendation&SubmitID="+ID +"&Value=0",function(data){
			
		});				
 
	}

}


///////// start recomment area ////////////

$(function() {

	//  Dialog recommend		
	$('#DialogRecommend').dialog({
		autoOpen: false,
		width:650,
		height:480,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			},
			"Save": function() { 
				if($('#EditorRecommend').val()=='') {
					alert('Recommendation can\'t be blank!');
					return false;
				} else {
					$.post("./Update.php?Action=recommend",$('#RecommendForm').serialize(),function(data){
						//alert(data);
						window.location.reload();
						
					});	
				
					$(this).dialog("close"); 
				}
			} 
		}
	});
	
	//  Dialog feedback training		
	$('#DialogViewRecommend').dialog({
		autoOpen: false,
		width:650,
		height:600,
		buttons: {
			"Cancel": function() { 
				$(this).dialog("close"); 
			}
		}
	});
	
});


// recommend
function recommend(id){
	//alert(id);
	$('#DialogRecommend').dialog('open');
	$('#DialogRecommendContent').load('feedback/recommend.php?SubmitID='+id);
	return false;
}

// view recommend
function ViewRecommend(id,MyPro){
	//alert(id);
	$('#DialogViewRecommend').dialog('open');
	$('#DialogViewRecommendContent').load('feedback/ViewRecommendation.php?SubmitID='+id+'&MyProfile='+MyPro);
	return false;
}





	
/****************************/

/*** Course details Add, Edit, Delete, IsActive *****/


// Add Course Details
function AddCourseDetails(id) {
	//alert(id);
	$('#DialogAddCourseDetails').dialog('open');
	$('#DialogAddCourseDetailsContent').load('./AddCourse.php?EducationID='+id);
	return false;

		
}

// Edit course details
function EditCourse(id){
	//alert(id);
	$('#DialogEditCourse').dialog('open');
	$('#DialogEditCourseContent').load('./EditCourse.php?CourseID='+id);
	
	return false;
}

// tblcourse rows active inactive
function IsActiveCourse(ID) {
	//alert(ID);	
	if($("#CourseCheckboxID"+ID).is(":checked")){
		$.post("Update.php?Action=ActiveCourse&ThisCourseID="+ID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveCourse&ThisCourseID="+ID +"&Value=0",function(data){
			
		});				
 
	}

}



/* Three tables active inactive process	*/


// tblworkhistory active inactive
function tblworkhistoryIsActive(GetPID) {

	if($("#tblworkhistoryCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveWorkHistoryTbl&GetProfileID="+GetPID+"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveWorkHistoryTbl&GetProfileID="+GetPID+"&Value=0",function(data){
			
		});				
 
	}

}


// tbltraining active inactive
function tbltrainingIsActive(GetPID) {

	if($("#tbltrainingCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveTrainingTbl&GetProfileID="+GetPID+"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveTrainingTbl&GetProfileID="+GetPID+"&Value=0",function(data){
			
		});				
 
	}

}	


// tbleducation active inactive
function tbleducationIsActive(GetPID) {

	if($("#tbleducationCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveEducationTbl&GetProfileID="+GetPID+"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveEducationTbl&GetProfileID="+GetPID+"&Value=0",function(data){
			
		});				
 
	}

}



/* All rows active incative process for three tables. */




// tblworkhistory rows active inactive
function IsActiveWorkHistory(WID) {

	if($("#WorkHistoryCheckboxID"+WID).is(":checked")){
		$.post("Update.php?Action=ActiveWorkHistory&ThisWorkHistoryID="+WID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveWorkHistory&ThisWorkHistoryID="+WID +"&Value=0",function(data){
			
		});				
 
	}

}

	
	
	
// tbltraining rows active inactive
function IsActiveTraining(TID) {

	if($("#TrainingCheckboxID"+TID).is(":checked")){
		$.post("Update.php?Action=ActiveTraining&ThisTrainingID="+TID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveTraining&ThisTrainingID="+TID +"&Value=0",function(data){
			
		});				
 
	}

}	


// tbleducation rows active inactive
function IsActiveEducation(EID) {

	if($("#EducationCheckboxID"+EID).is(":checked")){
		$.post("Update.php?Action=ActiveEducation&ThisEducationID="+EID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveEducation&ThisEducationID="+EID +"&Value=0",function(data){
			
		});				
 
	}

}




/* Three status of profile Show both, Show image, Show video active inactive process	*/


// Show both active inactive
function ShowBothIsActive(GetPID) {

	if($("#ShowBothCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveShowBoth&GetProfileID="+GetPID+"&Value=1",function(data){
			alert(data);
			window.location.reload();
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveShowBoth&GetProfileID="+GetPID+"&Value=0",function(data){
			alert(data);
			window.location.reload();
		});				
 
	}

}

// Show Photo active inactive
function PhotoIsActive(GetPID) {

	if($("#PhotoCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveShowPhoto&GetProfileID="+GetPID+"&Value=1",function(data){
			alert(data);
			window.location.reload();
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveShowPhoto&GetProfileID="+GetPID+"&Value=0",function(data){
			alert(data);
			window.location.reload();
		});				
 
	}

}



// Show video active inactive
function VideoIsActive(GetPID) {
	
	if($("#VideoCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveShowVideo&GetProfileID="+GetPID+"&Value=1",function(data){
			alert(data);
			window.location.reload();
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveShowVideo&GetProfileID="+GetPID+"&Value=0",function(data){
			alert(data);
			window.location.reload();
		});				
 
	}

}


///////////////// My profile activation ////////////////////

function MyProfileIsActive(GetPID) {
	//alert(GetPID);
	if($("#MyProfileCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveMyProfile&GetProfileID="+GetPID+"&Value=1",function(data){
		window.location.reload();	
		});				
	}else{
		$.post("Update.php?Action=ActiveMyProfile&GetProfileID="+GetPID+"&Value=0",function(data){
		window.location.reload();	
		});				
 
	}

}



/////// Photo thumbnail active inactive status ///////
function PhotoThumbnailIsActive(GetPID) {
	//alert(GetPID);
	if($("#PhotoThumbnailCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActivePhotoThumbnail&GetProfileID="+GetPID+"&Value=1",function(data){
		window.location.reload();	
		});				
	}else{
		$.post("Update.php?Action=ActivePhotoThumbnail&GetProfileID="+GetPID+"&Value=0",function(data){
		window.location.reload();	
		});				
 
	}

}

/////// Video thumbnail active inactive status ///////
function VideoThumbnailIsActive(GetPID) {
	//alert(GetPID);
	if($("#VideoThumbnailCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveVideoThumbnail&GetProfileID="+GetPID+"&Value=1",function(data){
		window.location.reload();	
		});				
	}else{
		$.post("Update.php?Action=ActiveVideoThumbnail&GetProfileID="+GetPID+"&Value=0",function(data){
		window.location.reload();	
		});				
 
	}

}

/////// area inactive status ///////
function AreaIsActive(GetPID) {
	//alert(GetPID);
	if($("#AreaCheckBox"+GetPID).is(":checked")){
		$.post("Update.php?Action=ActiveArea&GetProfileID="+GetPID+"&Value=1",function(data){
		window.location.reload();	
		});				
	}else{
		$.post("Update.php?Action=ActiveArea&GetProfileID="+GetPID+"&Value=0",function(data){
		window.location.reload();	
		});				
 
	}

}




//******************** Four custom profile rows actice inactive process ************//


// tblcaworkhistorystyle rows active inactive
function IsActiveWHStyle(WID) {
	//alert(WID);
	if($("#WHStyleCheckboxID"+WID).is(":checked")){
		$.post("Update.php?Action=ActiveWHStyle&ThisWHStyleID="+WID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveWHStyle&ThisWHStyleID="+WID +"&Value=0",function(data){
			
		});				
 
	}

}
	

// tblcaclassic rows active inactive
function IsActiveClassic(WID) {
	//alert(WID);
	if($("#ClassicCheckboxID"+WID).is(":checked")){
		$.post("Update.php?Action=ActiveClassic&ThisClassicID="+WID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveClassic&ThisClassicID="+WID +"&Value=0",function(data){
			
		});				
 
	}

}	


// tblcadocumentvideoa rows active inactive
function IsActiveDocA(ID) {
	//alert(ID);	
	if($("#DocACheckboxID"+ID).is(":checked")){
		$.post("Update.php?Action=ActiveDocA&ThisDocAID="+ID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveDocA&ThisDocAID="+ID +"&Value=0",function(data){
			
		});				
 
	}

}



// tblcadocumentvideob rows active inactive
function IsActiveDocB(ID) {
	//alert(ID);	
	if($("#DocBCheckboxID"+ID).is(":checked")){
		$.post("Update.php?Action=ActiveDocB&ThisDocBID="+ID +"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveDocB&ThisDocBID="+ID +"&Value=0",function(data){
			
		});				
 
	}

}

//******************** Four custom profile template actice inactive process ************//		


// All Template active inactive
function AllTemplateIsActive(ID) {
	//alert(ID);
	if($("#AllTemplateCheckBox"+ID).is(":checked")){
		$.post("Update.php?Action=ActivetAllTemplate&GetProfileID="+ID+"&Value=1",function(data){
			alert(data);
			window.location.reload();
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActivetAllTemplate&GetProfileID="+ID+"&Value=0",function(data){
			
			alert(data);
			window.location.reload();
			
			
		});				
 
	}

}


				
// Dedicated template active inactive
function OneTemplateIsActive(ID) {
	//alert(ID);
	if($("#OneTemplateCheckBox"+ID).is(":checked")) {
		$.post("Update.php?Action=ActiveOneTemplate&GetCustomareaID="+ID+"&Value=1",function(data){
			
			alert(data);
			window.location.reload();
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveOneTemplate&GetCustomareaID="+ID+"&Value=0",function(data){
			
			alert(data);
			window.location.reload();
			
			
		});				
 
	}

}



// tblcaclassic active inactive
function tblClassicIsActive(ID) {
	//alert(ID);
	if($("#tblClassicCheckBox"+ID).is(":checked")){
		$.post("Update.php?Action=ActiveClassicTbl&GetCustomareaID="+ID+"&Value=1",function(data){
			
		});				
	}	
	else{
		$.post("Update.php?Action=ActiveClassicTbl&GetCustomareaID="+ID+"&Value=0",function(data){
			
		});				
 
	}

}	


// tblphoto active inactive
function ThumbNailImageIsActive(ID) {
	//alert(ID);
	if($("#ThumbNailImageCheckBox"+ID).is(":checked")){
		$.post("Update.php?Action=ActiveThumbNailImage&GetID="+ID+"&Value=1",function(data){	
		
		});	
		
	}else{
		$.post("Update.php?Action=ActiveThumbNailImage&GetID="+ID+"&Value=0",function(data){
			
		});				
 
	}
}	

// tblvideo active inactive
function ThumbNailVideoIsActive(ID) {
	//alert(ID);
	if($("#ThumbNailVideoCheckBox"+ID).is(":checked")){
		$.post("Update.php?Action=ActiveThumbNailVideo&GetID="+ID+"&Value=1",function(data){	
		
		});	
		
	}else{
		$.post("Update.php?Action=ActiveThumbNailVideo&GetID="+ID+"&Value=0",function(data){
			
		});				
 
	}

}		
	
	
		
	// ******************* Editors ******************//

	// Editor Id Creation

	$(function()
	{
	  $('#EditorEditSummary').wysiwyg();
	  
	});

	// Work History Add and Edit Editor
	$(function()
	{
	  $('#EditorAddWorkHistory').wysiwyg();
	  
	});
	
	
	// Send email
	$(function()
	{
	  $('#EditorSendEmail').wysiwyg();
	  
	});
	

	// Training and Cirtificates Add and Edit Editor
	$(function()
	{
	  $('#EditorAddTraining').wysiwyg();
	  
	});

	// Education Background Add and Edit Editor
	$(function()
	{
	  $('#EditorAddEducation').wysiwyg();
	  
	});
	
	// Forward Link
	
	$(function()
	{
	  $('#EditorForwardLink').wysiwyg();
	  
	});
	
	// *************** Date picker *****************//
	
	// All date pickers
		
		////////////////////
		//Work history forms
		// Add
		$('#DatePickerFromAddWorkHistory').datepicker({
			inline: true
		});
		
		$('#DatePickerToAddWorkHistory').datepicker({
			inline: true
		});
		
		
		////////////////////
		//Training & certificate forms
		// Add
		$('#DatePickerFromAddTraining').datepicker({
			inline: true
		});
		
		$('#DatePickerToAddTraining').datepicker({
			inline: true
		});
		
		
		////////////////////
		//Education forms
		// Add
		$('#DatePickerFromAddEducation').datepicker({
			inline: true
		});
		
		$('#DatePickerToAddEducation').datepicker({
			inline: true
		});
		
	
	// View all profile 
	function ViewAll(URL){
		window.location =URL;
		return false;
	}
	
	// View all profile 
	function ViewAllUser(){
		window.location = "ManageUsers.php"
		return false;
	}

	// Delete Template 
	function DeleteTemplate(ID) { 
	
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteTemplate&SubmitCustomareaID='+ID,function(data){
				//alert(data);
				if(data=='Success')
				window.location.reload();
			});			
		}
		return false;
	}
	
	
	// Delete Work history
	function Delete_WorkHistory(ID) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteWorkHistory&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	// Delete traning
	function DeleteTrainingHistory(ID) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteTraining&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	
	// Delete Education
	function DeleteEducation(ID) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteEducation&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	

	// Delete Work History style custom profile
	function DeleteWHStyle(ID) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteWHStyle&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}

	// Delete Document & video A style custom profile
	function DeleteDocA(ID,doc) { 
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteDocA&Doc='+doc+'&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	
	// Delete Document & video B style custom profile
	function DeleteDocB(ID,doc) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteDocB&Doc='+doc+'&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	// Delete Classic style custom profile
	function DeleteClassic(ID) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteClassic&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	// Delete course details form educational background
	function DeleteCourse(ID) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteCourse&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	
	// Delete Profile form manage profile page
	function DeleteProfile(ID) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteProfile&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	
	////////// Administrator area ////////////////
	
	// Delete user
	function DeleteUser(ID) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('../Update.php?Action=DeleteUser&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	
	// Edit user
	function EditUser(id){
		$('#DialogEditUser').dialog('open');
		$('#DialogEditUserContent').load('./EditUsers.php?SubmitID='+id);
		return false;
	}
	
	// Edit admin information
	function EditAdminInfo(){
		$('#DialogEditAdminInfo').dialog('open');
		$('#DialogEditAdminInfoContent').load('./EditAdminInfo.php');
		return false;
	}
	
	
	/////// The end of administrator area
	
	function ShowImage() {
		$('#ForImage').show();
		$('#photo').attr('class', 'active');
		$('#video').attr('class', 'inactive');
		$('#ForVideo').hide();
	}
	
	function ShowVideo() {
		$('#ForVideo').show();
		$('#video').attr('class', 'active');
		$('#photo').attr('class', 'inactive');
		$('#ForImage').hide();
	}
	
	function ShowImagePreview() {
		$('#ForImagePreview').show();
		$('#ImagePreview').attr('class', 'IMG');
		$('#action').hide();
		$('#ForVideoPreview').hide();
		$('#ButtonImagePreview').show();
		$('#ButtonVideoPreview').hide();
	}
	
	function ShowVideoPreview() {
		$('#ForVideoPreview').show();
		$('#ForImagePreview').hide();
		$('#ButtonImagePreview').hide();
		$('#ButtonVideoPreview').show();
	}
	
	// Delete profile photo
	function DeletePhoto(ID,Photo) { 
		//alert(Photo);
		
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeletePhoto&Photo='+Photo+'&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
	
	// Delete profile video
	function DeleteVideo(ID,video) { 
		//alert(ID);
		var confirmation = confirm('Are you sure you want to delete ?');
		if(confirmation){
			$.post('./Update.php?Action=DeleteVideo&video='+video+'&SubmitID='+ID,function(data){
				if(data=='Success')
				window.location.reload();
			});			
		}
		
		return false;
	}
	
/* Upload image  */
$(document).ready(function() {
   
	$('#Imagefilename').live('change', function() {
	
		$("#PreviewImage").html('<img src="images/loader.jpeg" alt="Uploading...."/>');
		$("#imageForm11").ajaxForm({
			//target: '#preview',
			success: showResponseImage

			}).submit();
	});
});
       
function showResponseImage(respImage){
	var Image=respImage.split('|');
	document.getElementById('PreviewImage').innerHTML=Image[0];
	document.getElementById('oldPreview').style.display='none';
	document.getElementById('PreviewImage').style.display='block';
	
	var Pid=$("#ProID").val();
	//alert(Pid);
	window.location='ViewPortfolio.php?PID='+Pid;
}



/* Upload video  */
$(document).ready(function() {
       
	$('#filename').live('change', function() {
	
		$("#preview").html('<img src="images/loader.jpeg" alt="Uploading...."/>');
		$("#VideoForm11").ajaxForm({
			//target: '#preview',
			success: showResponse
			
			}).submit();

	});
});
       
function showResponse(resp) {
	document.getElementById('preview').innerHTML=resp;
	
	//window.location.reload();
	window.location=window.location.href+"&vdo=1";
}	



////******** Form validation *******/////
////******** Form validation *******/////

////******* User registration/ sinup form validation *****////
	function RegistrationFormValidation(){
	
		//var pattern =/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
		var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		
		if($('#RegisterFirstName').val()==''){
			alert('First name can not be empty');
			$('#RegisterFirstName').focus();
			return false;
			
		}else if ($('#RegisterLastName').val()==''){
			alert('Last name can not be empty');
			$('#RegisterLastName').focus();
			return false;
			
		}else if ($('#RegisterEmail').val()==''){
			alert('Email can not be empty');
			$('#RegisterEmail').focus();
			return false;
			
		}else if ($('#RegisterPassword').val()==''){
			alert('Password can not be empty');
			$('#RegisterPassword').focus();
			return false;
			
		}else if($('#RegisterRePassword').val()==''){
			alert('Confirm password can not be empty');
			$('#RegisterRePassword').focus();
			return false;
			
		}else if($('#RegisterPassword').val()!=$('#RegisterRePassword').val() ) {
			alert('Password does not match with confirm password');
			$('#RegisterRePassword').focus();
			return false;
			
		}else if(pattern.test($('#RegisterEmail').val()) ) {
			//$('#RegisterEmail').focus();
			return true;
		} else {
			alert('Invalid email address');
			return false;
		}	
	}
	
	
	////****** User Login form validation *******////
	function LoginFormValidation(){
	
		//var pattern =/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
		var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		
		if($('#LoginEmail').val()==''){
			alert('Email can not be empty');
			$('#LoginEmail').focus();
			return false;
			
		}else if ($('#LoginPassword').val()==''){
			alert('Password can not be empty');
			$('#LoginPassword').focus();
			return false;
			
		}else if( pattern.test($('#LoginEmail').val()) ) {
			return true;
			
		} else {
			alert('Invalid email address');
			$('#LoginEmail').focus();
			return false;
		}
	
	}
	
	
	////****** Guest information form validation *******////
	function GuestInfoFormValidation(){
		//var pattern =/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
		var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		if($('#GuestName').val()==''){
			alert('Name can not be empty');
			$('#GuestName').focus();
			return false;
			
		}else if ($('#GuestEmail').val()==''){
			alert('Email can not be empty');
			$('#GuestEmail').focus();
			return false;
			
		}else if ($('#GuestPhone').val()==''){
			alert('Phone can not be empty');
			$('#GuestPhone').focus();
			return false;
			
		}else if ($('#GuestMessage').val()==''){
			alert('Message can not be empty');
			$('#GuestMessage').focus();
			return false;
			
		}else if( pattern.test($('#GuestEmail').val()) ) {
			return true;
			
		} else {
			alert('Invalid email address');
			$('#LoginEmail').focus();
			return false;
		}
		
	}
	
	
	////******** User Forgot password form validation *******/////
	function ForgetPasswordFormValidation(){
		
		//var pattern =/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/; 
		var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		
		if($('#ForgotEmail').val()==''){
			alert('Email can not be empty');
			$('#ForgotEmail').focus();
			return false;
			
		}else if($('#ForgotReEmail').val()==''){
			alert('Re-Email can not be empty');
			$('#ForgotReEmail').focus();
			return false;
			
		}else if($('#ForgotEmail').val()!=$('#ForgotReEmail').val() ) {
			alert('Email does not match with Re-Email');
			$('#ForgotReEmail').focus();
			return false;
			
		}else if(pattern.test($('#ForgotEmail').val() ) ) {
			return true;
			
		}else {
			alert('Invalid email address');
			return false;
		}
	
	}

/*	
//Main container and container body resize according to Body
$(document).ready(function () {
  var bodyheight=$("#BodyHeight").height();
  //alert(bodyheight);
  var mainheight=(bodyheight + 105);
  document.getElementById("MainContainer").style.height= mainheight+'px';
  document.getElementById("ContainerBody").style.height= mainheight+'px';
  document.getElementById("aside").style.height= mainheight+'px';
  
  //alert(bodyheight);
});

*/


// View user profile
function ViewUserProfile(id) {
	window.open("../ManagePortfolios.php?adminentertouser="+id);
}

//// Image  pagination /////
//// Image  pagination /////

//// Next arrow 
function nextBox() {
	var nowView=document.getElementById("nowView").value;
	var totalPage=document.getElementById("totalPage").value;
	
	var nextPage=parseInt(nowView)+1;
	if(nextPage>=1){
		if(nextPage<totalPage){
		document.getElementById("nextPageButon").disabled=false;
		}else{
		document.getElementById("nextPageButon").disabled=true;
		}

		document.getElementById("prevPageButon").disabled=false;
	}else{
		document.getElementById("prevPageButon").disabled=true;
	}
	
	for(var km=1; km<=totalPage; km++){
		if(km==nextPage){

		document.getElementById("showdiv"+km).style.display='block';
		document.getElementById("nowView").value=km;
		}else{
			if(nextPage<=totalPage){
				document.getElementById("showdiv"+km).style.display='none';
			}
		}
	}
	
}


//// previous arrow 
function previousbox(){
	var nowView=document.getElementById("nowView").value;
	
	var totalPage=document.getElementById("totalPage").value;
	
	var nextPage=nowView-1;
	
	if(nextPage==0){
		return false;
	}
	
	if(nextPage<totalPage){
		if(nextPage>1){		
		document.getElementById("prevPageButon").disabled=false;
		}else{
		document.getElementById("prevPageButon").disabled=true;
		}
		document.getElementById("nextPageButon").disabled=false;

	}else{
		document.getElementById("nextPageButon").disabled=true;
	}

	for(var km=1; km<=totalPage; km++){
		if(km==nextPage){
			document.getElementById("nowView").value=km;
			document.getElementById("showdiv"+nextPage).style.display='block';
		}else{
			if(nextPage<=totalPage){
			document.getElementById("showdiv"+km).style.display='none';
			}
		}
	}

}


//// video pagination /////
//// video pagination /////

//// Next arrow 
function nextBoxVDO() {
	//alert('next');
	var nowViewVDO=document.getElementById("nowViewVDO").value;
	var totalPageVDO=document.getElementById("totalPageVDO").value;
	

	var nextPageVDO=parseInt(nowViewVDO)+1;
	if(nextPageVDO>=1){
		if(nextPageVDO<totalPageVDO){
		document.getElementById("nextPageButonVDO").disabled=false;
		}else{
		document.getElementById("nextPageButonVDO").disabled=true;
		}

		document.getElementById("prevPageButonVDO").disabled=false;
	}else{
		document.getElementById("prevPageButonVDO").disabled=true;
	}
	//alert(totalPage); 
	for(var km=1; km<=totalPageVDO; km++){
		if(km==nextPageVDO){

		document.getElementById("showdivVDO"+km).style.display='block';
		document.getElementById("nowViewVDO").value=km;
		}else{
			if(nextPageVDO<=totalPageVDO){
				document.getElementById("showdivVDO"+km).style.display='none';
			}
		}
	}
	
}


//// previous arrow 
function previousboxVDO(){
	var nowViewVDO=document.getElementById("nowViewVDO").value;
	var totalPageVDO=document.getElementById("totalPageVDO").value;
	var nextPageVDO=nowViewVDO-1;

	if(nextPageVDO==0){
		return false;
	}
	
	
	if(nextPageVDO<totalPageVDO){
		if(nextPageVDO>1){ 
		document.getElementById("prevPageButonVDO").disabled=false;
		}else{
		document.getElementById("prevPageButonVDO").disabled=true; 
		
		}
		document.getElementById("nextPageButonVDO").disabled=false;

	}else{
		document.getElementById("nextPageButonVDO").disabled=true;
	}

	for(var km=1; km<=totalPageVDO; km++){
		if(km==nextPageVDO){
			document.getElementById("nowViewVDO").value=km;
			document.getElementById("showdivVDO"+nextPageVDO).style.display='block';
		}else{
			if(nextPageVDO<=totalPageVDO){
			document.getElementById("showdivVDO"+km).style.display='none';
			}
		}
	}

}



