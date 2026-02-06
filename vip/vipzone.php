<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>VIPZONE</title>
</head>
<body>
<p>Hola <?php echo $username; ?>! Benvingut a la VIPZONE.</p>
<a href="sortir.php">Sortir</a>
</body>
</html>