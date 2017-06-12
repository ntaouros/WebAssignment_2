<?php
	class Movie
	{
		var $id;
		var $title;
		var $releaseYear;
		var $genre = array();
		var $image;
		var $description;
		public function __construct($id, $title, $releaseYear, array $genre, $image, $description) {
			$this->id = $id;	
			$this->title = $title;
			$this->releaseYear = $releaseYear;
			$this->genre = $genre;
			$this->image = $image;
			$this->description = $description;
		}

		//Getters
		public function getId() {
		  return $this->id;
		}

		public function getTitle() {
		  return $this->title;
		}
	   
		public function getReleaseYear() {
		  return $this->releaseYear;  
		}
	 
		public function getGenre() {
		  return $this->genre;
		}
	 
	 	public function getImage() {
		  return $this->image;
		}

	 	public function getDescription() {
		  return $this->description;
		}

		//Setters
		public function setId($id) {
		  $this->id = $id;    
		}
	 
		public function setTitle($title) {
		  $this->title = $title;    
		}
	 
		public function setReleaseYear($releaseYear) {
		  $this->releaseYear = $releaseYear;    
		}
	 
		public function setGenre($genre) {
		  $this->genre = $genre;    
		}

		public function setImage($image) {
		  $this->image = $image;    
		}

		public function setDescription($description) {
		  $this->description = $description;    
		}
	}
		


?>