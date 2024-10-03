<?php
session_start();
require_once "./db/db.php";
// Obtener los datos del formulario por POST
if (
    isset($_SESSION['user']) &&
    !empty($_SESSION['user'])
) {
    // Mostramos los datos del formulario
    echo "BIENVENID@: {$_SESSION['user']['name']} <br>";

    
}


?>
<form action="cerrar-sesion.php" method="post">
    <input type="submit" value="Cerrar sesión">
    

</form>
<form action="bloquear-pantalla.php" method="post">
<input type="submit" value="bloquear sesion">
</form>

<?php
foreach ($posts as $pos){
    if($pos['id_user']==$_SESSION["user"]["id"]){
        echo"titulo:{$pos['titulo']} <br>";
        echo"contenido:{$pos['contenido']} <br>";
    }
}


?>

</form>
<input class="controls" type="text" name="Telefono " id="telefono" placeholder=" titulo ">
<input class="controls" type="text" name="Telefono " id="telefono" placeholder=" cuerpo ">
<form action="crear-post.php" method="post">
<input type="submit" value=" crear-post">
</form>

