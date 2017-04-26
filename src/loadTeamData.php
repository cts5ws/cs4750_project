<?php

session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$team_id = $_POST["teamID"];

//get coaches
$result = mysqli_query($con, "select Name, Title from Coach NATURAL JOIN Coaches where Team_ID = $team_id");
$coaches = array();
while($coach = mysqli_fetch_assoc($result)){
    array_push($coaches, $coach);
}

//get players
$result = mysqli_query($con, "select * from Player NATURAL JOIN PlaysFor where Team_ID = $team_id");
$players = array();
while($player = mysqli_fetch_assoc($result)){
    array_push($players, $player);
}

//get matches
$result = mysqli_query($con, "select * from `Match` where Team1_ID = $team_id or Team2_ID = $team_id");
$matches = array();
while($match = mysqli_fetch_assoc($result)){
    array_push($matches, $match);
}

//get teams
$result = mysqli_query($con, "select Team_ID, Name from Team");
$teams = array();
while($team = mysqli_fetch_assoc($result)){
    array_push($teams, $team);
}

$data["coaches"] = $coaches;
$data["players"] = $players;
$data["matches"] = $matches;
$data["teams"] = $teams;


$JSONStringResults = json_encode($data);
echo $JSONStringResults;

?>