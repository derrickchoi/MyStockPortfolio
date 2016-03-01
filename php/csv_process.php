<?php
	// The purpose of this file is to take the .csv file received in csv_w, parse it, and add new stocks to user's portfolio
	$csvFileContents = file_get_contents($_FILES['csvInputFile']['tmp_name']); // gets .csv file contents in a string
	$csvFileArray = explode(", ",$csvFileContents); // parses the file contents string
	echo $csvFileArray[0];
	// this loop iterates through each stock in the .csv file, validates its information,
	//  and adds the stock to the user's portfolio if all of the information is valid  
	/*for($i = 0; $i < csvFileArray.size(); $i++) { 
		$k = 3 * $i;  								
		validateStock(csvFileArray[$k]); // determines whether the stock ticker exists
		addStockToPortfolio(csvFileArray[$k], csvFileArray[$k+1], csvFileArray[$k+2]);
	}*/
?>