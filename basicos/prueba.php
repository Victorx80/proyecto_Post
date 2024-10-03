<?php
if (isset($_POST['crear'])){
    $usuario=htmlentities($_POST['usuario']);
    //comfiguracion de cookies
    setcookie('usuario', $usuario,time()+3600); 

    header("location: pagina.php");
}

// Redirigir a la página de bienvenida
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text" name="usuario"  placeholder="Titulo" >
    <input type="text" name="cuerpo"  placeholder="cuerpo" >

    <input type="submit"  name="enviar" value="crear">
</form>
</body>
</html>