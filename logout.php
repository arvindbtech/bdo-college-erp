<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Optional: Clear session data
$_SESSION = array();

// Redirect to the login page
header("Location: index.php");
exit();
?>
