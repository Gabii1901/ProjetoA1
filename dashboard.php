<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();

$usuario = Sessao::get('usuario_logado');

if (!$usuario) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Bem-vindo, <?php echo htmlspecialchars($usuario); ?>!</h2>
    <p>Você fez login com sucesso.</p>
    <a href="cadastro.php">Deseja cadastrar um novo usuário</a><br><br>
    <a href="logout.php" class="btn-sair">Sair</a>
</div>
</body>
</html>
