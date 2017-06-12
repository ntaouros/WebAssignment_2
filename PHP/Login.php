<?php
$name = $_POST['username']; $pass = $_POST['password']; 
	session_start();
	include 'DBconnect.php';
	$stmt = $mysqli->prepare('SELECT * FROM Users WHERE username = ? AND pass = ?');
	$stmt->bind_param('ss', $name, $pass);
	$exists = False;
	if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	
	
	
	$result = $stmt->get_result();
	if(($user = $result -> fetch_assoc()) == 0){
		echo '<div style = "font-size: 30px;">';
		echo "Wrong Username or Password</br>";
		echo 'Please Click <a href = "http://localhost:81/gfo/LogIn.html">here</a> to try again!</br>';
		echo '</div>';
		exit;
	}
?>