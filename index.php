<style>
input { 
     background: none;
     border: none;
     color: #0066ff;
     text-decoration: underline;
     cursor: pointer; 
}
</style>

<html>

	<body>
		<a href="LoginHTML.php">Log In </a>
		<a href="RegisterHTML.php">Register</a>
	 	<script type="text/javascript" src="JS/MoviesScript.js"></script>
	 	 <link rel="stylesheet" type="text/css" href="CSS/rating-widget.css"> 
	 	<link rel="stylesheet" type="text/css" href="CSS/Movies.css"> 

	


	</body>
<?php
	 
	include 'PHP/DBconnect.php';
	include 'PHP/Movie.php';
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
		$rate_SQL='select avg(Rate) as avRate, id from User_Rating, Movie where Movie_id=id group by Movie_id;';
		//Fetching avg Ratings
		
		 $rate_result = $mysqli->query($rate_SQL);
		 $movies_rate=array();
		 while($rate_row = $rate_result->fetch_assoc()) {
		 	$movies_rate[$rate_row["id"]]=$rate_row["avRate"];

		 }

	
		//Printing Unique Genres
		echo '<select id=\'genre\' onchange=\'groupBy(this.value)\'>';
		echo '<option selected value>Select Genre</option>';
		foreach($genres_unique as $genre) {
			echo "<option value='$genre'>$genre</option>";
		
		}
		echo '</select>';

		echo '<button onclick=\'ascRate();\'> Sort by rating(asc)';
		echo '</button>';
		echo '<button onclick=\'descRate();\'> Sort by rating(desc)';
		echo '</button>';
		echo "<br>";

		//Printing Movies
		foreach($movies as $movie) {
			$genreClass = '';
			foreach($movie->getGenre() as $genre) {
				$genreClass = $genreClass . $genre .' '; 
				// echo $genre."<br>";
			}
			$genreInLower = strtolower($genreClass);
			if (!array_key_exists($movie->getId(),$movies_rate)) {
				$temppp =0;
			} else {
				$temppp = $movies_rate[$movie->getId()];
			}
			echo '<div value="'.$temppp.'" class="'.$genreInLower .'movie">'; 
			

			echo "<form action=\"PHP/MovieDetails.php\" id='frm' method=\"post\">";
			
			echo '<input type="submit" value="'.$movie->getTitle().'" name="moviee">';

			echo '</form>';
			echo "<img src=\"".$movie->getImage()."\" height=200 >";
			echo "<br>";
			echo "<br>";
			//2nisis skepsi: an uparxei vazeis tin timi tou xristi alliws sketo to rating widget
			//Nik skepsi: dld theloume panta to rating widget + to rating tou xristi AN uparxei
			if (array_key_exists($movie->getId(),$movies_rate)){
				echo 'Rating '. round($movies_rate[$movie->getId()], 2, PHP_ROUND_HALF_UP) .'/5<br>'; 
			}else
			{
				echo 'Rating 0/5';
			}
			echo '	<form method="post" > ' ;
			echo '<span class="starRating starRating'.$movie->getId().'">          	  ' ;


			echo '  <input id="rating5'.$movie->getId().'" type="radio" disabled name="rating" value="5" > ' ;
			echo '  <label for="rating5'.$movie->getId().'">5</label>                             ' ;
			echo '  <input id="rating4'.$movie->getId().'" type="radio" disabled name="rating" value="4"  > ' ;
			echo '  <label for="rating4'.$movie->getId().'">4</label>                             ' ;
			echo '  <input id="rating3'.$movie->getId().'" type="radio" disabled name="rating" value="3"  > ' ;
			echo '  <label for="rating3'.$movie->getId().'">3</label>                             ' ;
			echo '  <input id="rating2'.$movie->getId().'" type="radio" disabled name="rating" value="2"  > ' ;
			echo '  <label for="rating2'.$movie->getId().'">2</label>                             ' ;
			echo '  <input id="rating1'.$movie->getId().'" type="radio" disabled name="rating" value="1"  > ' ;
			echo '  <label for="rating1'.$movie->getId().'">1</label>                            ' ;
			echo '	</form>		 ' ;
												 
			//Check if avg rate existsss
			if (array_key_exists($movie->getId(),$movies_rate))
			{
				//set user ratings
				echo '<script> rate('.round($movies_rate[$movie->getId()], 0, PHP_ROUND_HALF_UP).',\''. $movie->getId() .'\'); </script>';
			}else
			{
				// echo '<script> rate(0,\''. $movie->getId() .'\'); </script>';


			}
			
					
			
			echo '</div>';
			// echo "<br>";
			// echo'------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';

		}
		
		
	}

?>
</html>