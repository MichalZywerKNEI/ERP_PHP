<?php
$targetID = $_REQUEST["targetID"];
$filename = "clients.csv";
$temp = "tempcl.csv";
$clients = fopen($filename, "r");
$tempcl = fopen($temp, "w");

while($data = fgetcsv($clients)){
    if($data[0] != $targetID){
        fputcsv($tempcl, $data);
    }
}
fclose($clients);
fclose($tempcl);

unlink($filename);
rename($temp, $filename);
echo "Klient o ID $targetID został pomyślnie usunięty.<br>";
echo '<a href="../index.html">Powrót</a>';
?>