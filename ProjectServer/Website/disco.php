<?php
$data = array();
for($x = 0; $x < 10; $x ++) {
	$data[$x] = array();
	for($y = 0; $y < 3; $y++) {
		$data[$x][$y] = array(
			rand(0, 65535),
			rand(100, 254),
			rand(100, 254),
			rand(10, 30) / 10
		);
	}		
}

$return = array(
	"c2array" => true,
	"size" => array(10, 3, 4),
	"data" => $data
);

header('Access-Control-Allow-Origin: *');
echo json_encode($return);