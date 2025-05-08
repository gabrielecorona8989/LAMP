<?php 
//Costanti per la connessione al database
define('DB SERVER', 'localhost');
define('DB_USERNAME', 'login_user');
define('DB PASSWORD', 'password');
define('DB NAME', 'LOGIN');
$html_out=""; //variabile che conterra 11 messaggio HTML da mostrare all'utente.
try {
// Connessione al database
$conn= mysqli_connect (DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verifica della connessione
if (!$conn) {
    //die("Connessione fallita: mysqli_connect_error());
    $html_out= "Attenzione! Connessione al database fallita." . mysqli_connect_error();
}
$html_out="Connessione al database riuscita.";

//mettere query qui


// Chiusura della connessione
mysqli_close($conn);
} catch (Exception $e) {
$html_out ="Attenzione! Si è verificata un'eccezione." . $e->getMessage();
}
?>