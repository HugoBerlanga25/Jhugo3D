<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

$username = $_SESSION['username'];
// Ocultar la cabecera en las páginas VIP para forzar uso de la zona y logout
$hide_header = true;
include __DIR__ . '/../header.php';
?>

<section class="card" style="max-width:540px;margin:28px auto;text-align:center;">
    <h1>Zona VIP</h1>
    <p>Hola <strong><?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></strong>! Bienvenido a la VIPZONE.</p>
    <p style="margin-top:12px"><a href="sortir.php">Salir</a></p>
</section>

<?php include __DIR__ . '/../footer.php'; ?>