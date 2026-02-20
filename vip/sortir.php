<?php
session_start();
session_destroy();
// Ocultar la cabecera en las páginas VIP para forzar uso de la zona y logout
$hide_header = true;
include __DIR__ . '/../header.php';
?>

<section class="card" style="max-width:520px;margin:28px auto;text-align:center;">
    <h1>Sesión finalizada</h1>
    <p>Has salido de la sesión. Serás redirigido a la página principal en breve.</p>
    <p style="margin-top:12px"><a href="/jhugo3d/index.php">Ir ahora a la página principal</a></p>
</section>
<meta http-equiv="refresh" content="2;url=/jhugo3d/index.php">

<?php include __DIR__ . '/../footer.php'; ?>