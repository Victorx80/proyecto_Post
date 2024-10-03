<?php
session_start();
if ($_POST['contraseña'] == $_SESSION['user']['password']) {
    // desbloquear la sesión
    header('Location: welcome.php');
} else {
    echo "Contraseña incorrecta.";}

