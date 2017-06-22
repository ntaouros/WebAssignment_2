<html>

	<body>
		
	 	<script type="text/javascript" src="http://localhost:81/WebAssignment_2/JS/MoviesScript.js"></script>
	 	 <link rel="stylesheet" type="text/css" href="http://localhost:81/WebAssignment_2/CSS/rating-widget.css"> 
	 	 <a href="http://localhost:81/WebAssignment_2/index.php">Home</a>
	


	</body>
<?php
	include 'DBconnect.php';
	include 'Movie.php';
	$sql = "SELECT * FROM Movie where title='".$_POST['moviee']."'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
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
	$rate_SQL='select avg(Rate) as avRate, id from User_Rating, Movie where Movie_id=id group by Movie_id;';
		//Fetching avg Ratings
		
		 $rate_result = $mysqli->query($rate_SQL);
		 $movies_rate=array();
		 while($rate_row = $rate_result->fetch_assoc()) {
		 	$movies_rate[$rate_row["id"]]=$rate_row["avRate"];

		 }

	$genreClass = '';
	foreach($movie->getGenre() as $genre) {
		$genreClass = $genreClass . $genre .' '; 
		// echo $genre."<br>";
	}
	$genreInLower = strtolower($genreClass);
	echo "<div class=\"$genreInLower moviee\">"; 
	echo '<div id=\'titlee\'>';
	echo  $movie->getTitle() ."<br> ";
	echo '</div>';


	echo 'Release Year: '. $movie->getReleaseYear() ."<br> ";
	
	echo "<img src=\"".$movie->getImage()."\" height=380 >";

	echo '<div id=\'description\'>';
	echo  $movie->getDescription() ."<br> ";
	echo '</div>';
	echo "<br>";
	echo 'Genres: '.$genreClass;
	echo "<br>";
	if (array_key_exists($movie->getId(),$movies_rate)){
				echo 'Rating '. round($movies_rate[$movie->getId()], 2, PHP_ROUND_HALF_UP) .'/5<br>'; 
	}else
	{
		echo 'Rating 0/5';
	}
	//2nisis skepsi: an uparxei vazeis tin timi tou xristi alliws sketo to rating widget
	//Nik skepsi: dld theloume panta to rating widget + to rating tou xristi AN uparxei
	echo '	<form method="post" > ' ;
	echo '<span class="starRating starRating'.$movie->getId().'">          	  ' ;


	echo '  <input id="rating5'.$movie->getId().'" type="radio"  name="rating" value="5" > ' ;
	echo '  <label for="rating5'.$movie->getId().'">5</label>                             ' ;
	echo '  <input id="rating4'.$movie->getId().'" type="radio"  name="rating" value="4"  > ' ;
	echo '  <label for="rating4'.$movie->getId().'">4</label>                             ' ;
	echo '  <input id="rating3'.$movie->getId().'" type="radio"  name="rating" value="3"  > ' ;
	echo '  <label for="rating3'.$movie->getId().'">3</label>                             ' ;
	echo '  <input id="rating2'.$movie->getId().'" type="radio"  name="rating" value="2"  > ' ;
	echo '  <label for="rating2'.$movie->getId().'">2</label>                             ' ;
	echo '  <input id="rating1'.$movie->getId().'" type="radio"  name="rating" value="1"  > ' ;
	echo '  <label for="rating1'.$movie->getId().'">1</label>                            ' ;
	echo '	</form>		 ' ;
	/*	"this.form.submit()"
		onchange=\'addRate('.$movie->getId().',this.value)\'
onchange=\'addRate('.$movie->getId().',this.value)\' 
onchange=\'addRate('.$movie->getId().',this.value)\'
onchange=\'addRate('.$movie->getId().',this.value)\'
onchange=\'addRate('.$movie->getId().',this.value)\'


	*/											 
	//Check if user has rated this movie
	if (array_key_exists($movie->getId(),$movies_rate))
			{
				//set user ratings
				echo '<script> rate('.round($movies_rate[$movie->getId()], 0, PHP_ROUND_HALF_UP).',\''. $movie->getId() .'\'); </script>';
			}else
			{
				echo '<script> rate(0,\''. $movie->getId() .'\'); </script>';


			}
?>

</html>