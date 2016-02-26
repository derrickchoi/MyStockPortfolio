<?php

$db_hostname = "mysql14.000webhost.com";
$db_database = "a5059233_msp";
$db_username = "a5059233_msp";
$db_password = "mystockportfolio123";

$db_server = mysql_connect($db_hostname, $db_username, $db_password);
mysql_select_db($db_database, $db_server);

function query($query) {
	$result = mysql_query($query);
	// return query results
}

function getPortfolio($user) {
	// return portfolio of the user
}

function getWatchlist($user) {
	// return watchlist of the user
}

?>