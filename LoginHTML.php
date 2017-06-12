<html>

	<body>


<form id = "loginform" action = "http://localhost:81/WebAssignment_2/PHP/Login.php" method = "post">
			<div>
				<div class = "row">
					
						<div class="form-group">
							<label for="text" style= "font-size: 25px;">Username:</label>
							<input type="text" name = "username" class="form-control text-center"  required id="username" >
						</div>
						<div class="form-group">
							<label for="pwd" style= "font-size: 25px;">Password:</label>
							<input type="password" name = "password" class="form-control text-center" id="password" required>
						</div>
						<?php 	session_start();
								if(isset($_SESSION['failed'])) echo 'Username or Password is incorect'; 
								session_destroy();

						?>
						<button type="submit" name = "submit" id = "login"  style = "width: 100%;margin-top:5px;font-size:20px;" class="btn btn-primary">Log In</button>
					
				</div>	
			</div>	
		</form>		
		 
	</body>


</html>