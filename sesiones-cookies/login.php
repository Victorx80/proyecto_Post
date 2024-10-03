<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once './db/db.php'; // Asegúrate de que esta ruta sea correcta

// Verifica que $users esté definido
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
    $row = 0;

    foreach ($users as $user) {
        if ($user['user'] === $user_name && password_verify($pass, $user['password'])) {
            $_SESSION['user'] = $user; // Guarda solo el usuario autenticado
            header('Location: welcome.php');
            exit(); // Asegúrate de usar exit() aquí
        }
    }

    echo "Usuario o contraseña incorrectos";
} else {
    echo "Los campos están vacíos";
}

echo "Hola";