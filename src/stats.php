<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Refresh:0; url=login.php");
}
?>

<h3>Hello <div id="username">  </div></h3>

<a href="teams.php">Teams</a>
<a href="watchlist.php">Watchlist</a>
<a href="league_play.php">Teams</a>
