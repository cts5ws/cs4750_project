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
$new_watchlist_id = $_POST["watchlist_id"];

mysqli_query($con, "DELETE FROM `EnteredIn` WHERE League_ID = '$league_id' AND Watchlist_ID IN (SELECT Watchlist_ID FROM `Fan` NATURAL JOIN `Creates` NATURAL JOIN `Watchlist` WHERE Fan_ID = '$fan_id')");
mysqli_query($con, "insert into EnteredIn (League_ID , Watchlist_ID) values  ($league_id,$new_watchlist_id)");


echo "Watchlist updated successfully";

?>