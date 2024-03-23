<?php
$filename = "../transactions.csv";
$temp = "tempcl.csv";
$transactions = fopen($filename, "r");
$tempcl = fopen($temp, "w");
$targetID = $_REQUEST["targetID"];

while($data = fgetcsv($transactions)){
    if($data[0] == $targetID){
        $data[1] = $_REQUEST["newClientID"];
        $data[2] = $_REQUEST["newProduct"];
        $data[3] = $_REQUEST["newProfit"];
    }
    fputcsv($tempcl, $data);
}
fclose($transactions);
fclose($tempcl);

unlink($filename);
rename($temp, $filename);
echo "Dane dla transakcji o ID $targetID zostały pomyślnie zmienione.<br>";
?>
<a href="../CRUD.html">Powrót</a>