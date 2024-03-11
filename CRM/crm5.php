<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-maile</title>
</head>
<body>
    <p>
        <?php
        $filename = "clients.csv";
        $clients = fopen($filename, "r");
        $data = fgetcsv($clients);
        while($data = fgetcsv($clients)){
            echo $data[2] . "<br>";
        }
        ?>
    </p>
    <a href="../index.html">Powrót</a>
</body>
</html>