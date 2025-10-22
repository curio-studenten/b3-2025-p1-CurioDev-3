<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">home</a>
    <h1>Hier is komen de tasks die DONE zijn.</h1>
    <?php 
        require_once '../backend/conn.php';

        $query = "SELECT status FROM taken where status = 'done' ";

        $statement = $conn->prepare($query);
        $statement->execute();
        $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
</body>
</html>