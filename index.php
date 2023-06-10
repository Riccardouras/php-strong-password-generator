<?php
// VARIABILI GET
$lunghezzaPassword = $_GET['lunghezza'];
$consentiRipetizioni = $_GET['ripetizioni'] == 'si'; 
$consentiLettere = isset($_GET['lettere']);
$consentiNumeri = isset($_GET['numeri']);
$consentiSimboli = isset($_GET['simboli']);

function generaPassword($lunghezza, $ripetizioni, $consentiLettere, $consentiNumeri, $consentiSimboli) {
    // Opzioni disponibili per la password
    $lettere = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numeri = '0123456789';
    $simboli = '!@#$%^&*()_+=-{}[]\|:;"<>,.?/~`';

    // stringa vuota per la password generata
    $password = '';

     // array con le opzioni disponibili per la password
     $opzioni = '';
     if ($consentiLettere) {
         $opzioni .= $lettere;
     }
     if ($consentiNumeri) {
         $opzioni .= $numeri;
     }
     if ($consentiSimboli) {
         $opzioni .= $simboli;
     }
     
     //lunghezza dell'array delle opzioni
    $lunghezzaOpzioni = strlen($opzioni);

     // Genera la password
    for ($i = 0; $i < $lunghezza; $i++) {
        // Se non consenti ripetizioni, controlla se il carattere è già presente nella password
        if (!$ripetizioni && $i > 0) {
            $caratterePrecedente = $password[$i - 1];
            $opzioni = str_replace($caratterePrecedente, '', $opzioni);
        }

    // Aggiunge un carattere casuale dalla stringa delle opzioni alla password
    $password .= $opzioni[rand(0, $lunghezzaOpzioni - 1)];
    }
    
    // Restituisci la password generata
    return $password;
}

$passwordGenerata = generaPassword($lunghezzaPassword, $consentiRipetizioni, $consentiLettere, $consentiNumeri, $consentiSimboli);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
</head>
<body>
    <header>
        <form action="index.php" method="$_GET">
            <label for="">Lunghezza Password</label>
            <input type="Number" name="lunghezza" min="8">
            <label for="">Consenti ripetizioni di uno o più caratteri</label>
            <label for="">Sì</label>
            <input type="radio" name="ripetizioni">
            <label for="">No</label>
            <input type="radio" name="ripetizioni">
            <label for="">Lettere</label>
            <input type="checkbox" name="lettere">
            <label for="">Numeri</label>
            <input type="checkbox" name="numeri">
            <label for="">Simboli</label>
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