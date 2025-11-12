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
            <a href="../home.php">Home</a>
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

        $deadlines = array_column($taken, 'deadline');

        array_multisort($deadlines, SORT_ASC, $taken);
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
            <td><form action="../backend/taskControllers.php" method="POST" style="display:inline;">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $taak['id']; ?>">
            <input type="submit" value="Verwijder bericht" onclick="return confirm('weet je het zeker?')">
            </form>

            </td>

           
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="../tasks/done.php">Done</a>
        <a href="../tasks/create.php">Create</a>
</body>
</html>