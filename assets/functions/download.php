<?php
session_start();

//On vérifie si on peut récupérer la dernière conversion effectuée
if (isset($_SESSION['lastConversionFile'])) {

    //Récupération du filepath vers le fichier converti
    $lastConversionFile = $_SESSION['lastConversionFile'];
    $filePath = "../../" . $lastConversionFile;

    //Récupération du nom du fichier
    $fileName = str_replace("convertedFiles/", "", $lastConversionFile);

    //Récupération du contenu du fichier
    $file = file_get_contents($filePath);

    //Téléchargement du fichier sous Json
    header('Content-disposition: attachment; filename=' . $fileName);
    header('Content-type: application/json');
    echo $file;
}
