<?php
ini_set('display_errors', 'on');
//ob_start("ob_gzhandler");
//error_reporting(E_ALL);

//start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//database connection setup
$dbHost = "mysql:host=localhost;dbname=id17288628_db_dbror";
$dbUser = 'id17288628_root';
$dbPass = '#vTYy8&zV1H]UjQ7';

//Project data
$site_title 	= 'DBROR AND MAPPING MAPPING MANAGEMENT SYSTEM';
$email_id 		= 'youremail@gmail.com';
$data 			= array();

$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$webRoot  = str_replace(array($docRoot, 'library/config.php'), '', $thisFile);
$srvRoot  = str_replace('library/config.php', '', $thisFile);

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);

//Connection ready
$dbConn = new stdClass();
try { 
	$dbConn = new PDO($dbHost, $dbUser, $dbPass); 
} catch (Exception $ex) { 
	die("Error: ". $ex->getMessage()); 
} 


if (!get_magic_quotes_gpc()) {
	if (isset($_REQUEST)) {
		// foreach ($_REQUEST as $key => $value) {
		// 	$_REQUEST[$key] =  trim(addslashes($value));
		// }
		$stillNotSafeData = array();
		foreach ($_REQUEST as $key => $value) {
			if (!is_array($value)) {
				$stillNotSafeData[$key] = @trim(addslashes($value));
			} else {
				foreach ($value as $innerKey => $innerValue) {
					$stillNotSafeData[$key][$innerKey] = @trim(addslashes($innerValue));
				}
			}
		}
	}
	
	// if (isset($_GET)) {
	// 	foreach ($_GET as $key => $value) {
	// 		$_GET[$key] = trim(addslashes($value));
	// 	}
	// }
}

	

?>