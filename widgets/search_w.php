<?php

	$ticker = array(
		"appl" => "apple",
		"fb" => "facebook",
		"goog" => "google",
	);

?>
<br />
<form action="php/search_auto.php">
	<div class="form-inline">
		<div class="form-group">

			<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	   	    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		    <link rel="stylesheet" href="/resources/demos/style.css">
			<script src="search_auto.js"></script>

			<label for="stock">Stock: </label>
			<input type="text" class="form-control" id="stock" placeholder="Search for a stock">
			<script>
			  jQuery(document).ready(function($){
			    var availableStock = [
			      "Apple",
			      "APPL",
			      "Facebook",
			      "FB",
			      "Google",
			      "GOOGL",
			      "Microsoft",
			      "MSFT",
			      "Tesla",
			      "TSLA",
			      "GE",
			      "Samsung",
			      "SSNLF",
			      "Amazon",
			      "AMZN",
			      "IBM",
			      "Intel",
			      "INTC"
			    ];
			    $( "#stock" ).autocomplete({
			      source: availableStock
			    });
			  });
			</script>


		</div>

		<table class="table table-bordered">
 			<tr>
 				<td>Facebook Inc.</td>
 				<td>display from</td>
 				<td contentEditable>9/29</td>
 				<td>to</td>
 				<td contentEditable>2/29</td>
 				<td <button class="btn btn-default">Graph</button>
 				<td <button class="btn btn-default">Add to Watchlist</button>
 			</tr>

 			<tr>
 				<td>Fac & Co.</td>
 				<td>display from</td>
 				<td contentEditable>9/29</td>
 				<td>to</td>
 				<td contentEditable>2/29</td>
 				<td <button class="btn btn-default">Graph</button>
 				<td <button class="btn btn-default">Add to Wishlist</button>
 			</tr>
		</table>

	</div>

</form>
<br />