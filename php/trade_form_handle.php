<html>
<?php

require_once("finance.php");
require_once("db_query.php");

if ($_GET['confirmed'] == "buy") {
	// user has confirmed that they want to buy and we should execute the purchase
	$email = $_GET['email'];
	$ticker = $_GET['ticker'];
	$amount = $_GET['amount'];
	buy($email, $ticker, $amount, floatval(getCurrentPrice($ticker)));
	echo '<body onload="returnToDashboard()"><script type="text/javascript">
			function returnToDashboard() {
				window.location.href = "..";
			}
			</script>
			';
} else if ($_GET['confirmed'] == "sell") {
	// user has confirmed that they want to sell and we should execute the purchase
	$email = $_GET['email'];
	$ticker = $_GET['ticker'];
	$amount = $_GET['amount'];
	sell($email, $ticker, $amount, getCurrentPrice($ticker));
	echo '<body onload="returnToDashboard()"><script type="text/javascript">
			function returnToDashboard() {
				window.location.href = "..";
			}
			</script>
			';
} else if (isset($_POST['buy_button'])) { // user clicked the button to buy and just got to this form handler

	$ticker = $_POST['ticker'];
	$companyName = $_POST['companyName'];
	$amount = $_POST['amount'];
	$email = $_GET['email'];

	if ($ticker == "") {
		$ticker = getTicker($companyName);
	}

	// first verify that the buy action is valid
	if (/*!marketIsOpen() || !isValidTicker($ticker) ||*/ $amount * floatval(getCurrentPrice($ticker)) > floatval(getBalance($email))) {
		echo '<body>Invalid trade';
	} else {
		// the buy action is valid
		// confirm the purchase with the user
		echo '<body onload="confirmPurchase()">
				<script type="text/javascript">
					function confirmPurchase() {
						var confirmed = confirm("Are you sure you want to purchase ' . $amount . ' shares of ' . $ticker . '?");
						if (confirmed) {
							window.location.href = "trade_form_handle.php?email=' . $email . 'confirmed=buy&ticker=' . $ticker . '&amount=' . $amount . '";
						} else {
							window.location.href = "..";
						}
					} </script>';
		// execute the purchase -- happens in line 4 ( if (isset($_GET['confirmed'])) {...} )
	}

} else if (isset($_POST['sell_button'])) { // user clicked the button to sell

	$ticker = $_POST['ticker'];
	$companyName = $_POST['companyName'];
	$amount = $_POST['amount'];
	$email = substr_replace(urldecode($_GET['email']), "", -1);

	if ($ticker == "") {
		$ticker = getTicker($companyName);
	}

	$portfolio = getPortfolio($email);
	$amountUserOwns = intval($portfolio[strtoupper($ticker)]);

	// first verify that the buy action is valid
	if ($amount > $amountUserOwns /*|| !marketIsOpen() || !isValidTicker($ticker)*/) {
		echo '<body>Invalid trade';
	} else {
		// the buy action is valid
		// confirm the purchase with the user
		echo '<body onload="confirmPurchase()">
				<script type="text/javascript">
					function confirmPurchase() {
						var confirmed = confirm("Are you sure you want to sell ' . $amount . ' shares of ' . $ticker . '?");
						if (confirmed) {
							window.location.href = "trade_form_handle.php?email=' . $email . 'confirmed=sell&ticker=' . $ticker . '&amount=' . $amount . '";
						} else {
							window.location.href = "..";
						}
					} </script>';
		// execute the purchase -- happens in line 4 ( if (isset($_GET['confirmed'])) {...} )
	}
} else {
	// user got here without submitting the form, and we redirect them back
	echo '<body onload="returnToDashboard()">
			<script type="text/javascript">
				function returnToDashboard() {
					window.location.href = "..";
				}
			</script>
			';
}

?>
</body>
</html>