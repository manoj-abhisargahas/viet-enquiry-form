//Store all attached files.
var attach_values = new FormData();
attach_values.set("name", "");
attach_values.set("phone-no", "");
attach_values.set("referred-by", "");
attach_values.set("academic-course-type", "");
attach_values.set("grad-type", "");
attach_values.set("courses", "");

//if server and db-server not responds.
var svr_not_resp_err = "Server not Responding, Try Again!";

//if unidentified error at server side and received unparsable json code.
var smtg_wrong_err_msg = "something went wrong, Try Again!";

//if data not added to database.
var req_not_add_err = "Your request not added, Try Again!";

//if data added to database.
var success_msg = "We got your request, we will get back to you soon!";

var name_regex = "^[a-z\. ]{1,50}$";
var phoneno_regex = "^[6-9][0-9]{9}$";

function invokeDialog(type, msg, cancel_text, cancel_callback, ok_text, ok_callback) {
	var shade_body = document.getElementById("shade-body");
	shade_body.innerHTML = "<div class=\"shade-fill-area\" onclick=\""+((type=="confirm")?"":"cancelDialog()")+"\"></div>"+
							"<div id=\"dialog-box\">"+
								"<div id=\"dialog-box-msg\">"+msg+"</div>"+
								"<div class=\"dialog-box-buttons\">"+
									(((type=="confirm")||(type=="cancel"))?"<button id=\"dialog-box-button-cancel\" onclick=\""+cancel_callback+"\">"+cancel_text+"</button>":"")+
									(((type=="confirm")||(type=="ok"))?"<button id=\"dialog-box-button-ok\" onclick=\""+ok_callback+"; cancelDialog()\">"+ok_text+"</button>":"")+
								"</div>"+
							"</div>";
	shade_body.style.display = "block";
}

function cancelDialog() {
	var shade_body = document.getElementById("shade-body");
	shade_body.style.display="none";
	shade_body.style.innerHTML="";
}

function setInputFieldErrorMsg(ele_id, msg) {
	var error_ele = document.getElementById(ele_id);
	var error_msg_ele = document.getElementById("error-indicate-"+ele_id);
	
	if(!isValueEmpty(msg)) {
		var error_symbol = "<span class=\"error-symbol\">!</span>";
		var error_msg = "<span class=\"error-msg\">"+msg+"</span>";
		
		error_msg_ele.innerHTML = error_symbol + error_msg;
		error_msg_ele.style.display = "block";
		error_ele.style.backgroundColor = "rgba(255, 0, 0, 0.06)";
	}
	else {
		error_msg_ele.innerHTML = "";
		error_msg_ele.style.display = "";
		error_ele.style.backgroundColor = "";
	}
}

function setCoursesInputFieldErrorMsg(msg) {
	var error_msg_ele = document.getElementById("error-indicate-courses");
	
	if(!isValueEmpty(msg)) {
		var error_symbol = "<span class=\"error-symbol\">!</span>";
		var error_msg = "<span class=\"error-msg\">"+msg+"</span>";
		
		error_msg_ele.innerHTML = error_symbol + error_msg;
		error_msg_ele.style.display = "block";
	}
	else {
		error_msg_ele.innerHTML = "";
		error_msg_ele.style.display = "";
	}
}

function isValueEmpty(value) {
	if(value=="" || value==null)
		return true;
	else
		return false;
}

function isNameValid(name) {
	var regexp = new RegExp(name_regex, "i");
	return regexp.test(name);
}

function isPhoneNoValid(phoneno) {
	var regexp = new RegExp(phoneno_regex, "i");
	return regexp.test(phoneno);
}

/*function validateName(ele) {
	var value = ele.value;
	if(!isNameValid(value))
		ele.value = value.substring(0, value.length-1);
}*/

/*function validatePhoneNo(ele) {
	var value = ele.value;
	if(!isPhoneNoValid(value))
		ele.value = value.substring(0, value.length-1);
}*/

function submitValidate() {
	var error_count = 0;
	var is_act_set = false;
	var is_grad_set = false;
	
	var name = document.getElementById("name");
	var phone_no = document.getElementById("phone-no");
	var referred_by = document.getElementById("referred-by");
	var academic_course_type = document.getElementById("academic-course-type");
	var courses_list_name = "";
	
	// var mgmt_course = email_ele.value.trim();
	// var info = document.getElementById("info");
	// info.innerHTML = diploma_courses_list;
	
	var name_empty_msg = "Enter your Name";
	var name_invalid_msg = "Should only contain Alphabets, Full-stop, White-space and Max 50 characters";
	var phone_empty_msg = "Enter your Phone Number";
	var phone_invalid_msg = "Starts with 6-9 and max 10 digits";
	var refer_empty_msg = "Enter name of who referred us to you";
	var act_empty_msg = "Choose Academic Course Type";
	var gt_empty_msg = "Choose Graduation Type";
	var courses_err_msg = "Select atleast One Course";
	
	//Name Validation.
	if(isValueEmpty(name.value)) {
		setInputFieldErrorMsg(name.id, name_empty_msg);
		error_count++;
	}
	else if(!isNameValid(name.value)) {
		setInputFieldErrorMsg(name.id, name_invalid_msg);
		error_count++;
	}
	else {
		setInputFieldErrorMsg(name.id, "");
		attach_values.append(name.id, name.value);
	}
	
	//Phone-No Validation.
	if(isValueEmpty(phone_no.value)) {
		setInputFieldErrorMsg(phone_no.id, phone_empty_msg);
		error_count++;
	}
	else if(!isPhoneNoValid(phone_no.value)) {
		setInputFieldErrorMsg(phone_no.id, phone_invalid_msg);
		error_count++;
	}
	else {
		setInputFieldErrorMsg(phone_no.id, "");
		attach_values.append(phone_no.id, phone_no.value);
	}
	
	//Referred-by-Name Validation.
	if(isValueEmpty(referred_by.value)) {
		setInputFieldErrorMsg(referred_by.id, refer_empty_msg);
		error_count++;
	}
	else if(!isNameValid(referred_by.value)) {
		setInputFieldErrorMsg(referred_by.id, name_invalid_msg);
		error_count++;
	}
	else {
		setInputFieldErrorMsg(referred_by.id, "");
		attach_values.append(referred_by.id, referred_by.value);
	}
	
	//Academic-Course-Type Validation.
	
	if(attach_values.get(academic_course_type.id)=="" || attach_values.get(academic_course_type.id)=="not-selected") {
		setInputFieldErrorMsg(academic_course_type.id, act_empty_msg);
		error_count++;
	}
	else {
		if(academic_course_type.value=="diploma") {
			courses_list_name = academic_course_type.value+"_courses";
		}
		is_act_set = true;
		
		// attach_values.append(academic_course_type.id, academic_course_type.value);
		setInputFieldErrorMsg(academic_course_type.id, "");
	}
			
	//Graduation Type Validation & setting courses_list_name value
	if(is_act_set) {
		var grad_type_value = attach_values.get("grad-type");
		var grad_type = document.getElementById("grad-type");
		
		if(grad_type_value=="" || grad_type_value=="not-selected"){
			setInputFieldErrorMsg(grad_type.id, gt_empty_msg);
			error_count++;
		}
		else {
			if(grad_type_value=="diploma"){
				courses_list_name = academic_course_type.value+"_courses";
			}
			else {
				courses_list_name = academic_course_type.value+"_"+grad_type_value+"_courses";
			}
			
			// attach_values.append(grad_type.id, grad_type.value);
			setInputFieldErrorMsg(grad_type.id, "");
			is_grad_set = true;
		}
	}
	
	//Courses Validation
	if(is_grad_set) {
		var courses = document.getElementsByName(courses_list_name);
		var selected_courses_count = 0;
		var prev_courses = [];
		
		for(let i=0; i<courses.length; i++) {
			if(courses[i].checked) {
				selected_courses_count++;
				prev_courses.push(courses[i].value);
			}
		}
		attach_values.set("courses", prev_courses);
		
		if(selected_courses_count > 0) {
			setCoursesInputFieldErrorMsg("");
		}
		else {
			setCoursesInputFieldErrorMsg(courses_err_msg);
			error_count++;
		}	
	}
	
	return error_count==0;
}

function showServerErrors(response) {
	if(response["errors"].includes("101")) {
		invokeDialog("cancel", svr_not_resp_err, "Cancel", "cancelDialog()", null, null);
	}
	else if(response["errors"].includes("111")) {
		invokeDialog("cancel", req_not_add_err, "Cancel", "cancelDialog()", null, null);
	}
	else { }
}

function submitEnquiry() {	
	if(submitValidate()) {
		var xhttp = new XMLHttpRequest();
		
		xhttp.onreadystatechange = function() {
			//for supporting
			// var info = document.getElementById("info");
			// info.innerHTML = this.responseText;
			
			if(xhttp.readyState==4 && xhttp.status==200 && this.responseText!=null) {
				
				try {
					var response = JSON.parse(this.responseText);
					
					//if response no errors display successful dialog else show server errors.
					if((response["errors"].length < 1) && (response["success_msg"]=="true")) {
						invokeDialog("ok", success_msg, null, null, "OK", "cancelDialog()");
						formReset();
					}
					else {
						showServerErrors(response);
					}
				}
				catch(error) {
					invokeDialog("cancel", smtg_wrong_err_msg, "Cancel", "cancelDialog()", null, null);
					//just for testing, should be removed.
					// invokeDialog("cancel", this.responseText, "Cancel", "cancelDialog()", null, null);
				}
			}
			else {}
		};
		
		xhttp.onloadstart = function() {};
		xhttp.onprogress = function(e) {};
		xhttp.onabort = function() {};
		xhttp.onerror = function () {};
		xhttp.onload = function() {};
		xhttp.ontimeout = function() {};
		xhttp.onloadend = function() {};
		
		
		xhttp.open("POST", "submit_enquiry.php", true);
		xhttp.send(attach_values);
	}
}

// var info = document.getElementById("info");
// info.innerHTML = ele.value;
// info.innerHTML+= regexp.test(ele.value);

function formReset() {
	document.getElementById("enquiry-form").reset();
	document.getElementById("grad-type-input-field-box").style.display="";
	document.getElementById("course-input-field-box").style.display="";
}