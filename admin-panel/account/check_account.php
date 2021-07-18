<?php include_once("../../library/config.php"); ?>
<?php require_once('../../api/user.api.php'); ?>
<?php
	if(isset($_POST)) {
        extract($_POST);
		$db->userLogin($username, $password);
	} else {
		return json_encode(['response' => 'failed']);
	}
	
?>