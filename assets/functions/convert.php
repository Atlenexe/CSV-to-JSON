<?php

function convertCsvToArray(string $csvContent): array
{
    //On sépare chaque ligne pour les mettre dans un tableau
    $rowsContentArray = array_map("str_getcsv", explode("\n", $csvContent));

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

    return $resultArray;
}
