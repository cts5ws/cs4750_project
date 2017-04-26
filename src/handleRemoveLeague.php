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

$result = mysqli_query($con, "select League_ID from `League` where  `League_Admin` = '$fan_id' and `League_Name`='$league_name'");
$result = mysqli_fetch_assoc($result);
$league_id = $result["League_ID"];


mysqli_query($con, "delete from `EnteredIn` where `League_ID`='$league_id'");
mysqli_query($con, "delete from `League` where  `League_Admin` = '$fan_id' and `League_Name`='$league_name'");


header("Refresh:0; url=league_play.php");

?>