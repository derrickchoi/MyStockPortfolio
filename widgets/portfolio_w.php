<?php

$portfolio = getPortfolio($email);

echo "<br />Your portfolio<br />";
foreach($portfolio as $ticker => $amount) {
	echo $ticker . ": " . $amount . "<br />";
}

?>