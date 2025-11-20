<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Inloggen</h2>

<form action="loginController.php" method="POST">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" name="username" required><br><br>

    <label for="password">Wachtwoord:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Inloggen</button>
</form>

<?php  
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>".$_GET['error']."</p>";
}
?>

</body>
</html>
