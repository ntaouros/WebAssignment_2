<?php
	class Users
	{
		var $id;
		var $username;
		var $password;
		public function __construct($id, $username, array $password) {
			$this->id = $id;
			$this->username = $username;
			$this->password = $password;
		}
		public function getId() {
		  return $this->id;
		}
	   
		public function getUsername() {
		  return $this->username;  
		}
	 
		public function getPassword() {
		  return $this->password;
		}
	 
		public function setId($id) {
		  $this->id = $id;    
		}
	 
		public function setUsername($username) {
		  $this->username = $username;    
		}
	 
		public function setPassword($password) {
		  $this->password = $password;    
		}
	}
		


?>