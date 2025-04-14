<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Usuario.php';

Sessao::iniciar();

if (Sessao::get('usuarios')) {
    $usuariosSerializados = Sessao::get('usuarios');
    $usuarios = unserialize($usuariosSerializados);

    foreach ($usuarios as $usuario) {
        Autenticador::adicionarUsuario($usuario);
    }
}

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$usuario = Autenticador::autenticar($email, $senha);

if ($usuario) {
    Sessao::set('usuario_logado', $usuario->getNome());
    header("Location: dashboard.php");
    exit();
} else {
    echo "Email ou senha inválidos.";
}
?>
