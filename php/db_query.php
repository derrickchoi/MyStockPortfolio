<?php

$db_hostname = "mysql14.000webhost.com";
$db_database = "a5059233_msp";
$db_username = "a5059233_msp";
$db_password = "mystockportfolio123";

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
mysql_select_db($db_database, $db_server);

function getQueryResult($query) {
	return mysql_query($query);
}

function credentialsValid($email, $encryptedPassword) {
	// return true if the supplied credentials match credentials from the database, false otherwise

	$query = "SELECT * FROM users WHERE email = '" . $email . "'";
	$result = getQueryResult($query);

	// if there is no user with the given email address, the credentials are invalid
	// else if the given encrypted password doesn't match the encrypted password in the DB, the credentials are invalid
	// else the credentials are valid

	if (mysql_num_rows($result) == 0) {
		return false;
	} else if (strcmp(mysql_result($result, 0, 'encryptedPassword'), $encryptedPassword) != 0) {
		return false;
	} else {
		return true;
	}
}

function getPortfolio($email) {
	// return portfolio of the user
}

function getWatchlist($email) {
	// return watchlist of the user
}

?>