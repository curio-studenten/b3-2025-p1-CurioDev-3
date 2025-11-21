<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php require_once '../head.php'; ?> 
</head>

    <?php require_once '../header.php' ?>

<body>

<h2>Inloggen</h2>

<form action="../backend/loginController.php" method="POST">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" name="username" required><br><br>

    <label for="password">Wachtwoord:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit" href="index.php">Inloggen</button>
</form>

<?php  
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>".$_GET['error']."</p>";
}
?>

</body>
</html>
