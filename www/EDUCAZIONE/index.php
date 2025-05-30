<?php

function getProduct($barcode)
{
    $url = "https://world.openfoodfacts.org/api/v0/product/$barcode.json";

    //esegue una richiesta HTTP GET all'URL costruito e salva la risposta nella variabile $response
    $response = file_get_contents($url);
    //converte la risposta JSON in un array associativo PHP
    $data = json_decode($response, true);

    if ($data && $data['status'] == 1) {
        return [true, $data];
    } else {
        return [false, $data];
    }
}
//se è presente un parametro a barre chiama getProduct
if (isset($_GET['barcode'])) {
    [$retval, $data] = getProduct($_GET['barcode']);
     
    //se trova prodotto stampa nome,immagine,ingredienti e ecoscore
    if ($retval) {
        $htmlout .= '<h1>' . $data['product']['product_name'] . '</h1>';
        $htmlout .= "<img src='" . $data['product']['image_front_small_url'] . "'>";
        $htmlout .= '<h3>Ingredienti: </h3>';
        $htmlout .= '<p>' . $data['product']['ingredients_text'] . '</p>';
        $htmlout .= '<h3>Eco Score: </h3>';
        $htmlout .= '<p>' . strtoupper($data['product']['ecoscore_grade']) . '</p>';
        $htmlout .= '<h3>Imballaggio: </h3>';
        $htmlout .= '<p>' . $data['product']['packaging_text'] . '</p>';
    } else
        $htmlout = '<h2>Prodotto non trovato</h2>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MangiaVerde</title>
</head>
<body>
    <header id=header style="margin:0;">
        <h2>Mangia Verde</h2>
        
    </header>
    <div id="reader" style="width:300px;"></div>
    <div id="container">
        <form action="">
            <input type="text" name="barcode" id="result" placeholder="Inserisci il codice a barre">
            <button type="submit">Cerca</button>
        </form>


        <?= $htmlout ?>

    </div>
</body>
</html>