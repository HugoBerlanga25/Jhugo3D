<?php
session_start();

$valid_users = [
    "User" => "Abcd@1235",
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($valid_users[$username]) && $valid_users[$username] === $password) {

    $_SESSION['username'] = $username;
    header("Location: vipzone.php");
    exit;
} else {

    echo "<p>Usuari o contrasenya incorrectes!</p>";
    echo '<p><a href="viplogin.php">Torna al formulari</a></p>';
}
?>