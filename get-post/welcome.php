<?php
session_start();
require_once "db.php"; 

// Verificar si la sesión tiene un usuario
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: login.php'); 
    exit();
}

// Ruta del archivo JSON
$jsonFile = 'posts.json';

// Cargar los posts desde el archivo JSON
$posts = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

// Manejo del formulario para crear un nuevo post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    $usuario = trim($_POST['usuario']);
    $contenido = trim($_POST['contenido']);
    
    if (!empty($usuario) && !empty($contenido)) {
        $new_post = [
            'id_user' => $_SESSION["user"]["id"],
            'usuario' => $usuario,
            'contenido' => $contenido
        ];
        $posts[] = $new_post; // Agregar el nuevo post a la lista
        
      
        

        

        echo "<p>Post creado exitosamente.</p>";
    } else {
        echo "<p style='color:red;'>Por favor completa todos los campos.</p>";
    }
}

// Mostrar las publicaciones del usuario
foreach ($posts as $post) {
    if ($post['id_user'] == $_SESSION["user"]["id"]) {
        echo "Título: " . htmlspecialchars($post['usuario']) . "<br>";
        echo "Contenido: " . nl2br(htmlspecialchars($post['contenido'])) . "<br><br>";
    }
}

echo "BIENVENID@: " . htmlspecialchars($_SESSION['user']['name']) . "<br>";

// Botones para cerrar sesión o bloquear pantalla
?>
<form action="cerrar-sesion.php" method="post">
    <input type="submit" value="Cerrar sesión">
</form>
<form action="bloquear-pantalla.php" method="post">
    <input type="submit" value="Bloquear sesión">
</form>

<!-- Formulario para crear un nuevo post -->
<form method="post">
    <input type="text" name="usuario" placeholder="Título" required>
    <input type="text" name="contenido" placeholder="Contenido" required>
    <input type="submit" name="enviar" value="Crear">
</form>
