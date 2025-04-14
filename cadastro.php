<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();
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
    <h2>Cadastro de Usuários</h2>
    <form method="POST" action="processa_cadastro.php">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php">Já tem conta? Login</a>
</div>
</body>
</html>
