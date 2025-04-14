<?php
require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$novoUsuario = new Usuario($nome, $email, $senha);
Autenticador::adicionarUsuario($novoUsuario);

Sessao::set('usuarios', serialize(Autenticador::listarUsuarios()));

header("Location: login.php");
exit();
?>
