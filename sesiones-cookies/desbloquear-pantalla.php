<?php
session_start();
if ($_POST['contraseña'] == $_SESSION['user']['password']) {
    // Bloquear la sesión
    header('Location: welcome.php');
} else {
    echo "Contraseña incorrecta.";}