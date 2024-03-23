<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transakcje</title>
</head>
<body>
    <?php
    echo "<ol>";
        $filename = "../transactions.csv";
        $transactions = fopen($filename, "r");
        $data = fgetcsv($transactions);
        while($data = fgetcsv($transactions)){
            echo "<li>UID: " . $data[0] . ", ID klienta: " . $data[1] . ", produkt: " . $data[2] . ", dochód: " . $data[3] . ", czas transakcji: " . date("Y-m-d H:i:s", $data[4]) . "</li>";
        }
    echo "</ol>";
    ?>
    <a href="../CRUD.html">Powrót</a>
</body>
</html>