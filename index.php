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

    <main>
        <div class="section">
            <h2>
                O Wim Hofu
            </h2>
            <p>
                Wim Hof ​​(rođen 20. travnja 1959.), također poznat kao The Iceman, nizozemski
                je motivacijski govornik i ekstremni sportaš poznat po svojoj sposobnosti da
                izdrži niske temperature.<br>
                Prethodno je držao Guinnessov svjetski rekord u
                plivanju ispod leda i dugotrajnom kontaktu cijelog tijela s ledom, a drži
                i rekord u bosonogom polumaratonu na ledu i snijegu.<br>
                Te podvige pripisuje svojoj
                Wim Hof ​​metodi, kombinaciji čestog izlaganja hladnoći, tehnika disanja i meditacije.<br>
                Hof je bio predmetom nekoliko medicinskih procjena i bestselera The New York Timesa
                What Doesn't Kill Us koji je napisao istraživački novinar Scott Carney.<br>
            </p>
        </div>
        <div class="section">
            <h2>
                Osobni život
            </h2>
            <p>
                Wim Hof ​​je rođen 20. travnja 1959. u Sittardu, Limburg, Nizozemska.<br>
                Bio je jedno od devetero djece.<br>
                Hof je upoznao svoju prvu suprugu Marivelle-Mariju, također zvanu "Olaya Rosino Fernandez" (rođena 1960., iz Baskije, Španjolska) u Vondelparku u Amsterdamu u vrtu ruža.<br>
                Umrla je samoubojstvom 1995. godine skočivši s osmerokatnice. Dijagnosticirana joj je shizofrenija.<br>
                Prva relevantna iskustva Wima Hofa s hladnoćom datiraju iz njegove 17. godine: osjetio je iznenadnu želju da skoči u ledeno hladnu vodu kanala Beatrixpark.<br>
                Prvo relevantno znanstveno istraživanje započelo je 2011. na Sveučilištu Radboud. Dana 19. travnja 2011. rezultati ove studije objavljeni su na nizozemskoj nacionalnoj televiziji.<br>
            </p>
        </div>
        <div class="section">
            <h2>
                Wim Hof ​​metoda
            </h2>
            <p>
                Hof prodaje režim pod nazivom Wim Hof ​​metoda, koji uključuje snagu volje, izlaganje hladnoj vodi i tehnike disanja.<br>
                Hof navodi da njegova metoda može smanjiti simptome nekoliko bolesti uključujući: reumatoidni artritis, multiplu sklerozu, koronavirus i Parkinsonovu bolest.<br>
                Međutim, dok hiperventilacija može privremeno smanjiti upalni odgovor na injekciju endotoksina, Hofove tvrdnje nisu znanstveno dokazane.<br>
                Wouter van Marken Lichtenbelt, jedan od znanstvenika koji je proučavao Hofa, rekao je: Hofov znanstveni vokabular je galimatias.<br>
                S uvjerenjem, on na besmislen način miješa znanstvene pojmove kao nepobitne dokaze.<br>
                " Međutim, Van Marken Lichtenbelt dalje kaže: "Kada prakticirate Wim Hof ​​metodu s dobrom dozom zdravog razuma (na primjer, ne hiperventilirajte prije potapanja u vodi) i bez prevelikih očekivanja: ne škodi probati.
            </p>
        </div>
        <div class="section">
            <h2>
                Rekordi Wim Hofa
            </h2>
            <p>
                Najbrže polumaratonsko trčanje je dok je Wim Hof bio bos na ledu na ledu ili snijegu iznosilo je 2 h 16 min 34 s u blizini Oulua, Finska, 26. siječnja 2007.<br>
                16. ožujka 2000. Hof je postavio Guinnessov svjetski rekord za najdalje plivanje ispod leda u svom drugom pokušaju, s udaljenošću od 57,5 ​​metara.<br>
                Rekord je od tada oboren nekoliko puta i od 2022. iznosi 265 stopa (81 m).
                Hof je u siječnju 2010. postavio svjetski rekord za najduže vrijeme u izravnom kontaktu cijelim tijelom s ledom, 44 minute.<br>
                Hofov rekord je oboren nekoliko puta i od 2021. iznosi 3 sata, 28 sekundi.
                Godine 2007.<br>
                Hof se popeo na visinu od 7400 metara (24300 stopa) na Mount Everestu noseći samo kratke hlače i cipele, ali je odustao od pokušaja zbog ponovljene ozljede stopala. Uspio se popeti od baznog logora do oko 6.700 metara samo u kratkim hlačama i sandalama, ali je nakon toga morao obuti čizme.
                Godine 2016. Hof je s novinarom Scottom Carneyem za 28 sati stigao do Gilmans Pointa na planini Kilimanjaro.<br>
            </p>
        </div>
    </main>

    <footer>
        Test
    </footer>

</body>

</html>