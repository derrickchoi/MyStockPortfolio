<?php

// initiate a user session if we haven't already; we will be able to save the user's credentials this way
if (session_id() == '') { // for php >= 5.4.0: session_status() == PHP_SESSION_NONE
	session_start();
}

// include blackboxed methods for getting information from the database
require_once("php/db_query.php");

$email = $_POST["inputEmail"];
$password = $_POST["inputPassword"];

if ($email != "") {

	// encrypt the given password to compare against encrypted password in DB
	$encryptedPassword = encrypt($password);

	if (credentialsValid($email, $encryptedPassword)) {
		$_SESSION["user_email"] = strtolower($email);
	}

}

function encrypt($pass_word) {
	return $pass_word;
}

// if the user is not logged in, show the login page, else show the dashboard
if ($_SESSION["user_email"] == "") {
	require_once("views/login.php");
} else {
	require_once("views/dashboard.php");
}

?>
