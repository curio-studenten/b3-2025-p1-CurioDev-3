<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once '../head.php'; ?>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Takenoverzicht</a>
            <a href="../home.php">Home</a>
        </nav>
    </header>
    <h1>Hier is komen de tasks die DONE zijn.</h1>
    <?php 
        require_once '../backend/conn.php';

        $query = "SELECT * FROM taken where status = 'done' ";

        $statement = $conn->prepare($query);
        $statement->execute();
        $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

        ?> 
        <table>
            <tr>

                <th>Titel</th>
                <th>Description</th>
                <th>Department</th>
                <th>Status</th>
                <th>deadline</th>
            </tr>
            <?php foreach($taken as $taak):   ?>
                <tr>

            <td> <?php echo $taak['titel']; ?></td>
            <td> <?php echo $taak['beschrijving']; ?></td>
            <td> <?php echo $taak['afdeling']; ?></td>
            <td> <?php echo $taak['status']; ?></td>
            <td> <?php echo $taak['deadline']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
</body>
</html>