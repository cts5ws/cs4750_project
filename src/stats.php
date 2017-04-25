<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Refresh:0; url=login.php");
}
?>

This is the stats page
