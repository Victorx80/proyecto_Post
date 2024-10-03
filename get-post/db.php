<?php


// Inicializa los usuarios
$users = [
    [
        'name' => 'Admin',
        'user' => 'admin',
        'password' => '123',
        'id' => 1        
    ],
    [
        'name' => 'Lionel Messi',
        'user' => 'user',
        'password' => 'user',
        'id' => 2
    ]
];

// se inicializa el arreglo de posts en la sesión si no existe
if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = [
        [
            "usuario" => "Ben 10",
            "contenido" => "Este es el contenido del post 1",
            "autor" => "admin",
            "id_user" => 1
        ],
        [
            "usuario" => "ONE PIECE",
            "contenido" => "Este es el contenido del post 2",
            "autor" => "user",
            "id_user" => 2
        ]
    ];
}
