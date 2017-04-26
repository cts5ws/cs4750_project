<?php

session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$fan_id = $_SESSION["fan_id"];

//get favorite teams of the user
$result = mysqli_query($con, "select League_ID, League_Name from `League` where `League_Admin` = $fan_id");
$leagues = array();
while($league = mysqli_fetch_assoc($result)){
    array_push($leagues, $league);
}

$JSONStringResults = json_encode($leagues);
echo $JSONStringResults;

?>