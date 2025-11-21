<!DOCTYPE html>
<html lang="nl">

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage | Pretpark Webapp</title>
    <?php require_once  __DIR__ . '/head.php'; ?> <!-- Laadt o.a. CSS -->
</head>

<body>
    <?php  require_once  __DIR__ . '/header.php' ?>

    <div class="wrapper">
        <div class="h1_homepage">
            <h1>Welkom bij de Pretpark Webapp</h1>
        </div>
        <div class="container_homepage">
            <main>
                <p>Beheer eenvoudig alle taken van het pretpark.</p>
            </main>
        </div>
    </div>
</body>
</html>
