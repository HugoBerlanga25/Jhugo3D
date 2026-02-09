<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If user is logged in (VIP) and is trying to access pages outside the /vip/ area,
// force a redirect to the VIP zone so they must 'salir' to access the rest of the site.
$uri = $_SERVER['REQUEST_URI'] ?? '';
// Normalize a couple of possible URI forms and check for '/vip/' presence.
if (!empty($_SESSION['username']) && strpos($uri, '/vip/') === false) {
    // Redirect to vipzone (absolute path)
    header('Location: /jhugo3d/vip/vipzone.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jhugo3D</title>
    <link rel="stylesheet" href="/jhugo3d/estilos.css">
</head>
<body>
<?php
// Allow pages to hide the header/navigation by setting $hide_header = true before including this file.
if (!isset($hide_header) || !$hide_header): ?>
    <header>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="disenys.php">Diseños</a>
            <a href="xarxes.php">Redes Sociales</a>
            <a href="vip/viplogin.php">VIP</a>
        </nav>
    </header>
<?php endif; ?>

<main>
    <!-- Script: transforma automáticamente headings para aplicar los colores del logo
         Envuelve la primera letra en .brand-blue, el resto en .brand-red y un sufijo "3D" (si existe) en .brand-yellow.
         Se aplica a h1, h2 y h3 en el documento. -->
    <script>
    (function(){
        function brandize(el){
            var txt = el.textContent.trim();
            if(!txt) return;
            // Detect and extract trailing '3D' or '3d'
            var suffix = '';
            var match = txt.match(/(.*?)(3D|3d)$/);
            if(match){
                txt = match[1].trim();
                suffix = match[2];
            }
            // First letter
            var first = txt.charAt(0);
            var rest = txt.slice(1);
            // Build innerHTML with spans
            var out = '';
            out += '<span class="brand-blue">'+first.replace(/</g,'&lt;')+'</span>';
            if(rest.length) out += '<span class="brand-red">'+rest.replace(/</g,'&lt;')+'</span>';
            if(suffix) out += '<span class="brand-yellow">'+suffix.replace(/</g,'&lt;')+'</span>';
            el.innerHTML = out;
        }

        function wrapLetters(el){
            var txt = el.textContent.trim();
            if(!txt) return;
            var out = '';
            for(var i=0;i<txt.length;i++){
                var ch = txt.charAt(i);
                if(ch === ' ') {
                    out += '<span class="title-space">&nbsp;</span>';
                } else {
                    // escape <
                    var safe = ch.replace(/</g,'&lt;');
                    out += '<span class="title-char">'+safe+'</span>';
                }
            }
            el.innerHTML = out;
        }

        function apply(){
            var nodes = document.querySelectorAll('h1,h2,h3');
            nodes.forEach(function(n){
                if(n.dataset.branded) return;
                var txt = n.textContent.trim();
                if(/^jhugo3d$/i.test(txt)){
                    brandize(n);
                    n.dataset.branded = '1';
                } else {
                    // For other headings, wrap each character so only the hovered letter rises
                    wrapLetters(n);
                    n.dataset.branded = '1';
                }
            });
        }

        if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', apply);
        else apply();
    })();
    </script>
