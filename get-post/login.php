<?php
session_start();
require_once 'db.php'; 

// Verifico que $users esté definido
if (!isset($users) || !is_array($users)) {
    die('Error: Usuarios no definidos.');
}

// Obtener los datos del formulario por POST
if (
    isset($_POST['user']) && !empty($_POST['user']) &&
    isset($_POST['password']) && !empty($_POST['password'])
) {
    $user_name = $_POST['user'];
    $pass = $_POST['password'];

    foreach ($users as $user) {
        if ($user['user'] === $user_name && $user['password'] === $pass) {
            $_SESSION['user'] = $user; // Guarda el nuevo usuario
            header('Location: welcome.php');
            exit(); 
        }
    }

    echo "Usuario o contraseña incorrectos";
} else {
    echo "Los campos están vacíos";
}
