<?php

require_once "config.php";
require_once "db.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bytebusters :: HALL OF FAME</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div id="container">
			<?= DEBUG == true ? "<a href='insert.php'>Insert Data</a><br />" : "" ?>
			<img src="./images/nethero_white.png" />
			<div id="content">
				<?php      
				
				$SQL = "SELECT Name, Score FROM " . DB_TABLE . " ORDER BY Score DESC LIMIT 10";
			
				$stmt = $PDO->query($SQL);
				$scores = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				echo "<h1>Hall of Fame</h1>";
				echo "<table class='table-style-two' width='100%'>";
				echo "<tr><th>Name</th><th>Score</th></tr>";
				
				foreach($scores as $score) {
					echo "<tr>";
					echo "<td>" . $score["Name"] . "</td>";
					echo "<td>" . $score["Score"] . "</td>";
					echo "</tr>";
				}
				
				echo "</table>";
				?>
				<br />
				<br />
				<div id="footer">
				  INF1B Byte Busters 2015
				</div>
			</div>
        </div>
    </body>
</html>
