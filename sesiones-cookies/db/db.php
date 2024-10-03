<?php
$users = [
    [
        'name' => 'Admin',
        'user' => 'admin',
        'password' => '123',
        'id'=>1        
    ],
    [
        'name' => 'Lionel Messi',
        'user' => 'user',
        'password' => 'user',
        'id'=>2
    ]
];


// Arreglo con posts
$posts = [
    [
        "titulo" => "Post 1",
        "contenido" => "Este es el contenido del post 1",
        "autor" => "admin",
        "id_user"=>1
    ],
    [
        "titulo" => "Post 2",
        "contenido" => "Este es el contenido del post 2",
        "autor" => "user",
        "id_user"=>2
    ]
];

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}