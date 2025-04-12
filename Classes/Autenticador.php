<?php
require_once __DIR__ . '/Usuario.php';

class Autenticador
{
    private $usuarios = [];

    public function registrar_usuario($nome, $email, $senha)
    {
        $this->usuarios[] = new Usuario($nome, $email, $senha);
    }

    public function autenticar_login($email, $senha)
    {
        foreach ($this->usuarios as $usuario)
        {
            if ($usuario->autenticar($email, $senha))
            {
                return true;
            }
        }

        return false;
    }

    public function buscar_nome_por_email($email)
    {
        foreach ($this->usuarios as $usuario)
        {
            if ($usuario->get_email() == $email)
            {
                return $usuario->get_nome();
            }
        }

        return null;
    }
}
?>