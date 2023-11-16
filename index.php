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
                $uploadedFileContentString = file_get_contents($uploadedFile['tmp_name']);

                $resultArray = convertCsvToArray($uploadedFileContentString);

                if (isset($resultArray)) {

                    $filePath = "jsons";
                    $fileName = str_replace(".csv", "", $uploadedFile['name']);
                    $jsonFile = $filePath . "/" . $fileName . ".json";

                    file_put_contents($jsonFile, json_encode($resultArray));

                    echo '<p>Le fichier CSV a bien été converti en Json. <a href="' . $jsonFile . '" target="_blank">Télécharger le fichier JSON.</a></p>';
                } else {
                    echo "<p>Un problème est survenu lors de la conversion.</p>";
                }
            } else {
                echo "<p>Le fichier envoyé n'est pas un CSV.</p>";
            }
        }
        ?>
    </main>
</body>

</html>