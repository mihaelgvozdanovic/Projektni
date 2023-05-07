<?php
// DB
include("baza.php");

// Check if the request method is of type POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Get searched data with $_POST
    $username = $_SESSION['user_username'];

    // Select searched data from the MySQL DB server
    $db_query = "DELETE FROM baza WHERE username LIKE '" . $username . "' LIMIT 1";
    $db_results = mysqli_query($db_connection, $db_query);

    // If successfully deleted
    if ($db_results == TRUE) {
        // End the session
        session_destroy();

        // Check if the cookie is set
        if (isset($_COOKIE['loggedin'])) {

            unset($_COOKIE['loggedin']);
            setcookie("loggedin", "", time() - 3600, "/");

            unset($_COOKIE['user_id']);
            setcookie("user_id", "", time() - 3600, "/");

            unset($_COOKIE['user_username']);
            setcookie("user_username", "", time() - 3600, "/");

            unset($_COOKIE['user_email']);
            setcookie("user_email", "", time() - 3600, "/");

            unset($_COOKIE['user_password']);
            setcookie("user_password", "", time() - 3600, "/");

            unset($_COOKIE['user_regdate']);
            setcookie("user_regdate", "", time() - 3600, "/");
        }

        // Redirect to the index page
        header("Location: ../index.php");
    } else {
        // If the deleting failed
        header("Location: ../account.php?error=couldnt_delete");
        exit();
    }
} else {
    // Login not requested, exit back
    header("Location: ../account.php?state=deleting_not_requested");
    exit();
}
?>