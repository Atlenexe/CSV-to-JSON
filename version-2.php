<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Eval PHP: CSV to JSON version 2</title>
</head>

<body>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="uploadedFile" id="uploadedFile">
            <input type="submit" value="Convertir le fichier en JSON">
        </form>

        <?php
        require_once("assets/classes/Converter.php");

        session_start();

        //Vérification de si le fichier est uploadé
        if (isset($_FILES['uploadedFile'])) {

            //On garde le fichier dans cette variable
            $uploadedFile = $_FILES['uploadedFile'];

            //On appelle la classe Converter
            $converter = new Converter();

            //On convertit le fichier en json
            $conversionResult = $converter->convert($uploadedFile);

            //Récupération du type du fichier d'origine
            $originFileType = $converter->originFileType;

            if ($conversionResult) {
                //Récupération du nom du fichier enregistré
                $jsonFilePath = $converter->jsonFilePath;

                $_SESSION['lastConversionFile'] = $converter->jsonFilePath;

                //Affichage du message de conversion réussie
                echo '<p>Le fichier ' . $originFileType . ' a bien été converti en Json. <a href="assets/functions/download.php" target="_blank">Télécharger le fichier JSON.</a></p>';
            } else {
                //Affichage du message de conversion échouée
                echo '<p>Le fichier ' . $originFileType . ' n\'a pas pû être correctement converti en Json. Veuillez réessayer avec un fichier conforme.</p>';
            }
        } else {
            echo '<p>Veuillez choisir un fichier Xml ou Csv.</p>';
        }
        ?>
    </main>
</body>

</html>