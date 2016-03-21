<?php

$db_hostname = "localhost";
$db_database = "msp";
$db_username = "root";
$db_password = "password";

$db_server = mysql_connect($db_hostname, $db_username, $db_password) or die('bleh');
mysql_select_db($db_database, $db_server);

function getQueryResult($query) {
	return mysql_query($query);
}

function getBalance($email) {
	// return the account balance of a user as a float, since balances will likely not be whole dollars
	$query = "SELECT balance FROM users WHERE email = '" . $email . "'";
	$result = getQueryResult($query);
	$balanceString = mysql_result($result, 0, 'balance');
	$balance = floatval($balanceString);
	return $balance;
}

function getTicker($companyName) {
	
}

function setBalance($email, $newBalance) { // New Balance is not a sponsor of this project
	$updateBalanceQuery = "UPDATE users SET balance = " . $newBalance . " WHERE email = '" . $email . "'";
	getQueryResult($updateBalanceQuery);
}

function getUserAmount($email, $ticker) {

}

function buy($email, $tickerToPurchase, $amountToPurchase, $pricePerShare) {

	// any logic for buying shares re:the user is preferably here, e.g. does
	// 		the user have the funds to make the purchase
	// any logic re:the market, e.g. logic for whether the market is
	// 		oepn, should be done in php/trade_form_handle.php (when possible)

	// we need to ensure that $priceForShares can be a double, e.g. $5.17, so we add 0.0
	$priceForShares = ($amountToPurchase + 0.0) * $pricePerShare;
	$balance = getBalance($email);

	$potentialBalance = $balance - $priceForShares;

	if ($potentialBalance < 0) {
		// reject the purchase, since the account doesn't have the funds to pay for the shares
	} else {
		// the new balance for the user, after the transaction, is $potentialBalance (>= 0)
		setBalance($email, $potentialBalance);

		$query = "SELECT id, amount FROM portfolios WHERE email ='" . $email . "' AND ticker = '" . $tickerToPurchase . "'";
		$result = getQueryResult($query);

		if (mysql_num_rows($result) == 0) { // the user has this ticker in neither their portfolio or watchlist
			
			$updatePortfolioQuery = "INSERT INTO portfolios (email, ticker, amount) VALUES ('" . $email . "', '" . $tickerToPurchase . "', '" . $amountToPurchase . "')";
			getQueryResult($updatePortfolioQuery);

		} else if (mysql_num_rows($result) > 1) { // the user has this ticker in both their portfolio and watchlist
			// we only want to update the portfolio item in the database, i.e. where amount != 0
			
			$id = mysql_result($result, 0, 'id');
			$amount = mysql_result($result, 0, 'amount');

			if (intval($amount) == 0) {
				$id = mysql_result($result, 1, 'amount');
			}

			$updatePortfolioQuery = "UPDATE portfolios SET amount = " . ($amountToPurchase + $amount) . " WHERE id = " . $id . "AND  email = '" . $email . "' AND amount > 0";
			getQueryResult($updatePortfolioQuery);

		} else { // the user has this ticker in either their portfolio or their watchlist (only one)
			// we will update the amount to $amountToPurchase + $amount

			$amount = mysql_result($result, 0, 'amount');

			$updatePortfolioQuery = "UPDATE portfolios SET amount = " . ($amountToPurchase + $amount) . " WHERE email = '" . $email . "' AND ticker = '" . $tickerToPurchase . "'";
			getQueryResult($updatePortfolioQuery);

		}
	}
}

function sell($email, $tickerToSell, $amountToSell, $pricePerShare) {

	// any logic for buying shares re:the user is preferably here, e.g. does
	// 		the user have the funds to make the purchase
	// any logic re:the market, e.g. logic for whether the market is
	// 		oepn, should be done in php/trade_form_handle.php (when possible)

	// we need to ensure that $priceForShares can be a double, e.g. $5.17, so we add 0.0
	$revenueFromShares = ($amountToSell + 0.0) * $pricePerShare;
	$balance = getBalance($email);

	$potentialBalance = $balance + $revenueForShares;
		// the new balance for the user, after the transaction, is $potentialBalance (>= 0)
	setBalance($email, $potentialBalance);

	$query = "SELECT id, amount FROM portfolios WHERE email ='" . $email . "' AND ticker = '" . $tickerToSell . "'";
	$result = getQueryResult($query);

	if (mysql_num_rows($result) > 1) { // the user has this ticker in both their portfolio and watchlist
		// we only want to update the portfolio item in the database, i.e. where amount != 0
			
		$id = mysql_result($result, 0, 'id');
		$amount = mysql_result($result, 0, 'amount');

		if (intval($amount) == 0) {
			$id = mysql_result($result, 1, 'amount');
		}

		$updatePortfolioQuery = "UPDATE portfolios SET amount = " . ($amount - $amountToSell) . " WHERE id = " . $id . "AND  email = '" . $email . "' AND amount > 0";
		getQueryResult($updatePortfolioQuery);

	} else { // the user has this ticker only in their portfolio (since the check that this sell was OK is done in php/trade_form_handle.php)
		// we will update the amount to $amount - $amountToSell

		$amount = mysql_result($result, 0, 'amount');

		$updatePortfolioQuery = "UPDATE portfolios SET amount = " . ($amount - $amountToSell) . " WHERE email = '" . $email . "' AND ticker = '" . $tickerToSell . "'";
		getQueryResult($updatePortfolioQuery);

	}
}

function credentialsValid($email, $encryptedPassword) {
	// return true if the supplied credentials match credentials from the database, false otherwise

	$query = "SELECT * FROM users WHERE email = '" . $email . "' AND encryptedPassword = '" . $encryptedPassword . "'";
	$result = getQueryResult($query);

	// if there is no user with the given email address and encryptedPassword, the credentials are invalid
	// else the credentials are valid

	if (mysql_num_rows($result) == 0) {
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

function addToWatchlist($ticker) {
	// todo: make email a parameter
	$email = $_SESSION['user_email'];
	if (!in_array($ticker, getWatchlist($email))) {
		$query = "INSERT INTO portfolios (email, ticker) VALUES (" . $email . ", " . $ticker . ")";
	}
}

function getPortfolioOrWatchlist($email, $isPortfolio) {
	// return a map of the tickers and corresponding number of shares that the user has in their portfolio/watchlist

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
