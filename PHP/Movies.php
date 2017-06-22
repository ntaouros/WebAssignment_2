
<html>
	<head>
	 	<script type="text/javascript" src="http://localhost:81/WebAssignment_2/JS/MoviesScript.js"></script>
	 	 <link rel="stylesheet" type="text/css" href="http://localhost:81/WebAssignment_2/CSS/rating-widget.css"> 
	 	<link rel="stylesheet" type="text/css" href="http://localhost:81/WebAssignment_2/CSS/Movies.css"> 
			<a href="http://localhost:81/WebAssignment_2/PHP/logOut.php">Log out</a>

	</head>
	<body>
	
	
	
	
	
	</body>


</html>

<?php
	include 'DBconnect.php';
	include 'Movie.php';
	session_start();
	$movies=array();
	$sql = "SELECT * FROM Movie order by title";
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
		$user_sql = 'select Movie_id , Rate from User_Rating,Users where username=\''.$_SESSION['user'].'\' and Users.id=User_Rating.User_id ;';
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
			
			echo "<form action=\"http://localhost:81/WebAssignment_2/PHP/MovieDetailsLog.php\" id='frm' method=\"post\">";
			
			echo '<input type="submit" value="'.$movie->getTitle().'" name="moviee">';

			echo '</form>';
			echo "<img src=\"".$movie->getImage()."\" height=200 >";
			echo "<br>";
			echo "<br>";
			if (array_key_exists($movie->getId(),$movies_rate)){
				echo 'Rating '. round($movies_rate[$movie->getId()], 2, PHP_ROUND_HALF_UP) .'/5<br>'; 
			}else
			{
				echo 'Rate not submitted';
			}
			//2nisis skepsi: an uparxei vazeis tin timi tou xristi alliws sketo to rating widget
			//Nik skepsi: dld theloume panta to rating widget + to rating tou xristi AN uparxei
			echo '	<form method="post" action="http://localhost:81/WebAssignment_2/PHP/Insert.php" onSubmit="return ajaxSubmit(this);"> ' ;
			echo '<span class="starRating starRating'.$movie->getId().'">          	  ' ;
			
			echo '<input type=\'text\' name="user"  value="'.$_SESSION['user'].'" hidden >';
			echo '<input type=\'text\' name="movieId"  value="'.$movie->getId().'" hidden >';



			echo '  <input id="rating5'.$movie->getId().'" type="radio"  name="rating" value="5"  onchange=\'this.form.submit()\'> ' ;
			echo '  <label for="rating5'.$movie->getId().'">5</label>                             ' ;
			echo '  <input id="rating4'.$movie->getId().'" type="radio"  name="rating" value="4"  onchange=\'this.form.submit()\'> ' ;
			echo '  <label for="rating4'.$movie->getId().'">4</label>                             ' ;
			echo '  <input id="rating3'.$movie->getId().'" type="radio"  name="rating" value="3"  onchange=\'this.form.submit()\'> ' ;
			echo '  <label for="rating3'.$movie->getId().'">3</label>                             ' ;
			echo '  <input id="rating2'.$movie->getId().'" type="radio"  name="rating" value="2"  onchange=\'this.form.submit()\'> ' ;
			echo '  <label for="rating2'.$movie->getId().'">2</label>                             ' ;
			echo '  <input id="rating1'.$movie->getId().'" type="radio"  name="rating" value="1"  onchange=\'this.form.submit()\'> ' ;
			echo '  <label for="rating1'.$movie->getId().'">1</label>                            ' ;
			echo '</span>													  ' ;
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
				echo '<script> rate('.$movies_rate[$movie->getId()].',\''. $movie->getId() .'\'); </script>';
			}
					
			
			echo '</div>';
			// echo "<br>";
			// echo'------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';

		}
		
		
	}


?>