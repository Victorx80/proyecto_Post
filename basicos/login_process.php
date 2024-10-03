<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar credenciales
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name']
        ];

        header('Location: welcome.php'); // Cambiado a welcome.php
        exit();
    } else {
        header('Location: login.php?error=1'); // Redirigir con error
        exit();
    }
}
