<?php
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=Watchlist.csv');

	session_start();

	include_once("./library.php"); // To connect to the database
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	// Check connection
	if (mysqli_connect_errno()){
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

    $outlistID = $_POST["outlist"];
    //echo "Exporting : " .$outlistID;

    // fetch mysql table rows
	$result = mysqli_query($con, "SELECT Name, Number, Position, Year, Rating FROM Watchlist NATURAL JOIN SelectedFor NATURAL JOIN Player NATURAL JOIN Creates where Watchlist_ID = $outlistID");

    $fp = fopen('php://output', 'w');

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db connection
    //mysqli_close($connection);


?>