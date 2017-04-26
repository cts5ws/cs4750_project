<?php
?>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ACC Teams</title>

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

        function getData(){
            var teamID = document.getElementById("team").value;

            $("tr[id=row]").remove();

            $.ajax({
                url : "loadTeamData.php",
                method : "POST",
                data:{teamID : teamID},
                success:
                    function(data){

                        var info = JSON.parse(data);

                        var coaches = info.coaches;
                        var players = info.players;
                        var matches = info.matches;
                        var teams = info.teams;

                        var arrayLength = coaches.length;
                        for(var i = 0; i < arrayLength; i++){

                            var row = '<tr id="row"><td>'.concat(coaches[i]['Name']).concat('</td><td>')
                                .concat(coaches[i]['Title']).concat('</td></tr>');
                            $('#coaches').append(row);
                        }

                        var arrayLength = players.length;
                        for(var i = 0; i < arrayLength; i++){

                            var row = '<tr id="row"><td>'.concat(players[i]['Name']).concat('</td><td>')
                                .concat(players[i]['Number']).concat('</td><td>')
                                .concat(players[i]['Position']).concat('</td><td>')
                                .concat(players[i]['Year']).concat('</td><td>')
                                .concat(players[i]['Rating']).concat('</td></tr>');
                            $('#players').append(row);
                        }

                        var arrayLength = teams.length;
                        var teamMap = new Array();
                        for(var i = 0; i < arrayLength; i++){
                            teamMap[teams[i]['Team_ID']] = teams[i]['Name'];
                        }

                        var arrayLength = matches.length;
                        for(var i = 0; i < arrayLength; i++){

                            var row = '<tr id="row"><td>'.concat(  teamMap[matches[i]['Team1_ID']]  ).concat('</td><td>')
                                .concat(  teamMap[matches[i]['Team2_ID']]  ).concat('</td><td>')
                                .concat(matches[i]['Team1_Score']).concat('</td><td>')
                                .concat(matches[i]['Team2_Score']).concat('</td><td>')
                                .concat(matches[i]['Date']).concat('</td><td>')
                                .concat(matches[i]['Location']).concat('</td></tr>');

                            $('#matches').append(row);
                        }

                    }
            });
        }

        function getTeamsToAdd(){
            return $.ajax({
                url : "loadTeamsToAdd.php",
                success :
                    function(data){
                        var teams = JSON.parse(data);
                        console.log(data);
                        var arrayLength = teams.length;
                        for(var i = 0; i < arrayLength; i++){
                            $('#team').append($('<option>', {
                                value : teams[i]["Team_ID"],
                                text : teams[i]["Name"]
                            }));
                        }
                    }
            });
        }

        getTeamsToAdd();
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
                    <a href="watchlist.php">Watchlist</a>
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

            <h1><i class="fa fa-fw fa-dribbble"></i> Add Teams to Team Page</h1>
        </div>
    </div>
</div>

<h3 align="center">Team</h3>
<form action="handleAddTeam.php" method="post">
    <div align="center" id="team_select">
        <select id="team" name="team">
        </select>
        <br>
        <input type="submit" value="Add Team">
    </div>
</form>

</body>
</html>