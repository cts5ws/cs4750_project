<?php

session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$username = $_SESSION["username"];
$fan_id = $_SESSION["fan_id"];

//get favorite teams of the user
$result = mysqli_query($con, "SELECT DISTINCT Team_ID, Name FROM Team WHERE (Team_ID, Name) NOT IN ( SELECT Team_ID, Name from Favorites NATURAL JOIN Team where Fan_ID = $fan_id )");
$toAdd = array();
while($team = mysqli_fetch_assoc($result)){
    array_push($toAdd, $team);
}

$JSONStringResults = json_encode($toAdd);
echo $JSONStringResults;

?>