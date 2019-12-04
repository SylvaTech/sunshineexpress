<?php 
	date_default_timezone_set("Africa/Lagos");
	require_once('config.php');
	require_once('functions.php');
	
	$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
	
	try {
	    $con = new PDO($dsn, DB_USER, DB_PASS);
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	/*Clean vars*/
	$_GET = sanitize($_GET);
	$_REQUEST = sanitize($_REQUEST);
	$_POST = sanitize($_POST);
	$_SERVER = sanitize($_SERVER);
	$_FILES = sanitize($_FILES);
 
	//$GLOBALS['pdo'] = $con;
	require_once('Crud_class.php');
	$crud = new Crud($con);

?>