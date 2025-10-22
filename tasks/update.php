<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="../backend/taskControllers.php" method="POST">
    <input type="hidden" name="action" value="update">
     <div class="form-group">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $taken['id']; ?>">
            </div>

            <div class="form-group">
            <label for="titel">titel</label>
            <input type="text" name="titel" value="<?php echo $taken['titel']; ?>">
            </div>

            <div class="form-group">
            <label for="beschrijving">description</label>
            <textarea name="beschrijving"><?php echo $taken['beschrijving']; ?></textarea>
            </div>
            
            <input type="submit" value="update">
</body>
</html>