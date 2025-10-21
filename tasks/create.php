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
            <a href="../index.php">Home</a>
            <a href="index.php">Takenoverzicht</a>
        </nav>
    </div>
</header>

<body>
    <form action="backend/taskControllers.php" method="POST">

    <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title">
    </div>

     <div class="form-group">
        <label for="user">user</label>
        <input type="text" name="user">
    </div>

    <div class="form-group">
        <label for="created_at">created at</label>
        <input type="datetime-local" name="created_at">
    </div>

     <div class="form-group">
        <label for="department">department</label>
        <input type="text" name="department">
    </div>

     <div class="form-group">
        <label for="description">description</label>
        <textarea name="description"></textarea>
    </div>
    
     <div class="form-group">
        <label for="status">status</label>
        <input type="text" name="status">
    </div>

     <div class="form-group">
        <label for="deadline">deadline</label>
        <input type="date" name="deadline">
    </div>
    
    </form>
    
</body>

</html>