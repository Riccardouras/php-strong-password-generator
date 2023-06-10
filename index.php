
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
</head>
<body>
    <?php
        include 'function.php';
        // VARIABILI GET
        $lunghezzaPassword = $_GET['lunghezza'];
        $consentiRipetizioni = $_GET['ripetizioni'] == 'si'; 
        $consentiLettere = isset($_GET['lettere']);
        $consentiNumeri = isset($_GET['numeri']);
        $consentiSimboli = isset($_GET['simboli']);

        $passwordGenerata = generaPassword($lunghezzaPassword, $consentiRipetizioni, $consentiLettere, $consentiNumeri, $consentiSimboli);
    ?>
    <header>
        <form action="index.php" method="$_GET">
            <label for="lunghezza">Lunghezza Password</label>
            <input type="Number" name="lunghezza" min="8">
            <label for="ripetizioni">Consenti ripetizioni di uno o più caratteri</label>
            <label for="ripetizioni">Sì</label>
            <input type="radio" name="ripetizioni">
            <label for="ripetizioni">No</label>
            <input type="radio" name="ripetizioni">
            <label for="lettere">Lettere</label>
            <input type="checkbox" name="lettere">
            <label for="numeri">Numeri</label>
            <input type="checkbox" name="numeri">
            <label for="simboli">Simboli</label>
            <input type="checkbox" name="simboli">
        </form>
    </header>
    <main>
        <h1>
        <?php
        echo "Password generata: " . $passwordGenerata;
        ?>
        </h1>
    </main>
</body>
</html>