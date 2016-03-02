<?php

?>
<br />
	<div class="form-inline">
		<div class="form-group">

			<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	   	    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		    <link rel="stylesheet" href="/resources/demos/style.css">
			<script src="search_auto.js"></script>

			<label for="stock">Stock Search: </label>
			<input type="text" class="form-control" id="searchStock" placeholder="Search for a stock">
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
			    $( "#searchStock" ).autocomplete({
			      source: availableStock
			    });
			  });
			</script>

			<script>
			document.getElementById("searchStock").addEventListener("keypress", function(event) {
				if (event.keyCode === 13) {
					var table = document.getElementById("stock-list");
					var row = table.appendChild(document.createElement("tr"));

					var name = row.appendChild(document.createElement("td"));
					name.textContent = this.value;

					var display = row.appendChild(document.createElement("td"));
					display.textContent = "display from";

					var startDate = row.appendChild(document.createElement("td"));
					startDate.contentEditable = true;
					startDate.textContent = "9/29";

					var to = row.appendChild(document.createElement("td"));
					to.textContent = "to";

					var endDate = row.appendChild(document.createElement("td"));
					endDate.contentEditable = true;
					endDate.textContent = "2/29";

					var graphRow = row.appendChild(document.createElement("td"));

					var graphButton = graphRow.appendChild(document.createElement("button"));
					graphButton.classList.add("btn", "btn-default");
					graphButton.textContent = "Graph";

					var watchlistRow = row.appendChild(document.createElement("td"));

					var watchlistButton = watchlistRow.appendChild(document.createElement("button"));
					watchlistButton.classList.add("btn", "btn-default");
					watchlistButton.setAttribute("id", "watchlistButton");
					watchlistButton.textContent = "Add to Watchlist";
				}
			});
			</script>

			<script>
			startDate.addEventListener(“input”, function(event) {
				console.log(this.textContent);
			});

			endDate.addEventListener(“input”, function(event) {
				console.log(this.textContent);
			});
			</script>

			<script>
			// document.getElementById("searchStock").addEventListener("keypress", function(event) {
			// 	onclick="myfunction()"

			// function myfunction() {
			// 	window.location.href = ".?ticker=" + encodeURI(ticker) + "?start=" + encodeURI(start date) + "?end=" + encodeURI(end date);
			// }
			</script>


		</div>

		<table class="table table-bordered" id="stock-list">

		</table>

	</div>

<br />