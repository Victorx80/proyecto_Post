<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: welcome.php'); // Cambiado a welcome.php
    exit();
}
?>

<form action="login_process.php" method="post">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="submit" value="Iniciar sesión">
</form>
