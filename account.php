<?php
// Start the session
session_start();

// Check for cookies
include("php/cookie_check.php");

// If the user is logged in, go back to index page
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
} else if (!isset($_COOKIE['loggedin'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wim Hof - Profil</title>

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
            <h2>
                Vaš profil
            </h2>

            <hr>

            <?php
            echo '<p class=""> Korisničko ime: ' . $_SESSION['user_username'] . '</p>';
            echo '<p class=""> E-mail: ' . $_SESSION['user_email'] . '</p>';
            echo '<p class=""> Datum registracije: ' . $_SESSION['user_regdate'] . '</p>';
            ?>

            <form action="php/brisanje.php" method="POST">

                <button class="delete" type="submit">
                    Izbrisi profil zauvijek
                </button>

                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "couldnt_delete") {
                        echo '<p class="error"> Neuspješno brisanje računa. Pokušajte ponovno. </p>';
                    }
                    if (isset($_SESSION['error'])) {
                        echo '<p class="error">' . $_SESSION['error'] . '</p>';
                    }
                }
                ?>

            </form>

            <form action="php/promijeni.php" method="POST">

                <label class="input_title" for="input_password">
                    Trenutna lozinka
                </label>

                <input class="input_field" id="input_password" name="password" placeholder="Enter your current password" type="password" required>

                <label class="input_title" for="input_new_password">
                    Nova lozinka
                </label>

                <input class="input_field" id="input_new_password" name="new_password" placeholder="Enter your new password" type="password" required>

                <button class="change" type="submit">
                    Promijeni lozinku
                </button>

                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "wrong_password") {
                        echo '<p class="error"> Pogrešna trenutna lozinka. </p>';
                    }
                    if ($_GET['error'] == "couldnt_change") {
                        echo '<p class="error"> Neuspješno mijenjanje lozinke. Pokušajte ponovno. </p>';
                    }
                    if (isset($_SESSION['error'])) {
                        echo '<p class="error">' . $_SESSION['error'] . '</p>';
                    }
                }

                if (isset($_GET['success'])) {
                    if ($_GET['success'] == "change") {
                        echo '<p class="error"> Lozinka uspješno promijenjena. </p>';
                    }
                }
                ?>

            </form>

        </div>
    </main>

    <footer>
        Test
    </footer>

</body>

</html>