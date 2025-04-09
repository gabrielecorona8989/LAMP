<!--Pagina di benvenuto che mostri un messaggio di benvenuto e un link per accedere alla pagina di login.-->
<?php
    session_start();
    if(isset($_SESSION['utente'])){
        $collegamento = "<a href='uscita.php'>Esci</a>";
    } else {
        $collegamento = "<a href='accesso.php'>Accedi</a>";
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Pagina di Benvenuto</title>
    </head>
    <body>
        <h1>Benvenuto</h1>
        <h2>Questa è una pagina di benvenuto.</h2>
        <a href="riservata.php">Riservata</a><br />
        <?php echo $collegamento;?>
    </body>
</html>