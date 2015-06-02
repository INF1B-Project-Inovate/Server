<?php
require_once "config.php";
require_once "db.php";

header('content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

try {
	$SQL = "SELECT Name, Score FROM " . DB_TABLE . " ORDER BY Score DESC LIMIT 10";
	
	$stmt = $PDO->query($SQL);
	$scores = $stmt->fetchAll(PDO::FETCH_NUM);
	
	$data = array();
	
	$x = 0;
	foreach($scores as $score) {
		foreach($score as $column) {
			$data[$x][] = array($column);
		}
		$x++;
	}
	
	$return = array(
		"c2array" => true,
		"size" => array(10, 2, 1),
		"data" => $data);
	echo json_encode($return);
	
} catch(PDOException $ex) {
	echo "An error occured. Error: " . $ex->getMessage();
}