<?php

/*
 * Include the config and the pdo connection
 */

require_once "config.php";
require_once "db.php";

/*
 * Check is there is data posted, if so insert it in a safe way.
 */

if(isset($_POST["name"]) && isset($_POST["score"]) && $_POST["name"] != "" && $_POST["score"] != "") {
	try {
		$SQL = "INSERT INTO " . DB_TABLE . "(Name, Score) VALUES (:name, :score)";
		$stmt = $PDO->prepare($SQL);
		
		$dataToInsert = array(
			":name" 	=> $_POST["name"],
			":score" 	=> $_POST["score"]
			);
		
		$result = $stmt->execute($dataToInsert);
		exit($result);
		
	} catch(PDOException $ex) {
		trigger_error("Error processing data. Message: " . $ex->getMessage(), E_USER_NOTICE);
	}
	
	/*
	 * Or print a form to add data (for debugging purpose)
	 */
} elseif(DEBUG == true) {
	?>
	
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>DEBUG :: insert test data</title>
			<link rel="stylesheet" type="text/css" href="style.css" />
		</head>
		<body>
			<div id="container">
			<a href="index.php">View scores</a>
			</br>
			<img src="./images/nethero_white.png" />
			<div id="content">
			<h1>Insert highscore into database</h1>
			</br>
			<form name="insert" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				Insert name:</br>
				<input type="text" name="name" value=""></br>
				Insert score:</br>
				<input type="text" name="score" value=""></br>
				</br>
				<input type="submit" name="Submit" value="Insert">
			</form>
			<br />
			<br />
			<div id="footer">
				INF1B Byte Busters 2015
			</div>
			</div>
			</div>
		</body>
	</html>
	
	<?php
} else {
	header("HTTP/1.1 401 Unauthorized");
	echo "<H1>OPERATION NOT PERMITED</H1>";
}
?>

