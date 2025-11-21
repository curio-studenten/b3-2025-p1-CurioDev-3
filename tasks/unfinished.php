<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once  __DIR__ . '/../head.php'; ?>
</head>
<body>

    <?php require_once  __DIR__ . '/../header.php' ?>
    
    <h1>Here are all the UNFINISHED tasks</h1>
    <?php 
        require_once  __DIR__ . '/backend/conn.php';

        $query = "SELECT * FROM taken where status = 'unfinished' ";

        $statement = $conn->prepare($query);
        $statement->execute();
        $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

        $deadlines = array_column($taken, 'deadline');

        array_multisort($deadlines, SORT_ASC, $taken);

        ?> 
        <table>
            <tr>

                <th>Titel</th>
                <th>Department</th>
                <th>Status</th>
            </tr>
            <?php foreach($taken as $taak):   ?>
                <tr>

            <td> <?php echo $taak['titel']; ?></td>
            <td> <?php echo $taak['afdeling']; ?></td>
            <td> <?php echo $taak['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
</body>
</html>