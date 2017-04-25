<html>
    <head>
        <title>Login page</title>
    </head>
    <body>
        <h1>Login</h1>
        <form name="login" action="loginValidation.php" method="post">
            Username: <input type="text" name="username"/><br>
            Password: <input type="password" name="password"/><br>
            <input type="Submit"/>
        </form>

	<a href="newAccount.php">Create New Account</a>

	<?php

	session_start();
	
	if(isset($_SESSION["login_error"])){
    		$error_message = $_SESSION['login_error'];
    		echo "<div> $error_message</div>";
	}
	
	?>

    </body>
</html>

