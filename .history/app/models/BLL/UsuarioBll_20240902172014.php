<?php
require_once '../app/models/DAL/UsuarioDal.php';
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
}
?>
