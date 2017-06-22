 <?php
 	$name = $_POST['username']; $pass = $_POST['password']; 
	include 'DBconnect.php';
	session_start();

 	$stmt = $mysqli->prepare('SELECT * FROM Users WHERE username = ? ');
	$stmt->bind_param('s', $name);
	if (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	$result = $stmt->get_result();
	//check if the user is already registered
	if(!($user = $result -> fetch_assoc()) == 0){
		header("Location: ". $_SERVER['HTTP_REFERER']);
		$_SESSION['regFailed'] = 0;
		exit;
	//insert the user to the DBBB
	}else
	{
		$sql = "INSERT INTO Users (id, username, pass) VALUES (default, '".$name."', '".$pass."');";
		if ($mysqli->query($sql) === TRUE) {
		header("Location: ". $_SERVER['HTTP_REFERER']);

		header("Location: ../index.php" );
			
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}

 ?> 