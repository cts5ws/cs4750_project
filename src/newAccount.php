<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create New Account</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/acc.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="login.php">
                    <img src="http://placehold.it/150x50&text=ACC BBall" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="login.php">Home</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Create New Account</h1>
                <form action="insertNewAccount.php" method="post">
                    <div class="form-group">
                        <label for="text">Username:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <!--Username: <input type="text" name="username"/><br> -->
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password1">
                    </div>
                    <!--Password: <input type="password" name="password1"/><br> -->
                    <div class="form-group">
                        <label for="password2">Confirm Password:</label>
                        <input type="password" class="form-control" name="password2">
                    </div>
        	        <!--Confirm Password: <input type="password" name="password2"><br> -->
                    <h5>Favorite Team:</h5>
        	    <select name="team">
          	      <option value="University of Virginia">University of Virginia</option>
        	      <option value="Duke University">Duke University</option>
        	      <option value="University of North Carolina">University of North Carolina</option>
        	    </select><br>	 
                <br>
        	    <input type="submit" class="btn btn-info" value="Submit">
                </form>

            </div>
        </div>
    </div>
	<?php

        session_start();

        if(isset($_SESSION["reg_error"])){
                $error_message = $_SESSION['reg_error'];
                echo "<div> $error_message</div>";
        }

        ?>


    </body>
</html>
