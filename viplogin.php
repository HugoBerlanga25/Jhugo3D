<?php
session_start();
// Ocultar la cabecera en las páginas VIP para forzar uso de la zona y logout
$hide_header = true;
include __DIR__ . '/../header.php';
?>

<section class="card" style="max-width:480px;margin:28px auto;">
    <?php if (isset($_SESSION['username'])):
        // If user already logged in, redirect to vipzone
        header('Location: vipzone.php');
        exit;
    else: ?>
        <h1>Acceso VIP</h1>
        <p class="muted">Introduce tus credenciales para acceder a la zona VIP.</p>
        <form action="login.php" method="post" class="login" aria-label="Formulario de acceso VIP">
            <label>Usuario:
                <input type="text" name="username" placeholder="Tu usuario" required autofocus>
            </label>
            <label>Contraseña:
                <input type="password" name="password" placeholder="Tu contraseña" required>
            </label>
            <input type="submit" value="Entrar">
        </form>
        <p class="muted" style="text-align:center;margin-top:10px;font-size:13px">Si no recuerdas la contraseña ponte en contacto con el administrador.</p>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/../footer.php'; ?>
