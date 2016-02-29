<?php

$watchlist = getWatchlist($email);

echo "<br />Your watchlist<br />";
foreach($watchlist as $ticker => $amount) {
	echo $ticker . ": " . $amount . "<br />";
}

?>