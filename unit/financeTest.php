<?php

require_once('../php/finance.php');

class FinanceTest extends PHPUnit_Framework_Testcase{

	// testing getCurrentPrice($ticker) function in finance.php
	function testGetCurrentPriceNotNull(){
		$price = getCurrentPrice("goog");
		$this->assertNotNull($price);
	}
	function testGetCurrentPriceConnection(){
		$testPrice  = getCurrentPrice("aapl");
		// invalid ticker, bad connection to API
		$badPrice = getCurrentPrice("appl");
		$this->assertNotEquals($testPrice, $badPrice);
	}
	function testGetCurrentPriceNumeric(){
		$price = getCurrentPrice("yhoo");
		$price = str_replace("\n", "", $price);
		$this->assertTrue(is_numeric($price));
	}
	function testGetCurrentPriceNotEmpty(){
		$price = getCurrentPrice("LNKD");
		$this->assertNotEmpty($price);
	}


	// testing getCompanyName($ticker) function in finance.php
	function testGetCompanyNameNotNull(){
		$name = getCompanyName("goog");
		$this->assertNotNull($name);
	}
	function testGetCompanyName(){
		$name = getCompanyName("aapl");
		$this->assertEquals($name, "Apple Inc.\n");
	}
	function testGetCompanyNameConnection(){
		$testName = getCompanyName("yhoo");
		// invalid ticker, bad connection to API
		$badName = getCurrentPrice("appl");
		$this->assertNotEquals($testName, $badName);
	}
	function testGetCompanyNameNotEmpty(){
		$name = getCompanyName("LNKD");
		$this->assertNotEmpty($name);
	}
	function testGetCompanyNameNotNumeric(){
		$name = getCompanyName("AMZN");
		$this->assertFalse(is_numeric($name));
	}


	// testing getClosingPrice($ticker) in finance.php
	function testGetClosingPriceNotNull(){
		$price = getClosingPrice("goog");
		$this->assertNotNull($price);
	}
	function testGetClosingPriceConnection(){
		$testPrice  = getClosingPrice("aapl");
		// invalid ticker, bad connection to API
		$badPrice = getClosingPrice("appl");
		$this->assertNotEquals($testPrice, $badPrice);
	}
	function testGetClosingPriceNumeric(){
		$price = getClosingPrice("yhoo");
		$price = str_replace("\n", "", $price);
		$this->assertTrue(is_numeric($price));
	}
	function testGetClosingPriceNotEmpty(){
		$price = getClosingPrice("LNKD");
		$this->assertNotEmpty($price);
	}


	// testing getOpeningPrice($ticker) in finance.php
	function testGetOpeningPriceNotNull(){
		$price = getOpeningPrice("goog");
		$this->assertNotNull($price);
	}
	function testGetOpeningPriceConnection(){
		$testPrice  = getOpeningPrice("aapl");
		// invalid ticker, bad connection to API
		$badPrice = getOpeningPrice("appl");
		$this->assertNotEquals($testPrice, $badPrice);
	}
	function testGetOpeningPriceNumeric(){
		$price = getOpeningPrice("yhoo");
		$price = str_replace("\n", "", $price);
		$this->assertTrue(is_numeric($price));
	}
	function testGetOpeningPriceNotEmpty(){
		$price = getOpeningPrice("LNKD");
		$this->assertNotEmpty($price);
	}


	// testing getPercentChanged($ticker) in finance.php
	function testGetPercentChangedNotNull(){
		$percent = getPercentChanged("goog");
		$this->assertNotNull($percent);
	}
	function testGetPercentChangedConnection(){
		$testPercent  = getPercentChanged("aapl");
		// invalid ticker, bad connection to API
		$badPercent = getPercentChanged("appl");
		$this->assertNotEquals($testPercent, $badPercent);
	}
	function testGetPercentChangedNumeric(){
		$percent = getPercentChanged("yhoo");
		$percent = str_replace("\n", "", $percent);
		$percent = str_replace("+", "", $percent);
		$percent = str_replace("-", "", $percent);
		$percent = str_replace("%", "", $percent);
		$this->assertTrue(is_numeric($percent));
	}
	function testGetPercentChangedNotEmpty(){
		$percent = getPercentChanged("LNKD");
		$this->assertNotEmpty($percent);
	}


	// testing getHistoricalData($ticker, $startDate, $endDate) function in finance.php
	function testGetHistoricalDataReturnValidURL(){
		$url = getHistoricalData('GOOG', "01012015", "01012016");
		$headers = @get_headers($url);
		$this->assertFalse(strpos($headers[0], '404'));
	}

	function testGetHistoricalDataNotNull(){
		$url = getHistoricalData('aapl', "01012015", "01012016");
		$content = file_get_contents($url);
		$this->assertNotNull($content);
	}

	function testGetHistoricalDataNotEmpty(){
		$url = getHistoricalData('yhoo', "01012015", "01012016");
		$content = file_get_contents($url);
		$this->assertNotEmpty($content);
	}

	// testing isValidTicker($ticker) function in finance.php
	function testIsValidTikcerReturnValue(){
		$this->assertTrue(isValidTicker("goog"));
		$this->assertTrue(isValidTicker("aapl"));
		$this->assertTrue(isValidTicker("LNKD"));

		$this->assertFalse(isValidTicker("appl"));
		$this->assertFalse(isValidTicker("yhaa"));
	}

	// testing isPostive($ticker) function in finance.php

	function testIsPositiveValid(){
		$current = getCurrentPrice("goog");
		$prevClose = getClosingPrice("goog");
		$isPostiveChange = isPositive("goog");
		if ($current>$prevClose){
			$this->assertTrue($isPostiveChange);
		}
		else{
			$this->assertFalse($isPostiveChange);
		}
	}

}



?>