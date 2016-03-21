<?php

//require_once 'PHPUnit/Framework.php';
require_once('../php/db_query.php');
echo getPortfolio("udubey@usc.edu");

class DB_QueryTest extends PHPUnit_Framework_Testcase {

	//test getQueryResult($query)

	// test function setBalance($email, $newBalance)
	function testSetBalance(){
		setBalance("udubey@usc.edu", 1000);
		$this->assertEquals(getBalance("udubey@usc.edu"), 1000);
		setBalance("udubey@usc.edu", 10000);
		$this->assertEquals(getBalance("udubey@usc.edu"), 10000);
	}

	// test function getBalance($email)
	function testGetBalance() {
		$this->assertEquals(getBalance("udubey@usc.edu"), 10000);
	}

	// test getPortfolio($email)
	function testGetPortfolio(){
		$portfolio = getPortfolio("udubey@usc.edu");
		$this->assertEquals($portfolio["AAPL"], 252);
		$this->assertEquals($portfolio["GOOG"], 100);
		$this->assertEquals($portfolio["FB"], 660);

	}

	// test buy($email, $tickerToPurchase, $amountToPurchase, $pricePerShare)
	function testBuy(){
		buy("udubey@usc.edu", "GOOG", 0, 10);
		$this->assertEquals(getBalance("udubey@usc.edu"),10000);
		$portfolio = getPortfolio("udubey@usc.edu");
		$this->assertEquals($portfolio["GOOG"], 100);


	}

	// test sell($email, $tickerToSell, $amountToSell, $pricePerShare)
	function testSell(){
		sell("udubey@usc.edu", "GOOG", 100, 10);
		$this->assertEquals(getBalance("udubey@usc.edu"),11000);
		$portfolio = getPortfolio("udubey@usc.edu");
		$this->assertEquals($portfolio["GOOG"], 200);
	}

	// test credentialsValid($email, $encryptedPassword)
	function testcredentialsValid(){
		$this->assertTrue(credentialsValid("udubey@usc.edu","temporary"));

		$this->assertFalse(credentialsValid("udubey@usc.edu","foo"));
		$this->assertFalse(credentialsValid("udubey@usc.edu","abc"));
	}



	// test getWatchlist($email)
	function testGetWatchList(){
		$watchlist = getWatchlist("udubey@usc.edu");
		$this->assertEmpty($watchlist);
	}

	// test addToWatchlist($ticker)
	function testAddToWatchlist(){
		$_SESSION = array("user_email"=>"udubey@usc.edu");
		addToWatchlist("AMZN");
		$watchlist = getWatchlist("udubey@usc.edu");

		$this->assertNotEmpty($watchlist);
		$this->assertArrayHasKey("AMZN",$watchlist);
	}


}


?>
