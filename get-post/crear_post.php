<?php
session_start();
require_once 'db.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirige si no está autenticado
    exit();
}

if (isset($_POST['crear'])){
    $usuario=htmlentities($_POST['usuario']);
    //comfiguracion de cookies
    setcookie('usuario', $usuario,time()+3600); 

    header("location: cookies.php");
}

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar los datos
    if (isset($_POST['usuario'], $_POST['contenido']) && !empty($_POST['usuario']) && !empty($_POST['contenido'])) {
        $usuario = $_POST['usuario'];
        $contenido = $_POST['contenido'];
        $id_user = $_SESSION['user']['id'];
        $autor = $_SESSION['user']['user']; // Nombre de usuario

        // Crear el nuevo post
        $new_post = [
            'usuario' => $usuario,
            'contenido' => $contenido,
            'autor' => $autor,
            'id_user' => $id_user,
        ];

        // Agregar el nuevo post al arreglo de la sesión
        $_SESSION['posts'][] = $new_post;
        
        // Agrega el post al arreglo
        
                

                // Redirigir a la página de bienvenida
                

    
        exit();
    } else {
        echo "Por favor, completa todos los campos.";
    }
} else {
    echo "Método de solicitud no válido.";
}



