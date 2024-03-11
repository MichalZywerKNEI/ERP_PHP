<?php
$filename = "clients.csv";
$temp = "tempcl.csv";
$clients = fopen($filename, "r");
$tempcl = fopen($temp, "w");
$targetID = $_REQUEST["targetID"];

while($data = fgetcsv($clients)){
    if($data[0] == $targetID){
        $data[1] = $_REQUEST["newName"];
        $data[2] = $_REQUEST["newMail"];
        $data[3] = $_REQUEST["newSub"];
    }
    fputcsv($tempcl, $data);
}
fclose($clients);
fclose($tempcl);

unlink($filename);
rename($temp, $filename);
echo "Dane dla klienta o ID $targetID zostały pomyślnie zmienione.<br>";
echo '<a href="../index.html">Powrót</a>';
?>