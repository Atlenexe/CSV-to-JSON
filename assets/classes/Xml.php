<?php

require_once("assets/interfaces/ConverterInterface.php");

class Xml implements ConverterInterface
{
    public static function convert(string $content): array
    {
        return [];
    }
}
