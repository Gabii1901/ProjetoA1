<?php
session_start();
require_once 'classes/Usuario.php';
require 'usuarios.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $novoUsuario = new Usuario($nome, $email, $senha);

    $_SESSION['usuarios'][] = [
        "nome" => $novoUsuario->getNome(),
        "email" => $novoUsuario->getEmail(),
        "senha" => $novoUsuario->getSenha()
    ];
    

    $_SESSION['sucesso'] = "Cadastro realizado! Faça login.";
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Cadastro de Usuário</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php">Já tem conta? Login</a>
</div>
</body>
</html>
