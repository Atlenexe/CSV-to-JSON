<?php

require_once("Xml.php");
require_once("Csv.php");

class Converter
{
    public string $originFileType = "";
    public string $jsonFilePath = "";

    private string $filesDirectory = "convertedFiles";

    public function convert(array $file): string|false
    {

        //Récupération du contenu du fichier
        $uploadedFileContentString = file_get_contents($file['tmp_name']);

        //Récupération du type du fichier
        $type = $file['type'];

        //Initialisation de la variable résultat
        $result = false;

        //Vérification du type de fichier afin d'appeller les bonnes méthodes
        switch ($type) {

                //Si XML
            case "text/xml":
                $result = Xml::convert($uploadedFileContentString);

                if ($result) {
                    $this->saveFile($file, $result);
                }
                break;

                //Si Csv
            case "text/csv":
                $result = Csv::convert($uploadedFileContentString);

                if ($result) {
                    $this->saveFile($file, $result);
                }
                break;

                //Sinon
            default:
                break;
        }

        return $result;
    }

    public function setFinalFilePath(array $file): string
    {
        $this->originFileType = str_replace("text/", "", $file['type']);
        $fileName = str_replace("." . $this->originFileType, "", $file['name']);
        $this->jsonFilePath = $this->filesDirectory . "/" . $fileName . ".json";

        return $this->jsonFilePath;
    }

    private function saveFile(array $file, string $jsonString): void
    {
        $this->setFinalFilePath($file);
        file_put_contents($this->jsonFilePath, $jsonString);
    }
}
