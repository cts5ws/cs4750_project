<?php

session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if (isset($_POST['add'])) {
    //update action
    $selected_player = $_POST['player'];
	$selected_list = $_POST['watchlist2'];
	//echo "Adding : " .$selected_player ." to: " .$selected_list; 
	mysqli_query($con, "insert into SelectedFor (Player_ID, Watchlist_ID) values ('$selected_player', '$selected_list')");


} else if (isset($_POST['drop'])) {
    //delete action
	$selected_player = $_POST['player'];
	$selected_list = $_POST['watchlist2'];
	mysqli_query($con, "Delete from SelectedFor where Player_ID = $selected_player and Watchlist_ID = $selected_list");

} else {
    //no button pressed
}

header("Refresh:0; url=watchlist.php");

?>