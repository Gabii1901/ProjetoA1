<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    if ($stmt->execute([$nome, $email, $senha])) {
        $_SESSION['sucesso'] = "Cadastro realizado com sucesso!";
        header("Location: login.php");
        exit();
    } else {
        $erro = "Erro ao cadastrar. Tente novamente.";
    }
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
        <h2>Cadastro</h2>
        <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
            <p><a href="login.php">Já tem conta? Login</a></p>
            <p><a href="dashboard.php">Voltar ao Dashboard</a></p>
        </form>
    </div>
</body>
</html>
