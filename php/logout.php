<?php

// end the current session (effectively forgetting the credentials)
session_start();
session_destroy();

// go to index.php to be prompted to log in
header("Location: ../");

?>