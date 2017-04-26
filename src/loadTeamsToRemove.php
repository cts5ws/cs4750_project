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
$result = mysqli_query($con, "select Team_ID, Name from Favorites NATURAL JOIN Team where Fan_ID = $fan_id");
$toRemove = array();
while($team = mysqli_fetch_assoc($result)){
    array_push($toRemove, $team);
}

$JSONStringResults = json_encode($toRemove);
echo $JSONStringResults;

?>