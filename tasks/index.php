<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL)
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php require_once  __DIR__ . '/../head.php'; ?> 
</head>

    <?php require_once  __DIR__ . '/../header.php' ?>

<body>
    
    
      <?php 
        require_once  __DIR__ . '/../backend/conn.php';

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
            <input type="submit" value="delete">
            </form>

            </td>

           
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="../tasks/done.php">Done</a>
        <a href="../tasks/create.php">Create</a>
         <a href="../tasks/unfinished.php">unfinished</a>
</body>
</html>