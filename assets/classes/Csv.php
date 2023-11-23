<?php

require_once("assets/interfaces/ConverterInterface.php");

class Csv implements ConverterInterface
{
    public static function convert(string $content): string
    {
        //On sépare chaque ligne pour les mettre dans un tableau
        $rowsContentArray = array_map("str_getcsv", explode("\n", $content));

        //Récupération du nom des colonnes
        $columnsNamesArray = $rowsContentArray[0];

        $resultArray = [];

        //Pour chaque ligne du CSV (sauf la première)
        foreach ($rowsContentArray as $key => $row) {
            //On skip la première ligne qui est le nom des colonnes
            if ($key !== 0) {
                //Attribution du contenu pour chaque colonne
                foreach ($columnsNamesArray as $columnKey => $columnName) {
                    $resultArray[$key - 1][$columnName] = $row[$columnKey];
                }
            }
        }

        //Conversion tableau vers Json
        $jsonRes = json_encode($resultArray);

        return $jsonRes;
    }
}
