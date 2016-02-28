<?php

/*
 fetch stock data from Yahoo Finance API
*/
    



function getCurrentPrice($ticker){
    // return current price of the stock
    
    // fetch data from Yahoo API
    // parameter l1 = Last Trade(Price Only)
    $currentPrice = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=".$ticker."&f=l1&e=.csv");

    return $currentPrice;
    
}

function getCompanyName($ticker){
    //return company name of the stock
    
    // fetch data from Yahoo API
    // parameter n = Name
    $name = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=".$ticker."&f=n&e=.csv");
    
    // removing the quotation marks
    $name = str_replace('"', "", $name);
    return $name;
}
    
function getClosingPrice($ticker){
    //return previous closing price of the stock
    
    // fetch data from Yahoo API
    // parameter p = Prev Close(The closing price for the trading day prior to the last trade reported)
    $prevClose = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=".$ticker."&f=p&e=.csv");
    return $prevClose;
}
    
function getOpeningPrice($ticker){
    //return opening price of the stock
    
    // fetch data from Yahoo API
    // parameter o = Open
    $open = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=".$ticker."&f=o&e=.csv");
    return $open;
}
    
function getPercentChanged($ticker){
    //return percent change of the stock
    
    // fetch data from Yahoo API
    // parameter p2 = Change in Percent
    $change = file_get_contents("http://finance.yahoo.com/d/quotes/csv?s=".$ticker."&f=p2&e=.csv");
    $change = str_replace('"', "", $change);

    return $change;

}


    

?>
