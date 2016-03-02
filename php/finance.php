
<?php

/*
 fetch stock data from Yahoo Finance API
*/
    


// return current price of the stock
// sample: getCurrentPrice("goog");
function getCurrentPrice($ticker){
    
    // fetch data from Yahoo API
    // parameter l1 = Last Trade(Price Only)
    $currentPrice = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=$ticker&f=l1&e=.csv");

    return $currentPrice;
    
}


// return company name of the stock
// sample: getCompanyName("goog");
function getCompanyName($ticker){
    
    // fetch data from Yahoo API
    // parameter n = Name
    $name = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=$ticker&f=n&e=.csv");
    
    // removing the quotation marks
    $name = str_replace('"', "", $name);
    return $name;
}


//return previous closing price of the stock
// sample:  getClosingPrice("goog");
function getClosingPrice($ticker){
    
    // fetch data from Yahoo API
    // parameter p = Prev Close(The closing price for the trading day prior to the last trade reported)
    $prevClose = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=$ticker&f=p&e=.csv");
    return $prevClose;
}


// return opening price of the stock
// sample:  getOpeningPrice("goog");
function getOpeningPrice($ticker){
    //return opening price of the stock
    
    // fetch data from Yahoo API
    // parameter o = Open
    $open = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=$ticker&f=o&e=.csv");
    return $open;
}


// return percent change of the stock
// getPercentChanged("goog")
function getPercentChanged($ticker){
    
    // fetch data from Yahoo API
    // parameter p2 = Change in Percent
    $change = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=$ticker&f=p2&e=.csv");
    $change = str_replace('"', "", $change);

    return $change;

}


// parameter for $startDate and $endDate "mmddyyyy"
// returns the url to get csv file
// samle: getHistoricalData('GOOG', "010102015", "01012016");
function getHistoricalData($ticker, $startDate, $endDate){
    // pasing date
    $startMonth = substr($startDate, 0 , 2);
    $startDay = substr($startDate, 2, 2);
    $startYear = substr($startDate, 4, 4);

    $endMonth = substr($endDate, 0, 2);
    $endDay = substr($endDate, 2, 2);
    $endYear = substr($endDate, 4, 4);

    $url = "http://ichart.finance.yahoo.com/table.csv?s=$ticker&a=$startMonth&b=$startDay&c=$startYear&d=$endMonth&e=$endDay&f=$endYear&g=d&ignore=.csv";

    //file_put_contents("a.csv", file_get_contents($url));

    return $url;

}

// function getIntradayData($ticker, $days){
//     $url = "http://chartapi.finance.yahoo.com/instrument/1.0/.$ticker./chartdata;type=quote;range=.$days.d/csv";
// }


// returns true if ticker is valid. Otherwise false
// sample: isValidTicker("goog");
function isValidTicker($ticker){
    //$url = "http://d.yimg.com/autoc.finance.yahoo.com/autoc?query=$ticker&region=1&lang=en&callback=YAHOO.Finance.SymbolSuggest.ssCallback";
    $name = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=$ticker&f=n&e=.csv");
    
    if ( strcmp('"', $name[0]) ==0){
        return true;
    }
    return false;

}


// returns true if market is open. Otherwise false.
// sample: marketIsOpen();
function marketIsOpen(){

   date_default_timezone_set('US/Eastern');
   $currenttime = date('h:i:s:u');
   list($hrs,$mins,$secs,$msecs) = split(':',$currenttime);
   //echo " => $hrs:$mins:$secs\n";

   if ($hrs>=9 && $hrs<16){
     return true;
   }
   return false;

}


// returns true if percent change is positive
// example: isPositive("goog");
function isPositive($ticker){
    $percent = getPercentChanged($ticker);
    echo $percent;
    if (strcmp($percent[0], "+")==0){
        return true;
    }
    return false;
}

    //echo getCurrentPrice("goog");
    //echo getClosingPrice("goog");
    //echo getPercentChanged("goog");
    //echo getOpeningPrice("goog");
    //echo getCompanyName("goog");

    //getHistoricalData('GOOG', "010102015", "01012016");
    //var_dump($a);

    //echo isValidTicker("goog");
    //echo marketIsOpen();
    //echo isPositive("lnkd");

?>

