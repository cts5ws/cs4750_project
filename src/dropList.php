<?php
session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$fan_id = $_SESSION["fan_id"];

if (isset($_POST['remove'])) {
	$droplist = $_POST['watchlist'];
	//echo $droplist;
	mysqli_query($con, "Delete from Watchlist where Watchlist_ID = $droplist");
	mysqli_query($con, "Delete from Creates where Watchlist_ID = $droplist and Fan_ID = $fan_id");

}

//echo "dropping list!";
header("Refresh:0; url=watchlist.php");
?>