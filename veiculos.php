<?php
session_start();
require 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->query("
    SELECT v.marca, v.modelo, v.placa, u.nome AS dono
    FROM veiculos v
    INNER JOIN usuarios u ON v.usuario_id = u.id
");

$veiculos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Veículos Cadastrados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Veículos Cadastrados</h2>
        <?php if (count($veiculos) == 0): ?>
            <p>Não há veículos cadastrados ainda.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($veiculos as $veiculo): ?>
                    <li>
                        <?php 
                        echo htmlspecialchars($veiculo['marca']) . " " . 
                             htmlspecialchars($veiculo['modelo']) . 
                             " - Placa: " . htmlspecialchars($veiculo['placa']) . 
                             " (Cadastrado por: " . htmlspecialchars($veiculo['dono']) . ")";
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <p><a href="dashboard.php">Voltar ao Dashboard</a></p>
    </div>
</body>
</html>
