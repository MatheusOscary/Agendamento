<?php
require_once '../DAL/UsuarioDal.php';
require_once '../app/models/Usuario.php';

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
