<?php
session_start();

// Clear session
session_unset();
session_destroy();

// Remove cookie
setcookie("username", "", time() - 3600, "/");

// Redirect to login
header("Location: index.php");
exit();
