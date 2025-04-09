<?php

function controlloSessione() 
{
    if(isset($_SESSION['utente'])){
        return [true, 'sessione avviata'];
        } else {
        return [false, 'sessione non avviata'];
    }
}

function controlloLogin($utente,$password){
    $username_corretto = 'rossi';
    $password_corretta = '123';

    $username_inserito = $utente;
    $password_inserita = $password;

    if ($username_inserito == $username_corretto && $password_inserita == $password_corretta) {
        // Se i dati sono corretti, salva il nome utente nella sessione e reindirizza l'utente alla pagina principale
        $_SESSION['utente'] = $username_inserito;
        return [true, 'login corretto'];
    }
    else {
        return [false, 'login sbagliato'];
    }
}

function uscita(){
    session_start();
    session_destroy();
    header("Location: login.php");
}

function impostaCollegamento(){ 
    if(controlloSessione()[0]){
        $collegamento= "<a href='logout.php'>logout</a>";
        } else {
        $collegamento = "<a href='login.php'>login</a>";
    }
    return $collegamento;
}
?>