<html>

	<body>
	
	HELO
	
	
	
	</body>


</html>

<?php
	$movies=array();
	$sql = "SELECT * FROM Movies";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { // looping through Movies
			$movieID=$row["id"];
			$title=$row["title"];
			$releaseYear=$row["realease_year"];
			$genres= array();
			$image=$row["image"];
			$description=$row["description"];
			$rating=$row["rating"]; //TODO check wether rating isset (or something)
			

			$sql_genre="select genre_description from genre, movie_genre where Genre_id=Genre.id and movie_id=".$movieID ."as genre";
			$result_choice = $mysqli->query($sql_choice);
			while($row_choice = $result_choice->fetch_assoc()) { //Looping through Genres
				array_push($genres,$row_choice["genre"]);
			}
			$movie=new Movie($movieID,$title,$releaseYear,$genres,$description,$rating);
			array_push($movies,$movie);
		}

		
		foreach($movies as $movie) {
		
		echo  $movie->getTitle() ."<br> ";
		foreach($movie->getGenre() as $genre) {
			echo $genre."<br>";
		}
		echo "<br>";

		$i++;
		}
		
		
	}


?>