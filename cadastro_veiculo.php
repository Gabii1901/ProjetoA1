<?php
session_start();
require 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nome_usuario = $_SESSION['usuario'];
$stmt_usuario = $pdo->prepare("SELECT id FROM usuarios WHERE nome = ?");
$stmt_usuario->execute([$nome_usuario]);
$usuario = $stmt_usuario->fetch();
$usuario_id = $usuario['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = htmlspecialchars(trim($_POST['marca']));
    $modelo = htmlspecialchars(trim($_POST['modelo']));
    $placa = htmlspecialchars(trim($_POST['placa']));

    $stmt = $pdo->prepare("INSERT INTO veiculos (usuario_id, marca, modelo, placa) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$usuario_id, $marca, $modelo, $placa])) {
        $sucesso = "Veículo cadastrado com sucesso!";
    } else {
        $erro = "Erro ao cadastrar veículo.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastrar Veículo</h2>
        <?php 
        if (isset($sucesso)) echo "<p class='sucesso'>$sucesso</p>";
        if (isset($erro)) echo "<p class='erro'>$erro</p>"; 
        ?>
        <form method="POST">
            <input type="text" name="marca" placeholder="Marca" required>
            <input type="text" name="modelo" placeholder="Modelo" required>
            <input type="text" name="placa" placeholder="Placa" required>
            <button type="submit">Cadastrar Veículo</button>
            <p><a href="dashboard.php">Voltar ao Dashboard</a></p>
        </form>
    </div>
</body>
</html>
