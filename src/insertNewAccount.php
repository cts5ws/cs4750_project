
<?php

session_start();

include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$username = $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$team = $_POST["team"];

$result = mysqli_query($con, "select * from `Fan` where Username = '$username'");
$rowcount=mysqli_num_rows($result);

if($rowcount !== 0){
 $_SESSION["reg_error"] = "The supplied username is already being used. Please choose a different one.";
 header("Refresh:0; url=newAccount.php");
} else if(strcmp($password1, $password2) !== 0){
 $_SESSION["reg_error"] = "The supplied passwords did not match. Please try again.";
 header("Refresh:0; url=newAccount.php");
} else {

 mysqli_query($con, "insert into `Fan` (Username, Password) values ('$username',MD5('$password1'))");

 $result = mysqli_query($con, "select Fan_ID from `Fan` where Username = '$username'");
 $result = mysqli_fetch_assoc($result);
 $fan_id = $result['Fan_ID'];

 $result = mysqli_query($con, "select Team_ID from `Team` where Name = '$team'");
 $result = mysqli_fetch_assoc($result);
 $team_id = $result['Team_ID'];

 mysqli_query($con, "insert into `Favorites` (Fan_ID, Team_ID) values ('$fan_id','$team_id')"); 

 session_destroy();
 header("Refresh:0; url=accountCreationSuccess.html");
}


?>


