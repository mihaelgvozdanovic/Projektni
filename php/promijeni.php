<?php
// DB
include("baza.php");

// Check if the request method is of type POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if $_POST super global variable is not null
    // !isset to check if login or register
    if (isset($_POST['password'], $_POST['new_password'])) {

        // Get searched data with $_POST
        $username = $_SESSION['user_username'];
        $password = $_POST['password'];
        $new_password = $_POST['new_password'];

        // Select searched data from the MySQL DB server
        $db_query = "SELECT * FROM baza WHERE username LIKE '" . $username . "' LIMIT 1";
        $db_results = mysqli_query($db_connection, $db_query);
        $user_data = mysqli_fetch_assoc($db_results);

        // Check if the provided password matches the one in the DB
        if (!($password === $user_data['password'])) {
            // If the entered username is in the DB
            header("Location: ../account.php?error=wrong_password");
            exit();
        }

        // Select searched data from the MySQL DB server
        $db_query = "UPDATE baza SET password='" . $new_password . "' WHERE password='" . $password . "';";
        $db_results = mysqli_query($db_connection, $db_query);

        // If successfully deleted
        if ($db_results == TRUE) {

            // Update the session
            session_regenerate_id();
            $_SESSION['user_password'] = $user_data['password'];

            // Update a cookie
            unset($_COOKIE['user_password']);
            setcookie("user_password", "", time() - 3600, "/");
            setcookie("user_password", $_SESSION['user_password'], time() + 60 * 60 * 24 * 30, "/");

            // Redirect to the account page
            header("Location: ../account.php?success=change");
        } else {
            // If the deleting failed
            header("Location: ../account.php?error=couldnt_change");
            exit();
        }
    } else {
        // Redirect to the login page with a "invalid credentials" error
        header("Location: ../account.php?error=invalid_credentials");
        exit();
    }
} else {
    // Login not requested, exit back
    header("Location: ../account.php?state=changing_not_requested");
    exit();
}
?>