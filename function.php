<?php
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
    
    // Restituisce la password generata
    return $password;
}

?>