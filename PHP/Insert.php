<?php
	include 'DBconnect.php';
	function post($key) {
	    if (isset($_POST[$key]))
	        return $_POST[$key];
	    return false;
	}

	$sqlUserId = "SELECT id FROM Users where username='".post('user')."'";
	$result = $mysqli->query($sqlUserId);
	$row = $result->fetch_assoc();
	$userIdd= $row['id'];
	echo(post('movieId'));
	// $sql = $mysqli->prepare("INSERT INTO User_Rating (User_id, Movie_id, Rate) VALUES(User_id=:userId, Movie_id=:movieId,Rate=:rate) ON DUPLICATE KEY UPDATE Rate=:rate");
	$movieIdd=post('movieId');
	$sql = "INSERT INTO User_Rating (User_id, Movie_id, Rate) VALUES (" .(int)$userIdd .", '".(int)$movieIdd."', '".post('rating')."') ON DUPLICATE KEY UPDATE  Rate='".post('rating')."';";


	if ($mysqli->query($sql) === TRUE) {
			echo 'MPIKE ORE';
			
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}



	// $sql->bind_param(':userId',(int)$userIdd);
 //   	$sql->bind_param(':movieId',intval(post('movieId')));
 //   	$sql->bind_param(':rate',post('rating'));


?>