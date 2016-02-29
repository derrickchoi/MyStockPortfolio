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
	return getPortfolioOrWatchlist($email, true);
}

function getWatchlist($email) {
	return getPortfolioOrWatchlist($email, false);
}

function getPortfolioOrWatchlist($email, $isPortfolio) {
	// return a map of the tickers and corresponding number of shares that the user has in their portfolio

	// make the query for getting that user's tickers and amounts

	// for their portfolio, "amount > 0" since they own that stock
	$query = "SELECT ticker, amount FROM portfolios WHERE email = '" . $email . "'AND amount > 0 ORDER BY ticker";

	// for their watchlist, "amount = 0" since they don't own that stock
	if (!$isPortfolio) {
		$query = "SELECT ticker, amount FROM portfolios WHERE email = '" . $email . "'AND amount = 0 ORDER BY ticker";
	}
	$result = getQueryResult($query);

	// initialize a portfolio map, with ticker => amount
	// this is what we'll return
	$portfolio = array();

	// iterate through the query results and populate the map
	if ($result) {
		while ($row = mysql_fetch_array($result)) {
			$ticker = strtoupper($row["ticker"]);
			$amount = $row["amount"];
			$portfolio[$ticker] = $amount;
		}
	} else {
		// echo mysql_error();
	}

	// return the portfolio structure -- the front end calling this method should read structure and print it as desired
	return $portfolio;
}

?>