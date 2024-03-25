<?php
$mode = $_REQUEST["crm"];
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

$servername = "localhost";
$username = "root";
$password = "";
$database = "erp_php";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
	die("Error: " . mysqli_connect_error());
}

function crm1(){
	global $conn;
	$client_name = $_POST["client_name"];
	$client_email = $_POST["client_email"];
	$client_subscription = $_POST["client_subscription"];
	$query = <<<END
	INSERT INTO clients (client_name, client_email, client_subscription)
	VALUES ($client_name, $client_email, $client_subscription);
	END;

	if(!mysqli_query($conn, $query)){
		die("Error: " . mysqli_error($conn));
	}
	echo "Dodano nowego klienta " . $client_name;
}

function crm2(){

}

function crm3(){

}

function crm4(){

}

function crm5(){

}

mysqli_close($conn);
?>
<br>
<a href="../index.html">Powrót</a>