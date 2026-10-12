function showGradType(academic_course_type) {
	attach_values.set("academic-course-type", academic_course_type.value);
	
	var grad_type_input_field_box = document.getElementById("grad-type-input-field-box");
	var grad_type = document.getElementById("grad-type");
	var course_input_field_box = document.getElementById("course-input-field-box");
	
	attach_values.set("grad-type", "");
	grad_type.selectedIndex = 0;
	setInputFieldErrorMsg(grad_type.id, "");
	
	if(academic_course_type.value=="diploma") {
		grad_type_input_field_box.style.display = "";
		showCourses(academic_course_type);
		return;
	}
	else if(academic_course_type.value=="not-selected") {
		grad_type_input_field_box.style.display = "";
	}
	//if "Engineerng or Management" case
	else {
		grad_type_input_field_box.style.display = "block";
		
		if(academic_course_type.value=="engg")
			enggSelected(true);
		else 
			enggSelected(false);
	}
	course_input_field_box.style.display = "";
}

//Imports courses code from server asynchronously.
function showCourses(grad_type) {
	attach_values.set("grad-type", grad_type.value);
	
	var courses_id = attach_values.get("courses_id");
	if(!isValueEmpty(courses_id)) {
		document.getElementById(courses_id).style.display = "";
	}
	
	var course_input_field_box = document.getElementById("course-input-field-box");
	var course_error_msg_ele = document.getElementById("error-indicate-courses");
	setCoursesInputFieldErrorMsg("");
	
	if(grad_type.value=="not-selected") {
		course_input_field_box.style.display = "";
		attach_values.set("courses_id", "");
		return;
	}
	else if(grad_type.value=="ug" || grad_type.value=="pg") {
		courses_id = attach_values.get("academic-course-type")+"-"+grad_type.value+"-"+"courses";
	}
	//"diploma" case
	else {
		courses_id = attach_values.get("academic-course-type")+"-"+"courses";
	}
	
	attach_values.set("courses_id", courses_id);attach_values.set("courses_id", courses_id);
	course_input_field_box.style.display = "block";
	document.getElementById(courses_id).style.display = "block";
}

function enggSelected(yesorno) {
	document.getElementById("is-btech").innerHTML=yesorno?"Under Graduate (B.Tech)":"Under Graduate";
	document.getElementById("is-mtech").innerHTML=yesorno?"Post Graduate (M.Tech)":"Post Graduate";
}