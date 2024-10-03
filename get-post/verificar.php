<?php
session_start();

// Verificar si hay una cookie de usuario
if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = json_decode($_COOKIE['user'], true);
}

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: login.php'); 
    exit();
}

echo "BIENVENID@: {$_SESSION['user']['name']} <br>";

// Mostrar botones de cerrar sesión y bloquear pantalla
?>
<form action="cerrar-sesion.php" method="post">
    <input type="submit" value="Cerrar sesión">
</form>
<form action="bloquear-pantalla.php" method="post">
    <input type="submit" value="Bloquear sesión">
</form>

<!-- Mostrar publicaciones del usuario -->
<?php
$posts = $_SESSION['posts'] ?? [];
foreach ($posts as $post) {
    if ($post['id_user'] == $_SESSION['user']['id']) {
        echo "Título: {$post['usuario']} <br>";
        echo "Contenido: {$post['contenido']} <br><br>";
    }
}
?>

<!-- Opción para volver a la página de creación de posts -->
<form action="crear_post.php" method="post">
    <input type="submit" value="Crear un nuevo post">
</form>
