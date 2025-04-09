<?php
    session_start();

    require 'funzioni.php';

    $collegamento = impostaCollegamento();
    
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Pagina di Benvenuto</title>
    </head>
    <body>
        <h1>Benvenuto</h1>
        <a href="riservata.php">Riservata</a>
        <br>
        <?php echo $collegamento; ?>
    </body>
</html>