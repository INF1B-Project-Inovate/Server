<?php
try {
	
	$PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
	
	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
} catch(PDOException $ex) {
	trigger_error("Error connecting to DB. Message: " . $ex->getMessage(), E_USER_NOTICE);
}