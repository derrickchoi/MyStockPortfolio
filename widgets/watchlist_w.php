<?php

$watchlist = getWatchlist($email); // gets the user's portfolio stocks
echo "<div class=\"panel panel-primary\" style=\"border-color:black\">";
	echo "<div class=\"panel-heading\" style=\"color:black; background-color:white; border-color:black;\">Your Watchlist</div>";
	echo "<div class=\"panel-body\" style=\"height:250px; overflow-y:scroll;\">";
		echo "<table id=\"watchlist\"class=\"table table-bordered\">";
			echo "<tr class=\"watchlist-header-row\">";
				echo "<td class=\"watchlist-header-column\">" . "Remove" . "</td>";
				echo "<td class=\"watchlist-header-column\">" . "Ticker Name" . "</td>";
				echo "<td class=\"watchlist-header-column\">" . "Company Name" . "</td>";
				echo "<td class=\"watchlist-header-column\">" . "Show on Graph" . "</td>";
			echo "<tr>";
			foreach($watchlist as $ticker => $amount) {
				echo "<tr class=\"watchlist-row\">";
					echo "<td>" . "<form enctype=\"multipart/form-data\" method=\"POST\" action=\"php/watchlist_delete_handle.php\">
								   <button style=\"background:none; border:none; margin:0; padding:0\">&#10006</button></form>" . "</td>";
					echo "<td>" . $ticker . "</td>";
					echo "<td>" . getCompanyName($ticker) . "</td>";
					echo "<td>" . "<input type=\"checkbox\" value=\"wcheck" . $ticker . "\">" . "</td>";
				echo "<tr>";
			}
		echo "</table>";
	echo "</div>";
echo "</div>"; 

?>