<?php 
    require 'funzioni.php';

    session_start();

    [$sessionRetval, $sessionmsg] = controlloSessione();

    if (!$sessionRetval) {
        $url = 'Location: login.php';
        $url .= '?from='.basename($_SERVER['PHP_SELF']);
        $url .= '&error=' . $sessionmsg;
        header($url);
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pagina Riservata</title>
</head>
<body>
    <?="<h3>Benvenuto " . $_SESSION['utente'] . "</h3>"?>

    <a href="index.php">Home page</a>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
