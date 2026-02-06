<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulari d'entrada</title>
</head>
<body>
<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    header('Location:login.php');

} else {
    ?>
    <form action="login.php" method="post">
        <label>Usuari: <input type="text" name="username" required></label><br>
        <label>Contrasenya: <input type="password" name="password" required></label><br>
        <input type="submit" value="Entrar">
    </form>
    <?php
}
?>
</body>
</html>
