<?php

$portfolio = getPortfolio($email); // gets the user's portfolio stocks
echo "<div class=\"panel panel-primary\" style=\"border-color:black\">";
	echo "<div class=\"panel-heading\" style=\"color:black; background-color:white; border-color:black;\">Your Portfolio</div>";
	echo "<div class=\"panel-body\" style=\"height:250px; overflow-y:scroll;\">";
		echo "<table id=\"portfolio\" class=\"table table-bordered\">";
			echo "<tr class=\"portfolio-header-row\">";
				echo "<td class=\"portfolio-header-column\">" . "Ticker Name" . "</td>";
				echo "<td class=\"portfolio-header-column\">" . "Company Name" . "</td>";
				echo "<td class=\"portfolio-header-column\">" . "Shares Owned" . "</td>";
				echo "<td class=\"portfolio-header-column\">" . "Current Price" . "</td>";
				echo "<td class=\"portfolio-header-column\">" . "Show on Graph" . "</td>";
			echo "<tr>";
			foreach($portfolio as $ticker => $amount) {
				echo "<tr class=\"portfolio-row\">";
					echo "<td>" . $ticker . "</td>";
					echo "<td>" . getCompanyName($ticker) . "</td>";
					echo "<td>" . $amount . "</td>";
					echo "<td>" . getCurrentPrice($ticker) . "</td>";
					echo "<td>" . "<input type=\"checkbox\" id=\"checkbox-" . $ticker . "\" value=\"check" . $ticker . "\">" . "</td>";
				echo "<tr>";
			}
		echo "</table>";
	echo "</div>";
echo "</div>"; 

?>