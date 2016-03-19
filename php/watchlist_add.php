<?php

require_once("db_query.php");
$ticker = $_GET['ticker'];
// echo $ticker;

addToWatchlist($ticker);

?>