<?php
$filename = "transactions.csv";
$transactions = fopen($filename, "r");
$highVal = 0.0;
$highProd = "0";
$products = array();
$data = fgetcsv($transactions);
while($data = fgetcsv($transactions)){
	if(array_key_exists($data[2], $products)){
		$products[$data[2]] += floatval($data[3]);
	}
	else{
		$products[$data[2]] = floatval($data[3]);
	}

	if($products[$data[2]] > $highVal){
		$highVal = $products[$data[2]];
		$highProd = $data[2];
	}
}
fclose($transactions);
echo "Najbardziej przychodowy produkt to " . $highProd . " dający przychód o wysokości " . strval($products[$highProd]) . "<br>";
?>
<a href="../index.html">Powrót</a>