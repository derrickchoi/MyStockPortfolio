<?php

require_once("db_query.php");

$email = $_POST["inputEmail"];
$password = $_POST["inputPassword"];

// encrypt the given password to compare against encrypted password in DB
$encryptedPassword = encrypt($password);

if (credentialsValid($email, $encryptedPassword)) {
	$_SESSION["user_email"] = $email;
}

function encrypt($pass_word) {
	return $pass_word;
}

?>

<!DOCTYPE html>
<html>
<script type="text/javascript">
<!--
window.location = "index.php";
//–>
</script>
</html>