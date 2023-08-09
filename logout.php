<?php
// Start the session to access the session variables
session_start();

// Clear the session and redirect to the login page
session_destroy();
header("Location: index.php");
exit;
?>
