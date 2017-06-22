<!DOCTYPE html>

<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width; maximum-scale=1; minimum-scale=1;">
        <title> Register </title>
        <link href="menu.css" rel="stylesheet" type="text/css">
        <link href="register.css" rel="stylesheet" type="text/css">
        <link media="screen and (min-width: 0px) and (max-width:425px)" href="mobile.css" type="text/css" rel="stylesheet"/>
    </head>

    <body>
        <h3 class="title"> Registration </h3>

        <form action="PHP/Register.php" method = "post">
            <div>
                <label class="required">
                    <strong> Username  </strong>
                </label>
                <input type="text" name="username" placeholder="Enter Username" id="username" required>
                <br><br>
                <label class="required">
                    <strong> Password </strong>
                </label>

                <input type="password" name="password" placeholder="Enter Password" id="password" required>
            </div>  
            <?php   
                    session_start();
                    if(isset($_SESSION['regFailed']))       echo 'User already exists <br>'; 
                    session_destroy();

            ?>
            <br>
            <button type="submit" class="signupbtn"> Register </button>
            <a href="LoginHTML.php">Log In </a>

            
        </form>


    </body>
</html>
