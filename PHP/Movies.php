
<html>
	<head>
	 	<script type="text/javascript" src="http://localhost:81/WebAssignment_2/JS/MoviesScript.js"></script>
	 	 <link rel="stylesheet" type="text/css" href="http://localhost:81/WebAssignment_2/CSS/rating-widget.css"> 

	</head>
	<body>
	
	
	
	
	
	</body>


</html>

<?php
	include 'DBconnect.php';
	include 'Movie.php';
	session_start();
	$movies=array();
	$sql = "SELECT * FROM Movie";
	$result = $mysqli->query($sql);
	$genres_unique=array();
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
				array_push($genres_unique,$row_choice["genre"]);
			}
			$movie=new Movie($movieID,$title,$releaseYear,$genres,$image,$description,$rating);
			array_push($movies,$movie);
		}
		$genres_unique = array_unique($genres_unique);
		
		//Fetching USer Ratings
		$user_sql = 'select Movie_id , Rate from User_Rating,Users where username=\''.$_SESSION['user'].'\' and Users.id=User_Rating.User_id;';
		$rate_result = $mysqli->query($user_sql);
		$movies_rate=array();
		while($rate_row = $rate_result->fetch_assoc()) {
			$movies_rate[$rate_row["Movie_id"]]=$rate_row["Rate"];
		}
		
	
		//Printing Unique Genres
		echo '<select id=\'genre\' onchange=\'groupBy(this.value)\'>';
		echo '<option selected value>Select Genre</option>';
		foreach($genres_unique as $genre) {
			echo "<option value='$genre'>$genre</option>";
		
		}
		echo '</select>';
		echo "<br>";

		//Printing Movies
		foreach($movies as $movie) {
			$genreClass = '';
			foreach($movie->getGenre() as $genre) {
				$genreClass = $genreClass . $genre .' '; 
				// echo $genre."<br>";
			}
			$genreInLower = strtolower($genreClass);
			echo "<div class=\"$genreInLower\">"; 
			echo  $movie->getTitle() ."<br> ";
			echo  $movie->getReleaseYear() ."<br> ";
			echo  $movie->getDescription() ."<br> ";
			echo "<img src=\"".$movie->getImage()."\"  >";
			echo "<br>";
			echo $genreClass;
			echo "<br>";
			//2nisis skepsi: an uparxei vazeis tin timi tou xristi alliws sketo to rating widget
			//Nik skepsi: dld theloume panta to rating widget + to rating tou xristi AN uparxei
			echo '	<form>													  ' ;
			echo '<span class="starRating starRating'.$movie->getId().'">          	  ' ;
			echo '  <input id="rating5" type="radio"  name="rating" value="5"> ' ;
			echo '  <label for="rating5">5</label>                             ' ;
			echo '  <input id="rating4" type="radio"name="rating" value="4"> ' ;
			echo '  <label for="rating4">4</label>                             ' ;
			echo '  <input id="rating3" type="radio"  name="rating" value="3"> ' ;
			echo '  <label for="rating3">3</label>                             ' ;
			echo '  <input id="rating2" type="radio"  name="rating" value="2"> ' ;
			echo '  <label for="rating2">2</label>                             ' ;
			echo '  <input id="rating1" type="radio"  name="rating" value="1"> ' ;
			echo '  <label for="rating1">1</label>                            ' ;
			echo '</span>													  ' ;
			echo '	</form>		 ' ;
			/*	
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
				echo '<script> rate('.$movies_rate[$movie->getId()].',\''. $movie->getId() .'\'); </script>';
			}
					
			
			echo '</div>';
			echo "<br>";
			echo'------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';

		}
		
		
	}


?>