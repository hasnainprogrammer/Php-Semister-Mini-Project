<?php
session_start();

// Logout Functionality
$logout = true;
session_unset();
session_destroy();
header("Location: login.php?logout=$logout");

?>

