<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sprzedaż - CRUD</title>
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	</style>
</head>
<body>
<?php
$mode = $_REQUEST["crud"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "erp_php";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
	die("Error: " . mysqli_connect_error());
}

switch ($mode){
	case "create":
		create();
		break;
	
	case "read":
		read();
		break;

	case "update":
		update();
		break;
	
	case "delete":
		deletec();
		break;

	default:
		die("Error: incorrect CRUD mode: " . $mode);
		break;
}

function create(){
	global $conn;
	$client_id = $_POST["client_id"];
	$product = $_POST["product"];
	$profit = $_POST["profit"];
	$query = <<<END
	INSERT INTO transactions (client_id, product, profit)
	VALUES ($client_id, '$product', $profit);
	END;

	if(!mysqli_query($conn, $query)){
		die("Error: " . mysqli_error($conn));
	}
	echo "Dodano nową transakcję z klientem o ID " . $client_id;
}

function read(){
	global $conn;
	$query = <<<END
	SELECT * FROM transactions;
	END;

	$result = mysqli_query($conn, $query);
	if(!$result){
		die("Error: " . mysqli_error($conn));
	}

	echo <<<END
	<table>
		<tr>
			<th>ID</th>
			<th>ID klienta</th>
			<th>Produkt</th>
			<th>Przychód</th> 
			<th>Data transakcji</th>
		</tr>
	END;
	while($row = mysqli_fetch_row($result)){
		echo "<tr>";
		foreach($row as $cell){
			echo "<td>$cell</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

function update(){
	global $conn;
	$transaction_id = $_POST["transaction_id"];
	$client_id = $_POST["client_id"];
	$product = $_POST["product"];
	$profit = $_POST["profit"];
	$query = <<<END
	UPDATE transactions
	SET
		client_id = $client_id,
		product = '$product',
		profit = $profit
	WHERE transaction_id = $transaction_id;
	END;

	if(!mysqli_query($conn, $query)){
		die("Error: " . mysqli_error($conn));
	}
	echo "Zaktualizowano dane dla transakcji o ID " . $transaction_id;
}

function deletec(){
	global $conn;
	$transaction_id = $_POST["transaction_id"];
	$query = <<<END
	DELETE FROM transactions
	WHERE transaction_id = $transaction_id;
	END;

	if(!mysqli_query($conn, $query)){
		die("Error: " . mysqli_error($conn));
	}
	echo "Usunięto transakcję o ID " . $transaction_id;
}

mysqli_close($conn);
?>
<br>
<a href="../CRUD.html">Powrót</a>
</body>
</html>