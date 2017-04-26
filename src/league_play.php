<?php
?>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>League Play</title>

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

        function predicateBy(prop){
            return function(a,b){
                if( a[prop] > b[prop]){
                    return -1;
                }else if( a[prop] < b[prop] ){
                    return 1;
                }
                return 0;
            }
        }

        function getMyLeagues(){
            return $.ajax({
                url : "loadLeagues.php",
                success :
                    function(data){
                        console.log(data);
                        var leagues = JSON.parse(data);
                        var arrayLength = leagues.length;
                        for(var i = 0; i < arrayLength; i++){
                            $('#league').append($('<option>', {
                                value : leagues[i]["League_ID"],
                                text : leagues[i]["League_Name"]
                            }));
                        }
                    }
            });
        }

        function getAdminLeagues(){
            return $.ajax({
                url : "loadAdminTeams.php",
                success :
                    function(data){

                        var leagues = JSON.parse(data);

                        var arrayLength = leagues.length;
                        for(var i = 0; i < arrayLength; i++){
                            $('#my_leagues').append($('<option>', {
                                value : leagues[i]["League_ID"],
                                text : leagues[i]["League_Name"]
                            }));
                        }
                    }
            });
        }

        function getData(){
            var leagueID = document.getElementById("league").value;
            var myLeagueID = document.getElementById("my_leagues").value;

            $("tr[id=row]").remove();

            $.ajax({
                url : "loadLeagueData.php",
                method : "POST",
                data:{leagueID : leagueID,
                        myLeagueID : myLeagueID},
                success:
                    function(data){

                        console.log(data);

                       var info = JSON.parse(data);

                        var table1 = info.table1;
                        var table2 = info.table2;
                        var watchlists = info.watchlists;

                        table1.sort(predicateBy("avg"));

                        var arrayLength = table1.length;
                        for(var i = 0; i < arrayLength; i++){
                            var row = '<tr id="row"><td>'
                                .concat(table1[i]['Username']).concat('</td><td>')
                                .concat(table1[i]['Watchlist_Name']).concat('</td><td>')
                                .concat(table1[i]['avg']).concat('</td></tr>');

                            $('#leagues').append(row);
                        }

                        var arrayLength = table2.length;
                        for(var i = 0; i < arrayLength; i++){
                            var row = '<tr id="row"><td>'
                                .concat(table2[i]['Username']).concat('</td></tr>');

                            $('#my_league_table').append(row);
                        }

                        var arrayLength = watchlists.length;
                        for(var i = 0; i < arrayLength; i++){
                            $('#watchlist').append($('<option>', {
                                value : watchlists[i]["Watchlist_ID"],
                                text : watchlists[i]["Watchlist_Name"]
                            }));
                        }
                    }
            });
        }

        function addFan(){

            var username = document.getElementById('username').value;
            var leagueID = document.getElementById('my_leagues').value;


            return $.ajax({
                url : "addFanToLeague.php",
                method : "POST",
                data:{username : username,
                    leagueID : leagueID},
                success :
                    function(data){
                        var info = JSON.parse(data);

                        if(info.invalid != null){
                            alert(info.invalid);
                        }else {
                            alert(info.valid);
                        }
                    }
            });
        }

        function removeFan(){

            var username = document.getElementById('username').value;
            var leagueID = document.getElementById('my_leagues').value;
            var watchlist = document.getElementById('watchlists').value;

            return $.ajax({
                url : "removeFanFromLeague.php",
                method : "POST",
                data:{username : username,
                    leagueID : leagueID},
                success :
                    function(data){

                        console.log(data);

                        var info = JSON.parse(data);
                        alert(info.valid);

                    }
            });
        }

        function updateWatchlist(){
            var leagueID = document.getElementById("league").value;
            var watchlist_id = document.getElementById("watchlist").value;

            console.log(leagueID);
            console.log(watchlist_id);

            return $.ajax({
                url : "updateWatchlist.php",
                method : "POST",
                data:{leagueID : leagueID,
                    watchlist_id : watchlist_id},
                success :
                    function(data){
                        alert(data);
                    }
            });
        }

        getAdminLeagues();

        var deferred = getMyLeagues();
        $.when(deferred).done(function() {
            getData();
        });

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
                        <a href="watchlist.php">Watchlist</a>
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

                <h1><i class="fa fa-fw fa-users"></i> League Play</h1>
                <h4><font color=darkorange>Who has the best Roster in the ACC?</font></h4>
			
			</div>
        </div>
  


    <h2 align="center">My Leagues</h2>
    <div align="center" id="league_select">
        <select id="league">
        </select>
    </div>

    <div id="tables">
        <table id="leagues" class="table table-hover" style="width: 70%" align="center">
            <thead>
            <tr>
                <th>Username</th>
                <th>Watchlist Name</th>
                <th>Average</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <div align="center" id="watchlist_select">
        <select id="watchlist">
        </select>
    </div>

    <div class="row top100" style="text-align: center;">
        <br>
        <button onclick="updateWatchlist();" type="button" class="btn btn-primary" >Swap Watchlist</button>
    </div>

    <br><br>

    <div class='row'>
        <h3 align="center">League Management</h3>
        <div class='col-lg-6 text-center'>
            <h3>Edit League</h3>
            <div id="league_management_select">
                <select id="my_leagues">
                </select>
               
            
            </div>
            <br>
            <a href="createLeague.php"><button type="button" class="btn btn-info" >Create League</button></a>
            <a href="removeLeague.php"><button type="button" class="btn btn-danger" >Remove League</button></a>

        </div>
        <div class='col-lg-6 text-center'>
             <div id="tables">
                <table id="my_league_table" class="table table-hover" style="width: 40%" align="center">
                    <thead>
                    <tr>
                        <th>Username</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <input id="username" name="username" type="text">
           
            <button onclick="addFan();" type="button" class="btn btn-info" >Add User</button>
            <button onclick="removeFan();" type="button" class="btn btn-danger" >Remove User</button>
         </div>

    </div>
    <br>
    <br>
    <div align="center">
        <button class="btn btn-primary" onclick="getData();">Load Team Data</button>
    </div>

  </div>

</body>
</html>