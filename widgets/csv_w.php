<?php
	// This block creates a label and a button for csv file importing and
	// allows the user to select a file from their computer
	echo "<div class=\"form-group\">
		<form enctype=\"multipart/form-data\" method=\"POST\" action=\"php/csv_process.php\">
		    <label for=\"csvInputFile\" style=\"margin: 3px\">.csv Import</label>
		    <input type=\"file\" class=\"btn btn-default\" name=\"csvInputFile\" id=\"csvInputFile\" style=\"margin: 3px\">
		    <input type=\"submit\" value=\"Upload File\" style=\"margin: 3px\">
	    </form>
    </div>";

    // <p class=\"help-block\">Choose a .csv file to import</p>
    // add ^that line to make a helper tip below input file button to tell user what to do
?>