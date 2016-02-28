<script>

	function startTime() {
		// get current time
		var today = new Date();

		// adjust current time to EST
		offset = -5.0;
		utc = today.getTime() + (today.getTimezoneOffset() * 60000);
		est = new Date(utc + (3600000*offset));
		document.getElementById('time').innerHTML = est.toLocaleString() + " (EST)";

		// update the time every second (1000 ms)
		setTimeout(startTime, 1000);
	}

</script>
<div id="time"></div>
<a href="php/logout.php">Logout</a>
