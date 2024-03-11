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
/*echo "New client " . $_REQUEST["clientName"] . " created with a unique ID $new_id";
fclose($clients);
sleep(2);*/
header("Location: http://localhost");
?>