<?php
// If the user is logged in, go back to index page
if (isset($_SESSION['loggedin'])) {
    header("Location: ../index.php");
    exit();
} else if (isset($_COOKIE['loggedin'])) {
    header("Location: ../index.php");
    exit();
}

// DB
include("baza.php");

// Check if the request method is of type POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Check if $_POST super global variable is not null
    // !isset to check if login or register
    if (isset($_POST['username'], $_POST['password']) && !isset($_POST['repeat_password'])) {

        // Get searched data with $_POST
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Select searched data from the MySQL DB server
        $db_query = "SELECT * FROM baza WHERE username LIKE '" . $username . "' LIMIT 1";
        $db_results = mysqli_query($db_connection, $db_query);

        // If there are results
        if ($db_results && mysqli_num_rows($db_results) > 0) {

            // Save user's data
            $user_data = mysqli_fetch_assoc($db_results);

            // Check if the provided password matches the one in the DB
            if ($password === $user_data['password']) {

                // Update the session
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['user_username'] = $user_data['username'];
                $_SESSION['user_email'] = $user_data['email'];
                $_SESSION['user_password'] = $user_data['password'];
                $_SESSION['user_regdate'] = $user_data['regdate'];

                // Set a cookie
                setcookie("loggedin", $_SESSION['loggedin'], time()+60*60*24*30, "/");
                setcookie("user_id", $_SESSION['user_id'], time()+60*60*24*30, "/");
                setcookie("user_username", $_SESSION['user_username'], time()+60*60*24*30, "/");
                setcookie("user_email", $_SESSION['user_email'], time()+60*60*24*30, "/");
                setcookie("user_password", $_SESSION['user_password'], time()+60*60*24*30, "/");
                setcookie("user_regdate", $_SESSION['user_regdate'], time()+60*60*24*30, "/");

                // Redirect to the index page
                header("Location: ../");
                exit();
            }else{
                // If the entered password does not match the DB
                header("Location: ../login.php?error=wrong_password");
                exit();
            }
        }else{
            // If the entered username is not in the DB
            header("Location: ../login.php?error=unknown_username");
            exit();
        }

    // Check if $_POST super global variable is not null
    } else if (isset($_POST['username'], $_POST['password'], $_POST['repeat_password'])) {

        // Get searched data with $_POST
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];

        // Check if 2 provided passwords match
        if (!($repeat_password === $password)) {
            // If the entered username is in the DB
            header("Location: ../register.php?error=passwords_no_match");
            exit();
        }

        // Select searched data from the MySQL DB server
        $db_query = "SELECT * FROM baza WHERE username LIKE '" . $username . "' LIMIT 1";
        $db_results = mysqli_query($db_connection, $db_query);

        // If there are results
        if ($db_results && mysqli_num_rows($db_results) > 0) {

            // If the entered username is in the DB
            header("Location: ../register.php?error=already_exists");
            exit();

        } else {

            // Register the user to DB
            $db_query = "INSERT INTO baza (username, email, password) VALUES ('$username', '$email', '$password')";
            $db_register = mysqli_query($db_connection, $db_query);

            // Check if the user has been registered in the DB
            if ($db_register == TRUE) {

                // Select registered data from the MySQL DB server
                $db_query = "SELECT * FROM baza WHERE username LIKE '" . $username . "' LIMIT 1";
                $db_results = mysqli_query($db_connection, $db_query);
                $user_data = mysqli_fetch_assoc($db_results);

                // Update the session
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['user_username'] = $user_data['username'];
                $_SESSION['user_email'] = $user_data['email'];
                $_SESSION['user_password'] = $user_data['password'];
                $_SESSION['user_regdate'] = $user_data['regdate'];

                // Set a cookie
                setcookie("loggedin", $_SESSION['loggedin'], time()+60*60*24*30, "/");
                setcookie("user_id", $_SESSION['user_id'], time()+60*60*24*30, "/");
                setcookie("user_username", $_SESSION['user_username'], time()+60*60*24*30, "/");
                setcookie("user_email", $_SESSION['user_email'], time()+60*60*24*30, "/");
                setcookie("user_password", $_SESSION['user_password'], time()+60*60*24*30, "/");
                setcookie("user_regdate", $_SESSION['user_regdate'], time()+60*60*24*30, "/");

                // Redirect to the index page
                header("Location: ../");
                exit();

            } else {
                // If the entered password does not match the DB
                header("Location: ../login.php?error=wrong_password");
                exit();
            }

        }

    } else {
        // Redirect to the login page with a "invalid credentials" error
        header("Location: ../login.php?error=invalid_credentials");
        exit();
    }

} else {
    // Login not requested, exit back
    header("Location: ../login.php?state=login_not_requested");
    exit();
}
?>