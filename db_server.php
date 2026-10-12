<?php
	$mysqli = "";
	
	function connectDb() {
		$host = getenv('MYSQL_HOST');
		$port = 3306;
		$user = getenv('MYSQL_USERNAME');
		$pword = getenv('MYSQL_PASSWORD');
		$db = getenv('DB_NAME');
		try {
			$GLOBALS["mysqli"] = new mysqli($host, $user, $pword, $db);
		
			if(!($GLOBALS["mysqli"]->connect_errno==0)) {
				//ERROR: Database Connection Error.
				push_error_response("db-error");
				closeDb();
				print_response();
				exit();
			}
			
			// Set character set to prevent encoding issues with text
			$GLOBALS["mysqli"]->set_charset("utf8mb4");
		}
		catch(Exception  $e) {
			push_error_response("db-error");
			print_response();
		}
	}
	
	function closeDb() {
		$GLOBALS["mysqli"]->close();
	}
	
	$is_enquiry_inserted = false;
	function insertEnquiryData($name, $phone_no, $referred_by, $academic_course_type, $courses) {
		$stmt = $GLOBALS['mysqli']->stmt_init();
		$query = "INSERT INTO `enquiry_db_table`(`name`, `phone_no`, `referred_by_name`, `academic_course_type`, `courses`, `date_enquired`) VALUES(?, ?, ?, ?, ?, now())";
		$stmt->prepare($query);
		$stmt->bind_param("sssss", $name, 
								   $phone_no, 
								   $referred_by, 
								   $academic_course_type, 
								   $courses);
		if($stmt->execute()) {
			$GLOBALS['is_enquiry_inserted'] = true;
		}
		$stmt->close();
	}
?>