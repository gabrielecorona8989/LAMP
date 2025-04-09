<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $_SESSION['prove'] = 4;
        $_SESSION['tempo'] = null;
    }

    require 'funzioni.php';

    [$sessionretval, $sessionerrmsg] = controllosessione();

    if($sessionretval) {
        $link = 'Location: ';
        $link .= $_GET['from'] ?? 'index.php';
    
        header($link);
        die();
    }

    $err_mess = $_GET['error'] ?? '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
    (!isset($_SESSION['tempo']) || $_SESSION['tempo'] + 60 < $_SERVER['REQUEST_TIME'])) {

        $utente = $_POST['utente'];
        $password = $_POST['password'];

        [$retval, $retmsg] = controlloLogin($utente, $password);

        if ($retval) {

            $_SESSION['utente'] = $utente;

            $link = 'Location: ';
            $link .= $_POST['from'] != null ? $_POST['from'] : 'index.php';
    
            header($link);
            die();
        }else {
                $err_mess = $retmsg;
                $_SESSION['prove']--;
                $err_mess .= '. Tentativi rimasti: '.$_SESSION['prove'];
                if($_SESSION['prove'] == 0) {
                    $err_mess = 'Tentativi esauriti, account bloccato per 60 secondi';
                    $_SESSION['tempo'] = $_SERVER['REQUEST_TIME'];
                }
            }
    }
    else if ($_SESSION['tempo']) {
        $timeLeft = $_SESSION['tempo'] + 60 - $_SERVER['REQUEST_TIME'];
    
        if ($timeLeft <= 0) {
            $_SESSION['prove'] = 5;
            $_SESSION['tempo'] = null;
        } else {
            $err_mess = "<h2 style ='color:red'>Account bloccato. Riprova tra $timeLeft secondi</h2>";
         
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <div id="login-container">
        <h2>Login</h2>
        <div id="error-container"><?= $err_mess ?></div>
        <form action="<?php ($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="text" name="utente" id="utente" placeholder="Utente" required>
            <br>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <br>
            <input type="submit" value="Login" id="login-button">
            <input type="hidden" name="from" value="<?=$_GET['from'] ?? null?>">
        </form>
    </div>
</body>
</html>