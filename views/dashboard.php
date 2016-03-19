<?php

// if the user manually goes to "http://.../dashboard.php" without being logged in, we direct them to login
if ($_SESSION["user_email"] == "") {
	header("Location: ..");
}


require_once("php/finance.php");
$email = $_SESSION["user_email"];

?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<title>MyStockPortfolio</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="MyStockPortfolio for CSCI 310, Group 2">
		<meta name="author" content="Utkash Dubey">
		<link rel="icon" href="favicon.ico">
		<!-- Latest compiled and minified CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Custom styles -->
		<link href="views/dashboard.css" rel="stylesheet">

		<style>
			#header {
			    text-align:center;
			    padding:5px;
			}
			#nav {
			    line-height:30px;
			    height:300px;
			    width:300px;
			    float:left;
			    padding:5px; 
			}
			#section {
			    width:350px;
			    float:left;
			    padding:10px; 
			}
			#footer {
			    background-color:black;
			    color:white;
			    clear:both;
			    text-align:center;
			    padding:5px; 
			}
			#aside {
				line-height:30px;
				height:300px;
				width:260px;
				float:right;
				padding:5px;
			}
		</style>

	</head>

	<!-- time widget needs to be initiated, see time_w.php -->
	<body onload="startTime()">

		<div class="container-fluid">
			<?php

				echo '<br />';
				print '<div id="header">';
					require_once("widgets/search_w.php");
				print '</div>';

				print '<div id="aside">';
					require_once("widgets/time_w.php");
					print '<a href="views/user_manual.pdf">User Manual</a>';
					print '<br />';
					require_once("widgets/watchlist_w.php");
				print '</div>';

				print '<div id="nav">';
					require_once("widgets/csv_w.php");
					print '<br />';
					require_once("widgets/portfolio_w.php");
					print '<br />';
					require_once("widgets/trade_w.php");
				print '</div>';

				print '<div id="section">';
				require_once("graph/graph_w.php");
				print '<br />';
				// require_one("widgets/detailed_info_w.php");
				require_once("widgets/news_w.php");
				print '</div>';
			?>

		</div>

		<script type="text/javascript">
			displayTicker('AAPL');
			displayTicker('GOOG');
			displayTicker('MSFT');
			displayTicker('FB');
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../jquery.min.js"><\/script>')</script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>

</html>
