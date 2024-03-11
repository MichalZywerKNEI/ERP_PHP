<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klienci</title>
</head>
<body>
    <?php
    echo "<ol>";
        $filename = "clients.csv";
        $clients = fopen($filename, "r");
        $data = fgetcsv($clients);
        while($data = fgetcsv($clients)){
            echo "<li>UID: " . $data[0] . ", Imię: " . $data[1] . ", e-mail: " . $data[2] . ", Subskrypcja: " . $data[3] . "</li>";
        }
    echo "</ol>";
    ?>
    <a href="../index.html">Powrót</a>
</body>
</html>