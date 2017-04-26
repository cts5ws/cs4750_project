<?php
session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$listname = $_POST["listname"];
$fan_id = $_SESSION["fan_id"];
//insert into watchlist
mysqli_query($con, "insert into `Watchlist` (Watchlist_Name) values ('$listname')");

//get watchlist id, fan_id and insert into creates
$result = mysqli_query($con, "Select Watchlist_ID from Watchlist where Watchlist_Name = '$listname'");
$result = mysqli_fetch_assoc($result);
$newID = $result["Watchlist_ID"];

//update creates
mysqli_query($con, "insert into Creates (Fan_ID, Watchlist_ID) values ('$fan_id', '$newID')");


header("Refresh:0; url=watchlist.php");

?>