<?php
require_once __DIR__ . '/../DAL/UsuarioDal.php';
require_once __DIR__ . '/../Usuario.php';

class UsuarioBll {

    private $UsuarioDal;

    public function __construct() {
        $this->UsuarioDal = new UsuarioDal();
    }

    public function select($id) {
        $usuario = $this->UsuarioDal->select($id);
        return $usuario;
    }

    public function login($usuario, $senha) {
        $login = $this->UsuarioDal->login($usuario, $senha);
        return $login;
    }
}
?>
