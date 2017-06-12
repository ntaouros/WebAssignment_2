<html>

	<body>
	
	HELO
	
	
	
	</body>


</html>

<?php
	include 'DBconnect.php';
	include 'Movie.php';
	$movies=array();
	$sql = "SELECT * FROM Movie";
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
			

			$sql_genre="select genre_description as genre from genre, movie_genre where Genre_id=Genre.id and movie_id=".$movieID ;
			$result_choice = $mysqli->query($sql_genre);
			while($row_choice = $result_choice->fetch_assoc()) { //Looping through Genres
				array_push($genres,$row_choice["genre"]);
			}
			$movie=new Movie($movieID,$title,$releaseYear,$genres,$image,$description,$rating);
			array_push($movies,$movie);
		}

		
		foreach($movies as $movie) {
		
		echo  $movie->getTitle() ."<br> ";
		echo  $movie->getReleaseYear() ."<br> ";
		echo  $movie->getDescription() ."<br> ";
		echo "<img src=\"".$movie->getImage()."\"  >";


		foreach($movie->getGenre() as $genre) {
			echo $genre."<br>";
		}
		echo "<br>";

		}
		
		
	}


?>