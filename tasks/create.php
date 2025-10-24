<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once '../head.php'; ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<header>
    <div class="wrapper">
        <nav>

            <a href="index.php">Takenoverzicht</a>
        </nav>
    </div>
</header>

<body>
    <form action="../backend/taskControllers.php" method="POST">
    <input type="hidden" name="action" value="insert">
    <div class="form-group">
        <label for="titel">title</label>
        <input type="text" name="titel">
    </div>

     <div class="form-group">
        <label for="afdeling">department</label>
        <input type="text" name="afdeling">
    </div>

     <div class="form-group">
        <label for="beschrijving">description</label>
        <textarea name="beschrijving"></textarea>
    </div>
    
     <div class="form-group">
        <label for="status">status</label>
        <input type="text" name="status">
    </div>

     <div class="form-group">
        <label for="deadline">deadline</label>
        <input type="date" name="deadline">
    </div>
    
    <div class="form-group">
       
        <input type="submit" value="submit">
    </div>
    </form>
    
</body>

</html>