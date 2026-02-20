<?php
session_start();

$valid_users = [
    "Jhugo3D" => "Jhugo3D",
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($valid_users[$username]) && $valid_users[$username] === $password) {

    $_SESSION['username'] = $username;
    header("Location: vipzone.php");
    exit;
} else {
    // Show a styled error page using site header (but hide the site nav for VIP pages)
    $hide_header = true;
    include __DIR__ . '/../header.php';
    ?>
    <section class="card" style="max-width:480px;margin:28px auto;">
        <h1>Acceso denegado</h1>
        <p class="error">Usuario o contraseña incorrectos.</p>
        <p style="text-align:center;margin-top:8px"><a href="viplogin.php">Volver al formulario</a></p>
    </section>

<?php
    }
    include __DIR__ . '/../footer.php';
?>