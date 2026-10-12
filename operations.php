<?php
	//set empty response.
	function set_empty_response() {
		$GLOBALS["response"] = ["success_msg"=>"false", "errors"=>[]];
	}
	
	//set success_msg.
	function set_success_response($msg) {
		$GLOBALS["response"]["success_msg"] = $msg;
	}
	
	//push error into response.
	function push_error_response($error_msg) {
		array_push($GLOBALS["response"]["errors"], $error_msg);
	}
	
	//prints response in JSON.
	function print_response() {
		echo json_encode($GLOBALS["response"]);
	}
	
	function isValueEmpty($value) {
		if($value=="" || $value==NULL)
			return true;
		else
			return false;
	}
	
	//Name Validation Check
	function isNameValid($name) {
		return preg_match("/^[a-z\. ]*$/i", $name);
	}
	
	//Phone-No Validation Check
	function isPhoneNoValid($phone_no) {
		return preg_match("/^[0-9\+\\- ]*$/", $phone_no); 
	}
?>