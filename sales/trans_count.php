<?php
$filename = "transactions.csv";
$transactions = fopen($filename, "r");
$cur_date = time();
$b2y_date = strtotime("-2 year");
$count = 0;
$data = fgetcsv($transactions);
while($data = fgetcsv($transactions)){
	if(intval($data[4]) > $b2y_date && intval($data[4]) < $cur_date){
		$count++;
	}
}
fclose($transactions);
echo "Przez ostatnie 2 lata wykonano " . strval($count) . " transakcji.<br>";
?>
<a href="../index.html">Powrót</a>