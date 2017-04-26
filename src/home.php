<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Refresh:0; url=login.php");
}
?>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome - Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/acc.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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
                <a class="navbar-brand" href="home.php">
                    <img src="http://placehold.it/150x50&text=ACC BBall" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="login.php">Sign Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
                    <!-- Features Section -->
        <div class="row">
            <div class = "col-lg-12">
                <span style="color: black; ">
                    <h2>Welcome
                        <?php
                            session_start();
                            echo $_SESSION["username"];
                        ?>
                    </h2>
                </span>
                <br>
            </div>
                <div class= "col-lg-4 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-dribbble"></i> Teams</h4>
                    </div>
                    <div class="panel-body">
                        <br>
                        <p>Check out your team and browse others in the ACC!</p>
                        <br>
                        <a href="teams.php" class="btn btn-primary">Teams</a>
                    </div>
                </div>
            	</div>

            	<div class= "col-lg-4 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-list"></i> Watchlist</h4>
                    </div>
                    <div class="panel-body">
                        <br>
                        <p>Check out your team and browse others in the ACC!</p>
                        <br>
                        <a href="watchlist.php" class="btn btn-primary">Watchlist</a>
                    </div>
                </div>
            	</div>

            	<div class= "col-lg-4 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-users"></i> League Play</h4>
                    </div>
                    <div class="panel-body">
                        <br>
                        <p>Check out your team and browse others in the ACC!</p>
                        <br>
                        <a href="league_play.php" class="btn btn-primary">Enter League</a>
                    </div>
                </div>
            	</div>




            	<!--
                <h3>Hello <div id="username">  </div></h3>
                <a href="teams.php">Teams</a>
				<a href="watchlist.php">Watchlist</a>
				<a href="league_play.php">League Play</a>
					-->
            </div>
        </div>
    </div>



</body>
</html>
