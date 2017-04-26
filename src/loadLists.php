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
$result = mysqli_query($con, "select Watchlist_Name, Watchlist_ID from Watchlist Natural Join Creates where Fan_ID = $fan_id");
$lists = array();
while($list = mysqli_fetch_assoc($result)){
    array_push($lists, $list);
}

$JSONStringResults = json_encode($lists);
echo $JSONStringResults;

?>