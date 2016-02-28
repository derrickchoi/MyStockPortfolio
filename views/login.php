<?php

$_SESSION["user_email"] = "";

// include necessary functions for the reset password flow
require_once("php/reset_password.php");

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
		<!-- Custom styles for this view -->
		<link href="views/signin.css" rel="stylesheet">
	</head>

	<body role="document">

		<div class="container">
			<form class="form-signin" action="index.php" method="post">
				<!--<h2 class="form-signin-heading">Please sign in</h2>-->
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			</form>
			
		</div> <!-- /container -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../jquery.min.js"><\/script>')</script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>

</html>