<?php
// Start the session
session_start();

// Check for cookies
include("php/cookie_check.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wim Hof</title>

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

    <main style="justify-content: center;">
        <img class="slika1" src='image/WimHofMethod.png' alt='' width='300px' height='400px'>
        <a href="https://www.youtube.com/watch?v=ixWL16B8Xqk/page.html">Wim Hof metoda demonstracija</a>
    </main>

    <footer>
    Wim Hof
    </footer>

</body>

</html>