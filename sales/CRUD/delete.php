<?php
$targetID = $_REQUEST["targetID"];
$filename = "../transactions.csv";
$temp = "tempcl.csv";
$transactions = fopen($filename, "r");
$tempcl = fopen($temp, "w");

while($data = fgetcsv($transactions)){
    if($data[0] != $targetID){
        fputcsv($tempcl, $data);
    }
}
fclose($transactions);
fclose($tempcl);

unlink($filename);
rename($temp, $filename);
echo "Transakcja o ID $targetID została pomyślnie usunięta.<br>";
?>
<a href="../CRUD.html">Powrót</a>