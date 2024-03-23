<?php
$filename = "transactions.csv";
$transactions = fopen($filename, "r");
$highVal = 0.0;
$highData;
$data = fgetcsv($transactions);
while($data = fgetcsv($transactions)){
	if(floatval($data[3]) > $highVal){
		$highData = $data;
		$highVal = floatval($data[3]);
	}
}
fclose($transactions);
echo "Dane najbardziej przychodowej transakcji:<br>";
echo "UID: " . $highData[0] . ", ID klienta: " . $highData[1] . ", produkt: " . $highData[2] . ", dochód: " . $highData[3] . ", czas transakcji: " . date("Y-m-d H:i:s", $highData[4]) . "<br>";
?>
<a href="../index.html">Powrót</a>