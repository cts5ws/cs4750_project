<?php
	


?>

<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create Watchlist</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/acc.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class='container'>
	<div class='row'>
		<div class='col-lg-12 text-center'>
			<h2>Create A New Watchlist</h2>
		</div>
	</div>

	<div class='row'>
		<div class='col-lg-12'>
			<form name="createList" action="createList.php" method="post">
				<div class="form-group">
					<label for="listname">Watchlist Name:</label>
					<input type="text" class="form-control" name="listname">
				</div>
				<input type="submit" class="btn btn-info" value="Create Watchlist!">
			</form>
        	<a href='watchlist.php' class="btn btn-danger">Cancel</a>

		</div>
	</div>
</div>


</body>
</html>