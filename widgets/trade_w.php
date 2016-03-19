<br />
<?php
	echo '<form action="php/trade_form_handle.php?email=' . urlencode($email . '&') . '" id="tradeForm" method="post">';
?>
	<div class="form-inline">
		<div class="form-group">
			<label for="ticker">Ticker Name</label>
			<input type="text" class="form-control" id="ticker" name="ticker" placeholder="AAPL">
		</div>
		<div class="form-group">
			<label for="companyName">Company Name</label>
			<input type="text" class="form-control" id="companyName" name="companyName" placeholder="Apple Inc.">
		</div>
	</div>
	<div class="form-group">
		<label for="amount">Quantity</label>
		<input type="number" class="form-control" id="amount" name="amount" placeholder="100">
	</div>
	<button type="submit" class="btn btn-default" name="buy_button">Buy</button>
	<button type="submit" class="btn btn-default" name="sell_button">Sell</button>
</form>