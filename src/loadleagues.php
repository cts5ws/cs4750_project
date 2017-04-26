<?php

/*
 * FILENAME: loadleagues.php
 * 
 * This file loads the leagues for the given user
 *
 *
*/



/*start session*/
session_start();

/*Connect to database here*/
include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);


/*Double check the connection*/
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


/* look for the username and fan_id */
$username = $_SESSION["username"];
$fan_id = $_SESSION["fan_id"];

/*get leagues of the user*/
$result = mysqli_query($con, "SELECT DISTINCT League_ID, League, Fan_ID FROM ((League NATURAL JOIN EnteredIn) NATURAL JOIN Fan WHERE Fan_ID = $fan_id");

$leagues = array(); /*allocate array for leagues*/


/*push each "row" into array from SQL query*/
while($league = mysqli_fetch_assoc($result)){
    array_push($leagues , $league);
}


/*output values from 'leagues' variable*/
$JSONStringResults = json_encode($leagues);
echo $JSONStringResults;

?>

    