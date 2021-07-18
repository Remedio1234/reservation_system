<?php
ini_set('display_errors', 'on');
//ob_start("ob_gzhandler");
//error_reporting(E_ALL);

//start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//database connection setup
$dbHost = "mysql:host=localhost;dbname=db_dbror";
$dbUser = 'root';
$dbPass = '';

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
	if (isset($_POST)) {
		foreach ($_POST as $key => $value) {
			$_POST[$key] =  trim(addslashes($value));
		}
	}
	
	if (isset($_GET)) {
		foreach ($_GET as $key => $value) {
			$_GET[$key] = trim(addslashes($value));
		}
	}
}

	

?>