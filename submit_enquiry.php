<?php
	include("operations.php");
	include("db_server.php");
	
	//Creating Empty Response JSON Array
	set_empty_response();
	
	//Connecting to db
	connectDb();
	
	$name = trim($_POST['name']??"");
	$phone_no = trim($_POST['phone-no']??"");
	$referred_by = trim($_POST['referred-by']??"");
	$academic_course_type = trim($_POST['academic-course-type']??"");
	$grad_type = trim($_POST['grad-type']??"");
	$GLOBALS["is_act_set"] = false;
	$courses = $_POST['courses']??"";
	
	
	//Name Validation.
	if(isValueEmpty($name))
		push_error_response("102");
	else if(!isNameValid($name))
		push_error_response("103");
		
	//Phone-No Validation.
	if(isValueEmpty($phone_no))
		push_error_response("phone_no-empty");
	else if(!isNameValid($name))
		push_error_response("phone_no-invalid");
		
	//Referred-by-Name Validation.
	if(isValueEmpty($referred_by))
		push_error_response("referred_by-empty");
	else if(!isNameValid($name))
		push_error_response("referred_by-invalid");
	
	//Academic Course Type &
	//Diploma, Engg, Management Course Validation.
	if(isValueEmpty($academic_course_type) || $academic_course_type=="not-selected") {
		push_error_response("academic_course_type-empty");
	}
	else {
		$GLOBALS["is_act_set"] = true;
	}
	
	if(isValueEmpty($grad_type) || $grad_type=="not-selected") {
		push_error_response("grad_type-empty");
	}
	
	if(isValueEmpty($courses)) {
		push_error_response("courses-empty");
	}
	
	if(count($GLOBALS["response"]["errors"])==0) {
		insertEnquiryData($name, $phone_no, $referred_by, $academic_course_type, $courses);
		if($GLOBALS["is_enquiry_inserted"]) {
			set_success_response("true");
		}
		else {
			push_error_response("data-not-added");
		}
	}
	
	//Print Response in JSON Code.
	print_response();
?>