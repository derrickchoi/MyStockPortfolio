<?php

$portfolio = getPortfolio($email); // gets the user's portfolio stocks

echo "<br />Your portfolio<br />";
echo "<table class=\"table table-bordered\">";
foreach($portfolio as $ticker => $amount) {
	echo "<tr>";
		echo "<td>" . $ticker . "</td>";
		echo "<td>" . tickername . "</td>";
		echo "<td>" . $amount . "</td>";
		echo "<td>" . currentPrice . "</td>";
		echo "<td>" . checkbox . "</td>";
	echo "<tr>";
	echo $ticker . ": " . $amount . "<br />";
}
echo "</table>"; 

?>