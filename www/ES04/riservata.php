<?php
    session_start();
    if (!isset($_SESSION['utente'])){
        // L'utente non è autenticato, quindi redirect alla pagina di login
        $url = 'accesso.php?error=<h2 style= color:red>Fare prima il login&from=';
        $url .= basename($_SERVER['PHP_SELF']);
        header("Location: $url");
        exit;
    }
    // L'utente è autenticato, mostra il messaggio di benvenuto
    echo "<h2> Autenticato</h2>";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pagina Riservata</title>
    </head>
    <body>
        <h1>Benvenuto, <?php echo $_SESSION['utente'];?>!</h1>
        <a href="uscita.php">Logout</a>
        </br>
        <a href="index.php">Torna alla home page</a>
    </body>