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

        require_once("assets/functions/convert.php");

        //Vérification de si le fichier est uploadé
        if (isset($_FILES['csvFile'])) {

            $uploadedFile = $_FILES['csvFile'];

            //Vérification de si il s'agit bien d'un CSV
            if ($uploadedFile['type'] === "text/csv") {

                //On récupère le contenu du fichier en string
                $uploadedFileContentString = file_get_contents($_FILES['csvFile']['tmp_name']);

                $resultArray = convertCsvToArray($uploadedFileContentString);

                var_dump($json = json_encode($resultArray));
            }
        }
        ?>
    </main>
</body>

</html>