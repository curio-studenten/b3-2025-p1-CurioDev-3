<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once 'head.php'; ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<header>
    <div class="wrapper">
        <nav>
            <a href="index.php">Home</a>
            <a href="create.php">Create</a>
            <a href="overview.php">Overview</a>
        </nav>
    </div>
</header>

<body>
    <?php require_once 'head.php'; ?>

    <form action="backend/taskControllers.php" method="POST">

    <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title">
    </div>

     <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title">
    </div>
    
    </form>
    
</body>

</html>