<?php

session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$fan_id = $_SESSION["fan_id"];
$league_name = $_POST["name"];

mysqli_query($con, "insert into `League` (League_Admin, League_Name) values ('$fan_id','$league_name')");

header("Refresh:0; url=league_play.php");

?>