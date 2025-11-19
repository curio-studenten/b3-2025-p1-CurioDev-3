<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <?php require_once '../head.php'; ?>
</head>
<body>
    
        <?php

        $id = $_GET['id'];

        require_once '../backend/conn.php';
        $query = "SELECT * FROM taken WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute(["id" => $id]);
        $taak = $statement->fetch(PDO :: FETCH_ASSOC);
        if (!$taak) {
            die("Bericht niet gevonden!");
        }

        ?>

   <form action="../backend/taskControllers.php" method="POST">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="<?php echo $taak['id']; ?>">
    <div class="form-group">
        <label for="titel">title</label>
        <input type="text" name="titel" value="<?php echo $taak['titel']; ?>">
    </div>

     <div class="form-group">
        <label for="afdeling">department</label>
        <input type="text" name="afdeling" value="<?php echo $taak['afdeling']; ?>">
    </div>

     <div class="form-group">
        <label for="beschrijving">description</label>
        <textarea name="beschrijving"><?php echo $taak['beschrijving']; ?>></textarea>
    </div>
    
     <div class="form-group">
        <label for="status">status</label>
        <input type="text" name="status" value="<?php echo $taak['status']; ?>">
    </div>

     <div class="form-group">
        <label for="deadline">deadline</label>
        <input type="date" name="deadline" value="<?php echo $taak['deadline']; ?>">
    </div>
    
    <div class="form-group">
       
        <button type="submit" name="action" value="update">Melding Opslaan</button>
        <button type="submit" name="action" value="cancel" onclick="return">Annuleren</button>
        <button type="submit" name="action" value="delete" onclick="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">Verwijder bericht</button>
    </div>
    </form>
</body>
</html>