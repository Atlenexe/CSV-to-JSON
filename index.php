<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Eval PHP: CSV to JSON</title>
</head>

<body>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="csvFile" id="csvFile">
            <input type="submit" value="Convertir le fichier en JSON">
        </form>

        <?php

        //Vérification de si le fichier est uploadé
        if (isset($_FILES['csvFile'])) {

            $uploadedFile = $_FILES['csvFile'];

            //Vérification de si il s'agit bien d'un CSV
            if ($uploadedFile['type'] === "text/csv") {

                //On récupère le contenu du fichier en string
                $uploadedFileContentString = file_get_contents($_FILES['csvFile']['tmp_name']);

                //On sépare chaque ligne pour les mettre dans un tableau
                $rowsContentArray = array_map("str_getcsv", explode("\n", $uploadedFileContentString));

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

                var_dump($json = json_encode($resultArray));
            }
        }
        ?>
    </main>
</body>

</html>