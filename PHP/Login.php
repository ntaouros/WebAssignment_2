<?php
	$name = $_POST['username']; $pass = $_POST['password']; 
	
	session_start();
	$_SESSION['user']=$name;
	include 'DBconnect.php';
	$stmt = $mysqli->prepare('SELECT * FROM Users WHERE username = ? AND pass = ?');
	$stmt->bind_param('ss', $name, $pass);
	if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	
	$result = $stmt->get_result();
	if(($user = $result -> fetch_assoc()) == 0){
		$failed=true;
		$_SESSION['failed'] = $failed;
		header("Location: ". $_SERVER['HTTP_REFERER']);
		exit;
	}else
	{
		header("Location: http://localhost:81/WebAssignment_2/PHP/Movies.php" );
	}
	
	

?>