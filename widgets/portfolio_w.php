<?php

$portfolio = getPortfolio($email); // gets the user's portfolio stocks
echo "<div class=\"panel panel-primary\" style=\"border-color:black\">";
	echo "<div class=\"panel-heading\" style=\"color:black; background-color:white; border-color:black;\">Your Portfolio</div>";
	echo "<div class=\"panel-body\" style=\"height:250px; overflow-y:scroll;\">";
		echo "<table class=\"table table-bordered\">";
			echo "<tr>";
				echo "<td>" . "Ticker Name" . "</td>";
				echo "<td>" . "Company Name" . "</td>";
				echo "<td>" . "Shares Owned" . "</td>";
				echo "<td>" . "Current Price" . "</td>";
				echo "<td>" . "Show on Graph" . "</td>";
			echo "<tr>";
			foreach($portfolio as $ticker => $amount) {
				echo "<tr>";
					echo "<td>" . $ticker . "</td>";
					echo "<td>" . getCompanyName($ticker) . "</td>";
					echo "<td>" . $amount . "</td>";
					echo "<td>" . getCurrentPrice($ticker) . "</td>";
					echo "<td>" . "<input type=\"checkbox\" value=\"check" . $ticker . "\">" . "</td>";
				echo "<tr>";
			}
		echo "</table>";
	echo "</div>";
echo "</div>"; 

?>