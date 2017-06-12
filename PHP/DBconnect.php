<?php
	mysqli_report(MYSQLI_REPORT_STRICT);
	try {
		$mysqli = new mysqli('localhost:3306', 'root', '0000', 'Movies') ;
	} catch (Exception $e ) {
		echo '<div style = "font-size: 25px;">';
		echo "Service unavailable</br>";
		echo "We are sorry </br>";  
		echo '</div>';
		exit;
	}
	


?>