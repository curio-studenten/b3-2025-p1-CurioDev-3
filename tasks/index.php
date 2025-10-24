<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php require_once '../head.php'; ?> 
</head>
<header>
    <div class="wrapper">
        <nav>
            <a href="index.php">Takenoverzicht</a>
        </nav>
    </div>
</header>

<body>
    
    
      <?php 
        require_once '../backend/conn.php';

        $query = "SELECT * FROM taken ";

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
                <th>Update</th>
                <th>Delete</th>

            </tr>
            <?php foreach($taken as $taak):   ?>
                <tr>

            <td> <?php echo $taak['titel']; ?></td>
            <td> <?php echo $taak['beschrijving']; ?></td>
            <td> <?php echo $taak['afdeling']; ?></td>
            <td> <?php echo $taak['status']; ?></td>
            <td> <?php echo $taak['deadline']; ?></td>
            <td><a href="../tasks/update.php?id=<?php echo $taak['id']; ?>">Update</a></td>
            <td><a href="../tasks/delete.php?id=<?php echo $taak['id']; ?>">delete</a></td>

           
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="../tasks/done.php">Done</a>
        <a href="../tasks/create.php">Create</a>
</body>
</html>