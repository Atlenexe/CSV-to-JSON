<?php

interface ConverterInterface
{
    public static function convert(string $content): string|false;
}
