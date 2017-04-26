<?php
?>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Watchlist</title>

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

    <script src="http://code.jquery.com/jquery-1.11.3.js"></script>

    <script>
        $(document).ready();

        function getPlayers(){
            $.ajax({
                url : "loadPlayers.php",
                success :
                    function(data){

                        console.log(data);

                        var players = JSON.parse(data);

                        var arrayLength = players.length;
                        for(var i = 0; i < arrayLength; i++){
                            $('#player').append($('<option>', {
                                value : players[i]["Player_ID"],
                                text : players[i]["Name"]
                            }));
                        }
                    }
            });
        }
        getPlayers();
    </script>


    <script>
    	$(document).ready();
    	
    	function getWatchlist(){
			$.ajax({
                url : "loadLists.php",
                success :
                    function(data){

                        console.log(data);

                        var lists = JSON.parse(data);

                        var arrayLength = lists.length;
                        for(var i = 0; i < arrayLength; i++){
                            $('#watchlist').append($('<option>', {
                                value : lists[i]["Watchlist_ID"],
                                text : lists[i]["Watchlist_Name"]
                            }));
                        }
                    }
            });
    	}
    	getWatchlist();
    </script>

    <script>
    	$(document).ready();
    	
    	function getWatchlist2(){
			$.ajax({
                url : "loadLists.php",
                success :
                    function(data){

                        console.log(data);

                        var lists = JSON.parse(data);

                        var arrayLength = lists.length;
                        for(var i = 0; i < arrayLength; i++){
                            $('#watchlist2').append($('<option>', {
                                value : lists[i]["Watchlist_ID"],
                                text : lists[i]["Watchlist_Name"]
                            }));
                        }
                    }
            });
    	}
    	getWatchlist2();
    </script>





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
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="teams.php">Teams</a>
                    </li>
                    <li>
                        <a href="league_play.php">League Play</a>
                    </li>
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
    	<div class="row">
    		<div class="col-lg-12">
    			 <h1><i class="fa fa-fw fa-list"></i>Watchlist Manager</h1>
    			 <h4>Build your best roster, beat the best roster.</h4>
    		</div>
    	</div>
    <div class="row">
    	<div class='col-lg-12 text-center'>	

			<h3>My Watchlists:</h3>
			<form action="#" method="post">
		        <select id="watchlist">
		        </select>
		        <input type="submit" name="load" class="btn btn-info" value=">>">
		    </form>

		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<br>
			<a href='addWatchlist.php' class="btn btn-info">Create a Watchlist</a>
			<a href='removeWatchlist.php' class="btn btn-info">Remove Watchlist</a>
			<br>
		</div>
	</div>

        <div class="row">
            <div class="col-lg-12">
            	<br>
            	<br>
                <div class="table-responsive">          
				  <table class="table table-hover">
				  	<thead>
				  		<tr>
					        <th>Player</th>
					        <th>Number</th>
					        <th>Position</th>
					        <th>Year</th>
					        <th>Rating</th>
					    </tr>
				  	</thead>
				  	<tbody>
				  		<tr>
                <?php
                //echo "<table style='border: solid 1px black;'>";
                class TableRows extends RecursiveIteratorIterator { 
                    function __construct($it) { 
                        parent::__construct($it, self::LEAVES_ONLY); 
                    }

                    function current() {
                        return "<td>" . parent::current(). "</td>";
                    }

                    function beginChildren() { 
                        echo "<tr>"; 
                    } 

                    function endChildren() { 
                        echo "</tr>" . "\n";
                    } 
                } 
                session_start();
                $fan_id = $_SESSION["fan_id"];

                    include_once("./library.php"); // To connect to the database


                    $con = new PDO("mysql:host=$SERVER;dbname=$DATABASE", $USERNAME, $PASSWORD);
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT Name, Number, Position, Year, Rating FROM Watchlist NATURAL JOIN SelectedFor NATURAL JOIN Player NATURAL JOIN Creates where Fan_ID = $fan_id";
				    $stmt = $con->prepare ($sql); 
                    $stmt->execute();

                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                        echo $v;
                    }
                    
                    ?>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div> <!-- end row -->
            <div class='row'>
            	<div class='col-lg-12 text-center'>
            	<br>
            	<h4>Add Player:</h4>
            	<form action="handleAddDrop.php" method="post">
					        <select id="player" name="player">
					        </select>

		        			<select id="watchlist2" name="watchlist2">
		        			</select>

					       	<input type="submit" name="add" class="btn btn-info" value="add">
					       	<input type="submit" name="drop" class="btn btn-danger" value="drop">
				</form>


			    			<br>
			    			<br>

				</div>



            </div>

        </div>
    </div>

</body>
</html>