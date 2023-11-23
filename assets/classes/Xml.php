<?php

require_once("assets/interfaces/ConverterInterface.php");

class Xml implements ConverterInterface
{
    public static function convert(string $content): string
    {
        //Récupération du contenu du fichier Xml
        $xml = $content;

        //Conversion Xml (en string) vers un tableau
        $xmlArray = simplexml_load_string($xml);

        //Conversion tableau vers Json
        $jsonRes = json_encode($xmlArray);

        return $jsonRes;
    }
}
