<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sprzedaż</title>
</head>
<body>
<?php
$mode = $_REQUEST["sales"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "erp_php";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
	die("Error: " . mysqli_connect_error());
}

switch($mode){
	case "sales1":
		sales1();
		break;

	case "sales2":
		sales2();
		break;

	case "sales3":
		sales3();
		break;

	case "sales4":
		sales4();
		break;

	default:
		die("Error: incorrect sales mode: " . $mode);
		break;
}

function sales1(){
	global $conn;
	$query = <<<END
	SELECT * FROM transactions
	ORDER BY profit DESC
	LIMIT 1;
	END;

	$result = mysqli_query($conn, $query);
	if(!$result){
		die("Error: " . mysqli_error($conn));
	}

	$row = mysqli_fetch_row($result);
	echo "ID: " . $row[0] . ", ID klienta: " . $row[1] .
		", Produkt: " . $row[2] . ", Przychód: " . $row[3] . 
		", Data transakcji: " . $row[4];
}

function sales2(){
	global $conn;
	$query = <<<END
	SELECT product, SUM(profit) FROM transactions
	GROUP BY product
	ORDER BY SUM(profit) DESC
	LIMIT 1;
	END;

	$result = mysqli_query($conn, $query);
	if(!$result){
		die("Error: " . mysqli_error($conn));
	}

	$row = mysqli_fetch_row($result);
	echo "Rekordowy produkt to " . $row[0] . ". Zarobił " . $row[1];
}

function sales3(){
	global $conn;
	$query = <<<END
	SELECT COUNT(*) FROM transactions
	WHERE transaction_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 YEAR) AND NOW();
	END;

	$result = mysqli_query($conn, $query);
	if(!$result){
		die("Error: " . mysqli_error($conn));
	}

	$row = mysqli_fetch_row($result);
	echo "Przez ostatnie dwa lata wykonano " . $row[0] . " transakcji.";
}

function sales4(){
	global $conn;
	$query = <<<END
	SELECT SUM(profit) FROM transactions
	WHERE transaction_date BETWEEN DATE_SUB(NOW(), INTERVAL 2 YEAR) AND NOW();
	END;

	$result = mysqli_query($conn, $query);
	if(!$result){
		die("Error: " . mysqli_error($conn));
	}

	$row = mysqli_fetch_row($result);
	echo "Transakcje z ostatnich dwóch lat wygenerowały " . $row[0] . " przychodu.";
}

mysqli_close($conn);
?>
<br>
<a href="../index.html">Powrót</a>
</body>
</html>