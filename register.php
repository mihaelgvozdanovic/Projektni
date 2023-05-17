<?php
// Start the session
session_start();

// Check for cookies
include("php/cookie_check.php");

// If the user is logged in, go back to index page
if (isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
} else if (isset($_COOKIE['loggedin'])) {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wim Hof - Registracija</title>

    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <header>
        <nav class="left">
            <a href="index.php" class="nav">O Wim Hofu</a>
            <a href="ProdajaKnjiga.php" class="nav">Prodaja Knjiga</a>
            <a href="metoda.php" class="nav">Metoda</a>
        </nav>

        <nav class="right">
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo '<a href="account.php" class="nav"> RAČUN: ' . $_SESSION['user_username'] . '</a>';
                echo '<a href="logout.php" class="nav"> ODJAVA </a>';
            } else {
                echo '<a href="login.php" class="nav"> PRIJAVA </a>';
                echo '<a href="register.php" class="nav"> REGISTRACIJA </a>';
            }
            ?>
        </nav>
    </header>

    <main>
        <div class="section">

            <form action="php/prijava.php" method="POST">

                <h2 class="form">
                    Registracija
                </h2>

                <hr>

                <label class="input_title" for="input_username">
                    Korisničko ime
                </label>

                <input class="input_field" id="input_username" name="username" placeholder="Enter your username" type="text" required>
                
                <label class="input_title" for="input_email">
                    E-mail
                </label>

                <input class="input_field" id="input_email" name="email" placeholder="Enter your e-mail address" type="email" required>
                
                <label class="input_title" for="input_password">
                    Lozinka
                </label>

                <input class="input_field" id="input_password" name="password" placeholder="Enter your password" type="password" required>
                
                <label class="input_title" for="input_repeat_password">
                    Ponoviti lozinku
                </label>

                <input class="input_field" id="input_repeat_password" name="repeat_password" placeholder="Repeat your password" type="password" required>
                
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "invalid_credentials") {
                        echo '<p class="error"> The provided credentials are incorrect. </p>';
                    }
                    if ($_GET['error'] == "wrong_password") {
                        echo '<p class="error"> The provided password is incorrect. </p>';
                    }
                    if ($_GET['error'] == "unknown_username") {
                        echo '<p class="error"> The provided username is incorrect. </p>';
                    }
                    if ($_GET['error'] == "passwords_no_match") {
                        echo '<p class="error"> Passwords do not match. </p>';
                    }
                    if ($_GET['error'] == "already_exists") {
                        echo '<p class="error"> The provided username/e-mail already exists. </p>';
                    }
                    if (isset($_SESSION['error'])) {
                        echo '<p class="error">' . $_SESSION['error'] . '</p>';
                    }
                }
                ?>

                <!-- Submit button -->
                <button class="register" type="submit">
                    Registriraj se
                </button>

            </form>

        </div>
    </main>

    <footer>
    Wim Hof
    </footer>

</body>

</html>