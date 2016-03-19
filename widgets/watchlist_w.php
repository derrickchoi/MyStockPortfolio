<?php

$watchlist = getWatchlist($email); // gets the user's portfolio stocks
echo "<div class=\"panel panel-primary\" style=\"border-color:black\">";
	echo "<div class=\"panel-heading\" style=\"color:black; background-color:white; border-color:black;\">Your Watchlist</div>";
	echo "<div class=\"panel-body\" style=\"height:250px; overflow-y:scroll;\">";
		echo "<table class=\"table table-bordered\">";
			echo "<tr>";
				echo "<td>" . "Remove" . "</td>";
				echo "<td>" . "Ticker Name" . "</td>";
				echo "<td>" . "Company Name" . "</td>";
				echo "<td>" . "Show on Graph" . "</td>";
			echo "<tr>";
			foreach($watchlist as $ticker => $amount) {
				echo "<tr>";
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