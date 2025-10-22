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
                <th>user</th>
                <th>Time of creation</th>
            </tr>
            <?php foreach($taken as $taak):   ?>
                <tr>

            <td> <?php echo $taak['titel']; ?></td>
            <td> <?php echo $taak['beschrijving']; ?></td>
            <td> <?php echo $taak['afdeling']; ?></td>
            <td> <?php echo $taak['status']; ?></td>
            <td> <?php echo $taak['deadline']; ?></td>
            <td> <?php echo $taak['user']; ?></td>
            <td> <?php echo $taak['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
</body>
</html>