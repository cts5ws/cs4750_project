<?php

session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$fan_id  = $_SESSION["fan_id"];
$league_id = $_POST["leagueID"];

$my_league_id = $_POST["myLeagueID"];

//get Table (changed from Coach)
$result = mysqli_query($con, "SELECT DISTINCT Username, Watchlist_Name, Watchlist_ID FROM (((Fan NATURAL JOIN Creates) NATURAL JOIN Watchlist) NATURAL JOIN EnteredIn) WHERE (League_ID = $league_id)");
$table1 = array();
//$averages = array();
while($table = mysqli_fetch_assoc($result)){

    $watchlist_id = $table["Watchlist_ID"];
    $ratings = mysqli_query($con,"select Rating from Watchlist NATURAL JOIN SelectedFor NATURAL JOIN Player where Watchlist_ID = $watchlist_id");

    $total = 0;
    while($rating = mysqli_fetch_assoc($ratings)){
        $total += $rating["Rating"];
    }
    $average = $total / mysqli_num_rows($ratings);

    $table["avg"] = $average;

    array_push($table1, $table);

}
$data["table1"] = $table1;

$result = mysqli_query($con, "SELECT DISTINCT Username FROM (((Fan NATURAL JOIN Creates) NATURAL JOIN Watchlist) NATURAL JOIN EnteredIn) WHERE (League_ID = $my_league_id)");
$table2 = array();
while($table = mysqli_fetch_assoc($result)){
    array_push($table2, $table);
}
$data["table2"] = $table2;


$result = mysqli_query($con, "SELECT DISTINCT Watchlist_Name, Watchlist_ID FROM (((Fan NATURAL JOIN Creates) NATURAL JOIN Watchlist)) WHERE (Fan_ID = $fan_id) and (Watchlist_Name, Watchlist_ID) not in (SELECT DISTINCT Watchlist_Name, Watchlist_ID FROM (((Fan NATURAL JOIN Creates) NATURAL JOIN Watchlist) NATURAL JOIN EnteredIn) WHERE (League_ID = $league_id and Fan_ID = $fan_id))");
$watchlists = array();
while($watchlist = mysqli_fetch_assoc($result)){
    array_push($watchlists, $watchlist);
}
$data["watchlists"] = $watchlists;


$JSONStringResults = json_encode($data);
echo $JSONStringResults;

?>