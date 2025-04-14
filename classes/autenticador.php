<?php
require_once 'Usuario.php';

class Autenticador
{
    private static $usuarios = [];

    public static function adicionarUsuario(Usuario $usuario)
    {
        self::$usuarios[] = $usuario;
    }

    public static function autenticar($email, $senha)
    {
        foreach (self::$usuarios as $usuario) {
            if ($usuario->autenticar($email, $senha)) {
                return $usuario;
            }
        }
        return null;
    }

    public static function listarUsuarios()
    {
        return self::$usuarios;
    }
}
?>
