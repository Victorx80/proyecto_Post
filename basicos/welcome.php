<?php
session_start();
require_once 'db.php'; 

// Verificar si hay una cookie de usuario
if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = json_decode($_COOKIE['user'], true);
}

// Redirigir si el usuario no está autenticado
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

<!-- Inicializar el array de posts desde el archivo JSON -->
<?php
if (!file_exists('posts.json')) {
    $posts = [];
} else {
    $posts = json_decode(file_get_contents('posts.json'), true);
}

// Procesar la creación de un nuevo post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    $usuario = htmlspecialchars(trim($_POST['usuario']));
    $contenido = htmlspecialchars(trim($_POST['contenido']));

    if (!empty($usuario) && !empty($contenido)) {
        $nuevoPost = [
            'id_user' => $_SESSION['user']['id'],
            'usuario' => $usuario,
            'contenido' => $contenido
        ];
        
        $posts[] = $nuevoPost;

        file_put_contents('posts.json', json_encode($posts, JSON_PRETTY_PRINT));

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<p style='color:red;'>Por favor, complete todos los campos.</p>";
    }
}

// Mostrar publicaciones del usuario
foreach ($posts as $post) {
    if ($post['id_user'] == $_SESSION['user']['id']) {
        echo "<h3>Título: {$post['usuario']}</h3>";
        echo "<p>Contenido: {$post['contenido']}</p><hr>";
    }
}
?>

<!-- Formulario para crear un nuevo post -->
<form method="post">
    <input type="text" name="usuario" placeholder="Título" required>
    <input type="text" name="contenido" placeholder="Contenido" required>
    <input type="submit" name="enviar" value="Crear">
</form>
