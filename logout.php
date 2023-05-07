<?php
// Start the session
session_start();

// Check for cookies
include("php/cookie_check.php");

// End the session
session_destroy();

// Check if the cookie is set
if (isset($_COOKIE['loggedin'])) {

    unset($_COOKIE['loggedin']);
    setcookie("loggedin", "", time()-3600, "/");

    unset($_COOKIE['user_id']);
    setcookie("user_id", "", time()-3600, "/");

    unset($_COOKIE['user_username']);
    setcookie("user_username", "", time()-3600, "/");

    unset($_COOKIE['user_email']);
    setcookie("user_email", "", time()-3600, "/");

    unset($_COOKIE['user_password']);
    setcookie("user_password", "", time()-3600, "/");

    unset($_COOKIE['user_regdate']);
    setcookie("user_regdate", "", time()-3600, "/");
}

// Redirect to the index page
header("Location: index.php");
?>