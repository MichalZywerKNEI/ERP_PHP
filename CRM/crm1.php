<?php
$new_id = uniqid();
$filename = "clients.csv";
$clients = fopen($filename, "a");
$client_data = [
    $new_id,
    $_REQUEST["clientName"],
    $_REQUEST["clientMail"],
    $_REQUEST["clientSub"]
];
fputcsv($clients, $client_data);
echo "Dodano nowego klienta " . $_REQUEST["clientName"] . " o ID $new_id";
fclose($clients);
echo '<br><a href="../index.html">Powrót</a>';
?>