<?php

require_once("assets/interfaces/ConverterInterface.php");

class Xml implements ConverterInterface
{
    public static function convert(string $content): string|false
    {
        //Récupération du contenu du fichier Xml
        $xml = $content;

        //Conversion Xml (en string) vers un tableau
        $xmlArray = simplexml_load_string($xml);

        $result = false;

        //Gestion des erreurs
        if ($xmlArray) {
            //Conversion tableau vers Json
            $result = json_encode($xmlArray);
        }

        return $result;
    }
}
