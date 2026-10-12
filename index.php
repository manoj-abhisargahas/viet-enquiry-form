<!DOCTYPE html>
<html>
	<head>
		<title>VIET Enquiry Form</title>
		<link rel="stylesheet" href="style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<meta name="viewport" content="user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1, width=device-width, height=device-height"/>
	</head>
	<body>
		<header>
			<div class="container">
				<img id="header-logo" src="files/viet-logo.png" alt="VIET Logo" width="240px" height="auto"/>
			</div>
		</header>
		<div id="main-body">
			<div id="banner-image-section">
				<img id="banner-image" src="files/banner-image.png" alt="VIET Banner Image" width="100%" height="auto"/>
				<div id="bi-color-overlay"></div>
			</div>
			<form id="enquiry-form">
				<h2 id="form-heading">Admission Form</h2>
				<p id="form-tagline">Fill the form, we will get back to you soon.</p>
				<div id="name-input-field-box">
					<input id="name" name="name" type="text" placeholder="Name"/>
					<div id="error-indicate-name"></div>
				</div>
				<div id="phone-no-input-field-box">
					<input id="phone-no" name="phone-no" type="text" placeholder="Phone Number"/>
					<div id="error-indicate-phone-no"></div>
				</div>
				<div id="referred-by-input-field-box">
					<input id="referred-by" name="referred-by" type="text" placeholder="Referred by"/>
					<div id="error-indicate-referred-by"></div>
				</div>
				<div id="academic-course-type-input-field-box">
					<select id="academic-course-type" name="academic-course-type" onchange="showGradType(this)">
						<option selected value="not-selected">Choose Academic Course Type</option>
						<option value="diploma">Diploma</option>
						<option value="engg">Engineering</option>
						<option value="mgmt">Management</option>
					</select>
					<div id="error-indicate-academic-course-type"></div>
				</div>
				<div id="grad-type-input-field-box">
					<select id="grad-type" name="grad-type" onchange="showCourses(this)">
						<option selected value="not-selected">Choose Graduation Type</option>
						<option id="is-btech" value="ug">Under Graduate</option>
						<option id="is-mtech" value="pg">Post Graduate</option>
					</select>
					<div id="error-indicate-grad-type"></div>
				</div>
				<div id="course-input-field-box">
					<h4 id="course-head-txt-engg">Select Courses</h4>
					<div id="error-indicate-courses"></div>
					<div id="diploma-courses" class="courses-list-sec">
						<div class="chkbx-sec">
							<input type="checkbox" name="diploma_courses" id="d-agri" value="d-agri">
							<label for="d-agri">Agricultural Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="diploma_courses" id="d-cvl" value="d-cvl">
							<label for="d-cvl">Civil Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="diploma_courses" id="d-comp" value="d-comp">
							<label for="d-comp">Computer Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="diploma_courses" id="d-ece" value="d-ece">
							<label for="d-ece">Electronics & Communications Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="diploma_courses" id="d-eee" value="d-eee">
							<label for="d-eee">Electrical & Electronics Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="diploma_courses" id="d-mec" value="d-mec">
							<label for="d-mec">Mechanical Engineering</label>
						</div>
					</div>
					<div id="engg-ug-courses" class="courses-list-sec">
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-automob" value="e-ug-automob">
							<label for="e-ug-automob">Automobile Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-cvl" value="e-ug-cvl">
							<label for="e-ug-cvl">Civil Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-cse" value="e-ug-cse">
							<label for="e-ug-cse">Computer Science & Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-cse-datasci" value="e-ug-cse-datasci">
							<label for="e-ug-cse-datasci">CSE (Data Science)</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-cse-cyber" value="e-ug-cse-cyber">
							<label for="e-ug-cse-cyber">CSE (Cyber Security)</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-cse-ai-ml" value="e-ug-cse-ai-ml">
							<label for="e-ug-cse-ai-ml">CSE (AI & ML)</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-ece" value="e-ug-ece">
							<label for="e-ug-ece">Electronics & Communications Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-eee" value="e-ug-eee">
							<label for="e-ug-eee">Electrical & Electronics Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_ug_courses" id="e-ug-mec" value="e-ug-mec">
							<label for="e-ug-mec">Mechanical Engineering</label>
						</div>
					</div>
					<div id="engg-pg-courses" class="courses-list-sec">
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_pg_courses" id="e-pg-struct" value="e-pg-struct">
							<label for="e-pg-struct">Structural Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_pg_courses" id="e-pg-cad-cam" value="e-pg-cad-cam">
							<label for="e-pg-cad-cam">CAD/CAM</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_pg_courses" id="e-pg-cse" value="e-pg-cse">
							<label for="e-pg-cse">Computer Science & Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_pg_courses" id="e-pg-therm" value="e-pg-therm">
							<label for="e-pg-therm">Thermal Engineering</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_pg_courses" id="e-pg-pow-sys" value="e-pg-pow-sys">
							<label for="e-pg-pow-sys">Power Systems</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="engg_pg_courses" id="e-pg-vlsi" value="e-pg-vlsi">
							<label for="e-pg-vlsi">VLSI & Embedded systems</label>
						</div>
					</div>
					<div id="mgmt-ug-courses" class="courses-list-sec">
						<div class="chkbx-sec">
							<input type="checkbox" name="mgmt_ug_courses" id="m-ug-bba" value="m-ug-bba">
							<label for="m-ug-bba">BBA</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="mgmt_ug_courses" id="m-ug-bca" value="m-ug-bca">
							<label for="m-ug-bca">BCA</label>
						</div>
					</div>
					<div id="mgmt-pg-courses" class="courses-list-sec">
						<div class="chkbx-sec">
							<input type="checkbox" name="mgmt_pg_courses" id="m-pg-mba" value="m-pg-mba">
							<label for="m-pg-mba">MBA</label>
						</div>
						<div class="chkbx-sec">
							<input type="checkbox" name="mgmt_pg_courses" id="m-pg-mca" value="m-pg-mca">
							<label for="m-pg-mca">MCA</label>
						</div>
					</div>
				</div>
				<div id="submit-input-field-box">
					<button id="submit" name="submit" type="button" onclick="submitEnquiry()">Submit</button>
				</div>
				<div id="info-input-field-box">
					<div id="info"></div>
				</div/>
			</form>
		</div>
		<footer>
			<img id="footer-logo" src="files/viet-logo-blue-colored.png" alt="VIET Logo" width="260px" height="auto"/>
		</footer>
		
		<!--SHADE BODY FOR DIALOGS-->
		<div id="shade-body"></div>
	</body>
	<script src="js.js"></script>
	<script src="form_dynamic.js"></script>
</html>