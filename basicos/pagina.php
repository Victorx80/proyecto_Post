<?php
    if(isset($_COOKIE['usuario'])){
        echo"usuario :" . $_COOKIE['usuario']."Esta configurado </br>" ;
        
    }

    //DESMONAR UNA COOKIES
    setcookie('usuario', $usuario,time()-3600);

    //validar si hay cookies guardadas 
    if(count($_COOKIE)>0){
        echo"hay ". count($_COOKIE) . " cokies guardadas";
    }