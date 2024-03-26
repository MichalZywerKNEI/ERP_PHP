<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
	<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
</style>
</head>
<body>
<?php
$mode = $_REQUEST["crm"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "erp_php";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
	die("Error: " . mysqli_connect_error());
}

switch ($mode) {
	case "crm1":
		crm1();
		break;

	case "crm2":
		crm2();
		break;
	
	case "crm3":
		crm3();
		break;
	
	case "crm4":
		crm4();
		break;
	
	case "crm5":
		crm5();
		break;
	
	default:
		die("Error: incorrect CRM controller input: " . $mode);
		break;
}

function crm1(){
	global $conn;
	$client_name = $_POST["client_name"];
	$client_email = $_POST["client_email"];
	$client_subscription = $_POST["client_subscription"];
	$query = <<<END
	INSERT INTO clients (client_name, client_email, client_subscription)
	VALUES ('$client_name', '$client_email', '$client_subscription');
	END;

	if(!mysqli_query($conn, $query)){
		die("Error: " . mysqli_error($conn));
	}
	echo "Dodano nowego klienta " . $client_name;
}

function crm2(){
	global $conn;
	$query = <<<END
	SELECT * FROM clients;
	END;
	$result = mysqli_query($conn, $query);
	if(!$result){
		die("Error: " . mysqli_error($conn));
	}
	echo <<<END
	<table>
		<tr>
			<th>ID</th>
			<th>Imię</th>
			<th>E-mail</th>
			<th>Subskrybcja</th> 
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

function crm3(){
	global $conn;
	$client_id = $_POST["client_id"];
	$client_name = $_POST["client_name"];
	$client_email = $_POST["client_email"];
	$client_subscription = $_POST["client_subscription"];
	$query = <<<END
	UPDATE clients
	SET
		client_name = '$client_name',
		client_email = '$client_email',
		client_subscription = '$client_subscription'
	WHERE client_id = $client_id;
	END;

	if(!mysqli_query($conn, $query)){
		die("Error: " . mysqli_error($conn));
	}
	echo "Zaktualizowano dane dla klienta o ID " . $client_id;
}

function crm4(){
	global $conn;
	$client_id = $_POST["client_id"];
	$query = <<<END
	DELETE FROM clients
	WHERE client_id = $client_id;
	END;

	if(!mysqli_query($conn, $query)){
		die("Error: " . mysqli_error($conn));
	}
	echo "Usunięto klienta o ID " . $client_id;
}

function crm5(){
	global $conn;
	$query = <<<END
	SELECT client_email FROM clients;
	END;

	$result = mysqli_query($conn, $query);
	echo "<ol>";
		while($row = mysqli_fetch_row($result)){
			echo "<li>" . $row[0] . "</li>";
		}
	echo "</ol>";
}

mysqli_close($conn);
?>
<br>
<a href="../index.html">Powrót</a>
</body>
</html>