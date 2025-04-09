<!--Pagina per l'autenticazione degli utenti ed accesso alla sezione riservata del sito.-->
<?php 
    session_start();
    if(isset($_SESSION['utente'])){
        header('Location: index.php');
        die();
    }

    if (isset($_GET['error'])) {                                         
        // Mostra il messaggio di errore passato tramite query string     
        $mess=$_GET['error'];  
    }


if($_SERVER['REQUEST_METHOD']=='POST') {
    $username_corretto = 'rossi';
    $password_corretta = '123';

    $username_inserito = $_POST['utente'];
    $password_inserita = $_POST['password'];

    if ($username_inserito == $username_corretto && $password_inserita == $password_corretta) {
        // Se i dati sono corretti, salva il nome utente nella sessione e reindirizza l'utente alla pagina principale
        $_SESSION['utente'] = $username_inserito;
        $collegamento = 'Location: ';
        $collegamento .=(!empty($_POST['from']) ? $_POST['from'] : 'index.php');
        header($collegamento);
        die();

    } else {
        $mess= "<h2 style ='color:red'>Nome utente o password errati. Riprova.</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Accesso</title>
    </head>
    <body>
    <?=$mess?>
        <h1>Accesso</h1>
        <form action="<?php echo $_SESSION['PHP_SELF']; ?>" method="POST">
            <label for="utente">Nome utente:</label>
            <input type="text" id="utente" name="utente" required><br><br>
        
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Accedi">
            <!-- tasto per cancellare i dati inseriti-->
             <input type="reset" value="Cancella">

            </br>
            </br>
            <a href="index.php">Torna alla home</a>

            <input type="hidden" name="from" value="<?=$_GET['from'] ?? null ?>">

        </form>
    </body>
</html>