<?php
if (!isset($_SESSION['loggedin'])) {

    if (isset($_COOKIE['loggedin'])) {
        
        // Update the session
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['user_username'] = $_COOKIE['user_username'];
        $_SESSION['user_email'] = $_COOKIE['user_email'];
        $_SESSION['user_password'] = $_COOKIE['user_password'];
        $_SESSION['user_regdate'] = $_COOKIE['user_regdate'];
        
    }
}
?>