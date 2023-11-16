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
        <form action="" method="post">
            <input type="file" name="csvFile" id="csvFile">
            <input type="submit" value="Convertir le fichier en JSON">
        </form>

        <?php

        //require_once("assets/classes/Converter.php");

        var_dump('là');
        //Vérification de si le fichier est uploadé
        if (isset($_FILES['csvFile'])) {

            $uploadedFile = $_FILES['csvFile'];

            var_dump('là');
            //Vérification de si il s'agit bien d'un CSV
            if ($uploadedFile['type'] === "text/csv") {

                //$converter = new Converter(Type::Csv);
                //$res = $converter->convert($uploadedFile);

                var_dump('là');
            } else {
                echo "<p>Le fichier envoyé n'est pas un CSV.</p>";
            }
        }
        ?>
    </main>
</body>

</html>