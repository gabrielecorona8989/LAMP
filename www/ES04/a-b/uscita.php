<!--Crea una pagina di logout che distrugge la sessione e reindirizza l'utente alla pagina di benvenuto.-->
<?php 
    session_start();
    session_destroy();
    header("Location: index.php");
?>