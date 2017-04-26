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

    <script src="http://code.jquery.com/jquery-1.11.3.js"></script>

    <script>
    	$(document).ready();
    	
    	function getWatchlist(){
			$.ajax({
                url : "loadLists.php",
                success :
                    function(data){

                        console.log(data);

                        var lists = JSON.parse(data);

                        var arrayLength = lists.length;
                        for(var i = 0; i < arrayLength; i++){
                            $('#watchlist').append($('<option>', {
                                value : lists[i]["Watchlist_ID"],
                                text : lists[i]["Watchlist_Name"]
                            }));
                        }
                    }
            });
    	}
    	getWatchlist();
    </script>

</head>

<body>
<div class='container'>
	<div class='row'>
		<div class='col-lg-12 text-center'>
			<h2>Remove A Watchlist</h2>
		</div>
	</div>

	<div class='row'>
		<div class='col-lg-12 text-center'>
			<form name="dropList" action="dropList.php" method="post">
				<form action="#" method="post">
		        <select id="watchlist" name="watchlist">
		        </select>
		        <input type="submit" name="remove" class="btn btn-info" value="Delete">
		        <a href='watchlist.php' class="btn btn-danger">Cancel</a>
			</form>
        	
		</div>
	</div>
</div>


</body>
</html>
