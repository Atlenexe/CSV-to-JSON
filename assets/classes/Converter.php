<?php

require_once("Xml.php");
require_once("Csv.php");

class Converter
{

    public function convert(array $file): string
    {

        //Récupération du contenu du fichier
        $uploadedFileContentString = file_get_contents($file['tmp_name']);

        //Récupération du type du fichier
        $type = $file['type'];

        //Initialisation de la variable résultat
        $jsonRes = "";

        //Vérification du type de fichier afin d'appeller les bonnes méthodes
        switch ($type) {

                //Si XML
            case "text/xml":
                $jsonRes = Xml::convert($uploadedFileContentString);
                break;

                //Si Csv
            case "text/csv":
                $jsonRes = Csv::convert($uploadedFileContentString);
                break;

                //Sinon
            default:
                break;
        }

        return $jsonRes;
    }
}
