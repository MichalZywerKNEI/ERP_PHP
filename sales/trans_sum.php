<?php
$filename = "transactions.csv";
$transactions = fopen($filename, "r");
$cur_date = time();
$b2y_date = strtotime("-2 year");
$sum = 0;
$data = fgetcsv($transactions);
while($data = fgetcsv($transactions)){
	if(intval($data[4]) > $b2y_date && intval($data[4]) < $cur_date){
		$sum += floatval($data[3]);
	}
}
fclose($transactions);
echo "Transakcje z ostatnich 2 lat wygenerowały " . strval($sum) . " przychodu.<br>";
?>
<a href="../index.html">Powrót</a>