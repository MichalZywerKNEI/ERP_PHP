<?php
$fileName = 'dane.csv';
$data = [$_GET=[name],$_GET=[age],$_GET=[birthday],$_GET=[department]];
$f = fopen($fileName, 'w');
function fputcsv(
    resource $stream,
    array $dane,
    string $separator = ",",
    string $enclosure = "\"",
    string $escape = "\\",
    string $eol = "\n"
): bool|int
?>