<script>

	function startTime() {

		// code for automatic time out after 5 minutes of inactivity:
		var t;

		window.onload = resetTimer;
		document.onmousemove = resetTimer;
		document.onkeypress = resetTimer;

		function logout() {
			location.href = 'php/logout.php';
		}

		function resetTimer() {
			clearTimeout(t);
			t = setTimeout(logout, 300000);
		}

		// display current time in EST:
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
<br />
<?php 
	// echo getBalance($email);
?>