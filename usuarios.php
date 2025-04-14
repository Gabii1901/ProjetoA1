<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [
        [
            "nome" => "admin",
            "email" => "admin@email.com",
            "senha" => password_hash("admin123", PASSWORD_DEFAULT)
        ]
    ];
}

$usuarios = $_SESSION['usuarios'];
?>
