
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
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
        <div class="mb-5 text-center">
            <h1 id="font">Generatore di Password</h1>
        </div>
        
        <form class="flex col " action="index.php" method="$_GET">
            <div>
                <label for="lunghezza">Lunghezza Password:</label>
                <input type="Number" name="lunghezza" min="8">
            </div>
            <div class="form-check mt-2">
                <div>
                    <p>Consenti ripetizioni di uno o più caratteri</p>
                    <label for="ripetizioni">Sì</label>
                    <input class="form-check-input" type="radio" name="ripetizioni">
                </div>
                <div>
                    <label for="ripetizioni">No</label>
                    <input  class="form-check-input" type="radio" name="ripetizioni">
                </div>
            </div>
            <div class="form-check mt-2">
                <div>
                    <p>Scegli:</p>
                    <label for="lettere">Lettere</label>
                    <input class="form-check-input" type="checkbox" name="lettere">
                </div>
                <div>
                    <label for="numeri">Numeri</label>
                    <input class="form-check-input" type="checkbox" name="numeri">   
                </div>
                <div>
                    <label for="simboli">Simboli</label>
                    <input class="form-check-input" type="checkbox" name="simboli">
                </div>
            </div>
        </form>
    </header>
    <main class="mt-4">
        <h1>
        <?php
            echo "Password generata: " . $passwordGenerata;
        ?>
        </h1>
    </main>
</body>
</html>