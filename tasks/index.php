<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php require_once '../head.php'; ?> 
</head>

    <?php require_once '../header.php' ?>

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
            <div class="takenoverzicht-links">
                <a class="takenoverzicht-link" href="../tasks/done.php">> Klik hier om de Done page te bezoeken</a>
                <a class="takenoverzicht-link" href="../tasks/create.php">> Klik hier om een taak aan te maken</a>
                <a class="takenoverzicht-link" href="../tasks/unfinished.php">> Klik hier om de unfinished tasks te zien</a>
            </div>
        


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
            <td><a class="update-btn" href="../tasks/update.php?id=<?php echo $taak['id']; ?>">Update</a></td>
            <td><form action="../backend/taskControllers.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $taak['id']; ?>">
            <input type="submit" class="delete-btn" name="action" value="delete" onclick="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');"></input>

            </form>
            delete
            </td>

           
            </tr>
            <?php endforeach; ?>
        </table>
        
</body>
</html>