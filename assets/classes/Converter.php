<?php

//require_once("Xml.php");
//require_once("Csv.php");

enum Type
{
    case Csv;
    case Xml;
}

class Converter
{
    private Type $type = Type::Csv;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    public function convert(array $file): string
    {

        //$uploadedFileContentString = file_get_contents($file['tmp_name']);

        switch ($this->type) {
            case Type::Xml:
                //$jsonArray = Xml::convert();
                break;

            default:
                //$jsonArray = Csv::convert($uploadedFileContentString);
                var_dump('là');
                break;
        }

        return "";
    }
}
