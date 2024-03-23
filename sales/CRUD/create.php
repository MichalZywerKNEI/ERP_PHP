<?php
$new_id = uniqid();
$filename = "../transactions.csv";
$transactions = fopen($filename, "a");
$trans_data = [
	$new_id,
	$_REQUEST["clientID"],
	$_REQUEST["product"],
	$_REQUEST["profit"],
	time()
];
fputcsv($transactions, $trans_data);
echo "Dodano nową transakcję o ID " . $trans_data[0];
fclose($transactions);
?>
<br>
<a href="../CRUD.html">Powrót</a>