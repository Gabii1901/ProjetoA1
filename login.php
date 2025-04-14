<?php
session_start();
require 'usuarios.php'; // carrega o array de usuários

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = $usuario['nome'];

            setcookie("usuario_logado", $usuario['nome'], time() + 3600, "/");

            header("Location: dashboard.php");
            exit();
        }
    }

    $erro = "Email ou senha inválidos.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>
    <?php if (isset($_SESSION['sucesso'])) { echo "<p class='sucesso'>{$_SESSION['sucesso']}</p>"; unset($_SESSION['sucesso']); } ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
    <a href="cadastro.php">Criar nova conta</a>
</div>
</body>
</html>
