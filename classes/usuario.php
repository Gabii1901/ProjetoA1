<?php

class Usuario
{
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha)
    {
        $this->nome = htmlspecialchars(trim($nome));
        $this->email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function autenticar($email, $senha)
    {
        return $this->email === $email && password_verify($senha, $this->senha);
    }
}
?>
