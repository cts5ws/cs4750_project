<html>
    <head>
        <title>Create New Account</title>
    </head>
    <body>
        <h1>Create New Account</h1>
        <form action="insertNewAccount.php" method="post">
            Username: <input type="text" name="username"/><br>
            Password: <input type="password" name="password1"/><br>
	    Confirm Password: <input type="password" name="password2"><br>
            Favorite Team:
	    <select name="team">
  		<option value="University of Virginia">University of Virginia</option>
	    </select><br>	 

	    <input type="Submit"/>
        </form>

	<?php

        session_start();

        if(isset($_SESSION["reg_error"])){
                $error_message = $_SESSION['reg_error'];
                echo "<div> $error_message</div>";
        }

        ?>


    </body>
</html>
