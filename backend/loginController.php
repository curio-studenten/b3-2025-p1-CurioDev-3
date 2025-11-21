<?php
session_start();
require 'conn.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: ../tasks/index.php?error=Gebruiker bestaat niet");
    exit;
}

if ($password === $user['password']) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $user['username'];
    $_SESSION['userid'] = $user['id'];

    header("Location: ../home.php");
    exit;
} else {
    header("Location: ../tasks/index.php?error=Verkeerd wachtwoord");
    exit;
}

 header("Location: ../tasks/index.php");
    exit;

?>